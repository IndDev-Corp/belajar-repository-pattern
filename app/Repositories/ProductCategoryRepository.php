<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use Illuminate\Support\Collection;

class ProductCategoryRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return ProductCategory::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return ProductCategory
     */
    public function create(array $data)
    {
        return ProductCategory::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return ProductCategory
     */
    public function find(int $id)
    {
        return ProductCategory::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return ProductCategory
     */
    public function update(array $data, int $id)
    {
        $productCategory = ProductCategory::find($id);
        if ($productCategory) {
            $productCategory->update($data);
            return $productCategory;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return ProductCategory
     */
    public function delete(int $id)
    {
        $productCategory = ProductCategory::find($id);
        if ($productCategory) {
            return $productCategory->delete();
        }
        return 0;
    }
}
