<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\ReporteSalida;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $productos = Productos::all();
        
        return $productos;
    }

    public function listSkuNombre($valor)
    {
        $productos = Productos::select('idProducto','SKU','nombre','precio','stock','categoria')
        ->where('productos.nombre','=',$valor)
        ->orWhere('productos.SKU','=',$valor)
        ->get();
        
        return $productos;
    }
    
    public function create(Request $request)
    {
        $newProducto = Productos::create([
            'estado' => $request->input('estado'),
            'SKU' => $request->input('SKU'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'fechaVencimiento' => $request->input('fechaVencimiento'),
            'categoria' => $request->input('categoria'),
        ]); 

        return $newProducto;
        
    }

    public function update(Request $request, int $id)
    {
        $updateProduct = Productos::findOrFail($id);

        $updateProduct->update([
            'estado' => $request->input('estado'),
            'SKU' => $request->input('SKU'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'fechaVencimiento' => $request->input('fechaVencimiento'),
            'categoria' => $request->input('categoria'),
        ]);

        return $updateProduct;
    }

    public function updateStock(int $id, int $salida)
    {
        try {
            $updateStock = Productos::findOrFail($id);

        $stock = $updateStock->stock;

        $valor = $stock - $salida;

        if ($valor < 1) {
            $updateStock = 'El stock es insuficiente';
        } else {
            $updateStock->update([
                'stock' => $valor
            ]);
        }

        return $updateStock;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),500);
        }
    }
    


    public function destroy(Productos $productos)
    {
        //
    }
}
