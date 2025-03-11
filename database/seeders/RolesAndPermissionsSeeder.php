<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for rooms
        Permission::create(['name' => 'view rooms']);
        Permission::create(['name' => 'edit rooms']);
        Permission::create(['name' => 'create rooms']);
        Permission::create(['name' => 'delete rooms']);

        // create permissions for bookings
        Permission::create(['name' => 'view bookings']);
        Permission::create(['name' => 'edit bookings']);
        Permission::create(['name' => 'create bookings']);
        Permission::create(['name' => 'delete bookings']);

        //create permissions for users 
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'delete users']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions
        
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['view rooms', 'create bookings']);

        // or may be done by chaining
        $role = Role::create(['name' => 'staff'])
            ->givePermissionTo(['view rooms', 'edit rooms','view bookings', 'edit bookings', 'create bookings', 'view users']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


        //PLEASE REMOVE
        $superAdminUser = User::where('id',11)->get(); 

        $superAdminUser->assignRole('super-admin');



        // Assign roles to users

        
    }
}
