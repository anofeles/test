@extends('thems.layout.index')

@section('section')
    @foreach($postdate as $postdateitem)
        @if(!empty($postdateitem->title))
            <a href="{{route('info.viuv',['locale'=>$postdateitem->locale,'slug'=>$postdateitem->slug,'id'=>$postdateitem->id])}}">
            <h3>{{$postdateitem->title}}</h3>
            </a>
            <p align="justify" style="line-height: 200%">
                @foreach($PAGECOVER as $PAGECOVERitem)
                    @if ($PAGECOVERitem->pivot->row_uuid == $postdateitem->uuid)
                        <img border="0" src="{{asset('/assets/media')}}/{{$PAGECOVERitem->media}}"
                             width="181"
                             height="216"
                             style="float: left; margin: 0px 20px 0px 0px;">
                    @endif
                @endforeach
            </p>
            @php
            $desc = substr($postdateitem->description,0,400);
            $desc = $desc . "...";
            @endphp
            <div class="clearfix">{!! $desc !!}</div>
            <p align="justify" style="line-height: 200%">&nbsp;</p>
        @endif
    @endforeach
@endsection
