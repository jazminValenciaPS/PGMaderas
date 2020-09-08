<?php

namespace App\Http\Controllers;
use App\Slider;
use Request as Peticion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return $slider;
    }

    public function mostrar()
    {
        $slider = Slider::where('status','=','1')->get();
        return $slider;
    }

   
    public function store(Request $request)
    {
        $slider = new Slider();
        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
        
        $slider->image = $nombreImagen;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
    }


    public function update(Request $request)
    {
        $id = $request->PK_slider;
        $slider  = Slider::findOrFail($id);

        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);

        File::delete('img/' . $slider->image);

        $slider->image = $nombreImagen;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = '1';
        $slider->save();
    }

    public function desactivar(Request $request)
    { 
        $id = $request->PK_slider;
        $slider = Slider::findOrFail($id);
        $slider->status = '0';
        $slider->save();
    }

   
    public function activar(Request $request)
    {
        $id = $request->PK_slider;
        $slider = Slider::findOrFail($id);
        $slider->status = '1';
        $slider->save();
    }
}
