<?php

namespace App\Http\Controllers;
use App\Product;
use Request as Peticion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return $producto = DB::table('products')
        ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products.id_subcategory')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','products.avaible', 'products.status','subcategories.PK_subcategories','subcategories.name as subcategoria')
        ->distinct()
        ->get();
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $producto = new Product();
        $producto->SKU = $request->SKU;
        $producto->id_subcategory = $request->id_subcategory;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->avaible = $request->avaible;
        $producto->status = '1';
        $producto->save();
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $producto = Product::findOrFail($request->$id);
        $producto->id_categories = $request->id_categories;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->image = $nombreImagen;
        $producto->status = '1';
        $producto->save();
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivar(Request $request, $id)
    {
        $producto = Product::findOrFail($request->$id);
        $producto->status = '0';
        $producto->save();
    }

   
    public function activar(Request $request, $id)
    {
        $producto = Product::findOrFail($request->$id);
        $producto->status = '1';
        $producto->save();
    }
}
