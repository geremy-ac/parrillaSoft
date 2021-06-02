<?php

namespace App\Http\Controllers;

use App\Models\Insumo\insumo_entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insumo\Entrada;
use App\Models\Insumo\Insumo;

class InsumoController extends Controller
{

    public function FormularioInsumo(){
        $entradas = Entrada::all();
        return view('insumos/formulario' ,compact('entradas'));
    }

    public function FormularioCrear(){

        $entradas = Entrada::all();
        return view('insumos/crear', compact('entradas'));
    }
    public function FormularioEditar($id){
        $insumo = Insumo::find($id);
        $entradas = Entrada::where('idInsumo',$id)->get();
        return view('insumos/agregarEntradas',compact('insumo','entradas'));
    }
    public function FormularioEditarEntrada($id){
        $insumos = Insumo::all();
        $entrada = Entrada::find($id);
        return view('insumos/editarEntrada',compact('entrada','insumos'));
    }

    public function Listar(Request $request){
        $id = $request->input("id");
        $Entradas = []; 
        if($id != null){
            $Entradas = Entrada::where('idInsumo',$id)->get();
        }
        return view('insumos/Listar', compact('Entradas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'estatus' =>'required',
            'medida' => 'required',
            'stock_minimo'=>'required',
        ]);

        Insumo::create($campos);
        return redirect('insumos/Listar')->with('mensaje','Insumo guardado');
    }
   
    public  function  findIdEntrada($id){
        $idEntrada = Entrada::find($id);
        return view('insumos/crear',compact('idEntrada'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,Insumo $insumo)
    {
        $input = $request->all();      
        try {
            DB::beginTransaction();
            $campos=request()->validate([
                'nombre'=>'required|min:3',
                'estatus' =>'required',
                'medida' => 'required',
                'stock_minimo'=>'required',
                'cantidad' => 'required',
            ]);
            $insumo->update($campos);
            foreach($input["nombre_entradas"] as $key => $value){
                Entrada::create([
                    "idInsumo"=>$insumo->id,
                    "cantidad"=>$input["cantidades"][$key],
                    "nombre_entrada"=>$input["nombre_entradas"][$key],
                    "caducidad"=>$input["caducidades"][$key],
                ]);}
            DB::commit();
            return redirect("insumos/Listar")->with('mensaje','cambios realizados ');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("insumos/agregarEntradas")->with('mensaje', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function actualizar(Insumo $insumo){
        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'estatus' =>'required',
            'medida' => 'required',
            'stock_minimo'=>'required',
        ]);
        $insumo->update($campos);
        return redirect('insumos/Listar')->with('mensaje', 'insumo actualizado');
    }  
    public function actualizarEntrada(Entrada $entrada)
    {
        $campos=request()->validate([
            'cantidad'=>'required',
            'lote' =>'required',
            'caducidad' => 'required',
            'idInsumo' => 'required',
        ]);
        $entrada->update($campos);
        return redirect('insumos/Listar')->with('mensaje', 'entrada actualizado');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function eliminar(Insumo $insumo){
        $insumo->delete();
        return redirect('insumos/Listar')->with('mensaje','insumo eliminado');
    }
    public function eliminarEntrada(Entrada $entrada){
        $entrada->delete();
        return redirect('insumos/Listar')->with('mensaje','entrada eliminado');
    }
    public function calcular_cantidad($entradas, $cantidades)
    {
        $cantidad = 0;
        foreach ($entradas as $key => $value) {
            $entradas = Insumo::find($value);
            $cantidad += ($entradas->$cantidad + $cantidades[$key]);
        }
        return $cantidad;
    }

    public function FormularioEntrada($id){
        $insumo = Insumo::find($id);
        $entradas = Entrada::where('idInsumo',$id)->get();
        $total = Entrada::where('idInsumo',$id)->sum('cantidad');
        return view('insumos/entrada',compact('insumo','entradas','total'));
    }

    public function crearEntrada(Request $request)
    {
        $input = $request->all();
        $idInsumo = $input["idInsumo"];
        $total = Entrada::where('idInsumo',$idInsumo)->sum('cantidad');    
        $caja=request()->validate([
            'nombre_entrada'=>'required',
            'cantidad' =>'required',
            'caducidad' => 'required',
            'idInsumo' => 'required',
        ]);
        Entrada::create($caja);
        $totalInsumo = Insumo::find($idInsumo)->update(["cantidad"=>$total]);
        return redirect('insumos/Listar',)->with('mensaje','entrada guardado');
    }

    public function save(Request $request)
    {
        $input = $request->all();
       
        try {
            DB::beginTransaction();
            $campos=request()->validate([
                'nombre'=>'required|min:3',
                'estatus' =>'required',
                'medida' => 'required',
                'stock_minimo'=>'required',
                'cantidad' => 'required',
            ]);
           $insumo = Insumo::create($campos);
           
            foreach($input["nombre_entradas"] as $key => $value){
                Entrada::create([
                    "idInsumo"=>$insumo->id,
                    "cantidad"=>$input["cantidades"][$key],
                    "nombre_entrada"=>$input["nombre_entradas"][$key],
                    "caducidad"=>$input["caducidades"][$key],
                ]);}
            DB::commit();
            return redirect("insumos/insumoCrear")->with('mensaje','creacion completada');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("insumos/insumoCrear")->with('mensaje', $e->getMessage());
        }
    }
}
