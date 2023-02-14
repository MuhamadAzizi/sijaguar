<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('index'));
});

// Penggunaan
Breadcrumbs::for('penggunaan.index', function (BreadcrumbTrail $trail) {
    $trail->push('Penggunaan', route('penggunaan.index'));
});

// Penggunaan > Tambah Penggunaan
Breadcrumbs::for('penggunaan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('penggunaan.index');
    $trail->push('Tambah Penggunaan', route('penggunaan.create'));
});

// Penggunaan > Edit Penggunaan
Breadcrumbs::for('penggunaan.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('penggunaan.index');
    $trail->push('Edit Penggunaan', route('penggunaan.edit', 1));
});

// Ruangan
Breadcrumbs::for('ruangan.index', function (BreadcrumbTrail $trail) {
    $trail->push('Ruangan', route('ruangan.index'));
});

// Ruangan > Tambah Ruangan
Breadcrumbs::for('ruangan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('ruangan.index');
    $trail->push('Tambah Ruangan', route('ruangan.create'));
});

// Ruangan > Edit Ruangan
Breadcrumbs::for('ruangan.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('ruangan.index');
    $trail->push('Edit Ruangan', route('ruangan.edit', 1));
});

// Ruangan > Tambah Jenis Ruangan
Breadcrumbs::for('jenis-ruangan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('ruangan.index');
    $trail->push('Tambah Jenis Ruangan', route('jenis-ruangan.create'));
});

// Ruangan > Edit Jenis Ruangan
Breadcrumbs::for('jenis-ruangan.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('ruangan.index');
    $trail->push('Edit Jenis Ruangan', route('jenis-ruangan.edit', 1));
});

// Mata Kuliah
Breadcrumbs::for('mata-kuliah.index', function (BreadcrumbTrail $trail) {
    $trail->push('Mata Kuliah', route('mata-kuliah.index'));
});

// Mata Kuliah > Tambah Mata Kuliah
Breadcrumbs::for('mata-kuliah.create', function (BreadcrumbTrail $trail) {
    $trail->parent('mata-kuliah.index');
    $trail->push('Tambah Mata Kuliah', route('mata-kuliah.create'));
});

// Mata Kuliah > Edit Mata Kuliah
Breadcrumbs::for('mata-kuliah.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('mata-kuliah.index');
    $trail->push('Edit Mata Kuliah', route('mata-kuliah.edit', 1));
});

// Jadwal
Breadcrumbs::for('jadwal.index', function (BreadcrumbTrail $trail) {
    $trail->push('Jadwal', route('jadwal.index'));
});

// Jadwal > Tambah Jadwal
Breadcrumbs::for('jadwal.create', function (BreadcrumbTrail $trail) {
    $trail->parent('jadwal.index');
    $trail->push('Tambah Jadwal', route('jadwal.create'));
});

// Jadwal > Edit Jadwal
Breadcrumbs::for('jadwal.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('jadwal.index');
    $trail->push('Edit Jadwal', route('jadwal.edit', 1));
});

// Verfifikasi Jadwal
Breadcrumbs::for('verifikasi-jadwal.index', function (BreadcrumbTrail $trail) {
    $trail->push('Verifikasi Jadwal', route('verifikasi-jadwal.index'));
});

// Verfifikasi Jadwal > View Mode
Breadcrumbs::for('verifikasi-jadwal.view-mode', function (BreadcrumbTrail $trail) {
    $trail->parent('verifikasi-jadwal.index');
    $trail->push('View Mode', route('verifikasi-jadwal.view-mode'));
});

// Dosen
Breadcrumbs::for('dosen.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dosen', route('dosen.index'));
});

// Dosen > Tambah Dosen
Breadcrumbs::for('dosen.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dosen.index');
    $trail->push('Tambah Dosen', route('dosen.create'));
});

// Dosen > Edit Dosen
Breadcrumbs::for('dosen.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('dosen.index');
    $trail->push('Edit Dosen', route('dosen.edit', 1));
});

// User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->push('User', route('user.index'));
});

// User > Tambah User
Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Tambah User', route('user.create'));
});

// User > View User
Breadcrumbs::for('user.show', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Detail User', route('user.show', 1));
});

// User > Edit User
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Edit User', route('user.edit', 1));
});

// Profil
Breadcrumbs::for('profil.index', function (BreadcrumbTrail $trail) {
    $trail->push('Profil', route('profil.index'));
});

// Profil > Edit Profil
Breadcrumbs::for('profil.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('profil.index');
    $trail->push('Edit Profil', route('profil.edit', 1));
});
