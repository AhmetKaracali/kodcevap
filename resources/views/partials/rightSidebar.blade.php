<div class="hide-sidebar sidebar-width">
    <div class="hide-sidebar-inner"></div>
</div>

<aside class="sidebar sidebar-width float_l fixed-sidebar">
    <div class="inner-sidebar">
        <div class="widget widget_ask"><a target="_self" href="/sor" class="button-default wpqa-question">Soru Sor</a></div>
        <section id="stats-widget-2" class="widget-no-divider widget stats-widget">
            <h3 class="screen-reader-text">İstatistikler</h3>
            <div class="widget-wrap">
                <ul class="stats-inner">
                    <li class="stats-questions">
                        <div><span class="stats-text">Soru</span><span class="stats-value">{{$soruSayisi}}</span></div>
                    </li>
                    <li class="stats-answers">
                        <div><span class="stats-text">Cevap</span><span class="stats-value">{{$cevapSayisi}}</span></div>
                    </li>
                    <li class="stats-best_answers">
                        <div><span class="stats-text">Çözüm</span><span class="stats-value">{{$cozumSayisi}}</span></div>
                    </li>
                    <li class="stats-users">
                        <div><span class="stats-text">Kullanıcı</span><span class="stats-value">{{$userCount}}</span></div>
                    </li>
                </ul>
            </div>
        </section>
        <div class="widget tabs-wrap widget-tabs">
            <div class="widget-title widget-title-tabs">
                <ul class="tabs tabstabs-widget-2">
                    <li class="tab"><a href="index-show=most-visited.html#">Popüler Sorular</a></li>
                    <li class="tab"><a href="index-show=most-visited.html#">Son Cevaplar</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="widget-wrap">
                <div class="widget-posts tab-inner-wrap tab-inner-wraptabs-widget-2">
                    <div class="user-notifications user-profile-area">
                        <div>
                            <ul>
                                @foreach( $popularQuestions as $popQuestion)
                                <li class="widget-posts-text widget-no-img"><span class="span-icon"><a href="/profil/{{$popQuestion->username}}"><img class="avatar avatar-20 photo" alt="{{$popQuestion->name}}" title="{{$popQuestion->name}}" width="20" height="20" src="{{$popQuestion->ppURL}}"></a></span>
                                    <div>
                                        <h3><a href="/soru/{{$popQuestion->slug}}" title="{{$popQuestion->title}}" rel="bookmark">{{$popQuestion->title}}</a></h3>
                                        <ul class="widget-post-meta">
                                            <li><a class="post-meta-comment" href="/soru/{{$popQuestion->slug}}#comments"><i class="icon-up-dir"></i>{{$popQuestion->vote}} Oy Puanı </a></li>
                                        </ul>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-inner-wrap tab-inner-wraptabs-widget-2">
                    <div class="user-notifications user-profile-area">
                        <div>
                            <ul>
                                @foreach( $latestAnswers as $la )
                                <li><span class="span-icon"><a href="/profil/{{$la->username}}"><img class="avatar avatar-25 photo" alt="{{$la->name}}" title="{{$la->name}}" width="25" height="25" src="{{$la->ppURL}}"></a></span>
                                    <div><a href="/profil/{{$la->username}}">{{$la->name}}</a> cevapladı <span class="question-title"><a href="/soru/{{$la->slug}}">{{Str::limit($la->title,30)}}</a></span><span class="notifications-date">{{ $la->created_at}}</span></div>
                                </li>
@endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery("ul.tabstabs-widget-2").tabs(".tab-inner-wraptabs-widget-2", {
                            tabs: "li",
                            effect: "slide",
                            fadeInSpeed: 100
                        });
                    });
                </script>
            </div>
        </div>
        <section id="users-widget-2" class="widget users-widget">
            <h2 class="widget-title"><i class="icon-folder"></i>En Popüler Üyeler</h2>
            <div class="widget-wrap">
                <div class="user-section user-section-small row user-not-normal">
                    @foreach($popularUsers as $pu)
                        <?php $cevapRozeti = getRank($pu->points)?>
                    <div class="col col12">
                        <div class="post-section user-area user-area-small">
                            <div class="post-inner">
                                <div class="author-image author-image-42"><a href="/profil/{{$pu->username}}"><span class="author-image-span"><img class="avatar avatar-42 photo" alt="{{$pu->name}}" title="{{$pu->name}}" width="42" height="42" src="{{$pu->ppURL}}"></span></a></div>
                                <div class="user-content">
                                    <div class="user-inner">
                                        <h4><a href="/profil/{{$pu->username}}">{{$pu->name}}</a></h4>
                                        <div class="user-data">
                                            <ul>
                                                <li class="user-points"><a href="/profil/{{$pu->username}}/puanlar">{{$pu->points}} Puan</a></li>
                                            </ul>
                                        </div><span class="badge-span" style="background-color: {{$cevapRozeti->color}}">{{$cevapRozeti->name}}</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </section>
        <section id="tag_cloud-2" class="widget widget_tag_cloud">
            <h2 class="widget-title"><i class="icon-folder"></i>Popüler Etiketler</h2>
            <div class="tagcloud">
                @foreach( $popularTags as $pt)
                <a href="/etiketler/{{$pt->slug}}" class="tag-cloud-link" style="font-size: 22pt;" aria-label="{{$pt->name}}">{{$pt->name}}</a>
                @endforeach
        </section>
    </div>
</aside>
