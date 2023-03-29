  <!-- Modal Structure -->
   <div id="delete-{{ $user->id }}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza?</h4>
        <div class="row">
			<p> Tem certeza que deseja excluir {{ $user->nome}} ? </p>
        </div> 
       
        <form action="{{-- route('admin.user.delete', $user->id) --}}" method="POST">
        	@method('DELETE')
        	@csrf
	        <button type="submit" class=" waves-effect waves-green btn red right">Excluir</button><br>
        </form>
	</div> 
  </div>
