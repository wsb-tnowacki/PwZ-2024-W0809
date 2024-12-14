
@extends('template.szablon')
@section('tytul', 'Post')
@section('podtytul', 'Szczegóły posta')
@section('tresc')

        <div class="form-group">
            <label for="tytul">Tytuł</label>
            <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytuł posta" value="{{ $post->tytul }}" disabled>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Podaj autora posta" value="{{ $post->user->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Podaj email" value="{{ $post->user->email }}" disabled>
        </div>
        <div class="form-group">
            <label for="tresc">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc" rows="4" disabled>{{ $post->tresc }} </textarea>
        </div>
        <br>
<a href="{{route('post.index')}}"><button class="btn btn-primary form-btn m-1" type="button">Powrót do listy</button></a> 
<a href="{{route('post.edit', $post->id)}}"><button class="btn btn-success form-btn m-1" type="button">Edytuj</button></a> 
        

@endsection