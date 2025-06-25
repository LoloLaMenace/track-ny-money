<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    use App\RolePermissionGenerator;

    public function up(): void
    {
        $roleStructure = [
            'admin' => [
                'user' => 'c,v,u,d',
                'acount' => 'c,v,u,d',
                'entry' => 'c,v,u,d',
                'expense' => 'c,v,u,d',
                'levy' => 'c,v,u,d',
                'neccessaryExpense' => 'c,v,u,d',
            ],
            'user' => [
                'user' => 'c,vo,uo,do',
                'acount' => 'c,vo,uo,do',
                'entry' => 'c,vo,uo,do',
                'expense' => 'c,vo,uo,do',
                'levy' => 'c,vo,uo,do',
                'neccessaryExpense' => 'c,vo,uo,do',
            ],
        ];

        $this->generateRolesAndPermissions($roleStructure);
    }

    public function down(): void
    {
        // Optionnel : clean
        $roles = ['admin', 'user'];
        $modules = ['user'];
        $actions = ['create', 'view', 'update', 'delete'];
        $suffixes = ['', '_own'];

        foreach ($actions as $action) {
            foreach ($suffixes as $suffix) {
                foreach ($modules as $module) {
                    $permissionName = $action . $suffix . '_' . $module;
                    Permission::where('name', $permissionName)->delete();
                }
            }
        }

        foreach ($roles as $role) {
            Role::where('name', $role)->delete();
        }
    }
};
