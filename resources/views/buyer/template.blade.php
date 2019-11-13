<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
</head>

<body class="preload @yield('body_class')">
    <?php
        use App\Cart;
        use App\Notif;
        use App\Item;
        use App\KategoriItem;
    ?>
    <!--================================
        START MENU AREA
    =================================-->
    <!-- start menu-area -->
    
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
                                $carts = Cart::where('id_user',Auth::user()->id_user)->with('ritem')->limit(5)->get();
                                $cartc = Cart::where('id_user',Auth::user()->id_user)->count();
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
                                                <a href="{{url('notif')}}">Lihat Semua</a>
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
                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="lnr lnr-cart"></span>
                                            @if($cartc > 0)
                                            <span class="notification_count purch">{{$cartc}}</span>
                                            @endif
                                        </div>

                                        <div class="dropdowns dropdown--cart">
                                            <div class="cart_area">
                                                @forelse($carts as $c)
                                                <div class="cart_product">
                                                    <div class="product__info">
                                                        <div class="thumbn">
                                                            <img src="{{asset('images/capro1.jpg')}}" alt="cart product thumbnail">
                                                        </div>

                                                        <div class="info">
                                                            <a class="title" href="{{url('i/'.$c->ritem->id_item)}}">{{$c->ritem->nama_item}}</a>
                                                            <div class="cat">
                                                                <a href="#">
                                                                    <img src="images/catword.png" alt="">Wordpress</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product__action">
                                                        <a href="{{url('c/delete/'.$c->ritem->id_item)}}">
                                                            <span class="lnr lnr-trash"></span>
                                                        </a>
                                                        <p>{{formatRupiah($c->ritem->harga_item)}}</p>
                                                    </div>
                                                </div>
                                                @empty

                                                <div class="cart_product">
                                                    <div class="product__info">
                                                        <div class="info">
                                                            <a class="title" href="">Kosong!</a>
                                                        </div>
                                                    </div>

                                                    <div class="product__action">
                                                    </div>
                                                </div>
                                                @endforelse
                                                @if($cartc > 5)
                                                <div class="total">
                                                    <p>Dan masih banyak lagi</p>
                                                </div>
                                                @endif
                                                @if($cartc>0)
                                                <div class="cart_action">
                                                    <a class="go_cart" href="{{url('cart')}}">Lihat Keranjang</a>
                                                    <a class="go_checkout" href="{{url('checkout')}}">Checkout</a>
                                                </div>
                                                @endif
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
        @if(getCurrentRouteGroup() != 'chat' && url()->current() != url('notif'))
        <!-- start .mainmenu_area -->
        <div class="mainmenu">
            <!-- start .container -->
            <div class="container">
                <!-- start .row-->
                <div class="row">
                    <!-- start .col-md-12 -->
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <!-- start mainmenu__search -->
                            <div class="mainmenu__search">
                                <form action="#">
                                    <div class="searc-wrap">
                                        <input type="text" placeholder="Search product">
                                        <button type="submit" class="search-wrap__btn">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- start mainmenu__search -->
                        </div>

                        <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    @if(!Auth::check())
                                    <li>
                                        <a href="{{url('/')}}">home</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{url('i')}}">Semua Produk</a>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="index.html">Kategori</a>
                                        <div class="dropdowns dropdown--menu">
                                            <ul>
                                                @forelse(KategoriItem::all() as $k)
                                                <li>
                                                    <a href="{{url('i'."?kategori=".$k->slug)}}">{{$k->nama_kategori}}</a>
                                                </li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- <li class="has_megamenu">
                                        <a href="#">Elements</a>
                                        <div class="dropdown_megamenu contained">
                                            <div class="megamnu_module">
                                                <div class="menu_items">
                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="accordion.html">Accordion</a>
                                                            </li>
                                                            <li>
                                                                <a href="alert.html">Alert</a>
                                                            </li>
                                                            <li>
                                                                <a href="brands.html">Brands</a>
                                                            </li>
                                                            <li>
                                                                <a href="buttons.html">Buttons</a>
                                                            </li>
                                                            <li>
                                                                <a href="cards.html">Cards</a>
                                                            </li>
                                                            <li>
                                                                <a href="charts.html">Charts</a>
                                                            </li>
                                                            <li>
                                                                <a href="content-block.html">Content Block</a>
                                                            </li>
                                                            <li>
                                                                <a href="dropdowns.html">Drpdowns</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="features.html">Features</a>
                                                            </li>
                                                            <li>
                                                                <a href="footer.html">Footer</a>
                                                            </li>
                                                            <li>
                                                                <a href="info-box.html">Info Box</a>
                                                            </li>
                                                            <li>
                                                                <a href="menu.html">Menu</a>
                                                            </li>
                                                            <li>
                                                                <a href="modal.html">Modal</a>
                                                            </li>
                                                            <li>
                                                                <a href="pagination.html">Pagination</a>
                                                            </li>
                                                            <li>
                                                                <a href="peoples.html">Peoples</a>
                                                            </li>
                                                            <li>
                                                                <a href="products.html">Products</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="progressbar.html">Progressbar</a>
                                                            </li>
                                                            <li>
                                                                <a href="social.html">Social</a>
                                                            </li>
                                                            <li>
                                                                <a href="tab.html">Tabs</a>
                                                            </li>
                                                            <li>
                                                                <a href="table.html">Table</a>
                                                            </li>
                                                            <li>
                                                                <a href="testimonials.html">Testimonials</a>
                                                            </li>
                                                            <li>
                                                                <a href="timeline.html">Timeline</a>
                                                            </li>
                                                            <li>
                                                                <a href="typography.html">Typography</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has_megamenu">
                                        <a href="#">Pages</a>
                                        <div class="dropdown_megamenu">
                                            <div class="megamnu_module">
                                                <div class="menu_items">
                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Product</li>
                                                            <li>
                                                                <a href="all-products.html">Products Grid</a>
                                                            </li>
                                                            <li>
                                                                <a href="all-products-list.html">Products List</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.html">Category Grid</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-list.html">Category List</a>
                                                            </li>
                                                            <li>
                                                                <a href="search-product.html">Search Product</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product.html">Single Product V1</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-v2.html">Single Product V2</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-v3.html">Single Product V3</a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.html">Shopping Cart</a>
                                                            </li>
                                                            <li>
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Author</li>
                                                            <li>
                                                                <a href="author.html">Author Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-items.html">Author Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-reviews.html">Customer Reviews</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-followers.html">Followers</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-following.html">Following</a>
                                                            </li>
                                                            <li>
                                                                <a href="notification.html">Notifications</a>
                                                            </li>
                                                            <li>
                                                                <a href="message.html">Message Inbox</a>
                                                            </li>
                                                            <li>
                                                                <a href="message-compose.html">Message Compose</a>
                                                            </li>
                                                            <li>
                                                                <a href="favourites.html">Favorites Items</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Dashboard</li>
                                                            <li>
                                                                <a href="dashboard.html">Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-setting.html">Account Settings</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-purchase.html">Author Purchases</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-add-credit.html">Add Credits</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-statement.html">Statements</a>
                                                            </li>
                                                            <li>
                                                                <a href="invoice.html">Invoice</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-upload.html">Upload Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.html">Edit Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-withdrawal.html">Withdrawals</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.html">Manage Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="add-payment-method.html">Add Payment Method</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Customers</li>
                                                            <li>
                                                                <a href="support-forum.html">Support Forum</a>
                                                            </li>
                                                            <li>
                                                                <a href="support-forum-detail.html">Forum Details</a>
                                                            </li>
                                                            <li>
                                                                <a href="login.html">Login</a>
                                                            </li>
                                                            <li>
                                                                <a href="signup.html">Register</a>
                                                            </li>
                                                            <li>
                                                                <a href="recover-pass.html">Recovery Password</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-dashboard.html">Customer Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-downloads.html">Customer Downloads</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-info.html">Customer Info</a>
                                                            </li>
                                                        </ul>

                                                        <ul>
                                                            <li class="title">Blog</li>
                                                            <li>
                                                                <a href="blog1.html">Blog V-1</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog2.html">Blog V-2</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-blog.html">Single Blog</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Other</li>
                                                            <li>
                                                                <a href="how-it-works.html">How It Works</a>
                                                            </li>
                                                            <li>
                                                                <a href="about.html">About Us</a>
                                                            </li>
                                                            <li>
                                                                <a href="pricing.html">Pricing Plan</a>
                                                            </li>
                                                            <li>
                                                                <a href="testimonial.html">Testimonials</a>
                                                            </li>
                                                            <li>
                                                                <a href="faq.html">FAQs</a>
                                                            </li>
                                                            <li>
                                                                <a href="affiliate.html">Affiliates</a>
                                                            </li>
                                                            <li>
                                                                <a href="term-condition.html">Terms &amp; Conditions</a>
                                                            </li>
                                                            <li>
                                                                <a href="event.html">Event</a>
                                                            </li>
                                                            <li>
                                                                <a href="event-detail.html">Event Detail</a>
                                                            </li>
                                                            <li class="has_badge">
                                                                <a href="badges.html">Badges</a>
                                                                <span class="badge">New</span>
                                                            </li>
                                                            <li>
                                                                <a href="404.html">404 Error page</a>
                                                            </li>
                                                            <li>
                                                                <a href="carieer.html">Job Posts</a>
                                                            </li>
                                                            <li>
                                                                <a href="job-detail.html">Job Details</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row-->
            </div>
            <!-- start .container -->
        </div>
        @endif
        <!-- end /.mainmenu-->
    </div>
    <!-- end /.menu-area -->
    <!--================================
        END MENU AREA
    =================================-->
    @section('content')

    @show


    <!--================================
        START CALL TO ACTION AREA
    =================================-->
    @if(!Auth::check())
    <section class="call-to-action bgimage">
        <div class="bg_image_holder">
            <img src="{{asset('images/calltobg.jpg')}}" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-wrap">
                        <h1 class="text--white">Tertarik bergabung dengan kami ?</h1>
                        <a href="{{url('account/register')}}" class="btn btn--lg btn--round btn--white callto-action-btn">Bergabung sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--================================
        END CALL TO ACTION AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
    <footer class="footer-area">
        <div class="footer-big section--padding">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-footer">
                            <div class="info__logo">
                                <img src="{{asset('images/flogo.png')}}" alt="footer logo">
                            </div>
                            <p class="info--text">Nunc placerat mi id nisi interdum they mollis. Praesent pharetra, justo ut scel erisque the mattis,
                                leo quam.</p>
                            <ul class="info-contact">
                                <li>
                                    <span class="lnr lnr-phone info-icon"></span>
                                    <span class="info">Phone: +6789-875-2235</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-envelope info-icon"></span>
                                    <span class="info">support@aazztech.com</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-map-marker info-icon"></span>
                                    <span class="info">202 New Hampshire Avenue Northwest #100, New York-2573</span>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.info-footer -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Our Company</h4>
                            <ul>
                                <li>
                                    <a href="#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="#">How It Work</a>
                                </li>
                                <li>
                                    <a href="#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->

                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                            <ul>
                                <li>
                                    <a href="#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="#">How It Work</a>
                                </li>
                                <li>
                                    <a href="#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- end /.col-md-5 -->

                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter">
                            <h4 class="footer-widget-title text--white">Newsletter</h4>
                            <p>Subscribe to get the latest news, update and offer information. Don't worry, we won't send spam!</p>
                            <div class="newsletter__form">
                                <form action="#">
                                    <div class="field-wrapper">
                                        <input class="relative-field rounded" type="text" placeholder="Enter email">
                                        <button class="btn btn--round" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <!-- start .social -->
                            <div class="social social--color--filled">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-pinterest"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.social -->
                        </div>
                        <!-- end /.newsletter -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

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
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
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