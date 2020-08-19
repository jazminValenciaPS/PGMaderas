<?php

namespace App\Http\Controllers;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $stock = DB::table('stock')
            ->join('products','products.PK_products','=','stock.id_product')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('_p_g_branches.city','_p_g_branches.street','stock.id_product','products.name',
            'stock.avaible','stock.status')
            ->paginate(6);
            
        }
        else{
            $stock = DB::table('stock')
            ->join('products','products.PK_products','=','stock.id_product')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('_p_g_branches.city','stock.PK_stock','_p_g_branches.street','stock.id_product','products.name',
            'stock.avaible','stock.status')
            ->where('stock.'.$criterio, 'like', '%'. $buscar . '%')
            ->paginate(6);
        }

        return [
            'pagination' => [
                'total'        => $stock->total(),
                'current_page' => $stock->currentPage(),
                'per_page'     => $stock->perPage(),
                'last_page'    => $stock->lastPage(),
                'from'         => $stock->firstItem(),
                'to'           => $stock->lastItem(),
            ],
            'stock' => $stock
        ];
    }

    public function store(Request $request){
   
    }

 
    public function update(Request $request)
    {
        print($request);
        $id = $request->PK_stock;
        print($id);
        $stock = Stock::findOrFail($id);

        $stock->avaible = $request->avaible;
        $stock->status = '1';
        $stock->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
