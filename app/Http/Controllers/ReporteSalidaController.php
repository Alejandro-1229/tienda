<?php

namespace App\Http\Controllers;

use App\Models\ReporteSalida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $reporte = ReporteSalida::all();

        return $reporte;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $date = Carbon::now();

        $nuevaFechaHora1 = $date->subHours(5);
        
        $newReporte = ReporteSalida::create([
            'fechaReporte' => $nuevaFechaHora1,
            'descripcion' => $request->input('descripcion'),
            'idUsuario' => $request->input('idUsuario')
        ]);

        return $newReporte;
    }

    public function update(Request $request, int $id)
    {
        $updateReporte = ReporteSalida::findOrFail($id);

        $updateReporte->update([
            'descripcion' => $request->input('descripcion')
        ]);

        return $updateReporte;
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReporteSalida $reporteSalida)
    {
        //
    }
}
