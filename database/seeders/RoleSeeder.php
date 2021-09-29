<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Usermanagement\Entities\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Add Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'View System Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Delete Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Block Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Edit Users',"perm_category"=>"User Management"]);
         Permission::create(['name' => 'Reset User Passwords',"perm_category"=>"User Management"]);

         Permission::create(['name' => 'Add Recruits',"perm_category"=>"Paramilitary Management"]);

         Permission::create(['name' => 'view Recruits',"perm_category"=>"Paramilitary Management"]);

          Permission::create(['name' => 'Edit Recruits',"perm_category"=>"Paramilitary Management"]);

            Permission::create(['name' => 'Deploy Recruits',"perm_category"=>"Paramilitary Management"]);


          





        
     
     



        
      

         Permission::create(['name' => 'View Admin Dashboard',"perm_category"=>"Dashboard Management"]);
      

        // create roles and assign created permissions

        // this can be done as separate statements
        /*$role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');*/


        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(Permission::all());
        $entityadmin = Role::create(['name' => 'Admin']);
        $entityadmin = Role::create(['name' => 'Staff']);
         $packageadmin = Role::create(['name' => 'Student']);
    }
}
