@extends('thems.layout.index')
@section('section')
    <!-- banner -->
{{--    @include('thems.components.banner')--}}
    <!-- //banner -->
    <!-- banner-bottom -->
    <div class="services">
        <div class="w3-best-services">
            <div class="container">
                <h4><b> {!! $info->title !!}</b></h4>
                <p style="line-height: 200%">
                    @foreach($PAGECOVER as $PAGECOVERitem)
                        @if ($PAGECOVERitem->pivot->row_uuid == $info->uuid)
                            <img border="0" src="{{asset('/assets/media')}}/{{$PAGECOVERitem->media}}" width="133" height="145"
                                 style="float: left; margin: 0px 10px 0px 0px;">
                        @endif
                    @endforeach

                </p>
                {!! $info->description !!}
            </div>
        </div>
    </div>

    <!-- //banner-bottom -->
@endsection
