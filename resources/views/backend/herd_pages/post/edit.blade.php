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
                            <a href="{{route('text.edit.id',['Locale'=>$local,'id'=>$postitem->id])}}"><span
                                        class="badge badge-complete">Complete</span></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    {{ $post->links() }}
    @if($mid > 0)
        <form method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="text" name="title" placeholder="title" value="{{$editpost->title}}" ><br>
            <input type="hidden" name="postuuid" value="{{$editpost->uuid}}">
            <textarea class="form-control" name="desc" placeholder="desc">{!! $editpost->description !!}</textarea><br>
           @isset($media->media) <p>{{$media->media}}</p>@endif
            <input type="file" name="image"><br>
            @if (!empty($menu))
                <select name="menu" class="form-control-sm form-control">
                    <option value="0">menu item</option>
                    @foreach($menu as $menuitem)
                        @if(!empty($menuitem->name))
                            <option
                                    @if(isset($postmenu->menu_uuid) && $postmenu->menu_uuid == $menuitem->uuid)
                                    selected="selected"
                                    @endif
                                    value="{{$menuitem->uuid}}">{{$menuitem->name}}</option>
                        @endif
                    @endforeach
                </select><br>
            @endif
            <label>მთავარი</label><br>
            <input  type="checkbox" name="mtv"
            @if ($editpost->is_comment_on == 1)
                checked="checked"
            @endif
            ><br>
            @php($tvisbolodge =  date("Y-m-d", strtotime($editpost->created_at) ))
            <input type="date" name="created_at" value="{{$tvisbolodge}}"><br>
            <button type="submit">Submit</button>
        </form>
    @endif
@endsection
