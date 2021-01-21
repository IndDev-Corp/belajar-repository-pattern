<?php

namespace App\Repositories;

use App\Models\Finance;
use Illuminate\Support\Collection;

class FinanceRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return Finance::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Finance
     */
    public function create(array $data)
    {
        return Finance::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return Finance
     */
    public function find(int $id)
    {
        return Finance::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return Finance
     */
    public function update(array $data, int $id)
    {
        $finance = Finance::find($id);
        if ($finance) {
            $finance->update($data);
            return $finance;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Finance
     */
    public function delete(int $id)
    {
        $finance = Finance::find($id);
        if ($finance) {
            return $finance->delete();
        }
        return 0;
    }
}
