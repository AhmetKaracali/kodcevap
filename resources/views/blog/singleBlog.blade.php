@extends ('Layouts.headerFooter')

@section('content')
    <div class="kodcevap-content">
        <div class="kodcevap-inner-content main_full main_center">
            <div class="kodcevap-container">
                <main class="kodcevap-main-wrap kodcevap-site-content float_l">
                    <div class="kodcevap-main-inner float_l">
                        <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current"><a href="/blog/kategori/{{getCategoryData($post->categories->first()->catID)->slug}}">{{getCategoryData($post->categories->first()->catID)->name}}</a> <span class="crumbs-span"> / </span><span class="current"></span> {{$post->title}}</span>
                        </span>
                        </span>
                        <div class="breadcrumb-right">
                            <div class="clearfix"></div>
                        </div>
                        </span>
                        </div>
                        <div class="clearfix"></div>
                        <article id="post-44" class="article-post article-post-only">
                            <div class="single-inner-content">
                                <header class="article-header">
                                    <time itemprop="datePublished" class="entry-date published" datetime="{{$post->created_at}}">{{$post->created_at}}</time>
                                    <span class="post-date" datetime="{{$post->created_at}}"> tarihinde paylaşıldı.</span>
                                    <span class="byline"> <span class="post-cat">Kategori: <a href="/blog/kategori/{{getCategoryData($post->categories->first()->catID)->slug}}" rel="category tag">{{getCategoryData($post->categories->first()->catID)->name}} </a></span></span><span class="post-comment">Yorum: <a href="#respond">{{$post->comments->count()}}</a></span><span class="post-views"> Görüntülenme: {{$post->views}}</span></div>
                                </header>
                            <h1 class="post-title has-text-align-center">{{$post->title}}</h1>
                            <a class="post-author centered" rel="author" href="/profil/{{$post->writer->username}}">{{$post->writer->name}}</a>
                            <figure class="featured-image post-img"><img alt="{{$post->title}}" width="768" height="510" src="https://2code.info/demo/themes/Discy/Main/wp-content/uploads/2018/04/blog-3-768x510.jpg"></figure>
                            <div class="post-wrap-content post-content ">
                                <div class="post-content-text">
                                    {!! $post->body !!}
                                </div>
                            </div>
                            <footer>
                                <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                    <ul style="right: -212px;">
                                        <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/{{$post->slug}}&amp;t={{$post->title}}"><i class="icon-facebook"></i><span>Facebook</span></a></li>
                                        <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$post->title}}&amp;url=https://kodcevap.com/{{$post->slug}}"><i class="icon-twitter"></i></a></li>
                                        <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://kodcevap.com/{{$post->slug}}&amp;title={{$post->title}}"><i class="icon-linkedin"></i></a></li>
                                        <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$post->title}} - https://kodcevap.com/{{$post->slug}}"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </footer>
                            <script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"Article","dateCreated":"{{$post->created_at}}","datePublished":"{{$post->created_at}}","dateModified":"{{$post->updated_at}}","headline":"{{$post->title}}","name":"{{$post->title}}","keywords":[],"url":"https://kodcevap.com/{{$post->slug}}","description":"{{$post->seoDesc}}","copyrightYear":"2020","articleSection":"kategori",
                                "articleBody":"{{$post->body}}"},"author":{"@type":"Person","name":"{{$post->writer->name}}","url":"https://kodcevap.com/profil/{{$post->writer->username}}"},"image":{"@type":"ImageObject","url":"https:\/\/2code.info\/demo\/themes\/Discy\/Main\/wp-content\/uploads\/2018\/04\/blog-3.jpg","width":696,"height":0}}</script>
                        </article>
                            <div class="page-navigation page-navigation-single clearfix">
                                <div class="row">
                                    <div class="col col6 col-nav-previous">
                                        <div class="nav-previous">
                                            @if($post->id != 1)
                                                @php($previous = getPrevious($post->id))
                                            <div class="navigation-content"><span class="navigation-i"><i class="icon-left-thin"></i></span><span class="navigation-text">Önceki Yazı</span>
                                                <div class="clearfix"></div><a href="/blog/{{$previous->slug}}" rel="prev">{{$previous->title}}</a></div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col col6 col-nav-next">
                                        <div class="nav-next">
                                            @if(\App\blogPost::all()->last() != $post)
                                                @php($next = getNext($post->id))
                                            <div class="navigation-content"><span class="navigation-i"><i class="icon-right-thin"></i></span><span class="navigation-text">Sonraki Yazı</span>
                                                <div class="clearfix"></div><a href="/blog/{{$next->slug}}" rel="next">{{$next->title}}</a></div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div id="comments" class="post-section">
                            <div class="post-inner">
                                <h3 class="section-title"><span>{{$post->comments->count()}} Yorum</span></h3>
                                <ol class="commentlist clearfix">
                                    <ol class="commentlist clearfix">
                                        @foreach($post->comments as $comment )
                                            @if($comment->parent == NULL)
                                            <?php $uyeRozeti = getRank($comment->yorumOwner->points)?>

                                            <li class="comment byuser comment-author-ahmed even thread-even depth-1 comment-credential comment-best-answer " itemscope itemtype="https://schema.org/Cevapla" itemprop="acceptedCevapla" id="li-comment-44">
                                                <div id="comment-{{$comment->id}}" class="comment-body clearfix">
                                                    <div class="comment-text">
                                                        <div class="author-image author-image-42"><a href="/profil/{{$comment->yorumOwner->username}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$comment->yorumOwner->name}}' title='{{$comment->yorumOwner->name}}' width='42' height='42' src='{{$comment->yorumOwner->ppURL}}'></span></a>
                                                            <div class="author-image-pop-2">
                                                                <div class="post-section user-area user-area-columns_pop">
                                                                    <div class="post-inner">
                                                                        <div class="author-image author-image-70"><a href="/profil/{{$comment->yorumOwner->username}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$comment->yorumOwner->name}}' title='{{$comment->yorumOwner->name}}' width='70' height='70' src='{{$comment->yorumOwner->ppURL}}'></span></a></div>
                                                                        <div class="user-content">
                                                                            <div class="user-inner">
                                                                                <div class="user-data-columns">
                                                                                    <h4><a href="/profil/{{$comment->yorumOwner->username}}">{{$comment->yorumOwner->name}}</a><span class="verified_user tooltip-n" title="Onaylı"><i class="icon-check"></i></span></h4>
                                                                                    <div class="user-data">
                                                                                        <ul>
                                                                                            <li class="user-columns-points"><i class="icon-bucket"></i>{{$comment->yorumOwner->points}} Puan</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="user-follow-profile"><a href="/profil/{{$comment->yorumOwner->username}}">Profili Gör</a></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="author clearfix">
                                                            <div class="comment-meta">
                                                                <div class="comment-author"> <span itemprop="author" itemscope itemtype="http://schema.org/Person"> <a itemprop="url" href="../../profil/{{$comment->yorumOwner->username}}"> <span itemprop="name">{{$comment->yorumOwner->name}}</span> </a>
                                                                            </span><span class="verified_user tooltip-n" title="Verified"><i class="icon-check"></i></span><span class="badge-span" style="background-color: {{$uyeRozeti->color}}">{{$uyeRozeti->name}}</span> </div>
                                                                <a href="#comment-{{$comment->id}}" class="comment-date" itemprop='url'> <span itemprop="dateCreated" datetime="{{$comment->created_at}}">{{$comment->created_at}} tarihinde cevapladı.</span> </a>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <div itemprop='text'>
                                                                <p>{!!  $comment->comment!!}</p>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="clearfix"></div>
                                                            <div class="wpqa_error"></div>
                                                            <ul class="comment-reply comment-reply-main">
                                                                <li><a rel="nofollow" class="comment-reply-link wpqa-reply-link" href="#respond" data-id="{{$comment->id}}" aria-label="{{$comment->yorumOwner->name}} adlı üyeye cevap ver."><i class="icon-reply"></i>Yanıtla</a></li>
                                                                <li class="comment-share question-share question-share-2"> <i class="icon-share"></i> Paylaş
                                                                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                                                        <ul>
                                                                            <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/blog/{{$post->slug}}#comment-{{$comment->id}}&t={{$comment->yorumOwner->name}}'in KodCevap.com'daki bir cevabı."><i class="icon-facebook"></i><span>Facebook</span>'ta Paylaş</a></li>
                                                                            <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$comment->yorumOwner->name}}'in KodCevap.com'daki bir cevabı.&url=https://kodcevap.com/blog/{{$post->slug}}#comment-{{$comment->id}}"><i class="icon-twitter"></i>Twitter'da Paylaş</a></li>
                                                                            <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://kodcevap.com/blog/{{$post->slug}}#comment-{{$comment->id}}&title={{$comment->yorumOwner->name}}'in KodCevap.com'daki bir cevabı."><i class="icon-linkedin"></i>LinkedIn'de Paylaş</a></li>
                                                                            <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$comment->yorumOwner->name}}'in KodCevap.com'daki bir cevabı. %20-https://kodcevap.com/blog/{{$post->slug}}#comment-{{$comment->id}}"><i class="fab fa-whatsapp"></i>WhatsApp ile Paylaş</a></li>
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
                                                @endif
                                                @foreach($commentAnswers as $commentAnswer)
                                                    @if($commentAnswer->parent === $comment->id)
                                                        <?php $cevapRozeti = getRank($commentAnswer->yorumOwner->points)?>
                                                        <ul class="children">
                                                            <li class="comment byuser comment-author-barry even depth-2 " itemscope itemtype="https://schema.org/Comment" id="li-comment-46">
                                                                <div id="comment-{{$commentAnswer->id}}" class="comment-body clearfix">
                                                                    <div class="comment-text">
                                                                        <div class="author-image author-image-42"><a href="../../profil/{{$commentAnswer->yorumOwner->username}}"><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$commentAnswer->yorumOwner->name}}' title='{{$commentAnswer->yorumOwner->name}}' width='42' height='42' src='{{$commentAnswer->yorumOwner->ppURL}}'></span></a>
                                                                            <div class="author-image-pop-2">
                                                                                <div class="post-section user-area user-area-columns_pop">
                                                                                    <div class="post-inner">
                                                                                        <div class="author-image author-image-70"><a href="/profil/{{$commentAnswer->yorumOwner->username}}"><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$commentAnswer->yorumOwner->name}}' title='{{$commentAnswer->yorumOwner->name}}' width='70' height='70' src='{{$commentAnswer->yorumOwner->ppURL}}'></span></a></div>
                                                                                        <div class="user-content">
                                                                                            <div class="user-inner">
                                                                                                <div class="user-data-columns">
                                                                                                    <h4><a href="../../profil/{{$commentAnswer->yorumOwner->username}}">{{$commentAnswer->yorumOwner->name}}</a></h4>
                                                                                                    <div class="user-data">
                                                                                                        <ul>
                                                                                                            <li class="city-country"><i class="icon-bucket"></i>{{$commentAnswer->yorumOwner->points}} Puan</li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="user-follow-profile"><a href="/profil/{{$commentAnswer->yorumOwner->username}}">Profili Gör</a></div>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="author clearfix">
                                                                            <div class="comment-meta">
                                                                                <div class="comment-author"> <span itemprop="author" itemscope itemtype="http://schema.org/Person"> <a itemprop="url" href="../../profil/{{$commentAnswer->yorumOwner->username}}"> <span itemprop="name">{{$commentAnswer->yorumOwner->name}}</span> </a>
                                                                                    </span><span class="badge-span" style="background-color: {{$cevapRozeti->color}}">{{$cevapRozeti->name}}</span> </div>
                                                                                <a href="#comment-{{$commentAnswer->id}}" class="comment-date" itemprop='url'> <span itemprop="dateCreated" datetime="{{$commentAnswer->created_at}}">{{$commentAnswer->created_at}} tarihinde {{$comment->yorumOwner->name}} adlı üyeye yanıt verdi.</span> </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text">
                                                                            <div itemprop='text'>
                                                                                {!! $commentAnswer->comment  !!}
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="wpqa_error"></div>
                                                                            <ul class="comment-reply comment-reply-main">
                                                                                <li><a rel="nofollow" class="comment-reply-link wpqa-reply-link" href="#respond" data-id="{{$comment->id}}" aria-label="{{$commentAnswer->yorumOwner->name}} Yanıtla"><i class="icon-reply"></i>Yanıtla</a></li>
                                                                                <li class="comment-share question-share question-share-2"> <i class="icon-share"></i> Paylaş
                                                                                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                                                                        <ul>
                                                                                            <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/blog/{{$post->slug}}/#comment-{{$commentAnswer->id}}&t={{$commentAnswer->body}}"><i class="icon-facebook"></i><span>Facebook</span>'ta Paylaş</a></li>
                                                                                            <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text={{$commentAnswer->body}}&url=https://kodcevap.com/blog/{{$post->slug}}/#comment-{{$commentAnswer->id}}"><i class="icon-twitter"></i>Twitter'da Paylaş</a></li>
                                                                                            <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://kodcevap.com/blog/{{$post->slug}}/#comment-{{$commentAnswer->id}}&title={{$commentAnswer->body}}"><i class="icon-linkedin"></i>Paylaş on LinkedIn</a></li>
                                                                                            <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text={{$commentAnswer->body}}- https://kodcevap.com/blog/{{$post->slug}}/#comment-{{$commentAnswer->id}}"><i class="fab fa-whatsapp"></i>WhatsApp ile Paylaş</a></li>
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
                                    <h3 class="section-title">Yorum Yap<div class="cancel-comment-reply"><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Vazgeç</a></div></h3>
                                    @if(\Illuminate\Support\Facades\Auth::guest())
                                        <a href="/kaydol" class="text-white">Yorum yazmak için lütfen kayıt olun veya giriş yapın.</a></div>
                                    @else

                                        <form action="/blog/{{$post->slug}}" method="post" id="commentform" class="post-section comment-form comment-form answers-form" novalidate>
                                            @csrf
                                            <div class="clearfix"></div>
                                            <div class="wpqa_error"></div>
                                            <div class="form-input form-textarea form-comment-editor">
                                                <textarea class="blogyorum" name="blogyorum" id="blogyorum" aria-required="true"></textarea>
                                            </div>
                                            <div class="form-input">
                                                <input type="hidden" name="author" value="{{\Illuminate\Support\Facades\Session::get('user')->id}}" id="comment_name" aria-required="true"></div>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="button-default button-hide-click" value="Yorum Yap" /><span class="clearfix"></span><span class="load_span"><span class="loader_2"></span></span>
                                                <input type='hidden' name='comment_parent' id='comment_parent' value='' />
                                                <input type='hidden' name='blogid' id='blogid' value='{{$post->id}}' />
                                            </p>


                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hide-main-inner"></div>
                </main>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".comment-reply-link").click(function(){
                var parent = $(this).attr("data-id");
                $("#comment_parent").val(parent);
            });
        });
    </script>
    @endsection

