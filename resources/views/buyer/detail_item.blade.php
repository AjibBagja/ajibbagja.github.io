@extends('buyer/template')

@section('title',$data->nama_item)
@section('content')
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Wordpress</a>
                            </li>
                            <li class="active">
                                <a href="#">{{$data->nama_item}}</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">{{$data->nama_item}}</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->


    <!--============================================
        START SINGLE PRODUCT DESCRIPTION AREA
    ==============================================-->
    <section class="single-product-desc">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="item-preview item-preview2">
                        <div class="prev-slide">
                            <img src="{{asset('images/itprv2.jpg')}}" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>

                        <div class="item__preview-thumb">
                            <!-- end /.item__action -->

                            <div class="item_social_share">
                                <p>
                                    <img src="{{asset('images/svg/share.svg')}}" alt="This is share svg">
                                    <span>Share this item</span>
                                </p>

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
                                <!-- end /.social-->

                            </div>
                            <!-- end /.item__preview-thumb-->
                        </div>
                        <!-- end /.item__preview-thumb-->


                    </div>
                    <!-- end /.item-preview-->

                    <div class="item-info">
                        <div class="item-navigation">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#product-details" class="active" aria-controls="product-details" role="tab" data-toggle="tab">Item Details</a>
                                </li>
                                <li>
                                    <a href="#product-comment" aria-controls="product-comment" role="tab" data-toggle="tab">Comments </a>
                                </li>
                                <li>
                                    <a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Reviews
                                        <span>(35)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#product-support" aria-controls="product-support" role="tab" data-toggle="tab">Support</a>
                                </li>
                                <li>
                                    <a href="#product-faq" aria-controls="product-faq" role="tab" data-toggle="tab">item FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.item-navigation -->

                        <div class="tab-content">
                            <div class="tab-pane fade show product-tab active" id="product-details">
                                <div class="tab-content-wrapper">
                                    <h1>Detail Produk</h1>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra,
                                        justo ut scel erisque the mattis, leo quam aliquet congue justo ut scelerisque. Praesent
                                        pharetra, justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>


                                    <h2>Features With HTML List Unordered:</h2>
                                    <ul>
                                        <li>Six different themes for product slider</li>
                                        <li>Featured products slider form selected categories.</li>
                                        <li>Product slider form specific categories of products. Include or exclude categories.</li>
                                        <li>Product slider form specific tags of products. Include or exclude tags. New</li>
                                    </ul>

                                    <h2>Features With HTML List Ordered:</h2>
                                    <ol>
                                        <li>Six different themes for product slider</li>
                                        <li>Featured products slider form selected categories.</li>
                                        <li>Product slider form specific categories of products. Include or exclude categories.</li>
                                        <li>Product slider form specific tags of products. Include or exclude tags. New</li>
                                    </ol>

                                    <h2>Features With Image:</h2>
                                    <img src="{{asset('images/apspr.jpg')}}" alt="This is product description thumbnail">
                                </div>
                            </div>
                            <!-- end /.tab-content -->

                            <div class="tab-pane fade product-tab" id="product-comment">
                                <div class="thread">
                                    <ul class="media-list thread-list">
                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m1.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Themexylum</h4>
                                                            </a>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <span class="comment-tag buyer">Purchased</span>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. </p>
                                                </div>
                                            </div>

                                            <!-- nested comment markup -->
                                            <ul class="children">
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>AazzTech</h4>
                                                                <span>6 Hours Ago</span>
                                                            </div>
                                                            <span class="comment-tag author">Author</span>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut sceleris que the mattis, leo quam aliquet congue
                                                                placerat mi id nisi interdum mollis. </p>
                                                        </div>
                                                    </div>

                                                </li>
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="{{asset('images/m1.png')}}" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>Themexylum</h4>
                                                                <span>9 Hours Ago</span>
                                                            </div>
                                                            <span class="comment-tag buyer">Purchased</span>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut sceleris que the mattis, leo quam aliquet congue
                                                                placerat mi id nisi interdum mollis. </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m3.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Themexylum</h4>
                                                            </a>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. </p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--sm btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m4.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Themexylum</h4>
                                                            </a>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. </p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--sm btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m5.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Themexylum</h4>
                                                            </a>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. </p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--sm btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->
                                    </ul>
                                    <!-- end /.media-list -->

                                    <div class="pagination-area pagination-area2">
                                        <nav class="navigation pagination " role="navigation">
                                            <div class="nav-links">
                                                <a class="page-numbers current" href="#">1</a>
                                                <a class="page-numbers" href="#">2</a>
                                                <a class="page-numbers" href="#">3</a>
                                                <a class="next page-numbers" href="#">
                                                    <span class="lnr lnr-arrow-right"></span>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                    <!-- end /.comment pagination area -->

                                    <div class="comment-form-area">
                                        <h4>Leave a comment</h4>
                                        <!-- comment reply -->
                                        <div class="media comment-form">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{asset('images/m7.png')}}" alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </div>
                                    <!-- end /.comment-form-area -->
                                </div>
                                <!-- end /.comments -->
                            </div>
                            <!-- end /.product-comment -->

                            <div class="tab-pane fade product-tab" id="product-review">
                                <div class="thread thread_review">
                                    <ul class="media-list thread-list">
                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m1.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Themexylum</h4>
                                                                </a>
                                                                <span>9 Hours Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">support</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m4.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Codepoet_Biplob</h4>
                                                                </a>
                                                                <span>9 Hours Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">code quality</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Awesome theme. All in one Business Website Solutions.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m5.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>PaglaGhora</h4>
                                                                </a>
                                                                <span>9 Hours Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">design quality</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Best theme ever....</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m6.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Hearingorg</h4>
                                                                </a>
                                                                <span>12 days Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">support</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Very helpful support - above and beyond is my experience and I have purchased
                                                        this theme many times for my clients.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m7.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>ecom1206</h4>
                                                                </a>
                                                                <span>5 Hours Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">code quality</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Awesome theme. All in one Business Website Solutions.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m8.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Mr.Mango</h4>
                                                                </a>
                                                                <span>1 month day</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o" aria-hidden="true"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o" aria-hidden="true"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o" aria-hidden="true"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">design quality</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Retina logo won't work retina logo won't work</p>
                                                </div>
                                            </div>

                                            <!-- nested comment markup -->
                                            <ul class="children">
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>AazzTech</h4>
                                                                <span>6 Hours Ago</span>
                                                            </div>
                                                            <span class="comment-tag author">Author</span>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut sceleris que the mattis, leo quam aliquet congue
                                                                placerat mi id nisi interdum mollis. </p>
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m6.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Hearingorg</h4>
                                                                </a>
                                                                <span>12 days Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">support</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Very helpful support - above and beyond is my experience and I have purchased
                                                        this theme many times for my clients.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m9.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Tueld</h4>
                                                                </a>
                                                                <span>23 Minutes Ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">code quality</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. </p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m3.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Living Potato</h4>
                                                                </a>
                                                                <span>3 months ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">customization</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m6.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Visual-Eggs</h4>
                                                                </a>
                                                                <span>125 years ago</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-half-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">support</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>This is the finest art in the history of whateverland. Pastor: No it's
                                                        a witchcraft.</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{asset('images/m2.png')}}" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->
                                    </ul>
                                    <!-- end /.media-list -->

                                    <div class="pagination-area pagination-area2">
                                        <nav class="navigation pagination " role="navigation">
                                            <div class="nav-links">
                                                <a class="page-numbers current" href="#">1</a>
                                                <a class="page-numbers" href="#">2</a>
                                                <a class="page-numbers" href="#">3</a>
                                                <a class="next page-numbers" href="#">
                                                    <span class="lnr lnr-arrow-right"></span>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                    <!-- end /.comment pagination area -->
                                </div>
                                <!-- end /.comments -->
                            </div>
                            <!-- end /.product-comment -->

                            <div class="tab-pane fade product-tab" id="product-support">
                                <div class="support">
                                    <div class="support__title">
                                        <h3>Contact the Author</h3>
                                    </div>
                                    <div class="support__form">
                                        <div class="usr-msg">
                                            <p>Please
                                                <a href="login.html">sign in</a> to contact this author.</p>

                                            <form action="#" class="support_form">
                                                <div class="form-group">
                                                    <label for="subj">Support Subject:</label>
                                                    <input type="text" id="subj" class="text_field" placeholder="Enter your subject">
                                                </div>

                                                <div class="form-group">
                                                    <label for="supmsg">Support Query: </label>
                                                    <textarea class="text_field" id="supmsg" name="supmsg" placeholder="Enter your text..."></textarea>
                                                </div>
                                                <button type="submit" class="btn btn--lg btn--round">Submit Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.product-support -->

                            <div class="tab-pane fade product-tab" id="product-faq">
                                <div class="tab-content-wrapper">
                                    <div class="panel-group accordion" role="tablist" id="accordion">
                                        <div class="panel accordion__single" id="panel-one">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                                                        <span>How to write the changelog for theme updates?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-two">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse2" class="collapsed" aria-expanded="false" data-target="#collapse2" aria-controls="collapse2">
                                                        <span>Why do I need to login to purchase an item on DigiPro?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-three">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse3" class="collapsed" aria-expanded="false" data-target="#collapse3" aria-controls="collapse3">
                                                        <span>How to create an account on DigiPro?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse3" class="panel-collapse collapse" aria-labelledby="panel-three" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-four">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse4" class="collapsed" aria-expanded="false" data-target="#collapse4" aria-controls="collapse4">
                                                        <span>How to write the changelog for theme updates?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-five">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse5" class="collapsed" aria-expanded="false" data-target="#collapse5" aria-controls="collapse5">
                                                        <span>Do you recommend using a download manager software?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse5" class="panel-collapse collapse" aria-labelledby="panel-five" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-six">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse6" class="collapsed" aria-expanded="false" data-target="#collapse6" aria-controls="collapse6">
                                                        <span>How to purchase an item on DigiPro?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse6" class="panel-collapse collapse" aria-labelledby="panel-six" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                        sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                        interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                        interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                    </div>
                                    <!-- end /.accordion -->
                                </div>

                            </div>
                            <!-- end /.product-faq -->
                        </div>
                        <!-- end /.tab-content -->
                    </div>
                    <!-- end /.item-info -->
                </div>
                <!-- end /.col-md-8 -->

                <div class="col-lg-4">
                    <aside class="sidebar sidebar--single-product">
                        <div class="sidebar-card card-pricing card--pricing2">
                            <form action="{{url('o')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id_item" value="{{$data->id_item}}">
                            <div class="price">
                                <h1>
                                    <sup>Rp. </sup>
                                    <span>{{number_format($data->harga_item,0,',','.')}}</span>
                                </h1>
                            </div>
                            <ul class="pricing-options">
                                <li>
                                    Jumlah : 
                                    <select class="select--field" name="jumlah">
                                        @if($data->stok_item > 0)
                                            @for($i = 1;$i<=$data->stok_item;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        @else
                                            <option style="display:none;">Stok Habis</option>
                                        @endif
                                    </select>
                                </li>
                            </ul>
                            @if($data->stok_item > 0)
                                <div class="purchase-button">
                                    <button type="submit" name="submit" value="beli" href="#" class="btn btn--lg btn--round">Beli Sekarang</button>
                                    <a href="{{url('c/add/'.$data->id_item)}}" class="btn btn--lg btn--round cart-btn">
                                        <span class="lnr lnr-cart"></span> Tambah ke Keranjang</a>
                                </div>
                            @endif
                            </form>
                            <!-- end /.purchase-button -->
                        </div>
                        <!-- end /.sidebar--card -->

                        <div class="sidebar-card card--metadata">
                            <ul class="data">
                                <li>
                                    <p><span class="fa fa-shopping-cart pcolor"></span>Total Pembelian</p>
                                    <span>426</span>
                                </li>
                                <li>
                                    <p>
                                        <span class="fa fa-archive pcolor"></span>Stok</p>
                                    <span>{{$data->stok_item}}</span>
                                </li>
                                <!-- <li>
                                    <p>
                                        <span class="lnr lnr-bubble mcolor3"></span>Comments</p>
                                    <span>35</span>
                                </li> -->
                            </ul>


                            <!-- <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                                <span class="rating__count">( 26 Ratings )</span>
                            </div> -->
                            <!-- end /.rating -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <!-- <div class="sidebar-card card--product-infos">
                            <div class="card-title">
                                <h4>Product Information</h4>
                            </div>

                            <ul class="infos">
                                <li>
                                    <p class="data-label">Released</p>
                                    <p class="info">16 June 2015</p>
                                </li>
                                <li>
                                    <p class="data-label">Updated</p>
                                    <p class="info">28 July 2016 </p>
                                </li>
                                <li>
                                    <p class="data-label">Version</p>
                                    <p class="info">1.2</p>
                                </li>
                                <li>
                                    <p class="data-label">Category</p>
                                    <p class="info">Corporate & Business</p>
                                </li>
                                <li>
                                    <p class="data-label">Layout</p>
                                    <p class="info">Responsive</p>
                                </li>
                                <li>
                                    <p class="data-label">Retina Ready</p>
                                    <p class="info">No</p>
                                </li>
                                <li>
                                    <p class="data-label">Files Included</p>
                                    <p class="info">Html, CSS, JavaScript</p>
                                </li>
                                <li>
                                    <p class="data-label">Browser</p>
                                    <p class="info">IE10, IE11, Firefox, Safari, Opera, Chrome5</p>
                                </li>
                                <li>
                                    <p class="data-label">Bootstrap</p>
                                    <p class="info">Bootstrap 4</p>
                                </li>
                                <li>
                                    <p class="data-label">Tags</p>
                                    <p class="info">business, template, onepage, creative, responsive, corporate, Bootstrap3, html5</p>
                                </li>
                            </ul>
                        </div> -->
                        <!-- end /.aside -->

                        <div class="author-card sidebar-card ">
                            <div class="card-title">
                                <h4>Informasi Penjual</h4>
                            </div>

                            <div class="author-infos">
                                <div class="author_avatar">
                                    <img src="{{asset('images/author-avatar.jpg')}}" alt="Presenting the broken author avatar :D">
                                </div>

                                <div class="author">
                                    <h4>{{$data->ruser->nama}}</h4>
                                    <p>Bergabung: {{date("j F Y",strtotime($data->ruser->created_at->toDateString()))}}</p>
                                </div>
                                <!-- end /.author -->

                                <!-- <div class="social social--color--filled">
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
                                                <span class="fa fa-dribbble"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- end /.social -->

                                <div class="author-btn" style="margin-top: 15px;">
                                    <a href="#" class="btn btn--sm btn--round">View Profile</a>
                                    <a href="#" class="btn btn--sm btn--round">Message</a>
                                </div>
                                <!-- end /.author-btn -->
                            </div>
                            <!-- end /.author-infos -->


                        </div>
                        <!-- end /.author-card -->
                    </aside>
                    <!-- end /.aside -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--===========================================
        END SINGLE PRODUCT DESCRIPTION AREA
    ===============================================-->

    <!--============================================
        START MORE PRODUCT ARE
    ==============================================-->
    <section class="more_product_area section--padding">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>More Items
                            <span class="highlighted">by Aazztech</span>
                        </h1>
                    </div>
                </div>
                <!-- end /.col-md-12 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="{{asset('images/p4.jpg')}}" alt="Product Image">
                            <div class="prod_btn">
                                <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Mccarther Coffee Shop</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="{{asset('images/auth3.jpg')}}" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <img src="{{asset('images/cathtm.png')}}" alt="category image">Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48</p>
                            </div>

                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="{{asset('images/p2.jpg')}}" alt="Product Image">
                            <div class="prod_btn">
                                <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Mccarther Coffee Shop</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="{{asset('images/auth2.jpg')}}" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <img src="{{asset('images/catword.png')}}" alt="category image">wordpress</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48</p>
                            </div>

                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-lg-4 col-md-6 -->

                <!-- start .col-lg-4 col-md-6 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="{{asset('images/p6.jpg')}}" alt="Product Image">
                            <div class="prod_btn">
                                <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>The of the century</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="{{asset('images/auth.jpg')}}" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <img src="{{asset('images/catph.png')}}" alt="Category Image">PSD</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48</p>
                            </div>

                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-lg-4 col-md-6 -->

            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.container -->
    </section>
    <!--============================================
        END MORE PRODUCT AREA
    ==============================================-->
@endsection