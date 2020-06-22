<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

use Request as Peticion;
use File;

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
        $id = $request->PK_categories;
        print_r($id);
        $categorias = Categorie::findOrFail($id);

        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);
        File::delete('img/' . $categorias->Imagen);

<<<<<<< HEAD
=======
        $categorias = Categorie::findOrFail($request->PK_categories);
       
        $imagen = Peticion::file('file');
        
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);
        File::delete('img/' . $categorias->Imagen);

>>>>>>> happiness
        $categorias->name = $request->name;
        $categorias->description = $request->description;
        $categorias->image = $nombreImagen;
        $categorias->status = '1';
        $categorias->save();

<<<<<<< HEAD
=======

>>>>>>> happiness
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
        $id = $request->PK_categories;
        $categorias = Categorie::findOrFail($id);
        $categorias->status = '1';
        $categorias->save();
    }
}
