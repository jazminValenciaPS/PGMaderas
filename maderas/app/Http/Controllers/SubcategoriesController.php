<?php

namespace App\Http\Controllers;

use App\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Request as Peticion;

class SubcategoriesController extends Controller
{
    public function index()
    {
        return $subcategorias = DB::table('subcategories')
        ->join('categories', 'categories.PK_categories', '=', 'subcategories.id_categories')
        ->select('subcategories.PK_subcategories','subcategories.name','subcategories.description'
        ,'subcategories.image','subcategories.status','categories.name','categories.PK_categories')
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

        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);

        $subcategorias = new SubCategorie();
        $subcategorias->id_categories = $request->id_categories;
        $subcategorias->name = $request->name;
        $subcategorias->description = $request->description;
        $subcategorias->image = $nombreImagen;
        $subcategorias->status = '1';
        $subcategorias->save();
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

        $subcategorias = SubCategorie::findOrFail($request->$id);
        $producto->id_categories = $request->id_categories;
        $subcategorias->name = $request->name;
        $subcategorias->description = $request->description;
        $subcategorias->image = $nombreImagen;
        $subcategorias->status = '1';
        $subcategorias->save();
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
        $subcategorias = SubCategorie::findOrFail($request->$id);
        $subcategorias->status = '0';
        $subcategorias->save();
    }

   
    public function activar(Request $request, $id)
    {
        $subcategorias = SubCategorie::findOrFail($request->$id);
        $subcategorias->status = '1';
        $subcategorias->save();
    }
}
