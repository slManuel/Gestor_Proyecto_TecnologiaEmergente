<?php

namespace App\Http\Controllers;

use App\Models\Detalles;
use App\Models\UnidadesMedidas;
use App\Models\Categorias;
use App\Models\Ingre_Egre;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idfactura)
    {
      //  $data['facturas']=Ingre_Egre::where("proy_id","=",$id)->get();    
      //$data['detalles']=Detalles::paginate(15);  
        $data['detalles']=Detalles::where("ie_id","=",$idfactura)->get();
        $total=0;
        foreach($data['detalles'] as $detalle)
        {
            $total=$total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($idfactura);
        $factura->ie_total=$total;  
        $factura->save();
        $data['categorias']=Categorias::where("cat_tipo","=",$factura->ie_tipo)->get();
        $data['unidades']=UnidadesMedidas::all();
       // echo $idfactura;   
        //echo json_encode($data);  
        return view('detalles.detalles', $data)->with('idfactura',$idfactura); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idfactura)
    {
        $factura = Ingre_Egre::findOrFail($idfactura);
        $data['categorias']=Categorias::where("cat_tipo","=",$factura->ie_tipo)->get();
        $data2['unidades']=UnidadesMedidas::all();
        return view('detalles.createdetalles',$data,$data2)->with('idfactura',$idfactura);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProducts = $request->except('_token','saveitem');
        $dataProducts['det_subtotal']=$request->det_cantidad * $request->det_preciounitario;
        Detalles::insert($dataProducts);   
        $data['detalles']=Detalles::where("ie_id","=",$request->ie_id)->get();
       
        $total=0;
        foreach($data['detalles'] as $detalle)
        {
            $total=$total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($request->ie_id);
        $factura->ie_total=$total;  
        $factura->save();
        $data['categorias']=Categorias::where("cat_tipo","=",$factura->ie_tipo)->get();
        $data['unidades']=UnidadesMedidas::all();
        return view('detalles.detalles', $data)->with('idfactura',$request->ie_id);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function show(Detalles $detalles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalles $detalles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //echo json_encode($request);
        //busco y actualizo el detalle
        $dataProducts = $request->except('_token','saveitem');
        $detalle = Detalles::findOrFail($request->_id);
        $detalle['det_subtotal']=$request->det_cantidad * $request->det_preciounitario;
        $detalle->update($request->all());

        //recalculamos el valor total de la factura
        $data['detalles']=Detalles::where("ie_id","=",$request->factura_id)->get();
        $total=0;
        foreach($data['detalles'] as $detalle)
        {
            $total=$total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($request->factura_id);
        $factura->ie_total=$total;  
        $factura->save();

        //llamamos todo lo necesario para la vista
        $data['categorias']=Categorias::where("cat_tipo","=",$factura->ie_tipo)->get();
        $data['unidades']=UnidadesMedidas::all();
       return view('detalles.detalles', $data)->with('idfactura',$request->factura_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_detalle,$idfactura)
    {
        //buscamos el detalle y lo eliminamos
        $detalle = Detalles::find($id_detalle);
        $detalle->delete();

        //recalculamos el valor total de la factura
        $data['detalles']=Detalles::where("ie_id","=",$idfactura)->get();
        $total=0;
        foreach($data['detalles'] as $detalle)
        {
            $total=$total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($idfactura);
        $factura->ie_total=$total;  
        $factura->save();

         //llamamos todo lo necesario para la vista
         $data['categorias']=Categorias::where("cat_tipo","=",$factura->ie_tipo)->get();
         $data['unidades']=UnidadesMedidas::all();
        return view('detalles.detalles', $data)->with('idfactura',$idfactura);
    }
}
