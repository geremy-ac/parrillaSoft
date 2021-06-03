<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\Insumo\Entrada;
use App\Models\Insumo\Insumo;
use App\Models\producto;
use App\Models\ProductoInsumo;
use DB;

use Illuminate\Http\Request;

class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function cambiarestado($id, $status){
        $productos = producto::find($id);
        if($productos == null){
            return redirect()->route('ListarProducto');
        }
        $productos->update(["status"=> $status]);
        return redirect('producto/Listar');
    }



    public function listar(Request $request)
    {

        $id=$request->input('id');
        $insumos=[];
        if($id != null){
            $insumos =insumo::select("insumo.*","insumo_productos.cantidad")
                ->join("insumo_productos", "insumo.id","=","insumo_productos.Insumo_id")
                ->where("insumo_productos.Producto_id",$id)
             ->get();
        }


        $producto = producto::select("productos.*","categorias.nombre as categorias")
        ->join("categorias","categorias.id","=","productos.IdCategorias")
        ->OrderBy("id",'desc')
        ->get();

        return view('Productos.listar',compact("producto","insumos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = categoria::all();
        $insumos = insumo::all();
        return view('Productos/crear', compact('categorias','insumos'));
    }
    public function insumoagregado ($id)
    {

        $producto= producto::where('id', $id)->with('insumos')->get();

        return view('Productos.InsumoRelacionar', compact('producto', 'insumos'));
    }
    public function crear(Request $request)
    {
        $input = $request -> all();
        try {
            DB::beginTransaction();
            $producto = producto::create([
                "nombre" => $input["nombre"],
                "status" => $input["status"],
                "precio" => $input["precio"],
                "descripcion" => $input["descripcion"],
                "idCategorias" => $input["categorias"],

            ]);
            foreach ($input["Insumo_id"] as $key => $value){
                ProductoInsumo::create([
                    "Insumo_id" => $value,
                    "producto_id"=> $producto->id,
                     "cantidad" =>  $input["cantidad"][$key]
                ]);

            }

            DB::commit();
            return redirect("producto/crear")->with('status','1');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect("producto/crear")->with('status',$e->getMessage());
        }
    }

    public function FormularioInsumo($id){

        $insumo = insumo::where('idProducto',$id)->get();

        return view('productos/insumos',compact('producto',));
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
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {

        return view('Productos.listar');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
