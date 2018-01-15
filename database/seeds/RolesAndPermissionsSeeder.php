<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher',
            'display_name' => 'Maestro'
        ]);

        $studentRole = Role::create([
            'name' => 'student',
            'display_name' => 'Estudiante'
        ]);

        // // --------------- Permissions ------------------
        // $manageSuperAdministrators = Permission::create([
        //     'name' => 'manage-super-admins',
        //     'display_name' => 'Manejar super administradores'
        // ]);

        // $manageClientAdmins = Permission::create([
        //     'name' => 'manage-client-admins',
        //     'display_name' => 'Manejar clientes administradores'
        // ]);

        // $manageGuests = Permission::create([
        //     'name' => 'manage-guests',
        //     'display_name' => 'Manejar huéspedes'
        // ]);

        // $manageCashiers = Permission::create([
        //     'name' => 'manage-cashiers',
        //     'display_name' => 'Manejar cajeros'
        // ]);

        // $manageKitchenUsers = Permission::create([
        //     'name' => 'manage-kitchen-users',
        //     'display_name' => 'Manejar usuarios de cocina'
        // ]);

        // $manageManagers = Permission::create([
        //     'name' => 'manage-managers',
        //     'display_name' => 'Manejar managers'
        // ]);

        // $manageHotels = Permission::create([
        //     'name' => 'manage-hotels',
        //     'display_name' => 'Manejar hoteles'
        // ]);

        // $manageMenus = Permission::create([
        //     'name' => 'manage-menus',
        //     'display_name' => 'Manejar menús'
        // ]);

        // $manageCategories = Permission::create([
        //     'name' => 'manage-categories',
        //     'display_name' => 'Manejar categorías'
        // ]);

        // $manageOrders = Permission::create([
        //     'name' => 'manage-orders',
        //     'display_name' => 'Manejar órdenes'
        // ]);

        // $manageProducts = Permission::create([
        //     'name' => 'manage-products',
        //     'display_name' => 'Manejar productos'
        // ]);

        // $manageSides = Permission::create([
        //     'name' => 'manage-sides',
        //     'display_name' => 'Manejar guarniciones'
        // ]);

        // $manageOrganizations = Permission::create([
        //     'name' => 'manage-organizations',
        //     'display_name' => 'Manejar organizaciones'
        // ]);

        // $requestOrders = Permission::create([
        //     'name' => 'request-orders',
        //     'display_name' => 'Ordenar pedidos'
        // ]);

        // $controlOrders = Permission::create([
        //     'name' => 'control-orders',
        //     'display_name' => 'Controlar órdenes'
        // ]);

        // $adminRole->attachPermissions([$manageSuperAdministrators, $manageClientAdmins, $manageGuests, $manageHotels, $manageKitchenUsers, $manageCashiers, $manageMenus, $manageOrders, $manageProducts, $manageOrganizations, $manageManagers]);
        // $teacherRole->attachPermissions([$manageGuests, $manageHotels, $manageKitchenUsers, $manageCashiers, $manageMenus, $manageOrders, $manageProducts, $manageSides, $manageManagers]);
        // $studentRole->attachPermissions([$manageHotels, $manageGuests, $manageKitchenUsers, $manageCashiers, $manageMenus, $manageOrders, $manageProducts, $manageSides, $manageManagers]);
    }
}