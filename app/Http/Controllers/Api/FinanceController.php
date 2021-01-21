<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinanceRequest;
use App\Repositories\FinanceRepository;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    private $financeRepository;

    public function __construct()
    {
        $this->financeRepository = new FinanceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->financeRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FinanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceRequest $request)
    {
        $data = $request->only([
            'nominal',
            'note',
            'finance_category_id',
            'user_id'
        ]);
        $result = $this->financeRepository->create($data);
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
        return $this->financeRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FinanceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinanceRequest $request, $id)
    {
        if (is_numeric($id)) {
            $data = $request->only([
                'name',
                'is_income',
                'is_default',
                'user_id',
            ]);
            return $this->financeRepository->update($data, $id);
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
        return $this->financeRepository->delete($id);
    }
}
