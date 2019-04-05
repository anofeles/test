@extends('backend.layouts.app')

@section('content')
    <form action="{{route('galeri.add',['locale'=>$local])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input class="form-control" type="text" name="galerititle" placeholder="title"><br>
        <label>yda</label><br>
        <input class="form-control-file" type="file" name="yda"><br>
        <label>img</label><br>
        <input class="form-control-file" type="file" name="img[]" multiple="multiple"><br>
        <button type="submit">Add</button>
    </form>
@endsection
