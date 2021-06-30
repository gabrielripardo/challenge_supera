<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(){
        $this->user = new User();        
    }
    
    public function auth(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('automovel.index'));
        }else{
            return redirect()->back()->with('danger', 'E-mail ou senha inválidos.');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(5);
        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = $this->user->create([
            'id'=>$request->id, 
            'name'=>$request->name,
            'email'=>$request->email,     
            'password'=>Hash::make($request->password),
        ]);

        if($cadastro){
            return redirect(route('users.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('users/create', compact('user'));
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
        $edicao = $this->user->where(['id' => $id])->update([            
            'name'=>$request->name,
            'email'=>$request->email,     
            'password'=>Hash::make($request->password), 
        ]);

        if($edicao){
            return redirect(route('users.index'));
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
        $delete = $this->user->destroy($id);
        
        if($delete){
            return redirect(url()->previous())
                ->with('success','Usuário deletado com sucesso.');            
        }
        return redirect(url()->previous())
            ->with('danger','Ocorreu um erro ao deletar o usuário.');
    }

    public function login(){        
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login.page'));
    }
}
