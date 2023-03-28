  <!-- Modal Structure -->
   <div id="delete-{{ $livro->id }}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza?</h4>
        <div class="row">
			<p> Tem certeza que deseja excluir {{ $livro->titulo }} ? </p>
        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a><br>
        <form action="{{ route('admin.livro.delete', $livro->id) }}" method="POST">
        	@method('DELETE');
        	@csrf
	        <button type="submit" class=" waves-effect waves-green btn red right">Excluir</button><br>
        </form>
	</div> 
  </div>
