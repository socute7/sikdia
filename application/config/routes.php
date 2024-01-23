<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['setting'] = 'Setting/index';
$route['profile'] = 'Profile/index';
$route['mobil'] = 'Mobil/index';
$route['anggota'] = 'Anggota/index';
$route['kategori'] = 'Kategori/index';
$route['keluar'] = 'Keluar/index';
$route['boq'] = 'Boq/index';
$route['login'] = 'Login/index';
$route['peminjaman'] = 'Peminjaman/index';
$route['pengembalian'] = 'Pengembalian/index';
//user
$route['user'] = 'User/index';
//laporan
$route['lapengadaan'] = 'Laporan/pengadaan';
$route['lapeminjaman'] = 'Laporan/peminjaman';

//mobil
$route['mobil/hapus/(:any)'] = 'Mobil/proses_hapus/$1';

//rusak


$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;
