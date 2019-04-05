<div class="moduletable_menu">
    <h3>Main Menu</h3>
    <ul class="nav menu">
        @foreach($menuall as $topMenuitem)
            @if($topMenuitem->target == '_left')
                @php($slug = str_replace(' ','_',$topMenuitem->name))
                <li class="item-123"><a href="{{route('categori.viu',['locale'=>$topMenuitem->locale,'catid'=>$topMenuitem->id,'slug'=>$slug])}}">{{$topMenuitem->name}}</a></li>
            @endif
        @endforeach
{{--        <li class="item-101 current active"><a href="#">Project Objectives</a></li>--}}
{{--        <li class="item-179"><a href="#">Time Plan</a></li>--}}
{{--        <li class="item-230 parent"><a href="#">Activities List &amp; Deliverables</a></li>--}}
    </ul>
    {!! $calendar !!}
</div>
