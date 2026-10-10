<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['services'] = [
            [
                'name'      => 'Product Service',
                'endpoints' => [
                    'products'   => '/products',
                    'categories' => '/categories',
                ],
            ],
            // service lainnya: tambah blok baru di sini
        ];

        return view('header') . view('home', $data) . view('footer');
    }
}