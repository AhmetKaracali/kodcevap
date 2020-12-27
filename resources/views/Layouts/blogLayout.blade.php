@include('partials.header')

@yield('topbanner')

<div class="kodcevap-content">
    <div class="kodcevap-inner-content menu_sidebar">
        <div class="kodcevap-container">
            <main class="kodcevap-main-wrap kodcevap-site-content float_l" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                    <div class="kodcevap-blog-inner float_l">
                        @yield('breadcrumbs')
                        <div class="clearfix"></div>
                        <section>
                            <h2 class="screen-reader-text">KodCevap Blog</h2>
                            <div class="post-articles articles-no-pagination">
                                @yield('blogPosts')
                            </div>
                            <div class="clearfix"></div>
                            <div class="main-pagination">
                                <div class="pagination">
                                    @if($posts->currentPage() >1)
                                        <a class="previous page-numbers" href="{{$posts->previousPageUrl()}}"><i class="icon-left-open"></i></a>
                                        <span aria-current="page" class="page-numbers current">{{$posts->currentPage()}}</span>
                                        <a class="page-numbers" href="{{$posts->nextPageUrl()}}">{{$posts->currentPage()+1}}</a>
                                        <a class="next page-numbers" href="{{$posts->nextPageUrl()}}"><i class="icon-right-open"></i></a>
                                    @else
                                        <span aria-current="page" class="page-numbers current">{{$posts->currentPage()}}</span>
                                        <a class="page-numbers" href="{{$posts->nextPageUrl()}}">{{$posts->currentPage()+1}}</a>
                                        <a class="next page-numbers" href="{{$posts->nextPageUrl()}}"><i class="icon-right-open"></i></a>
                                    @endif

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </section>
                    </div>
                </div>
            </main>
            @include ('blog.blogSidebar')
        </div>
    </div>
</div>


@include('partials.footer')
