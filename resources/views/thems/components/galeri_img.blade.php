@extends('thems.layout.index')
@section('section')
{{--    @include('thems.components.banner')--}}
    <div class="services">
        <div class="w3-best-services">
            <div class="container">
                @foreach($mediaimg as $mediaimgitem)
                    <a href="{{asset('/assets/media/galeri')}}/{{$mediaimgitem->media}}" rel="shadowbox[images]"><img style="margin-top: 10px" src="{{asset('/assets/media/galeri')}}/{{$mediaimgitem->media}}" width="300"></a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
