<?php

namespace App\Http\Controllers;
use App\Models\ModelAutomovel;
use App\Models\User;

use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    private $user;
    private $automovel;

    public function __construct(){
        $this->user = new User();
        $this->automovel = new ModelAutomovel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automoveis = $this->automovel->all();
        // dd($this->automovel->find(2)->relUsers);
        return view('index', ['automoveis' => $automoveis]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dados = [
        //     'tipo'=>$request->tipo,
        //     'marca'=>$request->marca,
        //     'modelo'=>$request->modelo,
        //     'versao'=>$request->versao,
        // ];

        // dd($dados);
        $cadastro = $this->automovel->create([
            'id_user'=>1, //Usuário com ID: 1 (fixo)
            'tipo'=>$request->tipo,
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'versao'=>$request->versao,
        ]);

        if($cadastro){
            return redirect('/');
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
        //echo $id;
        $automovel = $this->automovel->find($id);
        $user = $this->automovel->find($id)->relUsers;
        return view('show', ['automovel' => $automovel, 'user' => $user]);
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
    }
}
