<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Request as Peticion;

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
        print("store");
        // if (!$request->ajax()) return redirect('/administrador');

        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);

        $categoria = new Categorie();
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->image = $nombreImagen;
        $categoria->status = '1';
        $categoria->save();
    }

  

    public function update(Request $request)
    {

        $categorias = Categorie::findOrFail($request->PK_categories);
        $categorias->name = $request->name;
        $categorias->description = $request->description;
        $categorias->image = $request->image;
        $categorias->status = '1';
        $categorias->save();
    }


    public function desactivar(Request $request)
    {
        $id = $request->PK_categories;
        $categorias = Categorie::findOrFail($id);
        $categorias->status = '0';
        $categorias->save();
    }

   
    public function activar(Request $request)
    {
        $categorias = Categorie::findOrFail($request->PK_categories);
        $categorias->status = '1';
        $categorias->save();
    }
}
