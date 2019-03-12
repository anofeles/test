<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">


<!-- Mirrored from www.edrone.unisannio.it/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 14:52:03 GMT -->

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->

<head>
    @include('thems.common.header')
</head>

<body id="shadow">


<div id="all">

    <div id="back">

        <header id="header">

            @include('thems.components.top_img')

            <ul class="skiplinks">

                <li><a href="#main" class="u2">Skip to content</a></li>

                <li><a href="#nav" class="u2">Jump to main navigation and login</a></li>

            </ul>

            <h2 class="unseen">Nav view search</h2>

            <h3 class="unseen">Navigation</h3>
            <p align="center"><b>

                </b></p>

            <ul class="nav menu">
                @include('thems.components.top_menu')
            </ul>

            <div id="line">

                <div id="fontsize"></div>

                <h3 class="unseen">Search</h3>

            </div>

        </header><!-- end header -->

        <div id="contentarea">

            <div id="breadcrumbs">

            </div>

            <nav class="left1 leftbigger" id="nav">

                <div class="moduletable_menu">
                    @include('thems.components.left_menu')
                </div>


                <div class="moduletable_js ">
                    @include('thems.components.news')
                </div>

                <div id="area-3" class="tabouter">
                    @include('thems.components.form')
                </div>

            </nav><!-- end navi -->


            <div id="wrapper2">

                @yield('content')

            </div><!-- end wrapper -->


            <div class="wrap"></div>

        </div> <!-- end contentarea -->

    </div><!-- back -->

</div><!-- all -->

@include('thems.common.footer')
</body>
<!-- Mirrored from www.edrone.unisannio.it/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 14:54:19 GMT -->

</html>

