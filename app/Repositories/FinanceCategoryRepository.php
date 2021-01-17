<?php

namespace App\Repositories;

use App\Models\FinanceCategory;
use Illuminate\Support\Collection;

class FinanceCategoryRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return FinanceCategory::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return FinanceCategory
     */
    public function create(array $data)
    {
        return FinanceCategory::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return FinanceCategory
     */
    public function find(int $id)
    {
        return FinanceCategory::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return FinanceCategory
     */
    public function update(array $data, int $id)
    {
        $financeCategory = FinanceCategory::find($id);
        if ($financeCategory) {
            $financeCategory->update($data);
            return $financeCategory;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return FinanceCategory
     */
    public function delete(int $id)
    {
        $financeCategory = FinanceCategory::find($id);
        if ($financeCategory) {
            return $financeCategory->delete();
        }
        return 0;
    }

    public function getByDefault()
    {
        return FinanceCategory::where('is_default', true)->get();
    }

    public function getByUserId(int $userId)
    {
        return FinanceCategory::where('is_default', true)->orWhere('user_id', $userId)->get();
    }
}
