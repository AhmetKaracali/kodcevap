@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')
    <div id='section-answers' class="page-content commentslist section-page-div">
        <ol class="commentlist clearfix">
            @php($soranRozeti = getRank($data->points))
            @foreach($data->soruCevaplar->where('isSolution','!=',1)->sortByDesc('created_at') as $cevap)
            <li class="comment byuser comment-author-marko even thread-even depth-1" id="li-comment-{{$cevap->id}}">
                <div id="comment-{{$cevap->id}}" class="comment-body clearfix">
                    <div class="comment-text">
                        <div class="author-image author-image-42"><a href="../.."><span class="author-image-span"><img class='avatar avatar-42 photo' alt='{{$data->name}}' title='{{$data->name}}' width='42' height='42' src='{{$data->ppURL}}'></span></a>
                            <div class="author-image-pop-2">
                                <div class="post-section user-area user-area-columns_pop">
                                    <div class="post-inner">
                                        <div class="author-image author-image-70"><a href="../.."><span class="author-image-span"><img class='avatar avatar-70 photo' alt='{{$data->name}}' title='{{$data->name}}' width='70' height='70' src='{{$data->ppURL}}'></span></a></div>
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

                                        <div class="user-follow-profile"><a href="/profil/{{$data->username}}">Profili Gör</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="author clearfix">
                            <div class="comment-meta">
                                <div class="comment-author"> <a href="/profil/{{$data->username}}"> {{$data->name}} </a> <span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span> </div> <a href="../../../soru/{{soruBul($cevap->questionID)->slug}}#comment-{{$cevap->id}}" class="comment-date"> {{$cevap->created_at}} tarihinde cevapladı. </a> </div>
                        </div>
                        <div class="text">
                            <div>
                                <p>{{$cevap->body}}</p>
                                 </div>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div class="wpqa_error"></div>
                            <ul class="comment-reply comment-reply-main">
                                <li class="comment-share question-share question-share-2"> <i class="icon-share"></i> Paylaş
                                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                                        <ul>
                                            <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=https://kodcevap.com/profil/{{$data->username}}/cevaplar#comment-{{$data->username}}&t=KodCevap sitesinde {{$data->name}}'in cevabı."><i class="icon-facebook"></i><span>Facebook</span>'ta Paylaş</a></li>
                                            <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text=KodCevap sitesinde {{$data->name}}'in cevabı.&url=https://kodcevap.com/profil/{{$data->username}}/cevaplar#comment-{{$data->username}}"><i class="icon-twitter"></i>Twitter'da Paylaş</a></li>
                                            <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://kodcevap.com/profil/{{$data->username}}/cevaplar#comment-{{$data->username}}&title=KodCevap sitesinde {{$data->name}}'in cevabı."><i class="icon-linkedin"></i>LinkedIn'de Paylaş</a></li>
                                            <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text=KodCevap sitesinde {{$data->name}}'in cevabı.- https://kodcevap.com/profil/{{$data->username}}/cevaplar#comment-{{$data->username}}"><i class="fab fa-whatsapp"></i>WhatsApp ile Paylaş</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="clearfix last-item-answers"></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
            @endforeach
            @if($data->soruCevaplar->where('isSolution','!=',1)->isEmpty())
                {{ "Bu üye henüz bir soruya cevap yazmamıştır.." }}
            @endif
        </ol>
    </div>
@endsection
