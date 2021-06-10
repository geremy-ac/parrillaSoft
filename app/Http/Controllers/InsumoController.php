<?php

namespace App\Http\Controllers;

use App\Models\Insumo\insumo_entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insumo\Entrada;
use App\Models\Insumo\Insumo;
use PDF;

class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:listarInsumo')->only('Listar');
        $this->middleware('can:FormularioEntrada')->only('FormularioEntrada');
        $this->middleware('can:insumoCrear')->only('FormularioInsumo');
        $this->middleware('can:CrearInsumo')->only('save');
        $this->middleware('can:CrearEntrada')->only('crearEntrada');
        $this->middleware('can:insumoEliminar')->only('eliminar');
    }

    public function FormularioInsumo(){
        $entradas = Entrada::all();
        return view('insumos/formulario' ,compact('entradas'));
    }
    public function FormularioEntrada($id){
        $insumo = Insumo::find($id);
        $entradas = Entrada::where('idInsumo',$id)->get();
        $total = Entrada::where('idInsumo',$id)->sum('cantidad');
        return view('insumos/entrada',compact('insumo','entradas','total'));
    }
    public function Listar(Request $request){
        $id = $request->input("id");
        $Entradas = []; 
        if($id != null){
            $Entradas = Entrada::where('idInsumo',$id)->get();
        }
        return view('insumos/Listar', compact('Entradas'));
    }
     
    public function PDFinsumos()
    {
        $insumos = insumo::all();
        $pdf = PDF::loadView('insumos/show', compact('insumos'));
        return $pdf->download('insumos.pdf');
    } 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
   
    }

    public function cambiarEstado($id, $estatus){
        $insumos = insumo::find($id);
        if($insumos == null){
            return redirect()->route('listarInsumo');
        }
        $insumos->update(["estatus"=> $estatus]);
        return redirect('insumos/Listar');
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
        $insumos = insumo::all();
        return view('insumos/show', compact('insumos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request )
    {
      
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
    public function crearEntrada(Request $request)
    {
        $input = $request->all();
        $idInsumo = $input["idInsumo"];
          
        $caja=request()->validate([
            'nombre_entrada'=>'required',
            'cantidad' =>'required',
            'caducidad' => 'required',
            'idInsumo' => 'required',
        ]);
        Entrada::create($caja);
        $total = Entrada::where('idInsumo',$idInsumo)->sum('cantidad');  
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
