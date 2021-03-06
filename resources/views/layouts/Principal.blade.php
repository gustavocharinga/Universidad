<!DOCTYPE html>
<!--
Template Name: Overerts
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
    <link rel="icon" href="{{asset('images/Knowledge.ico')}}" type="image/ico"/>
    <title> Universidad Alejandro de Humboldt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>
        window.Laravel={csrfToken:'{{csrf_token()}}'}
    </script>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="top">
<div id="app">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
@guest
    <div class="bgded overlay home">
@else
        <div class="bgded overlay principalA">
            @endguest
    <!-- ################################################################################################ -->
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <!-- ################################################################################################ -->
            <div id="logo" class="fl_left">
                <h1><a><!--<img height="10" src="{{-- asset('images/UAH_LOGO_.png') --}}"/>-->UAH</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">

                    <li class="active"><a href="{{ route('home')}}">Inicio</a></li>
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><a class="nav-link" href="{{ route('cursos.index') }}">{{ __('Plan de Estudio') }}</a></li>
                        <li><a href="#">
                            @if(empty(Auth::user()->getEstudiante->cedula))
                            {{ Auth::user()->cedula }}
                                @else
                                {{ Auth::user()->getEstudiante->name }} {{ Auth::user()->getEstudiante->lastname }}
                                @endif
                                <span class="caret"></span>
                                <div class="fa fa-angle-down"></div>
                        </a>

                        <ul>
                            <li><a href="pages/full-width.html">Perfil</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                            <!--<li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                            <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
                            <li><a href="pages/basic-grid.html">Basic Grid</a></li>-->
                        </ul>
                    </li>
                    <!--<li><a class="drop" href="#">Dropdown</a>
                        <ul>
                            <li><a href="#">Level 2</a></li>
                            <li><a class="drop" href="#">Level 2 + Drop</a>
                                <ul>
                                    <li><a href="#">Level 3</a></li>
                                    <li><a href="#">Level 3</a></li>
                                    <li><a href="#">Level 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Level 2</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Link Text</a></li>
                    <li><a href="#">Link Text</a></li>-->
                    @endguest
                </ul>
            </nav>
            <!-- ################################################################################################ -->
        </header>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
        @guest
                    <sliders-imagen></sliders-imagen>
                @else

            @yield('content')

                @endguest

    <!-- ################################################################################################ -->
          @guest
        </div>
    @else
