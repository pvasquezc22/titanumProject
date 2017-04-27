<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Departamento;
use DB;
//use App\Quotation;

class ControlerUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table("users")
                ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id', 'left outer')
                ->select('users.*', 'departamentos.abreviatura as departamento_abreviatura')
                ->get();
        /*$users = DB::table('users')
                ->join('departmentos', 'users.departmento_id', '=', 'departmentos.id')
                ->select('users.*', 'departmentos.name as dept_name')
                ->paginate(2);*/
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
        return view('usuarios.create',['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'carnet' => 'required|max:255|unique:users',
            'departamento_id' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed']);

        $user = new user;
        $user->name = $request->name;
        $user->carnet = $request->carnet;
        $user->departamento_id = $request->departamento_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('usuarios.index')->with('alert-success','Usuario creado');
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
        $this->validate($request,[
            'name' => 'required|max:255',
            'carnet' => 'required|max:255|unique:users,carnet,'.$id,
            'departamento_id' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.$id]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->carnet = $request->carnet;
        $user->departamento_id = $request->departamento_id;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('usuarios.index')->with('alert-warning','Usuario editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('alert-warning','Usuario eliminado');
    }
}