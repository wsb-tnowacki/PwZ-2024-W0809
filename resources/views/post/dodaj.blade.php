@extends('template.szablon')
@section('tytul',"Dodanie postu")
@section('podtytul','Dodaj post')
@section('tresc')
<form action="{{ route('post.store') }}" method="post">
    @csrf
        <div class="form-group">
            <label for="tytul">Tytuł</label>
            <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytuł posta" value="{{ old('tytul') }}">
            @if($errors->get('tytul'))
            <div class="alert alert-danger">
                @foreach ($errors->get('tytul') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Podaj autora posta" value="{{ old('autor') }}">
            @if($errors->get('autor'))
            <div class="alert alert-danger">
                @foreach ($errors->get('autor') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Podaj email" value="{{ old('email') }}">
            @if($errors->get('email'))
            <div class="alert alert-danger">
                @foreach ($errors->get('email') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="tresc">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc" rows="4">{{ old('tresc') }} </textarea>
            @if($errors->get('tresc'))
            <div class="alert alert-danger">
                @foreach ($errors->get('tresc') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
        </div>
        <br>
        <button class="btn btn-primary form-btn" type="submit">Dodaj posta</button>
    </form>
@endsection
