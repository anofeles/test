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
                <th>Locale</th>
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
                            <a href="{{route('menu.delete.id',['Locale'=>$local,'id'=>$menuitem->id])}}"><span class="badge badge-danger">Delete</span></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    {{ $menu->links() }}
@endsection
