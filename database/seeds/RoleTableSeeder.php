<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_superadmin=new Role();
    	$role_superadmin->name='superadmin';
    	$role_superadmin->save();

    	$role_admin = new Role();
    	$role_admin->name='admin';
    	$role_admin->save();

    	$role_imanager = new Role();
    	$role_imanager->name='inventory manger';
    	$role_imanager->save();

    	$role_omanager = new Role();
    	$role_omanager->name='order manager';
    	$role_omanager->save();

    	$role_customer = new Role();
    	$role_customer->name='customer';
    	$role_customer->save();
    }
}
