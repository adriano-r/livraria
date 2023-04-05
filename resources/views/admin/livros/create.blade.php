
<!-- Modal Structure -->
<div id="create" class="modal">
	<div class="modal-content">
		<h4>
			<i class="material-icons">playlist_add_circle</i> Novo livro
		</h4>
		<form action="{{ route('admin.livro.store') }}" method="POST"
			enctype="multipart/form-data" class="col s12">
			@csrf
			
			<input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
			
			<div class="row">
				<div class="input-field col s6">
					<input name="titulo" id="first_name" type="text" class="validate">
					<label for="titulo">Titulo</label>
				</div>
				<div class="input-field col s6">
					<input name="disponivel" id="disponivel" type="number" class="validate">
					 <label	for="disponivel">Disponivel</label>
				</div>
				<div class="input-field col s6">
					<input name="descricao" id="descricao" type="text" class="validate"> 
					<label for="descricao">Descrição</label>
				</div>

				<div class="input-field col s12">
					<select name="id_categoria">
						<option value="" disabled selected>Escolha uma opção:</option>
						@foreach($categorias as $cat)
						<option value="{{ $cat->id }}">{{ $cat->nome }}</option>
						@endforeach
					</select> 
					<label>Categoria</label>
				</div>

				<div class="file-field input-field col s12">
					<div class="btn">
						<span>Imagem</span>
						<input name="imagem" type="file">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>

			</div>

			<button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button><br>
				
		</form>
	</div>
</div>
