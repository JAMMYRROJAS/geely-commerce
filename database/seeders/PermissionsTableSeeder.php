<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'Administrador']);
        $seller = Role::create(['name' => 'Vendedor']);
    
        //Permisos para mantenimiento de usuarios
        Permission::create(['name'=>'users.index', 
                            'description'=>'Ver listado de usuarios del sistema'])->syncRoles([$admin]);
        Permission::create(['name'=>'users.create', 
                            'description'=>'Crear usuarios'])->syncRoles([$admin]);
        Permission::create(['name'=>'users.show', 
                            'description'=>'Ver detalle de usuarios'])->syncRoles([$admin]);
        Permission::create(['name'=>'users.edit', 
                            'description'=>'Editar usuarios'])->syncRoles([$admin]);
        Permission::create(['name'=>'users.destroy', 
                            'description'=>'Eliminar usuarios'])->syncRoles([$admin]);

        //Permisos para el dashboard
        Permission::create(['name'=>'home',
                            'description'=>'Navegar por el dashboard'])->syncRoles([$admin]);

        //Permisos para mantenimiento de categorías
        Permission::create(['name'=>'categories.index',
                            'description'=>'Ver listado de categorías'])->syncRoles([$admin]);
        Permission::create(['name'=>'categories.create',
                            'description'=>'Crear categorías'])->syncRoles([$admin]);
        Permission::create(['name'=>'categories.show',
                            'description'=>'Ver detalle de categoría'])->syncRoles([$admin]);
        Permission::create(['name'=>'categories.edit',
                            'description'=>'Editar categorías'])->syncRoles([$admin]);
        Permission::create(['name'=>'categories.destroy',
                            'description'=>'Eliminar categorías'])->syncRoles([$admin]);

        //Permisos para mantenimiento de productos
        Permission::create(['name'=>'products.index',
                            'description'=>'Ver listado de productos'])->syncRoles([$admin]);
        Permission::create(['name'=>'products.create',
                            'description'=>'Crear productos'])->syncRoles([$admin]);
        Permission::create(['name'=>'products.show',
                            'description'=>'Ver detalle de productos'])->syncRoles([$admin]);
        Permission::create(['name'=>'products.edit',
                            'description'=>'Editar productos'])->syncRoles([$admin]);
        Permission::create(['name'=>'products.destroy',
                            'description'=>'Eliminar productos'])->syncRoles([$admin]);
        
        //Permisos para cambiar el estado de los productos
        Permission::create(['name'=>'change.status.products',
        'description'=>'Cambiar estado de productos'])->syncRoles([$admin]);
        
        //Permisos para mantenimiento de clientes
        Permission::create(['name'=>'customers.index',
                            'description'=>'Ver listado de clientes'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'customers.create',
                            'description'=>'Crear clientes'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'customers.show',
                            'description'=>'Ver detalle de clientes'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'customers.edit',
                            'description'=>'Editar clientes'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'customers.destroy',
                            'description'=>'Eliminar clientes'])->syncRoles([$admin, $seller]);

        //Permisos para mantenimiento de proveedores
        Permission::create(['name'=>'suppliers.index',
                            'description'=>'Ver listado de proveedores'])->syncRoles([$admin]);
        Permission::create(['name'=>'suppliers.create',
                            'description'=>'Crear proveedores'])->syncRoles([$admin]);
        Permission::create(['name'=>'suppliers.show',
                            'description'=>'Ver detalle de proveedores'])->syncRoles([$admin]);
        Permission::create(['name'=>'suppliers.edit',
                            'description'=>'Editar proveedores'])->syncRoles([$admin]);
        Permission::create(['name'=>'suppliers.destroy',
                            'description'=>'Eliminar proveedores'])->syncRoles([$admin]);

        //Permisos para mantenimiento de roles
        Permission::create(['name'=>'roles.index',
                            'description'=>'Ver listado de roles'])->syncRoles([$admin]);
        Permission::create(['name'=>'roles.show',
                            'description'=>'Ver detalle de roles'])->syncRoles([$admin]);
        Permission::create(['name'=>'roles.edit',
                            'description'=>'Editar roles'])->syncRoles([$admin]);
        
        //Permisos para mantenimiento de ventas
        Permission::create(['name'=>'sales.index',
                            'description'=>'Ver listado de ventas'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'sales.create',
                            'description'=>'Realizar ventas'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'sales.show',
                            'description'=>'Ver detalle de ventas'])->syncRoles([$admin, $seller]);

        //Permisos para mantenimiento de compras
        Permission::create(['name'=>'receipts.index',
                            'description'=>'Ver listado de compras'])->syncRoles([$admin]);
        Permission::create(['name'=>'receipts.create',
                            'description'=>'Realizar compras'])->syncRoles([$admin]);
        Permission::create(['name'=>'receipts.show',
                            'description'=>'Ver detalles de compras'])->syncRoles([$admin]);

        //Permisos para mantenimiento del negocio
        Permission::create(['name'=>'commerce.index',
                            'description'=>'Ver los datos del negocio'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'commerce.update',
                            'description'=>'Actualizar datos del negocio'])->syncRoles([$admin]);
    
        //Permisos para los reportes
        Permission::create(['name'=>'reports.day',
                            'description'=>'Reportes por día'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'reports.date',
                            'description'=>'Reportes por fecha'])->syncRoles([$admin, $seller]);
        Permission::create(['name'=>'report.results',
                            'description'=>'Resultados de reportes'])->syncRoles([$admin, $seller]);
        
        //Permisos para descargar las boletas de ventas y compras
        Permission::create(['name'=>'receipts.pdf',
                            'description'=>'Descargar boletas de compras'])->syncRoles([$admin]);
        Permission::create(['name'=>'sales.pdf',
                            'description'=>'Descargar boletas de ventas'])->syncRoles([$admin, $seller]);

        $admin_user = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);

        $admin_user->assignRole('Administrador');

        $seller_user = User::create([
            'name'=>'Seller',
            'email'=>'seller@gmail.com',
            'password'=>'$2y$10$o.CnHSqHSCQ7qSj4zlJU7u0N1QiKqrIjJ2bLP8j/wdw3W8NCA3DkK',
        ]);
        
        $seller_user->assignRole('Vendedor');
    }
}
