<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'calendar list',
            'calendar create',
            'calendar edit',
            'calendar delete',
            'points list',
            'points create',
            'points edit',
            'points delete',
            'stream list',
            'stream create',
            'stream edit',
            'stream delete',
            'email list',
            'email create',
            'email edit',
            'email delete',
            'admin list',
            'admin create',
            'admin edit',
            'admin delete',
            'notification list',
            'notification create',
            'notification edit',
            'notification delete',
            'config list',
            'config create',
            'config edit',
            'config delete',
            'settings list',
            'settings create',
            'settings edit',
            'settings delete',
         ];

         $adminPermissions = [
            'permission list',
            'permission create',
            'permission edit',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'calendar list',
            'calendar create',
            'calendar edit',
            'calendar delete',
            'points list',
            'points create',
            'points edit',
            'points delete',
            'stream list',
            'stream create',
            'stream edit',
            'stream delete',
            'email list',
            'notification list',
            'notification create',
            'notification edit',
            'notification delete',
         ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // create roles and assign existing permissions
        $roleVip = Role::create(['name' => 'vip']);
        $roleVip->givePermissionTo('permission list');
        $roleVip->givePermissionTo('role list');
        $roleVip->givePermissionTo('user list');
        $roleVip->givePermissionTo('calendar list');
        $roleVip->givePermissionTo('calendar create');

        $roleGold = Role::create(['name' => 'gold']);
        $roleGold->givePermissionTo('permission list');
        $roleGold->givePermissionTo('role list');
        $roleGold->givePermissionTo('user list');
        $roleGold->givePermissionTo('calendar list');
        $roleGold->givePermissionTo('calendar create');
        $roleGold->givePermissionTo('notification list');
        $roleGold->givePermissionTo('points list');
        $roleGold->givePermissionTo('stream list');

        $roleMod = Role::create(['name' => 'moderator']);
        $roleMod->givePermissionTo('permission list');
        $roleMod->givePermissionTo('role list');
        $roleMod->givePermissionTo('user list');
        $roleMod->givePermissionTo('calendar list');
        $roleMod->givePermissionTo('calendar create');
        $roleMod->givePermissionTo('calendar edit');
        $roleMod->givePermissionTo('calendar delete');
        $roleMod->givePermissionTo('notification list');
        $roleMod->givePermissionTo('notification create');
        $roleMod->givePermissionTo('notification edit');
        $roleMod->givePermissionTo('points list');
        $roleMod->givePermissionTo('points create');
        $roleMod->givePermissionTo('points edit');
        $roleMod->givePermissionTo('stream list');
        $roleMod->givePermissionTo('stream create');
        $roleMod->givePermissionTo('stream edit');
        $roleMod->givePermissionTo('stream delete');
        $roleMod->givePermissionTo('email list');


        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo('calendar list');
        $roleUser->givePermissionTo('calendar create');

        $roleAdmin = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $roleAdmin->givePermissionTo($adminPermissions);
        }

        $roleSAdmin = Role::create(['name' => 'super-admin']);
        $roleSAdmin->givePermissionTo(Permission::all());
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create Super Admin
        $user = \App\Models\User::factory()->create([
            'name' => 'FetuGamer',
            'email' => 'fetugamer@gmail.com',
        ]);
        $user->assignRole($roleSAdmin);
    }
}