@extends ('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Kullanıcılar</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="search-form">
                <form method="get" class="search-filter-form"><span class="styled-select user-filter"><select name="user_filter" onchange="this.form.submit()"><option value="user_registered" selected='selected'>Kayıt Tarihi</option><option value="display_name" >Name</option><option value="ID" >ID</option><option value="question_count" >Soru</option><option value="answers" >Cevap</option><option value="the_best_answer" >Çözüm</option><option value="points" >Puan</option><option value="followers" >Takipçi</option><option value="post_count" >Posts</option><option value="comments" >Comments</option></select></span></form>
                <form method="get" action="/search/" class="search-input-form main-search-form">
                    <input class="search-input live-search live-search-icon" autocomplete='off' type="search" name="search" placeholder="Ara...">
                    <div class="loader_2 search_loader"></div>
                    <div class="search-results results-empty"></div>
                    <button class="button-search"><i class="icon-search"></i></button>
                    <input type="hidden" name="search_type" class="search_type" value="users">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section>
        <article id="post-62" class="article-post article-post-only clearfix post-62 page type-page status-publish hentry">
            <div class="single-inner-content">
                <header class="article-header header-no-author header-no-meta">
                    <figure class="featured-image post-img post-img-0"></figure>
                </header>
                <div class="post-wrap-content">
                    <div class="post-content-text"></div>
                    <div class='user-section user-section-small_grid row user-not-normal'>
                        @foreach($data as $user)
                            <?php $userRozeti = getRank($user->points) ?>
                        <div class='col col4'>
                            <div class="post-section user-area user-area-small_grid">
                                <div class="post-inner">
                                    <div class="author-image author-image-84"><a href="../profil/{{$user->username}}"><span class="author-image-span"><img class='avatar avatar-84 photo' alt='{{$user->name}}' title='{{$user->name}}' width='84' height='84' src='{{$user->ppURL}}'></span></a></div>
                                    <div class="user-content">
                                        <div class="user-inner">
                                            <h4><a href="../profil/{{$user->username}}">{{$user->name}}</a></h4><span class="badge-span" style="background-color: {{$userRozeti->color}}">{{$userRozeti->name}}</span></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                    <div class="main-pagination">
                        <div class="pagination">
                            @if($data->currentPage() >1)
                                    <a class="previous page-numbers" href="{{$data->previousPageUrl()}}"><i class="icon-left-open"></i></a>
                                    <span aria-current="page" class="page-numbers current">{{$data->currentPage()}}</span>
                                    <a class="page-numbers" href="{{$data->nextPageUrl()}}">{{$data->currentPage()+1}}</a>
                                    <a class="next page-numbers" href="{{$data->nextPageUrl()}}"><i class="icon-right-open"></i></a>
                                @else
                                    <span aria-current="page" class="page-numbers current">{{$data->currentPage()}}</span>
                                    <a class="page-numbers" href="{{$data->nextPageUrl()}}">{{$data->currentPage()+1}}</a>
                                    <a class="next page-numbers" href="{{$data->nextPageUrl()}}"><i class="icon-right-open"></i></a>
                                @endif

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </article>
    </section>
@endsection
