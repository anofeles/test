<div class="logoheader">
    <h1 id="logo"><span class="header1"></span></h1>
</div><!-- end logoheader -->

<ul class="nav menu">
    @foreach($menuall as $topMenuitem)
        @if($topMenuitem->target == '_top')
            @php($slug = str_replace(' ','_',$topMenuitem->name))
            <li class="item-123"><a href="{{route('categori.viu',['locale'=>$topMenuitem->locale,'catid'=>$topMenuitem->id,'slug'=>$slug])}}">{{$topMenuitem->name}}</a></li>
        @endif
    @endforeach
    {{--    <li class="item-123"><a href="#">Home</a></li>--}}
    {{--    <li class="item-124"><a href="#">News</a></li>--}}
    {{--    <li class="item-122"><a href="#">Events</a></li>--}}
    {{--    <li class="item-125"><a href="#">Testimonials</a></li>--}}
    {{--    <li class="item-147"><a href="#">Gallery</a></li>--}}
    {{--    <li class="item-248"><a href="#">Video Gallery</a></li>--}}
    {{--    <li class="item-249"><a href="#">CTT Courses</a></li>--}}
    {{--    <li class="item-126"><a href="#">Contacts</a></li>--}}
    {{--    <li class="item-247"><a href="#">Upload File</a></li>--}}
        <div style="margin-left: 770px; margin-top: -35px; position: absolute;">
            <form method="post" action="{{route('post.serch',['locale'=>'ka'])}}">
                @csrf
                <input type="text" name="search">
                <button type="submit">search</button>
            </form>
        </div></ul>

<div id="line">

    <div id="fontsize"></div>
    <h3 class="unseen">Search</h3>
</div>
