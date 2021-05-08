<?php

namespace App\Http\Controllers;

use App\Models\Gasto_personal;
use Illuminate\Http\Request;

class GastoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('gastospersonal.gastospersonal');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto_personal $gasto_personal)
    {
        //
    }
}
