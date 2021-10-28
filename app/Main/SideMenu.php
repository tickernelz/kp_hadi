<?php

namespace App\Main;

use Illuminate\Http\Request;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param Request $request
     * @return array
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'beranda',
                'params' => [
                ],
                'title' => 'Dashboard'
            ],
            'devider',
            'kelola-user' => [
                'icon' => 'users',
                'title' => 'Kelola User',
                'params' => [
                ],
                'sub_menu' => [
                    'user-list' => [
                        'icon' => '',
                        'route_name' => 'kelola.user',
                        'params' => [
                        ],
                        'title' => 'Daftar User'
                    ],
                    'user-tambah' => [
                        'icon' => '',
                        'route_name' => 'kelola.user.tambah',
                        'params' => [
                        ],
                        'title' => 'Tambah User'
                    ],
                ],
            ],
            'kelola-kelas' => [
                'icon' => 'bell',
                'title' => 'Kelola Kelas',
                'params' => [
                ],
                'sub_menu' => [
                    'kelas-list' => [
                        'icon' => '',
                        'route_name' => 'kelola.kelas',
                        'params' => [
                        ],
                        'title' => 'Daftar Kelas'
                    ],
                    'kelas-tambah' => [
                        'icon' => '',
                        'route_name' => 'kelola.kelas.tambah',
                        'params' => [
                        ],
                        'title' => 'Tambah Kelas'
                    ],
                ],
            ],
            'kelola-tahun_ajaran' => [
                'icon' => 'calendar',
                'title' => 'Kelola Tahun Ajaran',
                'params' => [
                ],
                'sub_menu' => [
                    'tahun_ajaran-list' => [
                        'icon' => '',
                        'route_name' => 'kelola.tahun_ajaran',
                        'params' => [
                        ],
                        'title' => 'Daftar Tahun Ajaran'
                    ],
                    'tahun_ajaran-tambah' => [
                        'icon' => '',
                        'route_name' => 'kelola.tahun_ajaran.tambah',
                        'params' => [
                        ],
                        'title' => 'Tambah Tahun Ajaran'
                    ],
                ],
            ],
            'kelola-siswa' => [
                'icon' => 'smile',
                'title' => 'Kelola Siswa',
                'params' => [
                ],
                'sub_menu' => [
                    'siswa-list' => [
                        'icon' => '',
                        'route_name' => 'kelola.siswa',
                        'params' => [
                        ],
                        'title' => 'Daftar Siswa'
                    ],
                    'siswa-tambah' => [
                        'icon' => '',
                        'route_name' => 'kelola.siswa.tambah',
                        'params' => [
                        ],
                        'title' => 'Tambah Siswa'
                    ],
                ],
            ],
//            'crud' => [
//                'icon' => 'edit',
//                'title' => 'Crud',
//                'sub_menu' => [
//                    'crud-data-list' => [
//                        'icon' => '',
//                        'route_name' => 'crud-data-list',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Data List'
//                    ],
//                    'crud-form' => [
//                        'icon' => '',
//                        'route_name' => 'crud-form',
//                        'params' => [
//                            'layout' => 'side-menu'
//                        ],
//                        'title' => 'Form'
//                    ]
//                ]
//            ],
        ];
    }
}
