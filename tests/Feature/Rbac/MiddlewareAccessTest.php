<?php

use App\Models\HakAkses;
use App\Models\Peran;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

beforeEach(function (): void {
    // Daftarkan route testing dengan middleware RBAC
    Route::middleware(['web', 'role:admin'])->get('/_test/admin-only', fn () => 'admin-ok');
    Route::middleware(['web', 'role:admin,manager'])->get('/_test/manager-or-admin', fn () => 'manager-or-admin-ok');
    Route::middleware(['web', 'permission:kelola-pengguna'])->get('/_test/permission-protected', fn () => 'permission-ok');
});

test('unauthenticated visitors are redirected to login when accessing role protected routes', function () {
    $response = $this->get('/_test/admin-only');

    $response->assertRedirect(route('login'));
});

test('user without required role receives 403 forbidden', function () {
    $user = new User(['name' => 'Biasa', 'email' => 'biasa@example.com']);
    $user->id = 10;
    $roleUser = new Peran(['nama' => 'User', 'slug' => 'user']);
    $roleUser->id = 1;
    $user->setRelation('peran', collect([$roleUser]));

    $response = $this->actingAs($user)->get('/_test/admin-only');

    $response->assertForbidden();
});

test('admin can access admin-only route with status 200', function () {
    $admin = new User(['name' => 'Admin Utama', 'email' => 'admin@example.com']);
    $admin->id = 1;
    $roleAdmin = new Peran(['nama' => 'Administrator', 'slug' => 'admin']);
    $roleAdmin->id = 2;
    $admin->setRelation('peran', collect([$roleAdmin]));

    $response = $this->actingAs($admin)->get('/_test/admin-only');

    $response->assertOk();
    $response->assertSee('admin-ok');
});

test('multi-role parameter allows user having any matching role', function () {
    $manager = new User(['name' => 'Manager Toko', 'email' => 'manager@example.com']);
    $manager->id = 2;
    $roleManager = new Peran(['nama' => 'Manager', 'slug' => 'manager']);
    $roleManager->id = 3;
    $manager->setRelation('peran', collect([$roleManager]));

    $response = $this->actingAs($manager)->get('/_test/manager-or-admin');

    $response->assertOk();
    $response->assertSee('manager-or-admin-ok');
});

test('permission middleware blocks unauthorized user and permits authorized user', function () {
    $user = new User(['name' => 'Staff', 'email' => 'staff@example.com']);
    $user->id = 3;

    $roleStaff = new Peran(['nama' => 'Staff', 'slug' => 'staff']);
    $roleStaff->id = 4;
    $roleStaff->setRelation('hakAkses', collect([]));
    $user->setRelation('peran', collect([$roleStaff]));

    // 1. Ditolak karena belum punya hak akses 'kelola-pengguna'
    $this->actingAs($user)->get('/_test/permission-protected')->assertForbidden();

    // 2. Diberikan hak akses 'kelola-pengguna'
    $permission = new HakAkses(['nama' => 'Kelola Pengguna', 'slug' => 'kelola-pengguna']);
    $permission->id = 99;
    $roleStaff->setRelation('hakAkses', collect([$permission]));

    // 3. Sekarang diizinkan (200 OK)
    $this->actingAs($user)->get('/_test/permission-protected')->assertOk()->assertSee('permission-ok');
});

test('authorization gates evaluate user roles accurately', function () {
    $admin = new User(['name' => 'Admin', 'email' => 'admin@example.com']);
    $admin->id = 1;
    $adminRole = new Peran(['nama' => 'Administrator', 'slug' => 'admin']);
    $adminRole->setRelation('hakAkses', collect([]));
    $admin->setRelation('peran', collect([$adminRole]));

    $user = new User(['name' => 'User', 'email' => 'user@example.com']);
    $user->id = 2;
    $userRole = new Peran(['nama' => 'User', 'slug' => 'user']);
    $userRole->setRelation('hakAkses', collect([]));
    $user->setRelation('peran', collect([$userRole]));

    expect(Gate::forUser($admin)->allows('akses-admin'))->toBeTrue()
        ->and(Gate::forUser($user)->allows('akses-admin'))->toBeFalse()
        ->and(Gate::forUser($admin)->allows('akses-manager'))->toBeTrue()
        ->and(Gate::forUser($user)->allows('akses-user'))->toBeTrue();
});
