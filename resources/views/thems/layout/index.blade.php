<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<!-- Mirrored from www.edrone.unisannio.it/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 14:52:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<hed>
    @include('thems.common.header')
</hed>
<body id="shadow">
<div id="all">
    <div id="back">
        <header id="header">
            @include('thems.components.top')
        </header><!-- end header -->
        <div id="contentarea">
            <div id="breadcrumbs">
            </div>
            <nav class="left1 leftbigger" id="nav">
                @include('thems.components.left')
                <div id="area-3" class="tabouter">
                    @include('thems.components.user')
                </div>
            </nav><!-- end navi -->
            <div id="wrapper2">
                <div id="main">
                    <div id="system-message-container">
                    </div>
                    <article class="item-page">
                        @yield('section')
                    </article>
                </div><!-- end main -->
            </div><!-- end wrapper -->
            <div class="wrap"></div>
        </div> <!-- end contentarea -->
    </div><!-- back -->
</div><!-- all -->
<div id="footer-outer">
    @include('thems.common.footer')
</div>
</body>
<!-- Mirrored from www.edrone.unisannio.it/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 14:54:19 GMT -->
</html>

