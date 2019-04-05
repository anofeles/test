@extends('backend.layouts.app')

@section('content')
    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
            <tr>
                <th class="serial">ID</th>
                <th>Title</th>
                <th>Img</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($glaeri as $glaeriitem)
                @if($glaeriitem->title !== null)
                    <tr>
                        <td class="serial">{{$glaeriitem->id}}</td>
                        <td>{{$glaeriitem->title}}</td>
                        <td>
                            @foreach($media as $mediaitem)
                                @if($mediaitem->pivot->row_uuid == $glaeriitem->uuid)
                                <img src="{{asset('assets/media/galeri')}}/{{$mediaitem->media}}">
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('galeri.edit.id',['Locale'=>$local,'id'=>$glaeriitem->id])}}"><span
                                        class="badge badge-complete">Complete</span></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    
    @if ($mid > 0)
        <form action="{{route('galeri.edit.id',['locale'=>$local,'mid'=>$galedit->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input class="form-control" type="text" name="galerititle" placeholder="title" value="{{$galedit->title}}"><br>
            <input type="hidden" name="galuuid" value="{{$galedit->uuid}}">
            <label>yda</label><br>
            @foreach($media as $mediaitem)
                @if($mediaitem->pivot->row_uuid == $galedit->uuid)
                    <img src="{{asset('assets/media/galeri')}}/{{$mediaitem->media}}" width="250">
                @endif
            @endforeach
            <input class="form-control-file" type="file" name="yda"><br>
            <label>img</label><br>
            @foreach($mediadam as $mediaitem)
                @if($mediaitem->pivot->row_uuid == $galedit->uuid)
                    <img  src="{{asset('assets/media/galeri')}}/{{$mediaitem->media}}" width="200" class="img"
                         data-object-id="{{$mediaitem->id}}"
                         data-url="{{route('galeri.img.edit.id',['Locale'=>$galedit->locale,'did'=>$mediaitem->id])}}"
                         data-model="damimg"
                    >
                @endif
            @endforeach
            <input class="form-control-file" type="file" name="img[]" multiple="multiple"><br>
            <button type="submit">Add</button>
        </form>
    @endif
@endsection
