<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create_new_customer']);
        Permission::create(['name' => 'post_daily_remitance']);
        Permission::create(['name' => 'approve_customer_creation']);
        Permission::create(['name' => 'approve_customer_loan']);
        Permission::create(['name' => 'post_transactions']);
        Permission::create(['name' => 'view_all_loans']);
        Permission::create(['name' => 'view_all_customers']);
        Permission::create(['name' => 'clear_loans']);
        Permission::create(['name' => 'view_allotted_customer']);
        Permission::create(['name' => 'daily_till_balance']);


        // create roles and assign created permissions
        $role = Role::create(['name' => 'loan_officers']);
        $role->givePermissionTo('view_allotted_customer','approve_customer_creation','daily_till_balance');
        // this can be done as separate statements
        $role = Role::create(['name' => 'teller']);
        $role->givePermissionTo('post_transactions','daily_till_balance');

        // or may be done by chaining
        $role = Role::create(['name' => 'manager'])
            ->givePermissionTo(['approve_customer_creation', 'approve_customer_loan','view_all_customers']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'developer']);
        $role->givePermissionTo(Permission::all());
    }
}
