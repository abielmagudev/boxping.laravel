<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = (object) $this->roles();
        $permissions = $this->permissions();

        // Admin
        $roles->admin->syncPermissions(
            $permissions
        );

        // Cliente
        $roles->cliente->givePermissionTo([
            $permissions['entradas'],
            $permissions['salidas'],
        ]);

        // Documentador
        $roles->documentador->givePermissionTo([
            $permissions['comentarios'],
            $permissions['consolidados'],
            $permissions['destinatarios'],
            $permissions['entradas'],
            $permissions['remitentes'],
            $permissions['salidas'],
        ]);

        // Supervisor
        $roles->supervisor->givePermissionTo([
            $permissions['escritorio'],
            $permissions['alertas'],
            $permissions['comentarios'],
            $permissions['conductores'],
            $permissions['consolidados'],
            $permissions['destinatarios'],
            $permissions['entradas'],
            $permissions['impresiones'],
            $permissions['incidentes'],
            $permissions['remitentes'],
            $permissions['salidas'],
            $permissions['transportadoras'],
            $permissions['vehiculos'],
        ]);
    }

    public function roles()
    {
        return [
            'admin' => Role::create(['name' => 'admin']),
            'cliente' => Role::create(['name' => 'cliente']),
            'documentador' => Role::create(['name' => 'documentador']),
            'supervisor' => Role::create(['name' => 'supervisor']),
        ];
    }

    public function permissions()
    {
        return [
            'alertas' => Permission::create(['name' => 'alertas']),
            'codigosr' => Permission::create(['name' => 'codigosr']),
            'comentarios' => Permission::create(['name' => 'comentarios']),
            'conductores' => Permission::create(['name' => 'conductores']),
            'configuraciones' => Permission::create(['name' => 'configuraciones']),
            'consolidados' => Permission::create(['name' => 'consolidados']),
            'destinatarios' => Permission::create(['name' => 'destinatarios']),
            'entradas' => Permission::create(['name' => 'entradas']),
            'escritorio' => Permission::create(['name' => 'escritorio']),
            'etapas' => Permission::create(['name' => 'etapas']),
            'impresiones' => Permission::create(['name' => 'impresiones']),
            'incidentes' => Permission::create(['name' => 'incidentes']),
            'reempacadores' => Permission::create(['name' => 'reempacadores']),
            'remitentes' => Permission::create(['name' => 'remitentes']),
            'salidas' => Permission::create(['name' => 'salidas']),
            'transportadoras' => Permission::create(['name' => 'transportadoras']),
            'users' => Permission::create(['name' => 'users']),
            'vehiculos' => Permission::create(['name' => 'vehiculos']),
            'zonas' => Permission::create(['name' => 'zonas']),
        ];
    }
}
