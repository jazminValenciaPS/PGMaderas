<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use Request as Peticion;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
   
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $producto = DB::table('products')
        ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products.id_subcategory')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','products.avaible', 'products.status','subcategories.PK_subcategories',
        'subcategories.name as subcategoria','products_images.image')
        ->distinct()
        ->orderBy('products.PK_products', 'desc')->paginate(3);

        }
        else{
            $producto = DB::table('products')
        ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products.id_subcategory')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','products.avaible', 'products.status','subcategories.PK_subcategories',
        'subcategories.name as subcategoria','products_images.image')
        ->distinct()
        ->where('products.'.$criterio, 'like', '%'. $buscar . '%')
        ->orderBy('products.PK_products', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $producto->total(),
                'current_page' => $producto->currentPage(),
                'per_page'     => $producto->perPage(),
                'last_page'    => $producto->lastPage(),
                'from'         => $producto->firstItem(),
                'to'           => $producto->lastItem(),
            ],
            'producto' => $producto
        ];
    }

    public function listarProductos(){

        return  $producto = DB::table('products')
        ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products.id_subcategory')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','products.avaible', 'products.status','subcategories.PK_subcategories',
        'subcategories.name as subcategoria','products_images.image')
        ->distinct()
        ->get();

    }

    public function mostrarProducto(Request $request){

        $id = $request->id;


        return  $producto = DB::table('products')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','products.avaible', 'products.status','products_images.image')
        ->where('products.PK_products','=',$id)
        ->where('products.status','=','1')
        ->get();
    }
  
    public function store(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $producto = new Product();
        $imagen = new ProductImage();

     

        $producto->SKU = $request->SKU;
        $producto->id_subcategory = $request->id_subcategory;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->avaible = $request->avaible;
        $producto->status = '1';
        $producto->save();

        $idProduc = $producto->PK_products;

        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
        
        $imagen->id_product = $idProduc;
        $imagen ->image = $nombreImagen;

        $imagen->save();
    }

    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id = $request->PK_products;

        $producto = Product::findOrFail($id);

     

        $producto->SKU = $request->SKU;
        $producto->id_subcategory = $request->id_subcategory;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->avaible = $request->avaible;
        $producto->status = '1';

        $producto->save();

        $imagenP = ProductImage::findOrFail($id);



        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);

        File::delete('img/' . $imagenP->image);

        $imagenP ->image = $nombreImagen;

        $imagenP->save();
       
    }

   
    public function desactivar(Request $request)
    { 
        $id = $request->PK_products;
        $producto = Product::findOrFail($id);
        $producto->status = '0';
        $producto->save();
    }

   
    public function activar(Request $request)
    {
        $id = $request->PK_products;
        $producto = Product::findOrFail($id);
        $producto->status = '1';
        $producto->save();
    }
}
