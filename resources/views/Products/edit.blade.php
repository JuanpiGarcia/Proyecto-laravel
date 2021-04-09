@extends('layouts.app')
@section('content')

	<h1>edicion del formulario</h1>
	
	<form method="POST" action="{{route('products.update',['product' =>$items->id]) }}">
		@csrf
		@method('PUT')
		{{-- ?? = sino ... es como un "else"--}}
		{{-- si old tiene valor entonces muestra el valor ?? muestra el valor que acaba de poner --}}
		{{-- --}}
		<div class="form-row">
			<label >Titulo</label>
			<input class="form-control" type="text" name="title" value="{{ old('title') ?? $items->title}}" >
		</div>
		<div class="form-row">
			<label >Descripcion</label>
			<input class="form-control" type="text" name="description" value="{{ old('description') ?? $items->description}}" >
		</div>
		<div class="form-row">
			<label >Precio</label>
			<input class="form-control" type="number" min="1" name="pricee" value="{{ old('pricee') ?? $items->pricee}}" >
		</div>
		<div class="form-row">
			<label >Stock</label>
			<input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') ?? $items->stock}}" >
		</div>
		<div class="form-row">
			<label >Status</label>
			<select class="custom-select" name="status"  >
				{{-- si "old" de status tiene valor y es igual a disponible entonces selecciona, sino muestra el valor por defecto--}}
				<option {{ old('status') == 'disponible' ? 'selected' : 
						($items->status == 'disponible' ? 'selected' : '')}}
						 value="disponible">Disponible</option>

				<option {{ old('status') == 'nodisponible' ? 'selected' : 
						($items->status == 'nodisponible' ? 'selected' : '')}} 
						value="nodisponible">No Disponible</option>
			</select>
		</div>
		<div class="form-row mt-3" >
			<button type="submit" class="btn btn-primary btn-lg"> Actualizar</button>
		</div>


	</form>

@endsection