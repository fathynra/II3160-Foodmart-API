<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Categories extends ResourceController
{
    protected $format = 'json';

    // GET /categories
    public function index()
    {
        $data = model(ProductModel::class)->getCategories();

        return $this->respond(['message' => 'success', 'total' => count($data), 'data' => $data], 200);
    }
}