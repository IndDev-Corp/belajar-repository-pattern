<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinanceCategoryRequest;
use App\Repositories\FinanceCategoryRepository;

class FinanceCategoryController extends Controller
{

    private $financeCategoryRepository;

    public function __construct()
    {
        $this->financeCategoryRepository = new FinanceCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->financeCategoryRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FinanceCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceCategoryRequest $request)
    {
        $data = $request->only([
            'name',
            'is_income',
            'is_default',
            'user_id',
        ]);
        $result = $this->financeCategoryRepository->create($data);
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
        return $this->financeCategoryRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FinanceCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinanceCategoryRequest $request, $id)
    {
        if (is_numeric($id)) {
            $data = $request->only([
                'name',
                'is_income',
                'is_default',
                'user_id',
            ]);
            return $this->financeCategoryRepository->update($data, $id);
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
        return $this->financeCategoryRepository->delete($id);
    }

    public function getByDefault()
    {
        return $this->financeCategoryRepository->getByDefault();
    }

    public function getByUserId($userId)
    {
        if (!is_numeric($userId))
            return response()->json(['message' => 'user id must number'], 422);
        return $this->financeCategoryRepository->getByUserId($userId);
    }
}
