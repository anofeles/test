@extends('backend.layouts.app')

@section('content')
<form method="post">
    @csrf
    <input class="form-control" type="text" name="title" placeholder="title"><br>
    {{--<select name="mtav"  id="selectSm" class="form-control-sm form-control">
        <option  value="0">მშობელი</option>
        @foreach($topMenu as $topMenuitem)
            <option value="{{$topMenuitem->id}}">{{$topMenuitem->name}}</option>
        @endforeach
    </select><br>--}}
    <select name="targ"  id="selectSm" class="form-control-sm form-control">
        <option value="_top" >Top</option>
        <option value="_left" >Left</option>
    </select><br>
    <select name="type"  id="selectSm" class="form-control-sm form-control">
            <option value="page" >ტექსტი</option>
            <option value="galeri" >გალერეა</option>
    </select><br>
    <button type="submit">add</button>
</form>
    @endsection
