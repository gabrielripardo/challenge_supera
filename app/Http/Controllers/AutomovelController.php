<?php

namespace App\Http\Controllers;
use App\Http\Requests\AutomovelRequest;
use App\Models\ModelAutomovel;
use App\Models\ModelTipo;
use App\Models\User;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    private $user;
    private $automovel;

    public function __construct(){
        $this->user = new User();
        $this->automovel = new ModelAutomovel();
        $this->tipo = new ModelTipo();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automoveis = $this->automovel->orderBy('id', 'desc')->paginate(5);       
        //order by id 

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
        $tipos = $this->tipo->all();
        return view('create', ['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutomovelRequest $request)
    {
        // $dados = [
        //     'tipo'=>$request->tipo,
        //     'marca'=>$request->marca,
        //     'modelo'=>$request->modelo,
        //     'versao'=>$request->versao,
        // ];

        $cadastro = $this->automovel->create([
            'id_user'=>$request->id_automovel, //Usuário com ID: 1 (fixo)
            'id_tipo'=>$request->tipo,
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
        $tipo = $this->automovel->find($id)->relTipos;
        return view('show', ['automovel' => $automovel, 'user' => $user, 'tipo' => $tipo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'ID: '.$id;
        $automovel = $this->automovel->find($id);
        $tipos = $this->tipo->all();        
        return view('create', ['automovel' => $automovel, 'tipos' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutomovelRequest $request, $id)
    {
        
        $edicao = $this->automovel->where(['id' => $id])->update([
            'id_user'=>$id,
            'id_tipo'=>$request->tipo,
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'versao'=>$request->versao,
        ]);

        if($edicao){
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $delete = $this->automovel->destroy($id);
        
        if($delete){
            return redirect(url()->previous())
                ->with('success','Dica deletada com sucesso.');            
        }
        return redirect(url()->previous())
            ->with('danger','Ocorreu um erro ao deletar a dica.');
        
    }

    public function search(Request $request)
    {
        $vars = [];
        $filters = $request->except('_token');
        $automoveis = $this->automovel;
        
        //dd("pesquisando por {$request->search}");
        if(isset($request->id_user)){
            $vars["id"] = $request->id_user;
            $automoveis = $automoveis//->where('id_user', '=', $request->id_user)
                        ->orwhere('marca', 'LIKE', "%{$request->keyword}%");            
        }else{
           $automoveis = $automoveis->where('marca', 'LIKE', "%{$request->keyword}%");
        }   
             $automoveis = $automoveis->orWhere('modelo', 'LIKE', "%{$request->keyword}%")                        
                        ->orWhere('versao', 'LIKE', "%{$request->keyword}%")                        
                        ->orWhere(function ($query) {
                            $query->select('nome')
                                  ->from('tipos')
                                  ->whereColumn('automoveis.id_tipo', 'id');
                        },'LIKE', "%{$request->keyword}%")
                        ->orderBy('id', 'desc')
                        ->paginate(5);
                        //->toSql();                                                                                                                          
        // dd($automoveis);
        $vars['automoveis'] = $automoveis;
        $vars['filters'] = $filters;
        
        return view('index', $vars);        
    }
    public function mydicas($id){
        $automoveis = $this->automovel->where('id_user', '=', $id)   
                    ->orderBy('id', 'desc')                 
                    ->paginate(5);                
        //order by id 

        // dd($this->automovel->find(2)->relUsers);
        return view('index', ['automoveis' => $automoveis, 'id' => $id]);
    }
}
