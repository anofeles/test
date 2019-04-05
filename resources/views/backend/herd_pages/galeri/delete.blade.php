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
                            <a href="{{route('galeri.delete.id',['Locale'=>$local,'mid'=>$glaeriitem->id])}}"><span
                                        class="badge badge-complete">Complete</span></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
    @endsection
