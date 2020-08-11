<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use File;
use Request as Peticion;

class SubcategoriesController extends Controller
{
    public function index(Request $request)
    {
     
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){

        $subcategorias = DB::table('subcategories')
        ->join('categories', 'categories.PK_categories', '=', 'subcategories.id_category')
        ->select('subcategories.PK_subcategories','subcategories.name','subcategories.description'
        ,'subcategories.image','subcategories.status','categories.name as categoria','subcategories.id_category')
        ->distinct()
        ->orderBy('PK_subcategories', 'desc')
        ->paginate(3);
        }
        else{
        $subcategorias = DB::table('subcategories')
        ->join('categories', 'categories.PK_categories', '=', 'subcategories.id_category')
        ->select('subcategories.PK_subcategories','subcategories.name','subcategories.description'
        ,'subcategories.image','subcategories.status','categories.name as categoria','subcategories.id_category')
        ->distinct()
        ->where('subcategories.'.$criterio, 'like', '%'. $buscar . '%')
        ->orderBy('PK_subcategories', 'desc')
        ->paginate(3);

        }

        return [
            'pagination' => [
                'total'        => $subcategorias->total(),
                'current_page' => $subcategorias->currentPage(),
                'per_page'     => $subcategorias->perPage(),
                'last_page'    => $subcategorias->lastPage(),
                'from'         => $subcategorias->firstItem(),
                'to'           => $subcategorias->lastItem(),
            ],
            'subcategorias' => $subcategorias
        ];
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


    public function menuInicio(Request $request){

        $categories = Categorie::select(
            'categories.PK_categories as idCategories',
            'categories.name as categoria'
        )
        ->where('categories.status','=','1')
        ->orderBy('categories.PK_categories', 'asc')
        ->get();
        $categories = $categories->unique('idCategories');
        $Values = [];
        foreach($categories as $cat){
            $Subcategories = SubCategorie::select(
                'subcategories.PK_subcategories as idSubcategories',
                'subcategories.name as subcategoria'
            )
            ->where('subcategories.id_category','=',$cat["idCategories"])
            ->where('subcategories.status','=','1')
            ->orderBy('subcategories.PK_subcategories', 'asc')
            ->get();
            $cat = $cat->toArray();
            $cat = array_merge($cat, ["subcategories" => $Subcategories]);
            array_push($Values, $cat);
        }
        return $Values;
    }

}
