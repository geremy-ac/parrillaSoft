<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use DB;

class ReportesController extends Controller
{
    public function index(){
        $ventas = Venta::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $months = Venta::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index =>$month){
            $datas[$month] = $ventas[$index];
        }
        return view('Reportes.reporte',compact('datas'));
    }

}
