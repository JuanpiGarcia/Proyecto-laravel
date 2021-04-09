@extends('layouts.app')
@section('content')

	<h1>creacion del formulario</h1>
	
	<form method="POST" action="{{route('products.store')}}">
		@csrf
		{{-- el value de "old" recupera el dato introducido anteriormente--}}
		<div class="form-row">
			<label >Titulo</label>
			<input class="form-control" type="text" name="title" value="{{old('title')}}">
		</div>
		<div class="form-row">
			<label >Descripcion</label>
			<input class="form-control" type="text" name="description" value="{{old('description')}}">
		</div>
		<div class="form-row">
			<label >Precio</label>
			<input class="form-control" type="number" min="1" name="pricee" value="{{old('pricee')}}">
		</div>
		<div class="form-row">
			<label >Stock</label>
			<input class="form-control" type="text" min="0" name="stock" value="{{old('stock')}}">
		</div>
		<div class="form-row">
			<label >Estado</label>
			<select class="custom-select" name="status" >
				<option value="" selected>Selecciona</option>
				<option {{old('status') == 'disponible' ? 'selected' : ''}} value="disponible">Disponible</option>
				<option {{old('status') == 'nodisponible' ? 'selected' : ''}} value="nodisponible">No Disponible</option>
			</select>
		</div>
		<div class="form-row mt-3">
			<button type="submit" class="btn btn-primary btn-lg"> Guardar</button>
		</div>


	</form>

@endsection