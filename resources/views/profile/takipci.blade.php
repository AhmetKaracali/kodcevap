@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    <div class='wpqa-profile-cover'>
        <div class='wpqa-cover-background'>
            <div class='cover-opacity'></div>
            <div class='wpqa-cover-inner kodcevap-container'>
                <div class='wpqa-cover-content'>
                    <div class='post-section user-area user-advanced user-cover'>
                        <div class='post-inner'>
                            <div class='user-head-area'>
                                <div class="author-image author-image-84"><a href="#"><span class="author-image-span"><img class='avatar avatar-84 photo' alt='{{$data->name}}' title='{{$data->name}}' width='84' height='84' src='{{$data->ppURL}}'></span></a></div>
                            </div>
                            <div class='user-content'>
                                <div class='user-inner'>
                                    <h4><a href='#'>{{$data->name}}</a></h4><span class="badge-span" style="background-color: {{$rozet->color}}">{{$rozet->name}}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class='wpqa-cover-right'>
                        <div class='wpqa-cover-buttons wpqa-cover-following'><i class='icon-users'></i><span class='cover-count following-cover-count'>@if ($data->follows->isNotEmpty()) {{$data->follows->count()}} @else {{0}} @endif</span>Takip Edilen</div>
                        <div class='wpqa-cover-buttons wpqa-cover-followers'><i class='icon-users'></i><span class='cover-count follower-cover-count'>@if ($data->followers->isNotEmpty()) {{$data->followers->count()}} @else {{0}} @endif</span>Takipçi</div>
                        <div><a class='wpqa-cover-buttons wpqa-cover-questions' href='/profil/{{$data->id}}/sorular'><i class='icon-book-open'></i><span class='cover-count'>{{$data->sorular->count()}}</span>Soru</a></div>
                    </div>
                </div>
                <div class='clearfix'></div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')
    <div id="section-following" class="section-page-div user-section user-section-columns row user-not-normal">
        @if ($data->followers->isNotEmpty())
            @foreach($data->followers as $follower1)
                <?php $follower = getFollowerData($follower1->follower)->first()?>
                    @php($soranRozeti = getRank($follower->points))
        <div class="col col6">
            <div class="post-section user-area user-area-columns">
                <div class="post-inner" style="height: 380px;">
                    <div class="author-image author-image-70"><a href="/profil/{{$follower->username}}"><span class="author-image-span"><img class="avatar avatar-70 photo" alt="{{$follower->name}}" title="{{$follower->name}}" width="70" height="70" src="{{$follower->ppURL}}"></span></a></div>
                    <div class="user-content">
                        <div class="user-inner">
                            <div class="user-data-columns">
                                <h4><a href="/profil/{{$follower->username}}">{{$follower->name}}</a></h4><span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span></div>
                        </div>
                    </div>
                    <div class="user-columns-data">
                        <ul>
                            <li class="user-columns-points align-content-center"><a href="/profil/{{$follower->username}}points/"><i class="icon-bucket"></i>{{$follower->points}} Puan</a></li>
                        </ul>
                    </div>
                    <div class="user-follow-profile">
                        <div class="user_follow_2 user_follow_yes">
                            <div class="small_loader loader_2 user_follow_loader"></div></div><a href="/profil/{{$follower->username}}">Profili Gör</a></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
            @endforeach
            @else
            {{""}}
        @endif

    </div>
    </div>
@endsection
