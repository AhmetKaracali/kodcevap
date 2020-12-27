<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    @yield('head')

    <link rel="stylesheet" id='wp-block-library-group-css' type="text/css" href="/css/blocklib/style.css">
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/icon/customIcon.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/entypo/entypo.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/prettyPhoto.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/fontawesome/fontawesome.all.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/main1.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/responsive1.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/skins1.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-group-css' href='/css/discoura.css' type='text/css' media='all' />

    <link rel="stylesheet" href="/js/highlight/styles/darcula.css" type='text/css'>
    <script src="/js/highlight/highlight.pack.js"></script>

    <script>hljs.initHighlightingOnLoad();</script>

    <script src="/js/tinymce/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea',
            language: 'tr_TR',
            language_url: '/js/tinymce/langs/tr_TR.js',
            plugins: "codesample",
            toolbar: 'undo redo | styleselect | bold italic | codesample'
        });
    </script>


    <style id='kodcevap-custom-css-inline-css' type='text/css'>
        .slider-wrap,
        .slider-inner {
            min-height: 500px
        }
        @font-face {
            font-family: "entypo";
            src: url("/css/entypo/entypo.eot");
            src: url("/css/entypo/entypo-.eot#iefix") format("embedded-opentype"), url("/css/entypo/entypo.woff") format("woff"), url("/css/entypo/entypo/entypo.ttf") format("truetype"), url("/css/entypo/entypo.svg#entypo") format("svg");
            font-weight: normal;
            font-style: normal
        }

    </style>

    <script type='text/javascript' src='/js/jquery/jquery-3.4.1.min.js'></script>
    <script type='text/javascript' src='/js/jquery/ui/menu.min.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery-3.4.1.min.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery-migrate-3.1.0.min.js'></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/styles/default.min.css">




    <script type="text/javascript">
        $(document).ready(function(){
            $("notifications-click").click(function(){
                $("notification-bar").Show();
            });
        });
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="home page-template page-template-template-home page-template-template-home-php page page-id-64 page-with-breadcrumbs discy_for_all active-lightbox">
<div class="background-cover"></div>
<div id="wrap">
    <div class="hidden-header header-dark mobile_bar_active">
        <header class="header">
            <div class="kodcevap-container">
                <div class="mobile-menu">
                    <div class="mobile-menu-click" data-menu="mobile-menu-main"><i class="icon-menu"></i></div>
                </div>
                <div class="right-header float_r" >

                  @include('partials.rightHeader')
                </div>
                <div class="left-header float_l">
                    <h2 class="screen-reader-text site_logo">KodCevap</h2>
                    <a class="logo float_l logo-img" href="/" title="KodCevap"> <img title="kodcevap" height="61" width="200" class="default_screen" alt="KodCevap Logo" src="/images/logoNew.png"> <img title="KodCevap" height="61" width="200" class="retina_screen" alt="KodCevap Logo" src="/images/logoNew.png"> </a>
                    <div class="mid-header float_l">
                        <div class="header-search float_r">
                            <form role="search" class="searchform main-search-form" method="get" action="">
                                <div class="search-wrapper">
                                    <input type="search" class='live-search live-search-icon' autocomplete='off' placeholder="Ara..." name="search" value="">
                                    <div class="loader_2 search_loader"></div>
                                    <div class="search-results results-empty"></div>
                                    <input type="hidden" name="search_type" class="search_type" value="questions">
                                    <div class="search-click"></div>
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <nav class="nav float_l" itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                            <h3 class="screen-reader-text">kodcevap Navigasyon</h3>
                            <ul id="menu-header" class="menu">
                                <li id="menu-item-75" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item menu-item-75"><a class="" href="/">Anasayfa</a></li>
                                <li id="menu-item-76" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a class="" href="/hakkimizda">Hakkımızda</a></li>
                                <li id="menu-item-77" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77"><a class="" href="/blog">Blog</a></li>
                                <li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a class="" href="/iletisim">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-bar">
            <div class="kodcevap-container">
                <div class="mobile-bar-content">
                    <div class="kodcevap-container">
                        <div class="mobile-bar-search"><a href="search/index.html"><i class="icon-search"></i>Arama Yap</a>
                            <form role="search" method="get" class="searchform main-search-form" action="/search/"><i class="icon-left-open"></i>
                                <input type="search" class='live-search' autocomplete='off' name="search" value="Aramak için enter'a basın." onfocus="if(this.value=='Hit enter to search')this.value='';" onblur="if(this.value=='')this.value='Aramak için enter a basın.';">
                                <div class="loader_2 search_loader"></div>
                                <div class="search-results results-empty"></div>
                                <input type="hidden" name="search_type" class="search_type" value="questions">
                            </form>
                        </div>
                        <div class="mobile-bar-ask"><a target="_self" class="wpqa-question " href="#"><i class="icon-help-circled"></i>Soru Sor</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="mobile-aside mobile-menu-main mobile-menu-wrap gray-mobile-menu" data-menu="mobile-menu-main">
        <h3 class="screen-reader-text">Mobil Menü</h3>
        <div class="mobile-aside-inner">
            <div class="mobile-aside-inner-inner"><a href="index-show=most-visited.html#" class="mobile-aside-close"><i class="icon-cancel"></i><span class="screen-reader-text">Kapat</span></a>
                <div class="mobile-menu-top mobile--top">
                    <div class="widget widget_ask"><a href="sor" class="button-default wpqa-question">Soru Sor</a></div>
                </div>
                <div class="mobile-menu-left">
                    <ul id="nav_menu" class="menu">
                        <li id="menu-item-128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item menu-item-128"><a class="" href="/"><i class="icon-home"></i>Anasayfa</a></li>
                        <li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-129"><a class="" href="/topluluklar"><i class="icon-folder"></i>Topluluklar</a></li>
                        <li id="menu-item-130" class="nav_menu_open menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-130"><a class="" href="questions.php"><i class="icon-book-open"></i>Sorular</a>
                            <ul class="sub-menu">
                                <li id="menu-item-131" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-131"><a class="" href="#">Yeni Sorular</a></li>
                                <li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-132"><a class="" href="#">Trend Sorular</a></li>
                                <li id="menu-item-133" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-133"><a class="" href="#">Cevaplanmamış Sorular</a></li>

                            </ul>
                        </li>
                        <li id="menu-item-136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136"><a class="" href="/etiketler"><i class="icon-tag"></i>Etiketler</a></li>
                        <li id="menu-item-138" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-138"><a class="" href="/rozetler"><i class="icon-trophy"></i>Rozetler</a></li>
                        <li id="menu-item-137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-137"><a class="" href="/uyeler"><i class="icon-users"></i>Kullanıcılar</a></li>
                        <li id="menu-item-139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-139"><a class="" href="/yardim"><i class="icon-lifebuoy"></i>Yardım</a></li>
                    </ul>
                </div>
                <div class="mobile--top">
                    <ul id="menu-header-1" class="menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item menu-item-75"><a class="" href="index.html">Anasayfa</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a class="" href="/hakkimizda">Hakkımızda</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77"><a class="" href="/blog">Blog</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a class="" href="/iletisim.php">İletişim</a></li>
                    </ul>
                </div>
                <div class="mobile--top post-search">
                    <form role="search" method="get" class="searchform main-search-form" action="/search/">
                        <div class="row">
                            <div class="col col10">
                                <input type="search" class='live-search' autocomplete='off' name="search" value="Arama yap." onfocus="if(this.value=='Hit enter to search')this.value='';" onblur="if(this.value=='')this.value='Arama yap.';">
                                <div class="loader_2 search_loader"></div>
                                <div class="search-results results-empty"></div>
                                <input type="hidden" name="search_type" class="search_type" value="questions">
                            </div>
                            <div class="wpqa_form col col2">
                                <input type="submit" class="button-default" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </aside>
