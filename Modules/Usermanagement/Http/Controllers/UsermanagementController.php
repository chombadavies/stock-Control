<?php

namespace Modules\Usermanagement\Http\Controllers;

use DB;
use Auth;
use App\User;
use Redirect;
use App\Models\Centre;
use App\Models\Department;
use App\Helpers\SystemAudit;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Usermanagement\Entities\Role;
use Illuminate\Contracts\Support\Renderable;
use Modules\Usermanagement\Entities\Profile;

class UsermanagementController extends Controller
{
    protected $userID;
    protected $mid;
    protected $sid;
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid = Auth::user()->org_id;

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        Session::put('page','users');
        if (Auth::user()->can("Add Users") || Auth::user()->hasRole("SuperAdmin")) {
            $data['page_title'] = "Internal SystemUsers";

            return view('usermanagement::users.index', $data);

        } else {
            return view("forbidden");
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function Create(Request $request)
    {
        Session::put('page','create user');

        $data['page_title'] = "Create Users";
        $data['model'] = new User();
        $data['roles'] = Role::where('name', '!=', 'name')->pluck('name', 'name')->toArray();
        $data['centres'] = Centre::pluck('centreName', 'id')->toArray();
        $data['departments'] = Department::pluck('dptName', 'id')->toArray();
        $data['url'] = url()->current();

        if ($request->isMethod("post")) {
            // $this->validate($request, [

            //     'email' => 'required|email|unique:users,email',
            //     'password' => 'required|min:6|max:10|confirmed',
            //     'name' => 'required|string',
            // ]);
            $data = $request->all();
            DB::beginTransaction();
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['telephone'];
            $user->password = $data['password'];
            $user->confirmed_at = date('Y-m-d H:i:s');
            $user->verification_code = str_random(7);
            $user->role_id = $data['role_id'];
            $user->centre_id = $data['centre_id'];
            $user->dpt_id = $data['dpt_id'];
           
            $user->username = $data['id_number'];
            $user->user_type = "Internal";
            //    dd($data);
            $user->save();
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->servicenumber = $data['id_number'];
            $profile->gender = $data['gender'];
            $profile->save();
            $roles = $data['role_id'];
            $user->assignRole($roles);
            $usermodel = Auth::user();
            $event_name = "Created";
            $description = $usermodel->name . ",created account for " . $user->name . " and assigned  role " . $roles;
            $severity = "Critical";
            $ip = $request->ip();
            SystemAudit::CreateEvent($usermodel, $event_name, $description, $severity, $ip, "User Management");
            DB::commit();
            Session::flash("success_msg", "User Account Created Successfully");
            return redirect('Backend/User/Index');

        }
        return view('usermanagement::users.create', $data);

    }

    public function fetchUsers()
    {
        $models = DB::select(' select users.id,users.name,email,username,phone,user_type,user_status,gender,users.created_at,roles.name as user_role,profiles.servicenumber,departments.dptName,centres.centreName,users.lastlogindate from users
   join profiles on profiles.user_id=users.id
  join  model_has_roles on model_has_roles.model_id=users.id
  join centres on centres.id=users.centre_id
  join departments on departments.id=users.dpt_id
  join roles on roles.id=model_has_roles.role_id');
        return Datatables::of($models)
            ->rawColumns(['action'])
            ->addColumn('action', function ($model) {
                $edit_url = url('/Backend/User/Edit/' . $model->id);
                $delete = url('/Backend/User/Delete/' . $model->id);
                $index_url = url('/Backend/User/Index');
                $view_url = url('/Backend/Users/ViewPermission/' . $model->id);
                $edit_d_url = url('/Backend/User/EditDepartment/' . $model->id);
                $view_user_url = url('/Backend/Users/ViewRoleUser/' . $model->id);
                $password_url = url('/Backend/Users/ResetPassword/' . $model->id);

                return '<div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
     <li><a style="cursor:pointer;"  class="reject-modal" data-title="User Password Reset" data-url="' . $password_url . '">&nbsp;&nbsp;&nbsp;&nbsp;Reset Password</a></li>
     <li><div class="dropdown-divider"></div></li>
    <li><a style="cursor:pointer;"  title="Edit Role Details" href="' . $edit_url . '">&nbsp;&nbsp;&nbsp;&nbsp;Edit Details</a></li>
    <li><div class="dropdown-divider"></div></li>
      <li><a style="cursor:pointer;"  class="reject-modal" data-title="View Permissions Assigned" data-url="' . $view_url . '">&nbsp;&nbsp;&nbsp;&nbsp;Permissions Assigned</a></li>
      <li><div class="dropdown-divider"></div></li>
    <li><a style="cursor:pointer;"  class="reject-modal" data-title="View Groups/Roles Assigned To User" data-url="' . $view_user_url . '"> &nbsp;&nbsp;&nbsp;&nbsp;User Roles</a></li>

    <li><div class="dropdown-divider"></div></li>
    <li><a  style="cursor:pointer;" data-name="Role" data-redirect-to="' . $index_url . '" class="delete-record"  data-url="' . $delete . '" >&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></li>
    </ul>
</div>
';
            })->make(true);
    }

    public function PasswordReset($id, Request $request)
    {

        if (Auth::user()->can("Reset User Passwords") || Auth::user()->hasRole("SuperAdmin")) {
            $user = User::find($id);
            $data['url'] = url()->current();
            $data['user'] = $user;
            if ($request->isMethod("post")) {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',

                ]);
                $data = $request->all();
                $user->password = $data['password'];
                $user->save();
                $admin = Auth::User();
                $description = $admin->name . ", updated password for email:" . $user->email . " To " . $data['password'];

                $client_ip = $request->ip();
                SystemAudit::CreateEvent($admin, "Password Reset", $description, "Major Incident", $client_ip, "User Management");
                Session::flash("success_msg", "User Password Updated Successfully");
                return redirect()->back();
            }
            return view('usermanagement::users.password', $data);
        } else {
            return view("forbidden");
        }

    }

