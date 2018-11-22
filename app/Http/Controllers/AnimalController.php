<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $ListaAnimales=LAnimales::orderBy('id','DESC')->paginate(3);
        return view('LAnimales.index',compact('ListaAnimales')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('LAnimales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[ 'nombre'=>'required', 'raza'=>'required', 'color'=>'required', 'edad'=>'required', 'animal_id'=>'required']);
        LAnimales::create($request->all());
        return redirect()->route('LAnimales.index')->with('success','Registro creado satisfactoriamente');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ListaAnimales=LAnimales::find($id);
        return  view('LAnimales.show',compact('ListaAnimales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $LAnimales=LAnimales::find($id);
        return  view('LAnimales.edit',compact('LAnimales'));
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
        //
         $this->validate($request,[ 'nombre'=>'required', 'raza'=>'required', 'color'=>'required', 'edad'=>'required', 'animal_id'=>'required']);
 
        LAnimales::find($id)->update($request->all());
        return redirect()->route('LAnimales.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         LAnimales::find($id)->delete();
        return redirect()->route('LAnimales.index')->with('success','Registro eliminado satisfactoriamente');
    }
public function getAnimales(){
        $ListaAnimales=LAnimales::all();
        return response()->json($ListaAnimales);
    }
}
