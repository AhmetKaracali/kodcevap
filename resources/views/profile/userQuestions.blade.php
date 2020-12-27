@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')

    <div class="clearfix"></div>
    @include('partials.userMenu')
    <section id="section-questions">
        <h2 class="screen-reader-text">Kullanıcı Soruları</h2>
        <div class="post-articles question-articles articles-no-pagination">
            @php($soranRozeti = getRank($data->points))
            @foreach($data->sorular->sortByDesc('crdate') as $soru)

            <article id="post-{{$soru->id}}" class="article-question article-post clearfix question-with-comments answer-question-not-jquery question-vote-image discoura-not-credential question-type-normal post-{{$soru->id}} question type-question status-publish hentry">
                <div class="single-inner-content">
                    <div class="question-inner">
                        <div class="question-image-vote">
                            <div class="author-image author-image-42"><a href="/profil/{{$data->username}}"><span class="author-image-span"><img class="avatar avatar-42 photo" alt="{{$data->name}}" title="{{$data->name}}" width="42" height="42" src="{{$data->ppURL}}"></span></a>
                                <div class="author-image-pop-2">
                                    <div class="post-section user-area user-area-columns_pop">
                                        <div class="post-inner">
                                            <div class="author-image author-image-70"><a href="/profil/{{$data->username}}"><span class="author-image-span"><img class="avatar avatar-70 photo" alt="{{$data->name}}" title="{{$data->name}}" width="70" height="70" src="{{$data->ppURL}}"></span></a></div>
                                            <div class="user-content">
                                                <div class="user-inner">
                                                    <div class="user-data-columns">
                                                        <h4><a href="/profil/{{$data->username}}">{{$data->name}}</a></h4>
                                                        <div class="user-data">
                                                            <ul>
                                                                <li class="user-points"><i class="icon-bucket"></i>{{$data->points}} Puan</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-follow-profile">
                                                <div class="user_follow_2">
                                                    <div class="small_loader loader_2 user_follow_loader"></div></div><a href="/profil/{{$data->username}}">Profili Gör</a></div>
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
                                <div class="question-header"><a class="post-author" itemprop="url" href="/profil/{{$data->username}}">{{$data->name}}</a><span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span>
                                    <div class="post-meta"><span class="post-date" itemprop="dateCreated" datetime="{{$soru->crdate}}">Tarih<span class="date-separator">:</span>
                                        <a href="/soru/{{$soru->slug}}" itemprop="url">
                                            <time itemprop="datePublished" class="entry-date published" datetime="{{$soru->crdate}}">{{$soru->crdate}}</time>
                                        </a>
                                        </span><span class="byline"><span class="post-cat">Topluluk: <a href="/topluluk/{{toplulukBul($soru)->slug}}" rel="tag">{{toplulukBul($soru)->name}}</a></span></span>
                                    </div>
                                </div>
                            </header>
                            <div>
                                <h2 class="post-title"><a class="post-title" href="/soru/{{$soru->slug}}/" rel="bookmark">{{$soru->title}}</a></h2></div>
                        </div>
                        <div class="question-not-mobile question-image-vote question-vote-sticky">
                            <div class="">
                                <ul class="question-vote">
                                    @if(\Illuminate\Support\Facades\Auth::guest())
                                        <i class="icon-up-dir"></i>
                                        <li class="vote_result" itemprop="upvoteCount" id="voteCount-{{$soru->id}}" name="voteCount-{{$soru->id}}">{{$soru->vote}}</li>
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
                                    <div class="all_not_signle_question_content">
                                        <p class="excerpt-question">{{Str::limit($soru->body, 50, '...')}}</p>
                                    </div>
                                </div>
                                <div class="tagcloud">
                                    <div class="question-tags">
                                        @if(etiketBul($soru) != NULL)
                                            @php($etiketler = etiketBul($soru))
                                            @foreach($etiketler as $etiket)
                                                @php($etiket = etiketDetails($etiket->tagID))

                                                <i class="icon-tags"></i><a href="/etiketler/{{$etiket->slug}}/">{{$etiket->name}}</a>

                                            @endforeach
                                        @endif
                                    </div>
                            </div>
                            <footer class="question-footer">
                                <ul class="footer-meta">
                                    <li class="best-answer-meta"><i class="icon-comment"></i><a href="/soru/{{$soru->slug}}#comments">{{getCommentCount($soru)}}</a> <span class="question-span"><a href="/soru/{{$soru->slug}}#comments">Cevap</a></span></li>
                                    <li class="view-stats-meta"><i class="icon-eye"></i>{{$soru->views}} <span class="question-span">Görüntülenme</span></li>
                                </ul><a class="meta-answer" href="/soru/{{$soru->slug}}#respond">Cevapla</a></footer>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </article>
       @endforeach
            @if($data->sorular->isEmpty())
                {{ "Bu üye henüz soru sormamış.." }}
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="pagination-wrap pagination-question"></div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".question-vote-up").click(function(){
                var a = $(this).children('a').attr('id');
                var voter = $('.loggedUser').text();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var el = parseInt($("#voteCount-" + a + ".vote_result").text());


                $("#voteCount-" + a + ".vote_result").hide();
                $("#loader-" + a + ".li_loader").show();
                $(this).children('a').css('color','#3f9809');
                $("#voteCount-" + a + ".vote_result").css('color','#3f9809');
                $(this).children('a').attr('id','');

                $.ajax({

                    type: 'POST',
                    url: '/oyVer',
                    data: {
                        postid: a,
                        voteType: 1,
                        voter: voter,
                        _token: CSRF_TOKEN,
                        success:function (data) {
                            $("#voteCount-" + a + ".vote_result").text(el+1);
                            $("#loader-" + a + ".li_loader").hide();
                            $("#voteCount-" + a + ".vote_result").show();


                        }
                    }
                })
            });

            $(".question-vote-down").click(function(){
                var a = $(this).children('a').attr('id');
                var voter = $('.loggedUser').text();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var el = parseInt($("#voteCount-" + a + ".vote_result").text());


                $("#voteCount-" + a + ".vote_result").hide();
                $("#loader-" + a + ".li_loader").show();
                $(this).children('a').css('color','#980909');
                $("#voteCount-" + a + ".vote_result").css('color','#980909');
                $(this).children('a').attr('id','');

                $.ajax({

                    type: 'POST',
                    url: '/oyVer',
                    data: {
                        postid: a,
                        voteType: 2,
                        voter: voter,
                        _token: CSRF_TOKEN,
                        success:function (data) {
                            $("#voteCount-" + a + ".vote_result").text(el-1);
                            $("#loader-" + a + ".li_loader").hide();
                            $("#voteCount-" + a + ".vote_result").show();


                        }
                    }
                })
            });

        });
    </script>
@endsection


