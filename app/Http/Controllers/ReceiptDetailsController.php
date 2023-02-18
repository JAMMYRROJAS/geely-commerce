<?php

namespace App\Http\Controllers;

use App\Models\ReceiptDetails;
use App\Http\Requests\StoreReceiptDetailsRequest;
use App\Http\Requests\UpdateReceiptDetailsRequest;

class ReceiptDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReceiptDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceiptDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptDetails  $receiptDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptDetails $receiptDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptDetails  $receiptDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiptDetails $receiptDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceiptDetailsRequest  $request
     * @param  \App\Models\ReceiptDetails  $receiptDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceiptDetailsRequest $request, ReceiptDetails $receiptDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptDetails  $receiptDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptDetails $receiptDetails)
    {
        //
    }
}
