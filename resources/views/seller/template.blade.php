<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{csrf_token()}}" name="csrf-token">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>@yield('title') - Adestore</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/lnr-icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/iziToast/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
</head>

<body class="preload @yield('body_class')">
    <?php
        use App\Cart;
        use App\Notif;
    ?>
    <div class="menu-area">
        <!-- start .top-menu-area -->
        <div class="top-menu-area">
            @if(session()->has('success'))
                <div class="alert alert-success" style="padding: 15px;">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <strong>Sukses!</strong> {{session()->get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" style="padding: 15px;">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <strong>Error!</strong> {{session()->get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            @if(session()->has('warning'))
                <div class="alert alert-warning" style="padding: 15px;">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <strong>Warning!</strong> {{session()->get('warning')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            <!-- start .container -->
            <div class="container">
                <!-- start .row -->
                <div class="row">
                    <!-- start .col-md-3 -->
                    <div class="col-lg-3 col-md-3 col-6 v_middle">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('images/logo.png')}}" alt="logo image" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <!-- end /.col-md-3 -->

                    <!-- start .col-md-5 -->
                    <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                        <!-- start .author-area -->
                        <div class="author-area">
                            @if(Auth::check())
                            <?php
                                $data = Notif::where('id_user',Auth::user()->id_user)->orderBy('created_at',"desc")->limit(10)->get();
                                $count = Notif::where('id_user',Auth::user()->id_user)->where('readed',false)->orderBy('created_at',"desc")->count();
                                $message = Chat::conversations()->setUser(Auth::user())->limit(5)->page(1)->get();
                                $unread = Chat::messages()->setUser(Auth::user())->unreadCount();
                            ?>
                            <div class="author__notification_area">
                                <ul>
                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="lnr lnr-alarm"></span>
                                            @if($count > 0)
                                            <span class="notification_count noti">{{$count}}</span>
                                            @endif
                                        </div>

                                        <div class="dropdowns notification--dropdown">

                                            <div class="dropdown_module_header">
                                                <h4>Notifikasi</h4>
                                                <a href="{{url('')}}">Lihat Semua</a>
                                            </div>

                                            <div class="notifications_module">
                                                @forelse($data as $d)
                                                <a href="{{url('notif/'.$d->id_notif)}}">
                                                <div class="notification {{($d->readed)?'color_notif_readed':'color_notif_unreaded'}}">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="{{asset('images/notification_head.png')}}" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p>
                                                                <?= htmlspecialchars_decode($d->text_notif,ENT_QUOTES)?>
                                                            </p>
                                                            <p class="time">{{Carbon::parse($d->created_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                                @empty
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info" style="width: 100%;">
                                                            <p>
                                                                <b>Kosong</b>
                                                            </p>
                                                            <p class="time">Check lagi nanti!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                            </div>
                                            <!-- end /.dropdown -->
                                        </div>
                                    </li>

                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="lnr lnr-envelope"></span>
                                            @if($unread > 0)
                                            <span class="notification_count msg">{{$unread}}</span>
                                            @endif
                                        </div>

                                        <div class="dropdowns messaging--dropdown">
                                            <div class="dropdown_module_header">
                                                <h4>Kotak Pesan</h4>
                                                <a href="{{url('chat')}}">Lihat Semua</a>
                                            </div>

                                            <div class="messages">
                                                @forelse($message as $m)
                                                <?php
                                                    $messages = $m->messages;
                                                    $msg = $m->last_message;
                                                    $isnull = ($msg == null);
                                                ?>
                                                <a href="{{url('chat/'.$m->id)}}" class="message {{($isnull == false)?(($msg->is_seen)?'color_notif_readed':'color_notif_unreaded'):''}}">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{asset('images/notification_head4.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->

                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>{{($m->data)['title']}}</p>
                                                            </div>
                                                            <span class="time">{{Carbon::parse($m->updated_at)->diffForHumans()}}</span>
                                                            <p>
                                                                @if($isnull==false)
                                                                    @if($msg->sender == Auth::user())
                                                                        Kamu :
                                                                    @endif
                                                                @endif
                                                                {{($isnull==false)?substr($msg->body,0,30)."...":'Percakapan masih kosong...'}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                @empty
                                                <div class="message">
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>Kotak Pesan Kosong!</p>
                                                            </div>
                                                            <p>
                                                                Silahkan Check lagi nanti!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--start .author__notification_area -->

                            <!--start .author-author__info-->
                            <div class="author-author__info inline has_dropdown">
                                <div class="author__avatar">
                                    <img src="{{asset('images/usr_avatar.png')}}" alt="user avatar">

                                </div>
                                <div class="autor__info">
                                    <p class="name">
                                        {{Auth::user()->nama}}
                                    </p>
                                </div>

                                <div class="dropdowns dropdown--author">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('seller')}}">
                                                <span class="lnr lnr-home"></span>Menu Seller</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-cog"></span> Setting</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-dice"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                        </li>
                                        <li>
                                            <a href="{{url('logout')}}">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @else
                            <a href="{{url('account/login')}}" class="author-area__seller-btn" style="margin: 30px;">Login</a>
                            @endif
                            <!--end /.author-author__info-->
                        </div>
                        <!-- end .author-area -->

                        <!-- author area restructured for mobile -->
                        <div class="mobile_content ">
                            <span class="lnr lnr-user menu_icon"></span>

                            <!-- offcanvas menu -->
                            <div class="offcanvas-menu closed">
                                <span class="lnr lnr-cross close_menu"></span>
                                <div class="author-author__info">
                                    <div class="author__avatar v_middle">
                                        <img src="{{asset('images/usr_avatar.png')}}" alt="user avatar" style="border-radius: 50%;">
                                    </div>
                                    <div class="autor__info v_middle">
                                        <p class="name">
                                            Jhon Doe
                                        </p>
                                        <p class="ammount">$20.45</p>
                                    </div>
                                </div>
                                <!--end /.author-author__info-->

                                <div class="author__notification_area">
                                    <ul>
                                        <li>
                                            <a href="notification.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-alarm"></span>
                                                    <span class="notification_count noti">25</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="message.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-envelope"></span>
                                                    <span class="notification_count msg">6</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="cart.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-cart"></span>
                                                    <span class="notification_count purch">2</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--start .author__notification_area -->

                                <div class="dropdowns dropdown--author">
                                    <ul>
                                        <li>
                                            <a href="author.html">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.html">
                                                <span class="lnr lnr-home"></span> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-setting.html">
                                                <span class="lnr lnr-cog"></span> Setting</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">
                                                <span class="lnr lnr-dice"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">
                                                <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-upload.html">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-manage-item.html">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-withdrawal.html">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-center">
                                    <a href="signup.html" class="author-area__seller-btn inline">Become a Seller</a>
                                </div>
                            </div>
                        </div>
                        <!-- end /.mobile_content -->
                    </div>
                    <!-- end /.col-md-5 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->

    </div>
    <!-- end /.menu-area -->
    <!--================================
        END MENU AREA
    =================================-->
    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                            <li class="{{url()->current() == url('seller')?'active':''}}">
                                <a href="{{url('seller')}}">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <!-- <li>
                                <a href="dashboard-setting.html">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li> -->
                            <li class="{{(getCurrentRouteGroup()=='orders')?'active':''}}">
                                <a href="{{url('seller/orders')}}">
                                    <span class="lnr lnr-cart"></span>Pesanan</a>
                            </li>
                           <!--  <li>
                                <a href="dashboard-add-credit.html">
                                    <span class="lnr lnr-dice"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html">
                                    <span class="lnr lnr-chart-bars"></span>Statements</a>
                            </li>
                            <li>
                                <a href="dashboard-upload.html">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                            </li> -->
                            <li class="{{(getCurrentRouteGroup()=='items')?'active':''}}">
                                <a href="{{url('seller/items')}}"><span class="lnr lnr-briefcase"></span>Manage Items</a>
                            </li>
                            <li class="{{(getCurrentRouteGroup()=='withdrawal')?'active':''}}">
                                <a href="{{url('seller/withdrawal')}}">
                                    <span class="lnr lnr-briefcase"></span>Tarik Tunai</a>
                            </li>
                        </ul>
                        <!-- end /.dashboard_menu -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb">
                            <ul>
                                @section('breadcrumb')

                                @show
                            </ul>
                        </div>
                        <h1 class="page-title">@yield('breadcrumb_title')</h1>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>
        <div class="dashboard_contents">
            @section('content')

            @show
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->


    <!--================================
        START FOOTER AREA
    =================================-->
    <footer class="footer-area">
        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; {{date("Y")}}
                                <a href="{{url('/')}}">Adestore</a>. All rights reserved.
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="lnr lnr-chevron-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================================
        END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js -->
    <script src="{{asset('js/vendor/jquery/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('js/vendor/jquery/popper.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery/uikit.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/iziToast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('js/vendor/chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/grid.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.easing1.3.js')}}"></script>
    <script src="{{asset('js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('js/vendor/tether.min.js')}}"></script>
    <script src="{{asset('js/vendor/trumbowyg.min.js')}}"></script>
    <script src="{{asset('js/vendor/waypoints.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/map.js')}}"></script>
    <script type="text/javascript">
        function formatRupiah(angka){
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }
    </script>
    @section('js_addon')

    @show
    <!-- endinject -->
</body>

</html>