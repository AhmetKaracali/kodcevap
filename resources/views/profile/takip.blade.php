@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')
    <div id="section-following" class="section-page-div user-section user-section-columns row user-not-normal">
        @if ($data->follows->isNotEmpty())
            @foreach($data->follows as $following1)
                <?php $following = getFollowingData($following1->followed)->first()?>
                @php($soranRozeti = getRank($following->points))
                <div class="col col6">
                    <div class="post-section user-area user-area-columns">
                        <div class="post-inner" style="height: 380px;">
                            <div class="author-image author-image-70"><a href="/profil/{{$following->username}}"><span class="author-image-span"><img class="avatar avatar-70 photo" alt="{{$following->name}}" title="{{$following->name}}" width="70" height="70" src="{{$following->ppURL}}"></span></a></div>
                            <div class="user-content">
                                <div class="user-inner">
                                    <div class="user-data-columns">
                                        <h4><a href="/profil/{{$following->username}}">{{$following->name}}</a></h4><span class="badge-span" style="background-color: {{$soranRozeti->color}}">{{$soranRozeti->name}}</span></div>
                                </div>
                            </div>
                            <div class="user-columns-data">
                                <ul>
                                    <li class="user-columns-points align-content-center"><a href="/profil/{{$following->username}}points/"><i class="icon-bucket"></i>{{$following->points}} Puan</a></li>
                                </ul>
                            </div>
                            <div class="user-follow-profile">
                                <div class="user_follow_2 user_follow_yes">
                                    <div class="small_loader loader_2 user_follow_loader"></div></div><a href="/profil/{{$following->username}}">Profili Gör</a></div>
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
