<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customerRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->only([
            'name',
            'phone_number',
            'address',
            'business_id',
        ]);
        $result = $this->customerRepository->create($data);
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!is_numeric($id))
            return response()->json(['message' => 'id must number'], 422);
        return $this->customerRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        if (is_numeric($id)) {
            $data = $request->only([
                'name',
                'phone_number',
                'address',
                'business_id',
            ]);
            return $this->customerRepository->update($data, $id);
        }
        return response()->json(['message' => 'id must number'], 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!is_numeric($id))
            return response()->json(['message' => 'id must number'], 422);
        return $this->customerRepository->delete($id);
    }
}
