<?php

namespace App\Repositories;

use App\Models\Business;
use Illuminate\Support\Collection;

class BusinessRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return Business::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Business
     */
    public function create(array $data)
    {
        return Business::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return Business
     */
    public function find(int $id)
    {
        return Business::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return Business
     */
    public function update(array $data, int $id)
    {
        $business = Business::find($id);
        if ($business) {
            $business->update($data);
            return $business;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Business
     */
    public function delete(int $id)
    {
        $business = Business::find($id);
        if ($business) {
            return $business->delete();
        }
        return 0;
    }
}
