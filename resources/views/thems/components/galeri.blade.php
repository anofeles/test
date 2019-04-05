<div class="services">
    <div class="w3-best-services">
        <div class="container">

            @foreach($GALERI as $GALERIitem)
                <div class="bnaer">
                    <img src="{{asset('/assets/media/galeri')}}/{{$GALERIitem->media}}" width="300">
                    @foreach($glaeri as $glaeriitem)
                        @if($GALERIitem->pivot->row_uuid == $glaeriitem->uuid)
                            <a href="{{route('page.galeri',['locale'=>$glaeriitem->locale,'gid'=>$glaeriitem->id,'slug'=>$glaeriitem->slug])}}">
                                <p>{{$glaeriitem->title}}</p></a>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
