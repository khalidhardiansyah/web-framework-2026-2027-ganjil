<?php

use App\Models\HakAkses;
use App\Models\Peran;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

test('user hasRole returns true when user has matching role slug or name', function () {
    $user = new User([
        'name' => 'Budi Santoso',
        'email' => 'budi@example.com',
    ]);
    $user->id = 1;

    $adminRole = new Peran([
        'nama' => 'Administrator',
        'slug' => 'admin',
    ]);
    $adminRole->id = 1;

    // Simulate preloaded relationship collection
    $user->setRelation('peran', collect([$adminRole]));

    expect($user->hasRole('admin'))->toBeTrue()
        ->and($user->hasRole('Administrator'))->toBeTrue()
        ->and($user->hasRole('manager'))->toBeFalse()
        ->and($user->hasRole(['manager', 'admin']))->toBeTrue();
});

test('user hasPermission returns true when one of user roles has the permission', function () {
    $user = new User([
        'name' => 'Siti Manager',
        'email' => 'siti@example.com',
    ]);
    $user->id = 2;

    $managerRole = new Peran([
        'nama' => 'Manager',
        'slug' => 'manager',
    ]);
    $managerRole->id = 2;

    $permission = new HakAkses([
        'nama' => 'Akses Menu Manager',
        'slug' => 'akses-manager',
    ]);
    $permission->id = 10;

    $managerRole->setRelation('hakAkses', collect([$permission]));
    $user->setRelation('peran', collect([$managerRole]));

    expect($user->hasPermission('akses-manager'))->toBeTrue()
        ->and($user->hasPermission('akses-admin'))->toBeFalse();
});

test('peran hasPermission checks assigned permissions accurately', function () {
    $role = new Peran([
        'nama' => 'Staff',
        'slug' => 'staff',
    ]);
    $role->id = 3;

    $perm1 = new HakAkses(['nama' => 'Lihat Laporan', 'slug' => 'lihat-laporan']);
    $perm2 = new HakAkses(['nama' => 'Unduh Laporan', 'slug' => 'unduh-laporan']);

    $role->setRelation('hakAkses', collect([$perm1, $perm2]));

    expect($role->memilikiHakAkses('lihat-laporan'))->toBeTrue()
        ->and($role->hasPermission('unduh-laporan'))->toBeTrue()
        ->and($role->hasPermission('hapus-laporan'))->toBeFalse();
});

test('role and permission model aliases point to peran and hakAkses models', function () {
    $roleAlias = new Role(['nama' => 'Admin', 'slug' => 'admin']);
    $permissionAlias = new Permission(['nama' => 'Edit', 'slug' => 'edit']);

    expect($roleAlias)->toBeInstanceOf(Peran::class)
        ->and($permissionAlias)->toBeInstanceOf(HakAkses::class);
});
