@extends('backend.layouts.app')

@section('content')
    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
            <tr>
                <th class="serial">ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Active</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $postitem)
                @if($postitem->title !== null)
                    <tr>
                        <td class="serial">{{$postitem->id}}</td>
                        <td>{{$postitem->title}}</td>
                        <td>{{$postitem->slug}}</td>
                        <td>{{$postitem->is_active}}</td>
                        @php
                            mb_internal_encoding("UTF-8");
                        $mystring = mb_substr($postitem->description,0,100);
                        @endphp
                        <td>{!! $mystring !!} ...</td>
                        <td>
                            <a href="{{route('text.delete.id',['Locale'=>$local,'id'=>$postitem->id])}}"><span class="badge badge-danger">Delete</span></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    {{ $post->links() }}
    @endsection
