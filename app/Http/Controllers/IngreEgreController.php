<?php

namespace App\Http\Controllers;

use App\Models\Ingre_Egre;
use App\Models\Detalles;
use App\Models\Categorias;
use Illuminate\Http\Request;

class IngreEgreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
        $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();;       
        return view('ingegr.ingresoegr', $data)->with('id',$id); 

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('ingegr.createIngrEgre')->with('id',$id); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $dataProducts = $request->except('_token','saveitem');
        //$empleados = Empleados::findOrFail($request->emp_nombre);
        $dataProducts['proy_id']=$id;
        $dataProducts['ie_total']=0; 
        Ingre_Egre::insert($dataProducts);        
        $data['empleados']= Ingre_Egre::paginate(15);   

        $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();;       
        return view('ingegr.ingresoegr', $data)->with('id',$id); 
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
    public function update(Request $request,$factura_id,$proy_id)
    {
        $dataProducts = $request->except('_token','saveitem');
        $factura = Ingre_Egre::findOrFail($factura_id);
     // echo json_encode($request);
        $factura->update($request->all());

       
        $data['facturas']=Ingre_Egre::where("proy_id","=",$proy_id)->get();;       
        return view('ingegr.ingresoegr', $data)->with('id',$proy_id); 
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
