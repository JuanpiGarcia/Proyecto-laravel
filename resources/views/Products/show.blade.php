@extends('layouts.app')
@section('content')

	<h1>id : {{$items->id}}</h1>
	<h1>{{$items->title}}</h1>
	<h1>{{$items->description}}</h1>
	<h1>{{$items->price}}</h1>
	<h1>{{$items->status}}</h1>

@endsection