</div>
    @endguest
            <!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
{{-- comienzo <div class="wrapper row4">

    <main>
        @yield('content')
    </main>
    {{--<section class="hoc container clear">
        <!-- ################################################################################################ -->
        <!--<div class="center btmspace-80">
            <h2 class="heading nospace">Vehicula donec dignissim</h2>
            <p class="nospace">Varius porta maecenas vestibulum efficitur elit eu lacinia massa</p>
        </div>
        <ul class="nospace group services">
            <li class="one_third first">
                <article><a href="#"><i class="fa fa-500px"></i></a>
                    <h6 class="heading">Hendrerit quis lorem</h6>
                    <p>Iaculis sagittis sapien at porta justo rhoncus sed etiam et metus justo quisque&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><a href="#"><i class="fa fa-adjust"></i></a>
                    <h6 class="heading">Consectetur adipiscing</h6>
                    <p>Vulputate lorem eu laoreet orci blandit at nullam sed venenatis magna phasellus ac&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><a href="#"><i class="fa fa-empire"></i></a>
                    <h6 class="heading">Maecenas scelerisque</h6>
                    <p>Molestie odio a convallis purus donec lobortis eget ligula nec tincidunt vivamus ut&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
            <li class="one_third first">
                <article><a href="#"><i class="fa fa-medium"></i></a>
                    <h6 class="heading">Lectus ligula interdum</h6>
                    <p>Dolor in hac habitasse platea dictumst suspendisse porttitor justo nec mauris semper&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><a href="#"><i class="fa fa-scissors"></i></a>
                    <h6 class="heading">Varius nullam iaculis</h6>
                    <p>Libero luctus pellentesque vel pretium erat praesent id ante sed diam condimentum&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
            <li class="one_third">
                <article><a href="#"><i class="fa fa-share-alt"></i></a>
                    <h6 class="heading">Cursus ultrices integer</h6>
                    <p>A eros laoreet convallis fusce sollicitudin elit non velit eleifend consequat phasellus&hellip;</p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </article>
            </li>
        </ul>
        <!-- ################################################################################################ -->
        <!--<div class="clear"></div>-->
    </section>
</div> fin --}}
{{--comienzo de linea--<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="center btmspace-80">
            <h2 class="heading nospace">Pellentesque mattis euismod</h2>
            <p class="nospace">Semper donec commodo est at risus bibendum id hendrerit erat rhoncus duis varius</p>
        </div>
        <ul class="nospace group">
            <li class="one_half first btmspace-30">
                <article class="group">
                    <div class="one_half first"><a href="#"><img src="{{asset('images/320x240.png')}}" alt=""></a></div>
                    <div class="one_half">
                        <h3 class="heading font-x1">Vestibulum risus donec</h3>
                        <p>Dapibus curabitur consectetur sapien eget porttitor accumsan turpis dui commodo metus in tristique odio sem eu&hellip;</p>
                        <footer><a href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_half btmspace-30">
                <article class="group">
                    <div class="one_half first"><a href="#"><img src="{{asset('images/320x240.png')}}" alt=""></a></div>
                    <div class="one_half">
                        <h3 class="heading font-x1">Varius ac felis eget</h3>
                        <p>Sociosqu litora torquent per conubia nostra per inceptos himenaeos curabitur non libero quis ligula congue quis&hellip;</p>
                        <footer><a href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_half first btmspace-30">
                <article class="group">
                    <div class="one_half first"><a href="#"><img src="{{asset('images/320x240.png')}}" alt=""></a></div>
                    <div class="one_half">
                        <h3 class="heading font-x1">Quam proin nisl magna</h3>
                        <p>Dignissim id leo quis tempor sollicitudin purus proin sed sem ex morbi consequat ipsum eu justo porttitor aliquam&hellip;</p>
                        <footer><a href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_half btmspace-30">
                <article class="group">
                    <div class="one_half first"><a href="#"><img src="{{asset('images/320x240.png')}}" alt=""></a></div>
                    <div class="one_half">
                        <h3 class="heading font-x1">Sollicitudin aptent</h3>
                        <p>Taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos proin nulla nisi id pharetra nec ornare&hellip;</p>
                        <footer><a href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
        </ul>
        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/02.png');">
    <section class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="btmspace-80 center">
            <h2 class="heading nospace">Semper turpis eget</h2>
            <p class="nospace">Maximus arcu dictum a nunc molestie odio sit amet ipsum</p>
        </div>
        <ul class="nospace group">
            <li class="one_quarter first">
                <article class="excerpt"><a href="#"><img src="{{asset('images/320x320.png')}}" alt=""></a>
                    <div class="excerpttxt">
                        <h6 class="heading font-x1">Egestas consectetur</h6>
                        <p>Rhoncus lectus sed sagittis dictum phasellus tristique&hellip;</p>
                        <footer><a class="btn" href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_quarter">
                <article class="excerpt"><a href="#"><img src="{{asset('images/320x320.png')}}" alt=""></a>
                    <div class="excerpttxt">
                        <h6 class="heading font-x1">Aenean efficitur</h6>
                        <p>Eu fringilla maximus purus orci faucibus metus faucibus&hellip;</p>
                        <footer><a class="btn" href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_quarter">
                <article class="excerpt"><a href="#"><img src="{{asset('images/320x320.png')}}" alt=""></a>
                    <div class="excerpttxt">
                        <h6 class="heading font-x1">Blandit massa</h6>
                        <p>Lectus eu varius curabitur vestibulum vehicula massa&hellip;</p>
                        <footer><a class="btn" href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
            <li class="one_quarter">
                <article class="excerpt"><a href="#"><img src="{{asset('images/320x320.png')}}" alt=""></a>
                    <div class="excerpttxt">
                        <h6 class="heading font-x1">Sagittis curabitur</h6>
                        <p>Et eros eget ligula efficitur pulvinar et tortor morbi&hellip;</p>
                        <footer><a class="btn" href="#">Read More &raquo;</a></footer>
                    </div>
                </article>
            </li>
        </ul>
        <!-- ################################################################################################ -->
    </section>
</div>{{--fin de linea--}}
@guest
<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="one_third first">
            <h6 class="heading">Actividades Deportivas y Redes Sociales</h6>
            <ul>
                <li>Futbol</li>
                <li>Baloncesto</li>
                <li>Futbolito</li>
                <li>Softball</li>
                <li>Excursionismo</li>
                <li>Ajedréz</li>
            </ul>
            {{-- <p class="btmspace-15">sagittis tempor nullam iaculis dolor id condimentum cursus duis scelerisque ac metus amet laoreet vestibulum dictum.</p>--}}
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <!--<li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>-->
                <!--<li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
                <li><a class="faicon-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                <!--<li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                <!--<li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>-->
            </ul>
        </div>
        <div class="one_third">
            <h6 class="heading">Contactanos</h6>
            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        Sede Los Dos Caminos, Avenida Rómulo Gallegos, Caracas 1071, Miranda
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +58 (212) 794 0963 / 794 1869 </li>
                <li><i class="fa fa-phone"></i> +58 (212) 237 0568 / 239 7939</li>
                <!--<li><i class="fa fa-fax"></i> +00 (212) 239 7939</li>-->
                <li><i class="fa fa-envelope-o"></i> info@unihumboldt.edu.ve</li>
            </ul>
        </div>
        <!--<div class="one_third">
            <h6 class="heading">velit porttitor ac euismod</h6>
            <ul class="nospace linklist">
                <li>
                    <article>
                        <h2 class="nospace font-x1"><a href="#">ut porttitor sit amet</a></h2>
                        <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
                        <p class="nospace">nunc sed eget augue varius dapibus mi eget lobortis risus nunc a leo&hellip;</p>
                    </article>
                </li>
                <li>
                    <article>
                        <h2 class="nospace font-x1"><a href="#">finibus commodo ex eu</a></h2>
                        <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
                        <p class="nospace">pharetra nam sit amet lacus tempor ipsum finibus luctus sed fringilla&hellip;</p>
                    </article>
                </li>
            </ul>
        </div>-->
        <!-- ################################################################################################ -->
    </footer>
</div>
@endguest
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper quicklinks">
    <nav class="hoc clear">
        <!-- ################################################################################################ -->
       <!-- <ul class="nospace">
            <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Shop</a></li>
        </ul>-->
        <!-- ################################################################################################ -->
    </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2004 - 2018 - All Rights Reserved - <a href="#">Universidad Alejandro de Humboldt</a></p>
        <!--<p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>-->
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- JAVASCRIPTS -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.backtotop.js')}}"></script>
<script src="{{asset('js/jquery.mobilemenu.js')}}"></script>
<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationSpeed: 500,
            slideshowSpeed: 500,
            start: function(slider){
                slider.removeClass('loading');
            },
            after: function(slider){
                if(slider.currentSlide == 3){
                    slider.pause();
                    setTimeout(function(){
                        slider.play();
                    }, 5);
                }
            }
        });
    });
</script>

</body>
</html>