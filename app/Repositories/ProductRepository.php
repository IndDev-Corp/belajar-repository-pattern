<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Product
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return Product
     */
    public function find(int $id)
    {
        return Product::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return Product
     */
    public function update(array $data, int $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Product
     */
    public function delete(int $id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        }
        return 0;
    }
}
