
<!-- Modal Delete Automovel Confirm-->
@if (isset($automovel))
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar dica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja deletar a dica?</p>                            
            </div>
            <div class="modal-footer">                        
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <form action="{{ route('automovel.destroy',$automovel->id) }}" method="POST">                  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" >Sim</button>                                  
                </form>    
            </div>
            </div>
        </div>
    </div>    
@endif


<!-- Modal Delete User Confirm-->
@if (isset($user))
    <div class="modal fade" id="modalDelUserConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja deletar o usuário?</p>                            
            </div>
            <div class="modal-footer">                        
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">                  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" >Sim</button>                                  
                </form>    
            </div>
            </div>
        </div>
    </div>    
@endif
