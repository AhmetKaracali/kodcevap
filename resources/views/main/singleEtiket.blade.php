@extends ('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">{{$etikett->name}}</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="search-form">
                <form method="get" action="/search/" class="search-input-form main-search-form">
                    <input class="search-input live-search live-search-icon" autocomplete='off' type="search" name="search" placeholder="Ara...">
                    <div class="loader_2 search_loader"></div>
                    <div class="search-results results-empty"></div>
                    <button class="button-search"><i class="icon-search"></i></button>
                    <input type="hidden" name="search_type" class="search_type" value="question_tags">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section>
        <h2 class="screen-reader-text">Sorular</h2>
        <div class="post-articles question-articles">
            @foreach($etiketler as $question)
                @foreach( $question->sorular as $soru)
            @php( $userData = getUserData($soru->owner)->first())
                @php($soranRozeti = getRank($userData->first()->points))
            <article id="post-117" class="article-question article-post clearfix question-with-comments answer-question-not-jquery question-vote-image discoura-not-credential question-type-normal post-117 question type-question status-publish hentry">
                <div class="single-inner-content">
                    <div class="question-inner">
                        <div class="question-image-vote">
                            <div class="author-image author-image-42"><a href="../../profil/{{$userData->id}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$userData->name}}' title='{{$userData->name}}' width='42' height='42' src='{{$userData->ppURL}}'></span></a>
                                <div class="author-image-pop-2">
                                    <div class="post-section user-area user-area-columns_pop">
                                        <div class="post-inner">
                                            <div class="author-image author-image-70"><a href="../../profil/{{$userData->id}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$userData->name}}' title='{{$userData->name}}' width='70' height='70' src='{{$userData->ppURL}}'></span></a></div>
                                            <div class="user-content">
                                                <div class="user-inner">
                                                    <div class="user-data-columns">
                                                        <h4><a href="../../profile/{{$userData->id}}">{{$userData->name}}</a></h4>
                                                        <div class="user-data">
                                                            <ul>
                                                                <li class="city-country"><i class="icon-bucket"></i>{{$userData->points}} Puan</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-follow-profile"><a href="../../profil/{{$userData->id}}">Profili Gör</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="question-vote question-mobile">
                                <i class="icon-up-dir"></i>
                                <li class="vote_result2" itemprop="upvoteCount2" id="voteCount2-{{$soru->id}}" name="voteCount2-{{$soru->id}}">{{$soru->vote}}</li>
                                <i class="icon-down-dir"></i>
                            </ul>
                        </div>
                        <div class="question-content question-content-first">
                            <header class="article-header">
                                <div class="question-header"><a class="post-author" itemprop="url" href="../../profil/{{$userData->id}}">{{$userData->name}}</a><span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span>
                                    <div class="post-meta"><span class="post-date" itemprop="dateCreated" datetime="{{$soru->crdate}}">Tarih<span class="date-separator">:</span>
                                                                <a href="../../soru/{{$soru->slug}}" itemprop="url">
                                                                    <time itemprop="datePublished" class="entry-date published" datetime="{{$soru->crdate}}">{{$soru->crdate}}</time>
                                                                </a>
                                    </div>
                                </div>
                            </header>
                            <div>
                                <h2 class="post-title"><a class="post-title" href="../../soru/{{$soru->slug}}" rel="bookmark">{{$soru->title}}</a></h2></div>
                        </div>
                        <div class="question-not-mobile question-image-vote question-vote-sticky">
                            <div class="">
                                <ul class="question-vote">
                                    @if(\Illuminate\Support\Facades\Auth::guest())
                                        <i class="icon-up-dir"></i>
                                        <li class="vote_result" itemprop="upvoteCount" id="voteCount-{{$soru->id}}" name="voteCount-{{$soru->id}}" style="{{getVoteColor($soru->vote)}}">{{$soru->vote}}</li>
                                        <i class="icon-down-dir"></i>
                                    @else
                                        @if(isVotedQuestion("/soru/".$soru->slug,session('user')->id) == null)
                                            <li class="question-vote-up">
                                                <a data-voted="false" href="#post-{{$soru->id}}" id="{{$soru->id}}" name="up-{{$soru->id}}"  title="+ Oy Ver"><i class="icon-up-dir"></i></a></li>

                                            <li class="vote_result" itemprop="upvoteCount" id="voteCount-{{$soru->id}}" name="voteCount-{{$soru->id}}" style="{{getVoteColor($soru->vote)}}">{{$soru->vote}}</li>

                                            <li class="li_loader" id="loader-{{$soru->id}}" name="loader-{{$soru->id}}"><span class="loader_3 fa-spin"></span></li>
                                            <li class="question-vote-down">
                                                <a data-voted="false" href="#post-{{$soru->id}}" id="{{$soru->id}}" name="down-{{$soru->id}}" title="- Oy ver"><i class="icon-down-dir"></i></a></li>

                                        @elseif(isVotedQuestion("/soru/".$soru->slug,session('user')->id)->activityType ==1)
                                            <li class="question-vote-up1">
                                                <a data-voted="upvoted" title="Daha önce + Oy Verdiniz"><i class="icon-up-dir" style="color: #3f9809;"></i></a></li>

                                            <li class="vote_result" style="{{getVoteColor($soru->vote)}}">{{$soru->vote}}</li>

                                            <li class="li_loader"><span class="loader_3 fa-spin"></span></li>
                                            <li class="question-vote-down1">
                                                <a data-voted="upvoted" title="Daha önce + Oy Verdiniz"><i class="icon-down-dir"></i></a></li>

                                        @elseif(isVotedQuestion("/soru/".$soru->slug,session('user')->id)->activityType ==2)
                                            <li class="question-vote-up1">
                                                <a data-voted="downvoted" title="Daha önce - Oy Verdiniz"><i class="icon-up-dir"></i></a></li>

                                            <li class="vote_result" style="{{getVoteColor($soru->vote)}}">{{$soru->vote}}</li>

                                            <li class="li_loader"><span class="loader_3 fa-spin"></span></li>
                                            <li class="question-vote-down1">
                                                <a data-voted="downvoted" title="Daha önce - Oy Verdiniz"><i class="icon-down-dir" style="color: #980909;"></i></a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="question-content question-content-second">
                            <div class="post-wrap-content">
                                <div class="question-content-text">
                                    <div class='all_not_signle_question_content'>
                                        <p class="excerpt-question">{{Str::limit($soru->body, 50, '...')}}</p>
                                    </div>
                                </div>

                            </div>
                            <footer class="question-footer">
                                <ul class="footer-meta">
                                    <li class="best-answer-meta"><i class="icon-comment"></i><a href="../../soru/{{$soru->slug}}">{{getCommentCount($soru)}}</a> <span class='question-span'><a href="../../soru/{{$soru->slug}}#comments">Cevap</a></span></li>
                                    <li class="view-stats-meta"><i class="icon-eye"></i>{{$soru->views}} <span class='question-span'>Görüntülenme</span></li>
                                </ul><a class="meta-answer" href="../../soru/{{$soru->slug}}#respond">Cevapla</a></footer>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </article>
                    @endforeach
                @endforeach
            </div>
        <div class="clearfix"></div>
        <div class="pagination-wrap pagination-question no-pagination-wrap"></div>
    </section>
@endsection
