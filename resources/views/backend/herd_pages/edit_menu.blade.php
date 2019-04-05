@extends('backend.layouts.app')

@section('content')
    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
            <tr>
                <th class="serial">ID</th>
                <th class="avatar">Name</th>
                <th>Type</th>
                <th>Sort</th>
                <th>Local</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menu as $menuitem)
                @if($menuitem->name !== null)
            <tr>
                <td class="serial">{{$menuitem->id}}</td>
                <td class="avatar">{{$menuitem->name}}</td>
                <td>{{$menuitem->type}}</td>
                <td>{{$menuitem->sort}}</td>
                <td>{{$menuitem->locale}}</td>
                <td>
                    <a href="{{route('menu.edit.id',['Local'=>$local,'id'=>$menuitem->id])}}"><span class="badge badge-complete">Complete</span></a>
                </td>
            </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    {{ $menu->links() }}
    @if($mid > 0)
<form method="post">
    @csrf
    <input class="form-control" type="text" name="title" placeholder="title" value="{{$menu_edit->name}}"><br>
    <input class="form-control" type="text" name="sort" placeholder="title" value="{{$menu_edit->sort}}"><br>
    <input type="hidden" name="uuid" value="{{$menu_edit->uuid}}">
    <input type="hidden" name="type" value="{{$menu_edit->type}}">
    <select name="targ"  id="selectSm" class="form-control-sm form-control">
        <option value="_top" @if ($menu_edit->target == '_top') selected="selected" @endif>Top</option>
        <option value="_left" @if ($menu_edit->target == '_left') selected="selected" @endif>Left</option>
    </select><br>
    <select name="type"  id="selectSm" class="form-control-sm form-control">
        <option value="page" @if ($menu_edit->type == 'page') selected="selected" @endif>ტექსტი</option>
        <option value="galeri"  @if ($menu_edit->type == 'galeri') selected="selected" @endif>გალერეა</option>
    </select><br>
    <button type="submit">add</button>
</form>
    @endif
@endsection
