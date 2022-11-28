@extends('layouts.app')

@section('content')
    @if (session('message'))
    <div class="alert alert-{{session('type') ?? 'info'}}">
        {{session('message')}}
    </div>
    @endif
    <header><h1>{{$lesson->title}}</h1></header>
    <div class="clearfix">
        <img class="float-left mr-2 img-fluid" width="400" src="{{$lesson->image}}" alt="{{$lesson->title}}">
        <p><strong>Descrizione: </strong>{{$lesson->description}}</p>
        <p><strong>Prezzo: </strong>{{$lesson->price}}€ / ora</p>
        <p>Creato il: {{$lesson->created_at}}</p>
        <p>Modificato il: {{$lesson->updated_at}}</p>
    </div>
    <footer class="d-flex align-items-center justify-content-between mt-2">
        <div>
            <a class="btn btn-secondary" href="{{route('admin.lessons.index')}}"> 
                <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a class="btn btn-warning" href="{{route('admin.lessons.edit', $lesson)}}">
                <i class="fa-solid fa-pencil mr-2"></i>Modifica
            </a>
            <form class="ml-2" action="{{route('admin.lessons.destroy', $lesson->id)}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
            </form>
        </div>
    </footer>
@endsection