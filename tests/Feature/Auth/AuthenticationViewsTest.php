<?php

test('login view renders cleanly with modern layout', function () {
    $response = $this->get('/login');

    $response->assertOk();
    $response->assertSee('Web Framework');
    $response->assertSee('Masuk');
    $response->assertSee('Daftar sekarang');
});

test('register view renders cleanly with modern layout', function () {
    $response = $this->get('/register');

    $response->assertOk();
    $response->assertSee('Web Framework');
    $response->assertSee('Daftar Akun Baru');
    $response->assertSee('Masuk di sini');
});
