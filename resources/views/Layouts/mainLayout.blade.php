@include('partials.header')

    @yield('topbanner')

    <div class="kodcevap-content">
        <div class="kodcevap-inner-content menu_sidebar">
            <div class="kodcevap-container">
                <main class="kodcevap-main-wrap kodcevap-site-content float_l" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                        <div class="kodcevap-main-inner float_l">
                            <div class="clearfix"></div>

                            @yield('content')
                        </div>
                        <div class="hide-main-inner"></div>

                        @include ('partials.rightSidebar')
                </main>
                @include('partials.leftNavbar')
            </div>
        </div>
    </div>

   @include('partials.footer')
