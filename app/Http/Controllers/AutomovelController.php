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
        $automoveis = $this->automovel->paginate(1);       
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
        $filters = $request->except('_token');

        $tipos = $this->tipo->find('Carro');
        // $tipo = $automovel->find($automovel->id)->relTipos


        // $tipos = $this->tipo->join('tipos')
        //     ->leftJoin('automoveis', 'tipos.id', '=', 'automoveis.id_tipo')
        //     ->get();
        
        // dd($tipos);

        //dd("pesquisando por {$request->search}");
        $automoveis = $this->automovel->where('marca', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('modelo', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('versao', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('id_tipo', 'LIKE', "%{$request->keyword}%")
                        ->orWhere(function ($query) {
                            $query->select('nome')
                                  ->from('tipos')
                                  ->whereColumn('automoveis.id_tipo', 'id');
                        },'LIKE', "%{$request->keyword}%")
                        //order by id
                        
                        ->paginate(1);

        //dd($automoveis);
        return view('index', ['automoveis' => $automoveis, 'filters' => $filters]);        
    }
    public function mydicas($id){
        $automoveis = $this->automovel->where('id_user', '=', $id)                    
                    ->paginate(1);                
        //order by id 

        // dd($this->automovel->find(2)->relUsers);
        return view('index', ['automoveis' => $automoveis, 'id' => $id]);
    }
}
