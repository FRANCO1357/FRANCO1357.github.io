@extends('layouts.app')

@section('content')
    <header><h3>{{$contact->subject}}</h3></header>
    <div class="clearfix">
        <p><strong>Email:</strong>{{$contact->email}}</p>
        <p><strong>Testo:</strong>{{$contact->text}}</p>
        <p>Creato il: {{$contact->created_at}}</p>
    </div>
    <footer class="d-flex align-items-center justify-content-between mt-2">
        <div>
            <a class="btn btn-secondary" href="{{route('admin.contacts.index')}}"> 
                <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
            </a>
        </div>
    </footer>
@endsection