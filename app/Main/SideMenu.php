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
                    'list' => [
                        'icon' => '',
                        'route_name' => 'kelola.user',
                        'params' => [
                        ],
                        'title' => 'Kelola User'
                    ],
                    'tambah' => [
                        'icon' => '',
                        'route_name' => 'kelola.user.tambah',
                        'params' => [
                        ],
                        'title' => 'Tambah User'
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
