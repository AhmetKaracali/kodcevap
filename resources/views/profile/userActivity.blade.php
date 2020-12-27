@extends ('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')

    <div id="section-activities" class="user-notifications user-profile-area section-page-div">
        <div>
            <ul>
                @if(!$activity)
                    <li class="icon-alert"><a>Aktiviteniz bulunmuyor.</a></li>
                    @else
                @foreach($activity as $aktivite)

                    @if($aktivite->activityType ==1)
                        <li><i class="icon-up-dir"></i>
                            <div><a href="{{$aktivite->url}}">Soruya + oy kullandınız.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                        @elseif($aktivite->activityType ==2)
                        <li><i class="icon-down-dir"></i>
                            <div><a href="{{$aktivite->url}}">Soruya - oy kullandınız.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==3)
                        <li><i class="icon-up-dir"></i>
                            <div><a href="{{$aktivite->url}}">Soruya + oy kullandınız.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==4)
                        <li><i class="icon-down-dir"></i>
                            <div><a href="{{$aktivite->url}}">Soruya - oy kullandınız.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==5)
                        <li><i class="icon-sound"></i>
                            <div><a href="{{$aktivite->url}}">Yeni bir soru eklediniz.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==6)
                        <li><i class="icon-comment"></i>
                            <div><a href="{{$aktivite->url}}">Yeni bir cevap eklediniz.</a><span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>

                    @elseif($aktivite->activityType ==7)

                        <li><i class="icon-user"></i>
                            <div><a href="{{$aktivite->url}}">Bir kullanıcıyı takip ettiniz.</a>.<span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==8)
                        <li><i class="icon-user"></i>
                            <div><a href="{{$aktivite->url}}">Bir kullanıcıyı takipten çıktınız.</a>.<span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>
                    @elseif($aktivite->activityType ==9)
                        <li><i class="icon-user"></i>
                            <div><a href="{{$aktivite->url}}">Bir topluluğa katıldınız.</a>.<span class="notifications-date">{{$aktivite->date}}</span></div>
                        </li>

                        @else

                        @endif
                @endforeach
               @endif
            </ul>
        </div>
    </div>
@endsection
