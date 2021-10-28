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
