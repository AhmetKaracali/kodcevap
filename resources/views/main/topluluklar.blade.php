@extends('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Topluluklar</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="search-form">
                <form method="get" class="search-filter-form"><span class="styled-select cat-filter"><select name="cat_filter" onchange="this.form.submit()"><option value="count" selected='selected'>Popular</option><option value="followers" >Takipçi</option><option value="name" >Name</option></select></span></form>
                <form method="get" action="/search/" class="search-input-form main-search-form">
                    <input class="search-input live-search live-search-icon" autocomplete='off' type="search" name="search" placeholder="Ara...">
                    <div class="loader_2 search_loader"></div>
                    <div class="search-results results-empty"></div>
                    <button class="button-search"><i class="icon-search"></i></button>
                    <input type="hidden" name="search_type" class="search_type" value="question-category">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section>
        <article id="post-38" class="article-post article-post-only clearfix post-38 page type-page status-publish hentry">
            <div class="single-inner-content">
                <header class="article-header header-no-author header-no-meta">
                    <figure class="featured-image post-img post-img-0"></figure>
                </header>
                <div class="post-wrap-content">
                    <div class="post-content-text"></div>
                    <div class="row cats-sections cat_simple_follow">
                        @foreach($topluluklar as $topluluk)
                        <div class="col col6">
                            <div class='cat-sections-follow'>
                                <div class="cat-sections"><a href="../topluluklar/{{$topluluk->slug}}/" title="{{$topluluk->name}}"><i class="icon-monitor"></i>{{$topluluk->name}}</a></div>
                                <div class="cat-section-follow">
                                    <div class="cat-follow-button"><i class="icon-users"></i><span class="follow-cat-count">{{$topluluk->user->count()}}</span>Takipçi</div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
