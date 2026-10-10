<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{
    protected $format = 'json';

    // GET /products             -> semua data
    public function index()
    {
        $model = model(ProductModel::class);
        $total = $model->countProducts();

        $limitParam = $this->request->getGet('limit');

        if ($limitParam === null || $limitParam === '') {
            // tanpa limit: tampilkan semua
            $page   = 1;
            $limit  = $total;
            $offset = 0;
            $rows   = $model->getProducts(0, 0);
        } else {
            $page   = max(1, (int) ($this->request->getGet('page') ?? 1));
            $limit  = max(1, (int) $limitParam);
            $offset = ($page - 1) * $limit;
            $rows   = $model->getProducts($limit, $offset);
        }

        return $this->respond([
            'message' => 'success',
            'page'    => $page,
            'limit'   => $limit,
            'total'   => $total,
            'data'    => array_map([$model, 'toProduct'], $rows),
        ], 200);
    }

    // GET /products/{id}
    public function show($id = null)
    {
        $model = model(ProductModel::class);
        $row   = $model->getProduct((int) $id);

        if (! $row) {
            return $this->respond(['message' => 'Product not found'], 404);
        }

        return $this->respond(['message' => 'success', 'data' => $model->toProduct($row)], 200);
    }
}