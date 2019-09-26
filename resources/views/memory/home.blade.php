@extends('app')

@section('content')
<div class="form-group container mt-5">
	<form action="{{route('memory.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
		<div class="custom-file">
			<input type="file" class="custom-file-input @error('ram_or_virtual') is-invalid @enderror" name="text" id="customFile" required="">
			<label class="custom-file-label" for="customFile">Seleccionar archivos</label>
			<button type="submit" class="btn btn-outline-dark mt-2">Subir archivo</button>
		</div>

		@error('text')
			<span class="invalid-feedback" role="alert">
				<strong>Debes subir un archivo</strong>
			</span>
     	@enderror
	</form>
</div>
@endsection