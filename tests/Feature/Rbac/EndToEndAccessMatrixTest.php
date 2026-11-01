<?php

use App\Models\HakAkses;
use App\Models\Peran;
use App\Models\User;

function createTestUserWithRole(string $roleSlug, string $roleName): User
{
    $user = new User([
        'name' => "User {$roleName}",
        'email' => "{$roleSlug}@test.com",
    ]);
    $user->id = random_int(100, 999);

    $role = new Peran([
        'nama' => $roleName,
        'slug' => $roleSlug,
    ]);
    $role->id = random_int(10, 99);

    // Setup default permissions for each role
    $permissions = collect();
    if ($roleSlug === 'admin') {
        $permissions->push(new HakAkses(['nama' => 'Akses Admin', 'slug' => 'akses-admin']));
        $permissions->push(new HakAkses(['nama' => 'Akses Manager', 'slug' => 'akses-manager']));
        $permissions->push(new HakAkses(['nama' => 'Akses User', 'slug' => 'akses-user']));
    } elseif ($roleSlug === 'manager') {
        $permissions->push(new HakAkses(['nama' => 'Akses Manager', 'slug' => 'akses-manager']));
        $permissions->push(new HakAkses(['nama' => 'Akses User', 'slug' => 'akses-user']));
    } else {
        $permissions->push(new HakAkses(['nama' => 'Akses User', 'slug' => 'akses-user']));
    }

    $role->setRelation('hakAkses', $permissions);
    $user->setRelation('peran', collect([$role]));

    return $user;
}

test('guest cannot access any protected routes and is redirected to login', function () {
    $this->get('/home')->assertRedirect(route('login'));
    $this->get('/admin/dashboard')->assertRedirect(route('login'));
    $this->get('/manager/dashboard')->assertRedirect(route('login'));
});

test('regular user can access home and about but is forbidden from admin and manager dashboards', function () {
    $user = createTestUserWithRole('user', 'Mahasiswa');

    // 1. Allowed routes
    $homeResponse = $this->actingAs($user)->get('/home');
    $homeResponse->assertOk();
    $homeResponse->assertSee('Mahasiswa');
    $homeResponse->assertDontSee('Panel Admin');
    $homeResponse->assertDontSee('Panel Manager');

    $aboutResponse = $this->actingAs($user)->get('/about');
    $aboutResponse->assertOk();

    // 2. Forbidden routes
    $this->actingAs($user)->get('/admin/dashboard')->assertForbidden();
    $this->actingAs($user)->get('/manager/dashboard')->assertForbidden();
});

test('manager can access manager dashboard and home but is forbidden from admin dashboard', function () {
    $manager = createTestUserWithRole('manager', 'Manager');

    // 1. Allowed routes
    $homeResponse = $this->actingAs($manager)->get('/home');
    $homeResponse->assertOk();
    $homeResponse->assertSee('Panel Manager');
    $homeResponse->assertDontSee('Panel Admin');

    $managerResponse = $this->actingAs($manager)->get('/manager/dashboard');
    $managerResponse->assertOk();
    $managerResponse->assertSee('Panel Kendali Manajerial');

    // 2. Forbidden route
    $this->actingAs($manager)->get('/admin/dashboard')->assertForbidden();
});

test('admin can access all dashboards and sees all menu items in sidebar', function () {
    $admin = createTestUserWithRole('admin', 'Administrator');

    // 1. Home
    $homeResponse = $this->actingAs($admin)->get('/home');
    $homeResponse->assertOk();
    $homeResponse->assertSee('Panel Admin');
    $homeResponse->assertSee('Panel Manager');
    $homeResponse->assertSee('Administrator');

    // 2. Admin dashboard
    $adminResponse = $this->actingAs($admin)->get('/admin/dashboard');
    $adminResponse->assertOk();
    $adminResponse->assertSee('Panel Administrasi Sistem');

    // 3. Manager dashboard
    $managerResponse = $this->actingAs($admin)->get('/manager/dashboard');
    $managerResponse->assertOk();
    $managerResponse->assertSee('Panel Kendali Manajerial');
});
