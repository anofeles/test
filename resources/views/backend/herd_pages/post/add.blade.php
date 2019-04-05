@extends('backend.layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="title" placeholder="title"><br>
        <textarea class="form-control" name="desc" placeholder="desc"></textarea><br>
        <input type="file" name="image"><br>
        @if (!empty($menu))
            <select name="menu"  class="form-control-sm form-control">
                <option value="0">menu item</option>
                @foreach($menu as $menuitem)
                    @if(!empty($menuitem->name))
                    <option value="{{$menuitem->uuid}}">{{$menuitem->name}}</option>
                    @endif
                @endforeach
            </select><br>
        @endif
        <label>მთავარი</label>
        <input type="checkbox" name="mtv" value="1"><br>
        <input type="date" name="created_at" placeholder="Date"><br>
        <button type="submit">add</button>
    </form>
    @endsection
