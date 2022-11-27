@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
       <h1>Lista delle lezioni</h1>
       <div class="d-flex align-items-center">
       <a class="btn btn-success ml-2" href="{{route('admin.lessons.create')}}">
           Crea nuova lezione <i class="fa-solid fa-square-plus"></i>
       </a>
       </div>
   </header>
    <table class="table table-striped table-dark">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Titolo</th>
           <th scope="col">Prezzo</th>
           <th scope="col">Creato il</th>
           <th scope="col">Modificato il</th>
           <th>Azioni</th>
         </tr>
       </thead>
       <tbody>
           @forelse ($lessons  as $lesson)
           <tr>
               <th scope="row">{{$lesson->id}}</th>
               <td>{{$lesson->title}}</td>
               <td>{{$lesson->price}}</td>
               <td>{{$lesson->created_at}}</td>
               <td>{{$lesson->updated_at}}</td>
               <td class="d-flex justify-content-end">
                   <a class="btn btn-sm btn-primary ml-2" href="{{route('admin.lessons.show', $lesson)}}"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
                   @if($lesson->user_id === Auth::id())
                   <a class="btn btn-sm btn-warning ml-2" href="{{route('admin.lessons.edit', $lesson)}}"><i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
                   <form action="{{route('admin.lessons.destroy', $lesson->id)}}" method="POST" class="delete-form">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-sm btn-danger ml-2" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
                   </form>
                   @endif
               </td>
             </tr> 
           @empty
               <tr>
                   <td colspan="9">
                       <h3 class="text-center">Nessuna lezione</h3>
                   </td>
               </tr>
           @endforelse
       </tbody>
     </table>

     <nav class="mt-3">
       @if ($lessons->hasPages())
           {{$lessons->links()}}
       @endif
     </nav>
@endsection