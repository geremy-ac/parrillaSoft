<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\ProductosVenta;

use App\Models\Venta;
use App\Models\Insumo\insumo;
use App\Models\ProductoInsumo;
use Illuminate\Http\Request;
use DB;
use PDF;
class VentaController extends Controller
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
public function factura($id){
    $productos = producto::select("productos.*", "productos_venta.cantidad")
    ->join("productos_venta", "productos.id", "=", "productos_venta.Producto_id")
    ->where("productos_venta.Venta_id",$id)
    ->get();
     $ventas = Venta::find($id);
      return view("Ventas.factura", compact("ventas", "productos"));
}
public function PDFventas($id)
{
    $productos = producto::select("productos.*", "productos_venta.cantidad")
    ->join("productos_venta", "productos.id", "=", "productos_venta.Producto_id")
    ->where("productos_venta.Venta_id",$id)
    ->get();
    $ventas = Venta::find($id);
    $pdf = PDF::loadView('Ventas/factura', compact('productos','ventas'));
    return $pdf->download('ventas.pdf');
} 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = producto::all();
        return view('Ventas.crear',compact('productos'));
    }
    public function crear(Request $request)
    {

        $input = $request -> all();
        try {
            DB::beginTransaction();

            $venta = Venta::create([

                "total" => $this->calcular_precio($input["Producto_id"],$input["cantidades"]),

            ]);
            foreach ($input["Producto_id"] as $key => $value){

                ProductosVenta::create([
                    "Producto_id" => $value,
                    "Venta_id"=> $venta->id,
                    "cantidad" =>  $input["cantidades"][$key]
                ]);

                $insumos =ProductoInsumo::where("Producto_id",$value)
                    ->get();
                foreach($insumos as $i =>$item){
                    $insumo = insumo::find($item->Insumo_id);

                    if($insumo->cantidad <= ($item->cantidad * $input["cantidades"][$key])){
                        DB::rollBack();
                        return redirect("ventas/vender")->with('status','3');
                    }else{
                        $insumo->update(["cantidad" => $insumo->cantidad - $item->cantidad * $input["cantidades"][$key]]);
                    }

                }



            }

            DB::commit();
            return redirect("ventas/vender")->with('status','1');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect("ventas/vender")->with('status','2');}
        }


    public function calcular_precio($productos, $cantidades)
    {
        $precio = 0;
        foreach ($productos as $key => $value) {
            $Producto = producto::find($value);
            $precio += ($Producto->precio * $cantidades[$key]);
        }
        return $precio;
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
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */

        public function show(Request $request){

        $id = $request->input("id");
        $productos = [];
        if($id != null){
            $productos = producto::select("productos.*", "productos_venta.cantidad")
                ->join("productos_venta", "productos.id", "=", "productos_venta.Producto_id")
                ->where("productos_venta.Venta_id",$id)
                ->get();
        }

        $ventas = Venta::select("ventas.*")

            ->get();

        return view("Ventas.listar", compact("ventas", "productos"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }

}
