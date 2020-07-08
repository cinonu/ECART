<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_admin = Role::where('name','superadmin')->first();
    
        $superadmin = new User();
        $superadmin->firstname = "Admin";
        $superadmin->lastname="admin";
        $superadmin->email="admin@gmail.com";
        $superadmin->password= bcrypt("admin123");
        $superadmin->role="superadmin";
        $superadmin->save();
        $superadmin->roles()->attach($roles_admin);
    
    }
}
