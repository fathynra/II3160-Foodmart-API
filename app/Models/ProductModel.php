<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'product_id';
    protected $returnType = 'array';

    public function getProducts(int $limit, int $offset): array
    {
        return $this->baseQuery()->orderBy('product.product_id', 'ASC')->findAll($limit, $offset);
    }

    public function getProduct(int $id): ?array
    {
        return $this->baseQuery()->where('product.product_id', $id)->first();
    }

    public function countProducts(): int
    {
        return $this->db->table('product')->countAll();
    }

    public function getCategories(): array
    {
        $rows = $this->db->table('product_class')
                         ->orderBy('product_class_id', 'ASC')
                         ->get()->getResultArray();

        return array_map(fn ($r) => [
            'product_class_id'    => (int) $r['product_class_id'],
            'product_subcategory' => $r['product_subcategory'],
            'product_category'    => $r['product_category'],
            'product_department'  => $r['product_department'],
            'product_family'      => $r['product_family'],
        ], $rows);
    }

    public function toProduct(array $r): array
    {
        return [
            'product_id'       => (int) $r['product_id'],
            'product_name'     => $r['product_name'],
            'brand_name'       => $r['brand_name'],
            'srp'              => round((float) $r['SRP'], 2),
            'product_class_id' => (int) $r['product_class_id'],
            'category'         => $r['product_category'] ?? null,
            'subcategory'      => $r['product_subcategory'] ?? null,
        ];
    }

    private function baseQuery()
    {
        return $this->select('product.product_id, product.product_name, product.brand_name,
                              product.SRP, product.product_class_id,
                              product_class.product_category, product_class.product_subcategory')
                    ->join('product_class',
                           'product_class.product_class_id = product.product_class_id',
                           'left');
    }
}