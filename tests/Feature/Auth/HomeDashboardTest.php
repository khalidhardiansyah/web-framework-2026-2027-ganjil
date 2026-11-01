<?php

use App\Models\User;

test('unauthenticated users are redirected to login', function () {
    $response = $this->get('/home');

    $response->assertRedirect('/login');
});

test('authenticated users can access home dashboard with responsive layout', function () {
    $user = new User([
        'name' => 'Khalid Tester',
        'email' => 'khalid@example.com',
    ]);
    $user->id = 1;
    $user->setRelation('peran', collect());

    $response = $this->actingAs($user)->get('/home');

    $response->assertOk();
    $response->assertSee('Khalid Tester');
    $response->assertSee('Dashboard');
    $response->assertSee('Menu Utama');
    $response->assertSee('Keluar (Logout)');
});

test('authenticated users can access about page', function () {
    $user = new User([
        'name' => 'Khalid Tester',
        'email' => 'khalid@example.com',
    ]);
    $user->id = 1;
    $user->setRelation('peran', collect());

    $response = $this->actingAs($user)->get('/about');

    $response->assertOk();
    $response->assertSee('Tentang Aplikasi');
});
