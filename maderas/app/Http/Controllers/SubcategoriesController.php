<?php

namespace App\Http\Controllers;

use App\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use File;
use Request as Peticion;

class SubcategoriesController extends Controller
{
    public function index()
    {
        return $subcategorias = DB::table('subcategories')
        ->join('categories', 'categories.PK_categories', '=', 'subcategories.id_category')
        ->select('subcategories.PK_subcategories','subcategories.name','subcategories.description'
        ,'subcategories.image','subcategories.status','categories.name as categoria','subcategories.id_category')
        ->distinct()
        ->get();
    }

    public function listar(){
        $subcategorias = SubCategorie::all();
        return $subcategorias;
    }

 
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
        $subcategorias->id_category = $request->id_category;
        $subcategorias->name = $request->name;
        $subcategorias->description = $request->description;
        $subcategorias->image = $nombreImagen;
        $subcategorias->status = '1';
        $subcategorias->save();
    }

  
    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id = $request->PK_subcategories;

        $subcategorias = SubCategorie::findOrFail($id);

        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);
        File::delete('img/' . $subcategorias->Imagen);


        $subcategorias->id_category = $request->id_category;
        $subcategorias->name = $request->name;
        $subcategorias->description = $request->description;
        $subcategorias->image = $nombreImagen;
        $subcategorias->status = '1';
        $subcategorias->save();
    }

 
    public function desactivar(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id = $request->PK_subcategories;
        $subcategorias = SubCategorie::findOrFail($id);
        $subcategorias->status = '0';
        $subcategorias->save();
    }

   
    public function activar(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id = $request->PK_subcategories;
        $subcategorias = SubCategorie::findOrFail($id);
        $subcategorias->status = '1';
        $subcategorias->save();
    }
}
