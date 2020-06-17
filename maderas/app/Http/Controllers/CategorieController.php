<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorie::all();
        return $categorias;
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias = new Caregoties();
        $categorias->name = $request->name;
        $categorias->description = $request->description;
        $categorias->image = $request->image;
        $categorias->status = '1';
        $categorias->save();
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

        $categorias = Caregoties::findOrFail($request->$id);
        $categorias->name = $request->name;
        $categorias->description = $request->description;
        $categorias->image = $request->image;
        $categorias->status = '1';
        $categorias->save();
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
        $categorias = Caregoties::findOrFail($request->$id);
        $categorias->status = '0';
        $categorias->save();
    }

   
    public function activar(Request $request, $id)
    {
        $categorias = Caregoties::findOrFail($request->$id);
        $categorias->status = '1';
        $categorias->save();
    }
}
