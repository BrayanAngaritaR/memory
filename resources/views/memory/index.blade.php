@extends('app')

@section('content')
<h1 class="display-4 lead mt-3 text-center">Asignación de memoria</h1>
<h4 class="lead mt-3 text-center">Asignación en memoria RAM</h4>
<div class="container mt-5">
	<div class="row">
		@foreach($ram as $item)
		<div class="col-sm-1">
			<span>[{{$loop->iteration-1}}]  {{ $item }}</span>
		</div>
		@endforeach
	</div>

	@php
	$count = 0;
	@endphp

	<h4 class="lead mt-3 mb-5 text-center">Asignación en memoria dinámica</h4>

	<div class="row">
		@if(count($virtual) < 0)
		No hay asignación de memoria porque aún no se superan los 64 bytes
		@else
			@foreach($virtual as $item)
			<div class="col-sm-1">
				<span>[{{$loop->iteration+63}}]  {{ $item }}</span>
				@php
				if($count == 63) break;
				$count++;
				@endphp
			</div>
			@endforeach
		@endif
	</div>


	<div class="mt-5 pt-4 mb-2 pb-2">
		<h4 class="lead">¿Quieres remover y asignar un nuevo valor?</h4>
	</div>

	<div class="mt-2 pt-5 align-item-center d-flex justify-content-center text-center">

		<form class="form-inline" method="POST" action="{{ route('memory.edit') }}">
			@csrf
			<div class="form-group mb-2">
				<select id="inputState" class="form-control mt-4" name="ram_or_virtual">
					<option value="0">¿En dónde?</option>
					<option value="ram">Memoria RAM</option>
					<option value="virtual">Memoria Virtual</option>
				</select>
			</div>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" > Posición </label>
				<input type="number" style="min-width: 100%;" min="0" max="127" class="form-control" name="position" id="inputPassword2" placeholder="0">
			</div>

			<div class="form-group mx-sm-3 mb-2">
				<label for="newValue" > Nuevo valor </label>
				<input type="text" style="min-width: 100%;" maxlength="1" class="form-control" name="newValue" id="newValue" placeholder="0">
			</div>

			<input type="hidden" name="content" value="{{$fread}}">

			<button type="submit" class="btn btn-primary mt-3">Cambiar valor</button>
		</form>
		
	</div>

	<div class="mt-5">
		<p class="text-justify">
			<b>El archivo contiene el siguiente texto:</b> {{$fread}}
		</p>
	</div>
</div>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>




	

