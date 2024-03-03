<?php

namespace App\Http\Controllers;

use App\Models\DetalleSalida;
use Illuminate\Http\Request;

class DetalleSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $ProductosController;

     public function __construct(ProductosController $ProductosController)
     {
        return $this->ProductosController = $ProductosController;
     }

     
    public function getAll()
    {
        $detalles = DetalleSalida::all();

        return $detalles;
    }

    public function create(Request $request)
    {
        $newDetalle = DetalleSalida::create([
            'cantidad' => $request->input('cantidad'),
            'idOutput' => $request->input('idOutput'),
            'idProducto' => $request->input('idProducto')
        ]);

        $elementoCreado = DetalleSalida::findOrFail($newDetalle->idDetalleOutpu);
        $idProducto = $newDetalle->idProducto;
        $cantidad = $newDetalle->cantidad;

        $actualizarStock = $this->ProductosController->updateStock($idProducto,$cantidad);

        if (is_string($actualizarStock)) {
            $delete = $elementoCreado;
            $delete->delete();
            $newDetalle = 'El stock es insuficiente';
        } 
        

        $data = [
            'Detalle' => $newDetalle,
            'Stock Actualizado' => $actualizarStock
        ];

        return $data;
    }

    public function destroy(DetalleSalida $detalleSalida)
    {
        //
    }
}
