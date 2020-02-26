<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Saint;
use App\Imagen;


class SSCharacters extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Saint::all();
        return view('saint.index')->with('datos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::user() && auth::user()->name == 'homer'){
            return view('saint.create');
        }else{
            return view('auth.login');
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'imagen' => 'required|mimes:jpeg,png,gif'
        ]);
        
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/image/character',$name); 
            //$file->storeAs('/image/character',$name);                      
        }

        $datos = new Saint();
        $datos->titulo = $request->titulo;
        $datos->imagen = $name;
        $datos->nombre = $request->nombre;
        $datos->constelacion = $request->constelacion;
        $datos->pais = $request->pais;
        $datos->edad = $request->edad;
        $datos->serie = $request->serie;
        $datos->clase = $request->clase;
        $datos->informacion = $request->informacion;
        $datos->slug = $request->constelacion;
        $datos->save();

        return redirect()->route('saint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Saint::where('slug',$id)->firstOrFail();
        $imagenes = Imagen::where('saint_slug',$id)->get();
        return view('saint.show')->with('datos',$datos)->with('imagenes',$imagenes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Saint::where('slug',$id)->firstOrFail();
        return view('saint.edit',compact('datos'));
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
         $datos = Saint::where('slug',$id)->firstOrFail();
         $datos->fill($request->except('imagen'));
         if($request->hasFile('imagen')){
             unlink(public_path().'/image/character/'.$datos->imagen);
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $datos->imagen = $name;
            $file->move(public_path().'/image/character/',$name);
         }
         $datos->save();
         
         $imagenes = Imagen::where('saint_slug',$id)->get();
         return view('saint.show')->with('datos',$datos)->with('imagenes',$imagenes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        //ELIMINAR IMAGENES CARRUSEL 
        $imagenes = Imagen::where('saint_id',$id)->get();
        foreach($imagenes as $imagen){
            $ruta = public_path().'/image/carrusel/'.$imagen->ruta;
            \File::delete($ruta);
            $imagen->delete();
        }

        //ELIMINAR SANTO
        $santo = Saint::find($id);
        $santoImagen = public_path().'/image/character/'.$santo->imagen;
        \File::delete($santoImagen);
        $santo->delete();

        return redirect()->route('saint.index');
    }
}
