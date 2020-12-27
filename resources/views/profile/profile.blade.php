@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')
   @include('partials.userMenu')
    <div class="user-area-content">
        <div class="post-section user-area user-area-advanced user-advanced user-area-head">
            <div class="post-inner">
                <div class="user-content">
                    <div class="user-inner">
                        <div class="bio_editor">{{$data->about}}</div>
                        <div class="user-data">
                            <ul>
                                <li class="city-country"><i class="icon-location"></i>{{$data->konum}}</li>
                                <li class="user-gender"><i class="icon-heart"></i>@if($data->cinsiyet == 0) Erkek @else Kadın @endif</li>
                                <li class="user-age"><i class="icon-globe"></i>{{$data->birthdate}} Tarihinde Doğdu</li>
                            </ul>
                        </div>
                    </div>
                    <div class="social-ul">
                        <ul>
                            <li class="social-facebook"><a title="Facebook" class="tooltip-n" href="@if($data->facebookURL!=null) {{$data->facebookURL}}" target="_blank" rel="nofollow"> @else {{"#"}}"> @endif<i class="icon-facebook"></i></a></li>
                            <li class="social-twitter"><a title="Twitter" class="tooltip-n" href="@if($data->twitterURL!=null) {{$data->twitterURL}}" target="_blank" rel="nofollow"> @else {{"#"}}"> @endif<i class="icon-twitter"></i></a></li>
                            <li class="social-linkedin"><a title="Linkedin" class="tooltip-n" href="@if($data->linkedinURL!=null) {{$data->linkedinURL}}" target="_blank" rel="nofollow"> @else {{"#"}}"> @endif<i class="icon-linkedin"></i></a></li>
                            <li class="social-instagram"><a title="Instagram" class="tooltip-n" href="@if($data->instagramURL!=null) {{$data->instagramURL}}" target="_blank" rel="nofollow"> @else {{"#"}}"> @endif<i class="icon-instagrem"></i></a></li>

                            <li class="social-email"><a title="Email" class="tooltip-n" href="@if($data->email!=null) mailto:{{$data->email}}" target="_blank" rel="nofollow">@else {{"#"}}"> @endif<i class="icon-mail"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="user-stats">
            <ul class="row">
                <li class="col col3 user-questions">
                    <div>
                        <a href="/profil/{{$data->username}}/sorular"></a><i class="icon-book-open"></i>
                        <div><span>{{$data->sorular->count()}}</span>
                            <h4>Soru</h4></div>
                    </div>
                </li>
                <li class="col col3 user-answers">
                    <div>
                        <a href="/profil/{{$data->username}}/cevaplar"></a><i class="icon-comment"></i>
                        <div><span>{{$data->soruCevaplar->count()}}</span>
                            <h4>Cevap</h4></div>
                    </div>
                </li>
                <li class="col col3 user-best-answers">
                    <div>
                        <a href="/profil/{{$data->username}}/cozumler"></a><i class="icon-graduation-cap"></i>
                        <div><span>{{$data->soruCevaplar->where('isSolution','=',1)->count()}}</span>
                            <h4>Çözüm</h4></div>
                    </div>
                </li>
                <li class="col col3 user-points">
                    <div>
                        <a href="/profil/{{$data->username}}/puanlar"></a><i class="icon-bucket"></i>
                        <div><span>{{$data->points}}</span>
                            <h4>Puan</h4></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="user-follower">
            <ul class="row">
                <li class="col col6 user-followers">
                    <div>

                        <h4><i class="icon-users"></i><a href="/profil/{{$data->username}}/takipci">Takipçi</a></h4>
                        <div>
                            @if ($data->followers->isNotEmpty())
                            @if($data->followers->count() >0)
                                <?php $i = 0;?>
                            @foreach($data->followers as $follower1)
                                    <?php $follower = getFollowerData($follower1->follower)->first()?>
                            <img class='avatar avatar-29 photo' alt='{{$follower->name}}' title='{{$follower->name}}'
                                    width='29' height='29' src='{{$follower->ppURL}}' href='/profil/{{$follower->username}}'>
                                @if($i++ >3)
                                    @break
                                        @endif
                                @endforeach
                                <span><span>+ {{$data->followers->count() - $i}}</span> Diğer Kişi</span>

                                @else
                                <?php $follower = getFollowerData($data->followers->first()->follower)->first()?>
                                <img class='avatar avatar-29 photo' alt='{{$follower->name}}' title='{{$follower->name}}'
                                     width='29' height='29' src='{{$follower->ppURL}}' href='/profil/{{$follower->username}}'>
                                <span><span>+ {{$data->followers->count()-1}}</span> Takipçi</span>
                                @endif

                                @else
                                <span><span>0</span> Takipçi</span>
                                @endif
                        </div>
                    </div>
                </li>
                <li class="col col6 user-following">
                    <div>

                        <h4><i class="icon-users"></i><a href="/profil/{{$data->username}}/takip">Takip Edilen</a></h4>
                        <div>
                            @if ($data->follows->isNotEmpty())
                                @if($data->follows->count() >0)
                                    <?php $i = 0;?>
                                        @foreach($data->follows as $following1)
                                            <?php $following = getFollowingData($following1->followed)->first()?>
                                    <img class='avatar avatar-29 photo' alt='{{$following->name}}' title='{{$following->name}}'
                                         width='29' height='29' src='{{$following->ppURL}}' href='/profil/{{$following->username}}'>
                                             @if($i++ >3)
                                                 @break
                                                @endif
                                        @endforeach
                                    <span><span>+ {{$data->follows->count() - $i}}</span> Diğer Kişi</span>
                                @else
                                    <?php $follower = getFollowerData($data->followers->first()->follower)->first()?>
                                <img class='avatar avatar-29 photo' alt='{{$follower->name}}' title='{{$follower->name}}'
                                     width='29' height='29' src='{{$follower->ppURL}}' href='/profil/{{$follower->username}}'>
                                <span><span>+ {{$data->followers->count()-1}}</span> Takip Edilen</span>
                                @endif
                                @else
                                    <span><span>0</span> Takip Edilen</span>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