    public function ViewPermission($id)
    {
      
        $user = User::find($id);
        if (!$user) {
            return "User Details Not Found";
        }
        $models = $user->getAllPermissions();
        $data['models'] = $models;

        return view('usermanagement::users.permissions', $data);

    }

    public function ViewRoleUser($id)
    {
     
        $user = User::find($id);
        if (!$user) {
            return "User Details Not Found";
        }
        $models = $user->getRoleNames();

        $data['models'] = $models;
        return view('usermanagement::users.roles', $data);

    }

    public function SuspendAccount($id, Request $request)
    {
        try {
            $model = User::find($id);
            $model->user_status = "Blocked";
            $model->save();
            $user = Auth::User();
            $description = $user->name . " Suspended User account for  :" . $model->name;
            $client_ip = $request->ip();
            SystemAudit::CreateEvent($user, "Suspended", $description, "Major Incident", $client_ip, "User Management");
            event(new UserAccountSuspensionEvent($model));
            Session::flash("success_msg", "User Account Suspended Successfully");

        } catch (\Exception $e) {
            Session::flash("danger_msg", "Error Occured while Suspending user account");

        }

    }

    public function RainstateAccount($id, Request $request)
    {
        try {
            $model = User::find($id);
            $model->user_status = "Active";
            $model->save();

            $user = Auth::User();
            $description = $user->name . "Rainstated User account for  :" . $model->name;
            $client_ip = $request->ip();
            SystemAudit::CreateEvent($user, "Restored", $description, "Major Incident", $client_ip, "User Management");
            Session::flash("success_msg", "User Account Restored Successfully");

        } catch (\Exception $e) {
            Session::flash("danger_msg", "Error Occured while Suspending user account");

        }

    }

    public function EditDetails($id, Request $request)
    {

        if (Auth::user()->can("Add Users") || Auth::user()->hasRole("SuperAdmin")) {
            $data['page_title'] = "Edit Users";
            $data['model'] = $user = User::find($id);
            $data['roles'] = Role::whereNotIn('name', array("Entity Admin", "Branch Admin"))->pluck('name', 'name')->toArray();

            $data['url'] = url()->current();
            $data['profile'] = $user->profile;

            if ($request->isMethod("post")) {
                $this->validate($request, [

                    'email' => 'required|email',
                    'name' => 'required|string',
                ]);
                $data = $request->all();

                DB::beginTransaction();
                try {

                    $user->name = $data['name'];
                    $user->email = $data['email'];
                    $user->phone = $data['telephone'];
                    if (isset($data['role_id'])) {
                        $roles = $data['role_id'];
                        $user->syncRoles($roles);
                    }
                    $user->save();
                    $profile = $user->profile;
                    $profile->servicenumber = $data['id_number'];
                    $profile->save();
                    $admin = Auth::User();
                    $description = $admin->name . "Updated User account for Name:" . $user->name . "; Email:" . $user->email . "and assigned the user role:" . $roles;

                    $client_ip = $request->ip();
                    SystemAudit::CreateEvent($admin, "Updated", $description, "Major Incident", $client_ip, "User Management");
                    DB::commit();
                    Session::flash("success_msg", "User Account Updated Successfully");
                    return redirect("/Backend/User/Index");

                } catch (\Exception $e) {

                    Helper::sendEmailToSupport($e);
                    Session::flash("danger_msg", "Error Occured while adding user.System Admin notified");
                    return redirect("/Backend/User/Index");
                }

            }
            return view('usermanagement::users.edit', $data);
        } else {
            return view("forbidden");
        }

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('usermanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
