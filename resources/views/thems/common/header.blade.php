
<script type="text/javascript">
    var big = '72%';
    var small = '53%';
    var bildauf = '/assets/img_sile/plus.png';
    var bildzu = '/assets/img_sile/minus.png';
    var rightopen = 'Open info';
    var rightclose = 'Close info';
    var altopen = 'is open';
    var altclose = 'is closed';
</script>


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>

<meta name="HandheldFriendly" content="true"/>

<meta name="apple-mobile-web-app-capable" content="YES"/>


<base/>

<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<meta name="author" content="Super User"/>

<meta name="generator" content="Joomla! - Open Source Content Management"/>

<title>Project Objectives</title>

<link href="index.html" rel="canonical"/>

<link href="{{asset('/assets/img_sile/favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<link rel="stylesheet" href="{{asset('/assets/css/system.css')}}" type="text/css"/>

<link rel="stylesheet" href="{{asset('/assets/css/position.css')}}" type="text/css" media="screen,projection"/>

<link rel="stylesheet" href="{{asset('/assets/css/layout.css')}}" type="text/css" media="screen,projection"/>

<link rel="stylesheet" href="{{asset('/assets/css/print.css')}}" type="text/css" media="print"/>

<link rel="stylesheet" href="{{asset('/assets/css/general.css')}}" type="text/css" media="screen,projection"/>

<link rel="stylesheet" href="{{asset('/assets/css/personal.css')}}" type="text/css" media="screen,projection"/>

<link rel="stylesheet" href="{{asset('/assets/css/module_default596d.css')}}" type="text/css"/>

<script src="{{asset('/assets/js/jquery.min.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/jquery-noconflict.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/jquery-migrate.min.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/caption.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/mootools-core.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/core.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/mootools-more.js')}}"type="text/javascript"></script>

<script src="{{asset('/assets/js/jui/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/md_stylechanger.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/hide.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/respond.src.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/template.js')}}" type="text/javascript"></script>

<script src="{{asset('/assets/js/acymailing_module5631.js')}}" type="text/javascript"></script>

<script type="text/javascript">

    jQuery(window).on('load', function () {

        new JCaption('img.caption');

    });

    window.setInterval(function () {
        var r;
        try {
            r = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {
        }
        if (r) {
            r.open("GET.html", "index.html", true);
            r.send(null)
        }
    }, 840000);

    var acymailing = Array();

    acymailing['NAMECAPTION'] = 'Name';

    acymailing['NAME_MISSING'] = 'Please enter your name';

    acymailing['EMAILCAPTION'] = 'E-mail';

    acymailing['VALID_EMAIL'] = 'Please enter a valid e-mail address';

    acymailing['ACCEPT_TERMS'] = 'Please check the Terms and Conditions';

    acymailing['CAPTCHA_MISSING'] = 'Please enter the security code displayed in the image';

    acymailing['NO_LIST_SELECTED'] = 'Please select the lists you want to subscribe to';


    if (window.jQuery) {

        jQuery(document).ready(function () {

            jQuery("#acymailing_fulldiv_formAcymailing78571").hide();

            jQuery("#acymailing_togglemodule_formAcymailing78571").click(function () {

                jQuery("#acymailing_fulldiv_formAcymailing78571").slideToggle("fast");

                jQuery("#acymailing_togglemodule_formAcymailing78571").toggleClass("acyactive");

            });

        });

    } else {

        window.addEvent('domready', function () {

            var mySlide = new Fx.Slide('acymailing_fulldiv_formAcymailing78571');

            mySlide.hide();

            try {

                var acytogglemodule = document.id('acymailing_togglemodule_formAcymailing78571');

            } catch (err) {

                var acytogglemodule = $('acymailing_togglemodule_formAcymailing78571');

            }


            acytogglemodule.addEvent('click', function (e) {

                if (mySlide.wrapper.offsetHeight == 0) {

                    acytogglemodule.className = 'acymailing_togglemodule acyactive';

                } else {

                    acytogglemodule.className = 'acymailing_togglemodule';

                }

                mySlide.toggle();

                try {

                    var evt = new Event(e);

                    evt.stop();

                } catch (err) {

                    e.stop();

                }

            });

        });

    }

</script>

<script type="text/javascript">

    (function () {

        var strings = {
            "TPL_BEEZ3_ALTOPEN": "is open",
            "TPL_BEEZ3_ALTCLOSE": "is closed",
            "TPL_BEEZ3_TEXTRIGHTOPEN": "Open info",
            "TPL_BEEZ3_TEXTRIGHTCLOSE": "Close info",
            "TPL_BEEZ3_FONTSIZE": "Font size",
            "TPL_BEEZ3_BIGGER": "Bigger",
            "TPL_BEEZ3_RESET": "Reset",
            "TPL_BEEZ3_SMALLER": "Smaller",
            "TPL_BEEZ3_INCREASE_SIZE": "Increase size",
            "TPL_BEEZ3_REVERT_STYLES_TO_DEFAULT": "Revert styles to default",
            "TPL_BEEZ3_DECREASE_SIZE": "Decrease size",
            "TPL_BEEZ3_OPENMENU": "Open Menu",
            "TPL_BEEZ3_CLOSEMENU": "Close Menu"
        };

        if (typeof Joomla == 'undefined') {

            Joomla = {};

            Joomla.JText = strings;

        } else {

            Joomla.JText.load(strings);

        }

    })();

</script>

<meta property="og:image" content="http://www.edrone.unisannio.it/images/ProjectDescription/moldova_5.jpg"/>

<meta property="og:site_name" content="Edrone"/>

<meta property="og:title" content="Home"/>

<meta property="og:type" content="article"/>

<meta property="og:url" content="http://www.edrone.unisannio.it/"/>

{{--    <script type="text/javascript" src="{{asset('/assets/js/acymailing_module5631.js')}}../apis.google.com/js/plusone.js">{--}}
{{--            lang: ''--}}
{{--        }</script>--}}


    <!--[if IE 7]>

<link href="{{asset('/assets/js/acymailing_module5631.js')}}" rel="stylesheet" type="text/css"/>

<![endif]-->

