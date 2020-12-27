@extends ('Layouts.mainLayout')

@section('content')
    @foreach($topluluks as $topluluk)
        <?php $soranRozeti = getRank($data->soran->points) ?>
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current"><a href='/'>Sorular</a></span><span class="crumbs-span"> / </span><span class="current">{{$data->title}}</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            @if($data->solved ==1)
            <div class="question-stats"><span class="question-answered-done"><i class="icon-check"></i>Cevaplandı</span></div>
                @else
                <div class="question-stats"> <span class="question-stats-process"><i class="icon-flash"></i>Çözüm Aranıyor</span></div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="post-articles question-articles">
        <article id="post-111" class="article-question article-post clearfix question-with-comments answer-question-not-jquery question-vote-image discoura-not-credential question-type-normal post-111 question type-question status-publish hentry question-category-management question_tags-employee" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
            <div class="single-inner-content">
                <div class="question-inner">
                    <div class="question-image-vote">
                        <div class="author-image author-image-42"><a href="../../profil/{{$data->soran->username}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$data->soran->name}}' title='{{$data->soran->name}}' width='42' height='42' src='{{$data->soran->ppURL}}'></span></a>
                            <div class="author-image-pop-2">
                                <div class="post-section user-area user-area-columns_pop">
                                    <div class="post-inner">
                                        <div class="author-image author-image-70"><a href="{{$data->soran->ppURL}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$data->soran->name}}' title='{{$data->soran->name}}' width='70' height='70' src='{{$data->soran->ppURL}}'></span></a></div>
                                        <div class="user-content">
                                            <div class="user-inner">
                                                <div class="user-data-columns">
                                                    <h4><a href="../../profil/{{$data->soran->username}}">{{$data->soran->name}}</a></h4>
                                                    <div class="user-data">
                                                        <ul>
                                                            <li class="city-country"><i class="icon-bucket"></i>{{$data->soran->points}} Puan</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-follow-profile"><a href="../../profil/{{$data->soran->username}}/">Profili Gör</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="question-vote question-mobile">
                            <li class="question-vote-up"><a href="#" id="question_vote_up-111" data-type="question" data-vote-type="up" class="wpqa_vote question_vote_up vote_allow" title="Like"><i class="icon-up-dir"></i></a></li>
                            <li class="vote_result" itemprop="upvoteCount">{{$data->vote}}</li>
                            <li class="li_loader"><span class="loader_3 fa-spin"></span></li>
                            <li class="question-vote-down"><a href="#" id="question_vote_down-111" data-type="question" data-vote-type="down" class="wpqa_vote question_vote_down vote_allow" title="Dislike"><i class="icon-down-dir"></i></a></li>
                        </ul>
                    </div>
                    <div class="question-content question-content-first">
                        <header class="article-header">
                            <div class="question-header"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="post-author" itemprop="url" href="../../profil/{{$data->soran->username}}"><span itemprop="name">{{$data->soran->name}}</span></a>
                                                        </span><span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span>
                                <div class="post-meta"><span class="post-date" itemprop="dateCreated" datetime="{{$data->crdate}}">Tarih<span class="date-separator">:</span>
                                                            <a href="#" itemprop="url">
                                                                <time itemprop="datePublished" class="entry-date published" datetime="{{$data->crdate}}">{{$data->crdate}}</time>
                                                            </a>
                                                            </span><span class="byline"><span class="post-cat">Topluluk: <a href="/topluluklar/{{$topluluk->slug}}" rel="tag">{{$topluluk->name}}</a></span></span>
                                </div>
                            </div>
                        </header>
                        <div itemprop="name">
                            <h1 class="post-title">{{$data->title}}</h1></div>
                    </div>
                    <div class="question-not-mobile question-image-vote question-vote-sticky">
                        <div class="">
                            <ul class="question-vote">
                                @if(\Illuminate\Support\Facades\Auth::guest())
                                    <i class="icon-up-dir"></i>
                                    <li class="vote_result" itemprop="upvoteCount" id="voteCount-{{$data->id}}" name="voteCount-{{$data->id}}">{{$data->vote}}</li>
                                    <i class="icon-down-dir"></i>
                                @else
                                    @if(isVotedQuestion("/soru/".$data->slug,session('user')->id) == null)
                                        <li class="question-vote-up">
                                            <a data-voted="false" href="#post-{{$data->id}}" id="{{$data->id}}" name="up-{{$data->id}}"  title="+ Oy Ver"><i class="icon-up-dir"></i></a></li>

                                        <li class="vote_result" itemprop="upvoteCount" id="voteCount-{{$data->id}}" name="voteCount-{{$data->id}}" style="{{getVoteColor($data->vote)}}">{{$data->vote}}</li>

                                        <li class="li_loader" id="loader-{{$data->id}}" name="loader-{{$data->id}}"><span class="loader_3 fa-spin"></span></li>
                                        <li class="question-vote-down">
                                            <a data-voted="false" href="#post-{{$data->id}}" id="{{$data->id}}" name="down-{{$data->id}}" title="- Oy ver"><i class="icon-down-dir"></i></a></li>

                                    @elseif(isVotedQuestion("/soru/".$data->slug,session('user')->id)->activityType ==1)
                                        <li class="question-vote-up1">
                                            <a data-voted="upvoted" title="Daha önce + Oy Verdiniz"><i class="icon-up-dir" style="color: #3f9809;"></i></a></li>

                                        <li class="vote_result" style="{{getVoteColor($data->vote)}}">{{$data->vote}}</li>

                                        <li class="li_loader"><span class="loader_3 fa-spin"></span></li>
                                        <li class="question-vote-down1">
                                            <a data-voted="upvoted" title="Daha önce + Oy Verdiniz"><i class="icon-down-dir"></i></a></li>

                                    @elseif(isVotedQuestion("/soru/".$data->slug,session('user')->id)->activityType ==2)
                                        <li class="question-vote-up1">
                                            <a data-voted="downvoted" title="Daha önce - Oy Verdiniz"><i class="icon-up-dir"></i></a></li>

                                        <li class="vote_result" style="{{getVoteColor($data->vote)}}">{{$data->vote}}</li>

                                        <li class="li_loader"><span class="loader_3 fa-spin"></span></li>
                                        <li class="question-vote-down1">
                                            <a data-voted="downvoted" title="Daha önce - Oy Verdiniz"><i class="icon-down-dir" style="color: #980909;"></i></a></li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="question-content question-content-second">
                        <div class="wpqa_error"></div>
                        <div class="wpqa_success"></div>
                        <div class="post-wrap-content">
                            <div class="question-content-text">
                                <div class='all_signle_question_content'>

                                        {!!$data->body!!}

                                    <div></div>
                                </div>
                            </div>
                            <div class="tagcloud">
                                @foreach($etikets as $etiketler)
                                <div class="question-tags"><i class="icon-tags"></i><a href="/etiket/{{$etiketler->etiket->slug}}">{{$etiketler->etiket->name}}</a></div>
                                    @endforeach
                            </div>
                        </div>
                        <footer class="question-footer">
                            <ul class="footer-meta">
                                <li class="best-answer-meta meta-best-answer"><i class="icon-comment"></i><span itemprop="answerCount" class="number"><a href="index.html#comments">{{$commentCount}}</a></span> <span class='question-span'><a href="index.html#comments">Cevap</a></span></li>
                                <li class="view-stats-meta"><i class="icon-eye"></i>{{$data->views}} <span class='question-span'>Görüntülenme</span></li>
                            </ul><a class="meta-answer" href="#respond">Cevapla</a></footer>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="question-bottom">
                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                        <ul>
                            <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/soru/{{$data->slug}}"><i class="icon-facebook"></i><span>Facebook</span></a></li>
                            <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$data->title}}&url=https://kodcevap.com/soru/{{$data->slug}}"><i class="icon-twitter"></i></a></li>
                            <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&https://kodcevap.com/soru/{{$data->slug}}&title={{$data->title}}"><i class="icon-linkedin"></i></a></li>
                            <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$data->title}}-%20https://kodcevap.com{{$data->slug}}"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                    <ul class="question-link-list">
                        <li class="report_activated"><a class="report_q" href="#"><i class="icon-attention"></i>Şikayet Et</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="question-adv-comments question-has-comments">
                <div id="comments" class="post-section">
                    <div class="post-inner">
                        <div class="answers-tabs">
                            <h3 class="section-title"><span>{{$commentCount}} Cevap</span></h3>
                            <div class="answers-tabs-inner">
                                <ul>
                                    <li class='active-tab'><a href="?show=votes#comments">Oylanma</a></li>
                                    <li><a href="?show=oldest#comments">En Eski</a></li>
                                    <li><a href="?show=newest#comments">En Yeni</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        <ol class="commentlist clearfix">
                            @foreach($comments as $comment )
                                <?php $uyeRozeti = getRank($comment->writer->points)?>
                            <li class="comment byuser comment-author-ahmed even thread-even depth-1 comment-credential comment-best-answer " itemscope itemtype="https://schema.org/Cevapla" itemprop="acceptedCevapla" id="li-comment-44">
                                <div id="comment-{{$comment->id}}" class="comment-body clearfix">
                                    <div class="comment-text">
                                        <div class="author-image author-image-42"><a href="/profil/{{$comment->writer->username}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$comment->writer->name}}' title='{{$comment->writer->name}}' width='42' height='42' src='{{$comment->writer->ppURL}}'></span></a>
                                            <div class="author-image-pop-2">
                                                <div class="post-section user-area user-area-columns_pop">
                                                    <div class="post-inner">
                                                        <div class="author-image author-image-70"><a href="/profil/{{$comment->writer->username}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$comment->writer->name}}' title='{{$comment->writer->name}}' width='70' height='70' src='{{$comment->writer->ppURL}}'></span></a></div>
                                                        <div class="user-content">
                                                            <div class="user-inner">
                                                                <div class="user-data-columns">
                                                                    <h4><a href="/profil/{{$comment->writer->username}}">{{$comment->writer->name}}</a><span class="verified_user tooltip-n" title="Onaylı"><i class="icon-check"></i></span></h4>
                                                                    <div class="user-data">
                                                                        <ul>
                                                                            <li class="user-columns-points"><i class="icon-bucket"></i>{{$comment->writer->points}} Puan</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="user-follow-profile"><a href="/profil/{{$comment->writer->username}}">Profili Gör</a></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="author clearfix">

                                            <div class="best-answer" id="cozumIsareti-{{$comment->id}}" @if($comment->isSolution !=1)style="display: none"@endif>Çözüm</div>


                                            <div class="comment-meta">
                                                <div class="comment-author"> <span itemprop="author" itemscope itemtype="http://schema.org/Person"> <a itemprop="url" href="../../profil/{{$comment->writer->username}}"> <span itemprop="name">{{$comment->writer->name}}</span> </a>
                                                                            </span><span class="verified_user tooltip-n" title="Verified"><i class="icon-check"></i></span><span class="badge-span" style="background-color: {{$uyeRozeti->color}}">{{$uyeRozeti->name}}</span> </div>
                                                <a href="#comment-{{$comment->id}}" class="comment-date" itemprop='url'> <span itemprop="dateCreated" datetime="{{$comment->created_at}}">{{$comment->created_at}} tarihinde cevapladı.</span> </a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <div itemprop='text'>
                                                <p>{!!  $comment->body!!}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                            <div class="wpqa_error"></div>
                                            <ul class="question-vote answer-vote answer-vote-dislike">
                                                @if(\Illuminate\Support\Facades\Auth::guest())
                                                    <li><i class="icon-up-dir"></i></li>
                                                    <li class="vote_result" itemprop="upvoteCount" id="commentVoteCount-{{$comment->id}}" name="commentVoteCount-{{$comment->id}}" style="{{getVoteColor($comment->score)}}">{{$comment->score}}</li>
                                                    <li><i class="icon-down-dir"></i></li>
                                                @else
                                                    @if(isVotedAnswer("/soru/".$data->slug."/#comment-".$comment->id,session('user')->id) == false)
                                                        <li class="like-answers">
                                                            <a data-voted="false" href="#comment-{{$comment->id}}" id="{{$comment->id}}" title="+ Oy Ver"><i class="icon-up-dir"></i></a></li>
                                                        <li class="vote_result" id="commentVoteCount-{{$comment->id}}" name="commentVoteCount-{{$comment->id}}" style="{{getVoteColor($comment->score)}}">{{$comment->score}}</li>
                                                        <li class="li_loader" id="commentLoader-{{$comment->id}}" name="commentLoader-{{$comment->id}}"><span class="loader_3 fa-spin"></span></li>
                                                        <li data-voted="false" class="dislike_answers"><a href="#comment-{{$comment->id}}" id="{{$comment->id}}" title="- Oy Ver"><i class="icon-down-dir"></i></a></li>
                                                    @elseif(isVotedAnswer("/soru/".$data->slug."/#comment-".$comment->id,session('user')->id)->activityType == 3)

                                                        <li class="like-answers1">
                                                            <a data-voted="upvoted"  title="+ Oy Verdiniz."><i class="icon-up-dir" style="color: #3f9809;"></i></a></li>
                                                        <li class="vote_result" id="commentVoteCount-{{$comment->id}}" name="commentVoteCount-{{$comment->id}}" style="{{getVoteColor($comment->score)}}">{{$comment->score}}</li>
                                                        <li class="li_loader" id="commentLoader-{{$comment->id}}" name="commentLoader-{{$comment->id}}"><span class="loader_3 fa-spin"></span></li>
                                                        <li data-voted="upvoted" class="dislike_answers1"><a title="+ Oy Verdiniz."><i class="icon-down-dir"></i></a></li>

                                                    @elseif(isVotedAnswer("/soru/".$data->slug."/#comment-".$comment->id,session('user')->id)->activityType == 4)
                                                        <li class="like-answers1">
                                                            <a data-voted="downvoted"  title="- Oy Verdiniz."><i class="icon-up-dir"></i></a></li>
                                                        <li class="vote_result" id="commentVoteCount-{{$comment->id}}" name="commentVoteCount-{{$comment->id}}" style="{{getVoteColor($comment->score)}}">{{$comment->score}}</li>
                                                        <li class="li_loader" id="commentLoader-{{$comment->id}}" name="commentLoader-{{$comment->id}}"><span class="loader_3 fa-spin"></span></li>
                                                        <li data-voted="downvoted" class="dislike_answers1"><a title="- Oy Verdiniz."><i class="icon-down-dir" style="color: #980909;"></i></a></li>
                                                        @endif
                                                     @endif
                                            </ul>
                                            <ul class="comment-reply comment-reply-main">
                                                <li><a rel="nofollow" class="comment-reply-link wpqa-reply-link" href="#respond" data-id="{{$comment->id}}" aria-label="{{$comment->writer->name}} adlı üyeye cevap ver."><i class="icon-reply"></i>Yanıtla</a></li>
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                @if(session('user')->username == $data->soran->username)
                                                    @if($comment->isSolution ==1)
                                                        <li><a class=cozum" id="commentCozum-{{$comment->id}}" style="color: #0b9833"><i class="icon-check"></i>Çözüm olarak işaretlediniz.</a></li>
                                                    @else
                                                <li class="markAsSolution" id="{{$comment->id}}"><a class=cozum" id="commentCozum-{{$comment->id}}" href="#comment-{{$comment->id}}"style="color: #0b9833"><i class="icon-alert"></i>Çözüm olarak işaretle.</a></li>
                                                    @endif
                                                @endif
                                                @endif
                                                <li class="comment-share question-share question-share-2"> <i class="icon-share"></i> Paylaş
                                                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                                        <ul>
                                                            <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/soru/{{$data->slug}}#comment-{{$comment->id}}&t={{$comment->writer->name}}'in KodCevap.com'daki bir cevabı."><i class="icon-facebook"></i><span>Facebook</span>'ta Paylaş</a></li>
                                                            <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$comment->writer->name}}'in KodCevap.com'daki bir cevabı.&url=https://kodcevap.com/soru/{{$data->slug}}#comment-{{$comment->id}}"><i class="icon-twitter"></i>Twitter'da Paylaş</a></li>
                                                            <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://kodcevap.com/soru/{{$data->slug}}#comment-{{$comment->id}}&title={{$comment->writer->name}}'in KodCevap.com'daki bir cevabı."><i class="icon-linkedin"></i>LinkedIn'de Paylaş</a></li>
                                                            <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$comment->writer->name}}'in KodCevap.com'daki bir cevabı. %20-https://kodcevap.com/soru/{{$data->slug}}#comment-{{$comment->id}}"><i class="fab fa-whatsapp"></i>WhatsApp ile Paylaş</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="clearfix last-item-answers"></li>
                                            </ul>
                                            <ul class="comment-reply comment-list-links">
                                                <li class="question-list-details comment-list-details"><i class="icon-dot-3"></i>
                                                    <ul>
                                                        <li class="report_activated"><a class="report_c" href=""><i class="icon-attention"></i>Şikayet Et</a></li>
                                                    </ul>
                                                </li>
                                                <li class="clearfix last-item-answers"></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                @foreach($commentAnswers as $commentAnswer)
                                    @if($commentAnswer->parent === $comment->id)
                                        <?php $cevapRozeti = getRank($comment->writer->points)?>
                                <ul class="children">
                                    <li class="comment byuser comment-author-barry even depth-2 " itemscope itemtype="https://schema.org/Comment" id="li-comment-46">
                                        <div id="comment-{{$commentAnswer->id}}" class="comment-body clearfix">
                                            <div class="comment-text">
                                                <div class="author-image author-image-42"><a href="../../profil/{{$commentAnswer->writer->username}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$commentAnswer->writer->name}}' title='{{$commentAnswer->writer->name}}' width='42' height='42' src='{{$commentAnswer->writer->ppURL}}'></span></a>
                                                    <div class="author-image-pop-2">
                                                        <div class="post-section user-area user-area-columns_pop">
                                                            <div class="post-inner">
                                                                <div class="author-image author-image-70"><a href="/profil/{{$commentAnswer->writer->username}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$commentAnswer->writer->name}}' title='{{$commentAnswer->writer->name}}' width='70' height='70' src='{{$commentAnswer->writer->ppURL}}'></span></a></div>
                                                                <div class="user-content">
                                                                    <div class="user-inner">
                                                                        <div class="user-data-columns">
                                                                            <h4><a href="../../profil/{{$commentAnswer->writer->username}}">{{$commentAnswer->writer->name}}</a></h4>
                                                                            <div class="user-data">
                                                                                <ul>
                                                                                    <li class="city-country"><i class="icon-bucket"></i>{{$commentAnswer->writer->points}} Puan</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="user-follow-profile"><a href="/profil/{{$commentAnswer->writer->username}}">Profili Gör</a></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="author clearfix">
                                                    <div class="comment-meta">
                                                        <div class="comment-author"> <span itemprop="author" itemscope itemtype="http://schema.org/Person"> <a itemprop="url" href="../../profil/{{$commentAnswer->writer->username}}"> <span itemprop="name">{{$commentAnswer->writer->name}}</span> </a>
                                                                                    </span><span class="badge-span" style="background-color: {{$cevapRozeti->color}}">{{$cevapRozeti->name}}</span> </div>
                                                        <a href="#comment-{{$commentAnswer->id}}" class="comment-date" itemprop='url'> <span itemprop="dateCreated" datetime="{{$commentAnswer->created_at}}">{{$commentAnswer->created_at}} tarihinde {{$comment->writer->name}} adlı üyeye yanıt verdi.</span> </a>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <div itemprop='text'>
                                                        {!! $commentAnswer->body  !!}
                                                         </div>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div class="wpqa_error"></div>
                                                    <ul class="question-vote answer-vote answer-vote-dislike">
                                                        @if(\Illuminate\Support\Facades\Auth::guest())
                                                            <li><i class="icon-up-dir"></i></li>
                                                            <li class="vote_result" itemprop="upvoteCount" id="commentVoteCount-{{$commentAnswer->id}}" name="commentVoteCount-{{$commentAnswer->id}}">{{$commentAnswer->score}}</li>
                                                            <li><i class="icon-down-dir"></i></li>
                                                        @else
                                                            @if(isVotedAnswer("/soru/".$data->slug."/#comment-".$commentAnswer->id,session('user')->id) == false)
                                                                <li class="like-answers">
                                                                    <a data-voted="false" href="#comment-{{$commentAnswer->id}}" id="{{$commentAnswer->id}}" title="+ Oy Ver"><i class="icon-up-dir"></i></a></li>
                                                                <li class="vote_result" id="commentVoteCount-{{$commentAnswer->id}}" name="commentVoteCount-{{$commentAnswer->id}}" style="{{getVoteColor($commentAnswer->score)}}">{{$commentAnswer->score}}</li>
                                                                <li class="li_loader" id="commentLoader-{{$commentAnswer->id}}" name="commentLoader-{{$commentAnswer->id}}"><span class="loader_3 fa-spin"></span></li>
                                                                <li data-voted="false" class="dislike_answers"><a href="#comment-{{$commentAnswer->id}}" id="{{$commentAnswer->id}}" title="- Oy Ver"><i class="icon-down-dir"></i></a></li>
                                                            @elseif(isVotedAnswer("/soru/".$data->slug."/#comment-".$commentAnswer->id,session('user')->id)->activityType == 3)

                                                                <li class="like-answers1">
                                                                    <a data-voted="upvoted"  title="+ Oy Verdiniz."><i class="icon-up-dir" style="color: #3f9809;"></i></a></li>
                                                                <li class="vote_result" id="commentVoteCount-{{$commentAnswer->id}}" name="commentVoteCount-{{$commentAnswer->id}}" style="{{getVoteColor($commentAnswer->score)}}">{{$commentAnswer->score}}</li>
                                                                <li class="li_loader" id="commentLoader-{{$commentAnswer->id}}" name="commentLoader-{{$commentAnswer->id}}"><span class="loader_3 fa-spin"></span></li>
                                                                <li data-voted="upvoted" class="dislike_answers1"><a title="+ Oy Verdiniz."><i class="icon-down-dir"></i></a></li>

                                                            @elseif(isVotedAnswer("/soru/".$data->slug."/#comment-".$commentAnswer->id,session('user')->id)->activityType == 4)
                                                                <li class="like-answers1">
                                                                    <a data-voted="downvoted"  title="- Oy Verdiniz."><i class="icon-up-dir"></i></a></li>
                                                                <li class="vote_result" id="commentVoteCount-{{$commentAnswer->id}}" name="commentVoteCount-{{$commentAnswer->id}}" style="{{getVoteColor($commentAnswer->score)}}">{{$commentAnswer->score}}</li>
                                                                <li class="li_loader" id="commentLoader-{{$commentAnswer->id}}" name="commentLoader-{{$commentAnswer->id}}"><span class="loader_3 fa-spin"></span></li>
                                                                <li data-voted="downvoted" class="dislike_answers1">
                                                                    <a title="- Oy Verdiniz."><i class="icon-down-dir" style="color: #980909;"></i></a></li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                    <ul class="comment-reply comment-reply-main">
                                                        <li><a rel="nofollow" class="comment-reply-link wpqa-reply-link" href="#respond" data-id="{{$comment->id}}" aria-label="{{$commentAnswer->writer->name}} Yanıtla"><i class="icon-reply"></i>Yanıtla</a></li>
                                                        <li class="comment-share question-share question-share-2"> <i class="icon-share"></i> Paylaş
                                                            <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                                                <ul>
                                                                    <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/soru/{{$data->slug}}/#comment-{{$commentAnswer->id}}&t={{$commentAnswer->body}}"><i class="icon-facebook"></i><span>Facebook</span>'ta Paylaş</a></li>
                                                                    <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$commentAnswer->body}}&url=https://kodcevap.com/soru/{{$data->slug}}/#comment-{{$commentAnswer->id}}"><i class="icon-twitter"></i>Twitter'da Paylaş</a></li>
                                                                    <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://kodcevap.com/soru/{{$data->slug}}/#comment-{{$commentAnswer->id}}&title={{$commentAnswer->body}}"><i class="icon-linkedin"></i>Paylaş on LinkedIn</a></li>
                                                                    <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$commentAnswer->body}}- https://kodcevap.com/soru/{{$data->slug}}/#comment-{{$commentAnswer->id}}"><i class="fab fa-whatsapp"></i>WhatsApp ile Paylaş</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix last-item-answers"></li>
                                                    </ul>
                                                    <ul class="comment-reply comment-list-links">
                                                        <li class="question-list-details comment-list-details"><i class="icon-dot-3"></i>
                                                            <ul>
                                                                <li class="report_activated"><a class="report_c" href="#"><i class="icon-attention"></i>Şikayet Et</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="clearfix last-item-answers"></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                    @endif
                                    @endforeach
                            </li>

                            @endforeach
                             </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="respond-all">
                    <div id="respond" class="comment-respond">
                        @if(\Illuminate\Support\Facades\Auth::guest())
                        <div class="button-default show-answer-form-hide" href="/kaydol">Cevap Yaz</div>
                        @else

                        <h3 class="section-title comment-form">Cevapla<div class="cancel-comment-reply"><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></div></h3>
                        <form action="/soru/{{$data->slug}}" method="post" id="commentform" class="post-section comment-form comment-form answers-form" novalidate>
                            @csrf
                            <div class="clearfix"></div>
                            <div class="wpqa_error"></div>
                            <div class="form-input form-textarea form-comment-editor">

                                <textarea class="cevap" name="mytextarea" id="mytextarea"></textarea>
                            </div>
                            <div class="form-input">
                                <input type="hidden" name="author" value="{{\Illuminate\Support\Facades\Session::get('user')->id}}" id="comment_name" aria-required="true" placeholder="Your Name"><i class="icon-user"></i></div>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="button-default button-hide-click" value="Cevapla" /><span class="clearfix"></span><span class="load_span"><span class="loader_2"></span></span>
                                <input type='hidden' name='comment_parent' id='comment_parent' value='' />
                                <input type='hidden' name='qid' id='qid' value='{{$data->id}}' />
                            </p>


                        </form>
                            @endif
                    </div>
                </div>
            </div>
        </article>
    </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".comment-reply-link").click(function(){
                    var parent = $(this).attr("data-id");
                    $("#comment_parent").val(parent);
                });
            });
        </script>

        <script type="text/javascript">

            $(".like-answers").click(function(){
                var a = $(this).children('a').attr('id');
                var voter = $('.loggedUser').text();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var el = parseInt($("#commentVoteCount-" + a + ".vote_result").text());


                $("#commentVoteCount-" + a + ".vote_result").hide();
                $("#commentLoader-" + a + ".li_loader").show();
                $(this).children('a').css('color','#3f9809');
                $("#commentVoteCount-" + a + ".vote_result").css('color','#3f9809');
                $(this).children('a').attr('id','');

                $.ajax({

                    type: 'POST',
                    url: '/oyVerYorum',
                    data: {
                        commentid: a,
                        voteType: 1,
                        voter: voter,
                        _token: CSRF_TOKEN,
                        success:function (data) {
                            $("#commentVoteCount-" + a + ".vote_result").text(el+1);
                            $("#commentLoader-" + a + ".li_loader").hide();
                            $("#commentVoteCount-" + a + ".vote_result").show();
                            $(this).children('a').attr('id','');
                            $("#"+a).attr('id','');

                        }
                    }
                })
            });

            $(".dislike_answers").click(function(){
                var a = $(this).children('a').attr('id');
                var voter = $('.loggedUser').text();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var el = parseInt($("#commentVoteCount-" + a + ".vote_result").text());


                $("#commentVoteCount-" + a + ".vote_result").hide();
                $("#commentLoader-" + a + ".li_loader").show();
                $(this).children('a').css('color','#980909');
                $("#commentVoteCount-" + a + ".vote_result").css('color','#980909');
                $(this).children('a').attr('id','');

                $.ajax({

                    type: 'POST',
                    url: '/oyVerYorum',
                    data: {
                        commentid: a,
                        voteType: 2,
                        voter: voter,
                        _token: CSRF_TOKEN,
                        success:function (data) {
                            $("#commentVoteCount-" + a + ".vote_result").text(el-1);
                            $("#commentLoader-" + a + ".li_loader").hide();
                            $("#commentVoteCount-" + a + ".vote_result").show();
                            $(this).children('a').attr('id','');
                            $("#"+a).attr('id','');

                        }
                    }
                })
            });

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
                            $(".question-vote-down").children('a').attr('id','');


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
                            $(".question-vote-up").children('a').attr('id','');

                        }
                    }
                })
            });

            $(".markAsSolution").click(function () {

                var commentIdenty = $(this).attr('id');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/cozumIsaretle',
                    data: {
                        commentID: commentIdenty,
                        _token: CSRF_TOKEN,
                        success: function (data) {
                            $("#commentCozum-" + commentIdenty).text("Çözüm olarak işaretlendi.");
                            $("#cozumIsareti-" + commentIdenty).show();
                        }
                    }
                })

            });
        </script>
@endsection
