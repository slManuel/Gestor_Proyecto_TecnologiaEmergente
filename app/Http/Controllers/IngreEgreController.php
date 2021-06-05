<?php

namespace App\Http\Controllers;

use App\Models\Ingre_Egre;
use App\Models\Detalles;
use App\Models\Categorias;
use App\Models\Proyectos;
use Illuminate\Http\Request;

class IngreEgreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $nombre= $request->get('nombreBusqueda');
        if ($nombre=="Todos") {
            $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();
        }
        else{
            $data['facturas']=Ingre_Egre::ingre($nombre)->get(); 
        }
        $data['proyecto']=Proyectos::where("_id","=",$id)->first();
        return view('ingegr.ingresoegr', $data)->with('proy_id',$id); 
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
        $dataProducts['proy_id']=$id;
        $dataProducts['ie_total']=0; 
        $des = trim($request->ie_descripcion);
        if($des != ""){
            Ingre_Egre::insert($dataProducts);        
            $data['empleados']= Ingre_Egre::paginate(15);   
            $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();
            $data['proyecto']=Proyectos::where("_id","=",$id)->first();       
            return view('ingegr.ingresoegr', $data)->with('proy_id',$id);
        }
        else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            //$data['empleados']= Ingre_Egre::all();   
            $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();
            $data['proyecto']=Proyectos::where("_id","=",$id)->first();       
            return view('ingegr.ingresoegr', $data)->with('proy_id',$id);
        }
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
    public function update(Request $request)
    {
        $dataProducts = $request->except('_token','saveitem','method');
        $des = trim($request->ie_descripcion);
        if($des != ""){
            $factura = Ingre_Egre::findOrFail($request->_id);
            $factura->update($request->all());
            $data['facturas']=Ingre_Egre::where("proy_id","=",$request->proy_id)->get();  
            $data['proyecto']=Proyectos::where("_id","=",$request->proy_id)->first();     
            return view('ingegr.ingresoegr', $data)->with('proy_id',$request->proy_id);
        }
        else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['facturas']=Ingre_Egre::where("proy_id","=",$request->proy_id)->get();  
            $data['proyecto']=Proyectos::where("_id","=",$request->proy_id)->first();     
            return view('ingegr.ingresoegr', $data)->with('proy_id',$request->proy_id);
        }  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingre_Egre  $ingre_Egre
     * @return \Illuminate\Http\Response
     */
    public function destroy($idfactura)
    {
         //buscamos la factura y lo eliminamos
         $factura = Ingre_Egre::find($idfactura);      
         $idproyecto=$factura->proy_id;        
         $factura->delete();
         //eliminamos los detalles de la factura
         $data['detalles']=Detalles::where("ie_id","=",$idfactura)->delete();
         $total=0;
         //buscamos el nombre del proyecto
         $data['proyecto']=Proyectos::where("_id","=",$idproyecto)->first();      
          //llamamos todo lo necesario para la vista
         $data['facturas']=Ingre_Egre::where("proy_id","=",$idproyecto)->get();      
        return view('ingegr.ingresoegr', $data)->with('proy_id',$idproyecto);  
    }
}
