<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CustomerRepository
{

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return Customer::all();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Customer
     */
    public function create(array $data)
    {
        return Customer::create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return Customer
     */
    public function find(int $id)
    {
        return Customer::find($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return Customer
     */
    public function update(array $data, int $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->update($data);
            return $customer;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Customer
     */
    public function delete(int $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            return $customer->delete();
        }
        return 0;
    }
}
