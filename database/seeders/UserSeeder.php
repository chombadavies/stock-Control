<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'System Admin',
            'email'=>'admin@huduma.go.ke',
            'username'=>'SuperAdmin',
            'password'=>bcrypt('secret'),
            'phone'=>'254708236804',
            'user_type'=>'Internal',
            'centre_id'=>4,
            'dpt_id'=>8,
            'role_id'=>'SuperAdmin',
            'verification_code'=>"123456905",
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s'),
             'confirmed_at'=>date('Y-m-d H:i:s'),
            ]);

         $user=User::latest('id')->first();
          DB::table('profiles')->insert([
            'user_id' => $user->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
           ]);

         

          $user->givePermissionTo(['Add Users','Delete Users','Block Users',"Edit Users","Reset User Passwords"]);
          $user->assignRole('SuperAdmin');
    }
}
