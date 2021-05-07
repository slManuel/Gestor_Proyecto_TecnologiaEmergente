<?php

namespace App\Http\Controllers;

use App\Models\Ingre_Egre;
use Illuminate\Http\Request;

class IngreEgreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingegr.ingresoegr');
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
     * @param  \App\Models\Ingre_Egre  $ingre_Egre
     * @return \Illuminate\Http\Response
     */
    public function show(Ingre_Egre $ingre_Egre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingre_Egre  $ingre_Egre
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingre_Egre $ingre_Egre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingre_Egre  $ingre_Egre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingre_Egre $ingre_Egre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingre_Egre  $ingre_Egre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingre_Egre $ingre_Egre)
    {
        //
    }
}
