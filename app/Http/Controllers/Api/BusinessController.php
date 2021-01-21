<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessRequest;
use App\Repositories\BusinessRepository;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    private $businessRepository;

    public function __construct()
    {
        $this->businessRepository = new BusinessRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->businessRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BusinessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessRequest $request)
    {
        $data = $request->only([
            'name',
            'year_started',
            'user_id',
        ]);
        $result = $this->businessRepository->create($data);
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
        return $this->businessRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BusinessRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessRequest $request, $id)
    {
        if (is_numeric($id)) {
            $data = $request->only([
                'name',
                'year_started',
                'user_id',
            ]);
            return $this->businessRepository->update($data, $id);
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
        return $this->businessRepository->delete($id);
    }
}
