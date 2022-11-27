@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
       <h1>Lista messaggi</h1>
   </header>

    <table class="table table-striped table-dark">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Email</th>
           <th scope="col">Oggetto</th>
           <th scope="col">Data</th>
           <th></th>
         </tr>
       </thead>
       <tbody>
           @forelse ($contacts  as $contact)
           <tr>
               <th scope="row">{{$contact->id}}</th>
               <td>{{$contact->email}}</td>
               <td>{{$contact->subject}}</td>
               <td>{{$contact->created_at}}</td>
               <td class="d-flex justify-content-end">
                   <a class="btn btn-sm btn-primary ml-2" href="{{route('admin.contacts.show', $contact)}}"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
               </td>
             </tr> 
           @empty
               <tr>
                   <td colspan="9">
                       <h3 class="text-center">Nessun messaggio</h3>
                   </td>
               </tr>
           @endforelse
       </tbody>
     </table>

     <nav class="mt-3">
       @if ($contacts->hasPages())
           {{$contacts->links()}}
       @endif
     </nav>
@endsection