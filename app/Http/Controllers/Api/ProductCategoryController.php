<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryRepository;

    public function __construct()
    {
        $this->productCategoryRepository = new ProductCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->productCategoryRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->only([
            'name',
            'icon',
            'business_id',
        ]);
        $result = $this->productCategoryRepository->create($data);
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
        return $this->productCategoryRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        if (is_numeric($id)) {
            $data = $request->only([
                'name',
                'icon',
                'business_id',
            ]);
            return $this->productCategoryRepository->update($data, $id);
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
        return $this->productCategoryRepository->delete($id);
    }
}
