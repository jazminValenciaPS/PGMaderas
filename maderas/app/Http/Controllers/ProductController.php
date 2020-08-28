<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use App\PGBranches;
use App\Stock;
use Request as Peticion;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Rimorsoft\Http\Request\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
   
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $producto = DB::table('products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price', 'products.status','products.destacado','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->orderBy('products.PK_products', 'desc')->paginate(5);

        }
        else{
            $producto = DB::table('products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price', 'products.status','products.destacado','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('products.PK_products', 'desc')->paginate(5);
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

    public function listarProductos(Request $request){
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $idSubCat = $request->id;
        $id_branch = $request->id_branch;

        
        if ($buscar==''){

            $producto = DB::table('products')
            ->join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products_categories.id_subcategories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('_p_g_branches.PK_PG_branches','=',$id_branch)
            ->where('subcategories.PK_subcategories','=',$idSubCat)
            ->orderBy('products.PK_products', 'desc')->paginate(6);

        }
        else{
            $producto = DB::table('products')
            -join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('_p_g_branches.PK_PG_branches','=',$id_branch)
            ->where('products.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('products.PK_products', 'desc')->paginate(6);
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

    public function mostrarProducto(Request $request){

        $id = $request->id;
        $id_branch = $request->id_branch;


        return  $producto = DB::table('products')
        ->join('stock','stock.id_product','=','products.PK_products')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','stock.avaible', 'products.status','products_images.image')
        ->where('products.PK_products','=',$id)
        ->where('_p_g_branches.PK_PG_branches','=',$id_branch)
        ->where('products.status','=','1')
        ->get();
    }

    public function productosNuevos(){
        
        return  $producto = DB::table('products')
        ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
        ->join('stock','stock.id_product','=','products.PK_products')
        ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
        ->select('products.PK_products','products.SKU','products.name','products.description',
        'products.price','stock.avaible', 'products.status','products_images.image')
        ->where('products.status','=','1')
        ->where('_p_g_branches.PK_PG_branches','=','1')
        ->where('products.destacado','=','1')
        ->orderBy('products.PK_products', 'desc')
        ->limit(9)
        ->get();
    }



    public function productosCategoria(Request $request){

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $idCatPro = $request->id;
        
        if ($buscar==''){

            $producto = DB::table('products')
            ->join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('products_categories.PK_products_categories','=',$idCatPro)
            ->orderBy('products.PK_products', 'desc')->paginate(6);

        }
        else{
            $producto = DB::table('products')
            ->join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('products.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('products.PK_products', 'desc')->paginate(6);
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
  
    public function store(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');
        $rules = [
            'SKU' => 'required|unique:products',

        ];
    
        $customMessages = [
            'SKU.unique' => 'El SKU Ya es utilizado por otro producto favor de usar otro numero'
        ];
    
        $this->validate($request, $rules, $customMessages);

        $producto = new Product();
        $imagen = new ProductImage();

        $producto->SKU = $request->SKU;
        $producto->id_products_categories = $request->id_products_categories;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->destacado = '0';
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
        
        $sucursal = DB::table('_p_g_branches')
        ->select('PK_PG_branches as idBranches')
        ->get();

        $sucursal = $sucursal->toArray();
        var_dump($sucursal);

        foreach($sucursal as $branches){
            var_dump($branches);
            $stock = new Stock();
            $stock->id_product = $idProduc;
            $stock->id_PG_branches = $branches->idBranches;
            $stock->avaible = 0;
            $stock->status = 0;
            $stock->save();
        }
       
    }


    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id = $request->PK_products;

        $producto = Product::findOrFail($id);

        $producto->SKU = $request->SKU;
        $producto->id_products_categories = $request->id_products_categories;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        // $producto->avaible = $request->avaible;
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

    public function buscar(Request $request){
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $id_branch = $request->id_branch;

     
        if ($buscar==''){

            $producto = DB::table('products')
            ->join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('subcategories', 'subcategories.PK_subcategories', '=', 'products_categories.id_subcategories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('_p_g_branches.PK_PG_branches','=',$id_branch )
            ->orderBy('products.PK_products', 'desc')->paginate(6);

        }
        else{
            $producto = DB::table('products')
            -join('stock','stock.id_product','=','products.PK_products')
            ->join('products_categories', 'products_categories.PK_products_categories', '=', 'products.id_products_categories')
            ->join('products_images', 'products_images.id_product', '=', 'products.PK_products')
            ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','stock.id_PG_branches')
            ->select('products.PK_products','products.SKU','products.name','products.description',
            'products.price','stock.avaible', 'products.status','products_categories.PK_products_categories',
            'products_categories.name as productscategories','products_images.image')
            ->distinct()
            ->where('products.status','=','1')
            ->where('_p_g_branches.PK_PG_branches','=',$id_branch )
            ->where('products.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('products.PK_products', 'desc')->paginate(6);
        }
        

        return
        [
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
    public function infoDestacado(){
        
        return $producto=Product::where('products.destacado','=','1')
        ->count();


    }

    public function productsSubtraction(Request $request){
        $id = $request->PK_products;
        $producto = Product::findOrFail($id);
        $producto->avaible= $$request->avaible;
        $producto->save();
    }

    public function desactivarDestacados(Request $request)
    { 
        $id = $request->PK_products;
        $producto = Product::findOrFail($id);
        $producto->destacado = '0';
        $producto->save();
    }

   
    public function activarDestacados(Request $request)
    {
        $id = $request->PK_products;
        $producto = Product::findOrFail($id);
        $producto->destacado = '1';
        $producto->save();
    }

}
