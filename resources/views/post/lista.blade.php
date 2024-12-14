@extends('template.szablon')
@section('tytul',"Posty")
@section('podtytul','Lista postów')
@section('tresc')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Lp</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Autor</th>
        <th scope="col">Data utworzenia</th>
        @auth
        <th scope="col">Akcja</th>
        @endauth
      </tr>
    </thead>
    <tbody>
      @php($lp=1)
      
@isset($posty)
      @php($lp=$posty->firstItem())
      @if($posty->count())
      @foreach ($posty as $post)
      <tr>
        <th scope="row">{{ $lp++ }}</th>
        <td><a href="{{route('post.show',$post->id)}}">{{$post['tytul']}}</a></td>
        <td>{{$post->user->name}}</td>
        <td>{{date('j F Y H:i:s',strtotime($post->created_at))}}</td>
        @auth
        <td class="d-flex"><a href="{{route('post.edit', $post->id)}}"><button class="btn btn-success form-btn m-1" type="button">E</button></a> <form action="{{ route('post.destroy', $post->id) }}" method="POST"  onsubmit="return confirmDelete()">@csrf @method('DELETE') <button type="submit" class="btn btn-danger form-btn m-1">X</button></form></td>

        @endauth
      </tr>
      @endforeach
      @else
      <tr>
        <th scope="row" colspan="5">Nie ma żadnych postów</th>
      </tr>
      @endif
      @else
      <tr>
        <th scope="row" colspan="5">Nie ma żadnych postów</th>
      </tr>
      @endisset

    </tbody>
  </table>
  {{ $posty->links() }}
  <script>
    function confirmDelete() {
        return confirm("Czy na pewno chcesz usunąć ten post?");
    }
</script>
@endsection
