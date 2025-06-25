<?php

namespace App;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait RolePermissionGenerator
{
    public function generateRolesAndPermissions(array $roleStructure): void
    {
        foreach ($roleStructure as $roleName => $modules) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            foreach ($modules as $module => $permissions) {
                $actions = explode(',', $permissions);

                foreach ($actions as $action) {
                    $isOwn = str_ends_with($action, 'o');
                    $actionCode = $isOwn ? substr($action, 0, -1) : $action;

                    $actionName = match ($actionCode) {
                        'c' => 'create',
                        'v' => 'view',
                        'u' => 'update',
                        'd' => 'delete',
                        default => null,
                    };

                    if (!$actionName) continue;

                    $permissionName = $actionName . ($isOwn ? '_own_' : '_') . $module;

                    $permission = Permission::firstOrCreate(['name' => $permissionName]);

                    if (!$role->hasPermissionTo($permission)) {
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    }
}
