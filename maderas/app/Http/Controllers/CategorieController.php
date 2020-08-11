<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

use Request as Peticion;
use File;

class CategorieController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $categorias = Categorie::orderBy('PK_categories', 'desc')->paginate(3);

       
        }
        else{
            $categorias = Categorie::where($criterio, 'like', '%'. $buscar . '%')->orderBy('PK_categories', 'desc')->paginate(3);
        }
        return [
            'pagination' => [
                'total'        => $categorias->total(),
                'current_page' => $categorias->currentPage(),
                'per_page'     => $categorias->perPage(),
                'last_page'    => $categorias->lastPage(),
                'from'         => $categorias->firstItem(),
                'to'           => $categorias->lastItem(),
            ],
            'categorias' => $categorias
        ];

    }


    public function listar(){
        $categoria = Categorie::all();
        return $categoria;
    }

    public function listarCate(){
        $categoria = Categorie::all()->where('status','=','1');
        return $categoria;
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
        if (!$request->ajax()) return redirect('/administrador');

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

        $categorias->name = $request->name;
        $categorias->description = $request->description;
        $categorias->image = $nombreImagen;
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
        $id = $request->PK_categories;
        $categorias = Categorie::findOrFail($id);
        $categorias->status = '1';
        $categorias->save();
    }
}
