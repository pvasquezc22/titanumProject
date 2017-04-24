<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Departamento;

class ControlerUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index',['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        $departamentos = Departamento::all();
        return view('auth.register',['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	/*
        $this->validate($request,['departamento_name'=>'required']);
        $departamento = new departamento;
        $departamento->name = $request->departamento_name;
        $departamento->save();
        return redirect()->route('departamento.index')->with('alert-success','Departamento creado');
        */
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$user = User::findOrFail($id);
        $departamentos = Departamento::all();
        return view('usuarios.edit',['user' => $user , 'departamentos' => $departamentos]);
        /*
        $departamento = Departamento::findOrFail($id);
        return view('departamento.edit',compact('departamento'));
        */
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
    	/*
        $this->validate($request,[
            'departamento_name'=>'required']);
        $departamento = Departamento::findOrFail($id);
        $departamento->name = $request->departamento_name;
        $departamento->save();
        return redirect()->route('departamento.index')->with('alert-warning','Departamento editado');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	/*
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamento.index')->with('alert-warning','Departamento eliminado');
        */
    }
}