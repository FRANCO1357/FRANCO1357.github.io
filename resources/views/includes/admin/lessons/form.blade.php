@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif


@if ($lesson->exists )
<form action="{{route('admin.lessons.update', $lesson)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
<form action="{{route('admin.lessons.store')}}" method="POST" enctype="multipart/form-data">
@endif

    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $lesson->title)}}" required minlength="5" maxlength="50">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="price">Prezzo in € all'ora</label>
                <input type="text" class="form-control" id="price" name="price" value="{{old('price', $lesson->price)}}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Descrizione</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description', $lesson->description)}}">
              </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{old('image', $lesson->image)}}">
              </div>
        </div>
    </div>
<hr>
<footer class="d-flex justify-content-between">
    <a class="btn btn-secondary" href="{{route('admin.lessons.index')}}">
        <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-floppy-disk mr-2"></i>Salva
    </button>
</footer>
</form> 