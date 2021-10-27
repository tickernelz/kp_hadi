<?php

namespace App\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
