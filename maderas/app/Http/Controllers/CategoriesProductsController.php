<?php

namespace App\Http\Controllers;
use App\ProductCategories;
use Illuminate\Http\Request;

use Request as Peticion;
use File;

class CategoriesProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $categoriasProduc = ProductCategories::orderBy('PK_products_categories', 'desc')
            ->paginate(3);
        }
        else{
            $categoriasProduc = ProductCategories::where($criterio, 'like', '%'. $buscar . '%')
            ->orderBy('PK_products_categories', 'desc')
            ->paginate(3);
        }

        return [
            'pagination' => [
                'total'        => $categoriasProduc->total(),
                'current_page' => $categoriasProduc->currentPage(),
                'per_page'     => $categoriasProduc->perPage(),
                'last_page'    => $categoriasProduc->lastPage(),
                'from'         => $categoriasProduc->firstItem(),
                'to'           => $categoriasProduc->lastItem(),
            ],
            'categoriasProduc' => $categoriasProduc
        ];
    }

    public function listar(){
        $categoriasProduc = ProductCategories::all();
        return $categoriasProduc;
    }

    public function listarCateP(Request $request){
        $id = $request->id;
        $categoriasProduc = ProductCategories::all()
        ->where('id_subcategories','=',$id)
        ->where('status','=','1');
        return $categoriasProduc;
    }

    public function listarCate(){
        $categoriasProduc = ProductCategories::all()->where('status','=','1');
        return $categoriasProduc;
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        // $img = Peticion::file('file');
        
        // $extension = $img->guessExtension();
        // $date = date('d-m-Y_h-i-s-ms-a');
        // $prefijo = 'Image';
        // $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        // $img->move('img', $nombreImagen);

        $categoriasProduc = new ProductCategories();
        $categoriasProduc->name = $request->name;
        $categoriasProduc->id_subcategories = $request->id_subcategories;
        // $categoriasProduc->image = $nombreImagen;
        $categoriasProduc->status = '1';
        $categoriasProduc->save();
    }

    public function update(Request $request)
    {
        $id = $request->PK_products_categories;
        $categoriasProduc = ProductCategories::findOrFail($id);

        // $imagen = Peticion::file('file');
        // $extension = $imagen -> guessExtension();
        // $date = date('d-m-Y_h-i-s-ms-a');
        // $prefijo = 'Image';
        // $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        // $imagen->move('img', $nombreImagen);
        // File::delete('img/' . $categorias->Imagen);

        $categoriasProduc->name = $request->name;
        $categoriasProduc->id_subcategories = $request->id_subcategories;
        // $categoriasProduc->image = $nombreImagen;
        $categoriasProduc->status = '1';
        $categoriasProduc->save();

    }


    public function desactivar(Request $request)
    {
        $id = $request->PK_products_categories;
        $categoriasProduc = ProductCategories::findOrFail($id);
        $categoriasProduc->status = '0';
        $categoriasProduc->save();
    }

   
    public function activar(Request $request)
    {
        $id = $request->PK_products_categories;
        $categoriasProduc = ProductCategories::findOrFail($id);
        $categoriasProduc->status = '1';
        $categoriasProduc->save();
    }

    public function mostrarCategorias(Request $request){
        $id = $request->id;


        return  $categoriasProduc = DB::table('products_categories')
        ->select('name','id_subcategories','image','PK_products_categories')
        ->where('id_subcategories','=',$id)
        ->get();
    }
}
