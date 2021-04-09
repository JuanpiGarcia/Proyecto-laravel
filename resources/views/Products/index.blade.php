@extends('layouts.app')
@section('content')

	<h1>lista de los Productos</h1>
	<a class="btn btn-success mb-3" href="{{ route('products.create') }}"> Crear Producto</a>

	@if (empty($items))
		<div class="alert alert-warning">
			la lista esta vacia
		</div>
	@else
		<div class="table-responsive">
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Estado</th>
						<th>Accion</th>
					</tr>
				</thead>
					<tbody>
						@foreach ($items as $product)			
							<tr>
								<td>{{$product->id}}</td>
								<td>{{$product->title}}</td>
								<td>{{$product->description}}</td>
								<td>{{$product->pricee}}</td>
								<td>{{$product->stock}}</td>
								<td>{{$product->status}}</td>
								<td>
									<a class="btn btn-link" href="{{ route('products.show',['product'=>$product->id]) }}"> Mostrar </a>
									<a class="btn btn-link" href="{{ route('products.edit',['product'=>$product->id] )}}"> editar </a>

									<form method="POST" class="d-inline" action="{{ route('products.delete',['product'=>$product->id])}}">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-link">Eliminar</button>
										
									</form>
								</td> 
								
							</tr>			
						@endforeach
					</tbody>
			</table>
		</div>
	@endif
@endsection