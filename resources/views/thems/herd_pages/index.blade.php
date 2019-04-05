@extends('thems.layout.index')
@section('section')

    @foreach($menuall as $menuallitem)
        @if ($menuallitem->id == $catid )
            @if($menuallitem->type == "galeri")
                @php($galeri = 1)
            @else
                @php($galeri = 0)
            @endif
        @endif
    @endforeach
    @if(!isset($galeri) || $galeri == 0)
        <ul class="actions">
            <li class="print-icon">
                <a href="indexabf8.html?tmpl=component&amp;print=1&amp;page=" title="Print"
                   onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;"
                   rel="nofollow"><img src="{{asset('assets/media/images/printButton.png')}}" alt="Print"/></a></li>
        </ul>
        <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container">
                @isset($post)
                    @foreach($post as $toppostitem)
                        @if(!empty($toppostitem->title))
                            <h3>{{$toppostitem->title}}</h3>
                            <p align="justify" style="line-height: 200%">
                                @foreach($PAGECOVER as $PAGECOVERitem)
                                    @if ($PAGECOVERitem->pivot->row_uuid == $toppostitem->uuid)
                                        <img border="0" src="{{asset('/assets/media')}}/{{$PAGECOVERitem->media}}"
                                             width="181"
                                             height="216"
                                             style="float: left; margin: 0px 20px 0px 0px;">
                                    @endif
                                @endforeach
                            </p>
                            <div class="clearfix">{!! $toppostitem->description !!}</div>
                            <p align="justify" style="line-height: 200%">&nbsp;</p>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        {{--@isset($menu)
            <div class="services">
                <div class="w3-best-services">
                    @foreach($menu as $menuitem)
                        <div class="container">
                            <p style="line-height: 200%">
                                @foreach($PAGECOVER as $PAGECOVERitem)
                                    @if ($PAGECOVERitem->pivot->row_uuid == $menuitem->uuid)
                                        <img border="0" src="{{asset('/assets/media')}}/{{$PAGECOVERitem->media}}"
                                             width="133" height="145" style="float: left; margin: 0px 10px 0px 0px;">
                                    @endif
                                @endforeach
                                <font color="#5CB85C"><b>{!! $menuitem->title !!}</b></font>
                            </p>
                            {!! $menuitem->description !!}
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        @endisset--}}
    @else
        @include('thems.components.galeri')
    @endif
@endsection
