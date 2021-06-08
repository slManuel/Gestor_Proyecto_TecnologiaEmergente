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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $data['detalles'] = Detalles::where("ie_id", "=", $idfactura)->get();
        $total = 0;
        foreach ($data['detalles'] as $detalle) {
            $total = $total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($idfactura);
        $factura->ie_total = $total;
        $factura->save();
        $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
        $data['unidades'] = UnidadesMedidas::all();
        // echo $idfactura;   
        //echo json_encode($data);  
        return view('detalles.detalles', $data)->with('idfactura', $idfactura);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idfactura)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $factura = Ingre_Egre::findOrFail($idfactura);
        $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
        $data2['unidades'] = UnidadesMedidas::all();
        return view('detalles.createdetalles', $data, $data2)->with('idfactura', $idfactura);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de campos
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $descripcion = $request->det_descripcion;
        $cantidad = $request->det_cantidad;
        $precioUnitario = $request->det_preciounitario;

        if (trim($descripcion) != "" && trim($cantidad) != "" && trim($precioUnitario) != "") {
            if (trim($cantidad) > 0) {
                //Validamos el precio
                if (preg_match("/^[0-9]{1,25}([.][0-9]{1,2})?$/", $precioUnitario)) {
                    //obtenemos los valores del request y calculamos el subtotal en el objeto
                    $dataProducts = $request->except('_token', 'saveitem');
                    $dataProducts['det_subtotal'] = $request->det_cantidad * $request->det_preciounitario;
                    Detalles::insert($dataProducts); //insertamos el nuevo detalle de factura a la base   
                    //buscamos la factura con el detalle que acabamos de guardar
                    $data['detalles'] = Detalles::where("ie_id", "=", $request->ie_id)->get();

                    $total = 0; //variable donde almacenamos el total
                    //Cambiamos el valor total de la factura con el nuevo total
                    foreach ($data['detalles'] as $detalle) {
                        $total = $total + $detalle->det_subtotal;
                    }
                    $factura = Ingre_Egre::find($request->ie_id);
                    $factura->ie_total = $total;
                    $factura->save();
                    //buscaos las categorias que pertenecen a la factura
                    $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
                    //traemos las unidades de medida
                    $data['unidades'] = UnidadesMedidas::all();
                    //retornamos la vista
                    return view('detalles.detalles', $data)->with('idfactura', $request->ie_id);
                } else {
                    $factura = Ingre_Egre::find($request->ie_id);
                    $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
                    //traemos las unidades de medida
                    $data['unidades'] = UnidadesMedidas::all();
                    echo '<script language="javascript">alert("El valor de precio unitario no es válido.Intentelo de nuevo.");</script>';
                    return view('detalles.createdetalles', $data)->with('idfactura', $request->ie_id);
                }
            } else { //Si no se valida la expresion, retorna un mensaje y vuelve al formulario
                $factura = Ingre_Egre::find($request->ie_id);
                $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
                //traemos las unidades de medida
                $data['unidades'] = UnidadesMedidas::all();
                echo '<script language="javascript">alert("La cantidad debe ser mayor a 0. Intentelo de nuevo.");</script>';
                return view('detalles.createdetalles', $data)->with('idfactura', $request->ie_id);
            }
        } else { //Si los campos estan vacios
            $factura = Ingre_Egre::find($request->ie_id);
            $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
            //traemos las unidades de medida
            $data['unidades'] = UnidadesMedidas::all();
            echo '<script language="javascript">alert("Los campos no pueden quedar vacíos. Intentelo de nuevo");</script>';
            return view('detalles.createdetalles', $data)->with('idfactura', $request->ie_id);
        }
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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $dataProducts = $request->except('_token', 'saveitem');
        $detalle = Detalles::findOrFail($request->_id);
        $detalle['det_subtotal'] = $request->det_cantidad * $request->det_preciounitario;
        $detalle->update($request->all());

        //recalculamos el valor total de la factura
        $data['detalles'] = Detalles::where("ie_id", "=", $request->factura_id)->get();
        $total = 0;
        foreach ($data['detalles'] as $detalle) {
            $total = $total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($request->factura_id);
        $factura->ie_total = $total;
        $factura->save();

        //llamamos todo lo necesario para la vista
        $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
        $data['unidades'] = UnidadesMedidas::all();
        return view('detalles.detalles', $data)->with('idfactura', $request->factura_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_detalle, $idfactura)
    {
        //buscamos el detalle y lo eliminamos
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $detalle = Detalles::find($id_detalle);
        $detalle->delete();

        //recalculamos el valor total de la factura
        $data['detalles'] = Detalles::where("ie_id", "=", $idfactura)->get();
        $total = 0;
        foreach ($data['detalles'] as $detalle) {
            $total = $total + $detalle->det_subtotal;
        }
        $factura = Ingre_Egre::find($idfactura);
        $factura->ie_total = $total;
        $factura->save();

        //llamamos todo lo necesario para la vista
        $data['categorias'] = Categorias::where("cat_tipo", "=", $factura->ie_tipo)->get();
        $data['unidades'] = UnidadesMedidas::all();
        return view('detalles.detalles', $data)->with('idfactura', $idfactura);
    }
}
