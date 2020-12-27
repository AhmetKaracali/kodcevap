@extends('Layouts.mainLayout')

@section('topbanner')
    <?php $rozet = getRank($data->points) ?>
    @include('partials.userTopBanner')
@endsection

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')

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
    <div id="section-points" class="user-notifications user-profile-area section-page-div">
        <div>
            <ul>
                @if($points == null)
                    <li class="icon-alert"><a>Puanınız bulunmuyor.</a></li>
                @else
                    @foreach($points as $puan)

                            @if($puan->pointType ==1)
                <li><i class="icon-thumbs-up"></i>
                    <div><span class="point-span">+{{$puan->pointValue}}</span>
                        <a href="{{$puan->url}}"> Bir soru paylaştınız.</a>
                        <span class="notifications-date">{{$puan->date}}</span>
                    </div>
                </li>
                                @elseif($puan->pointType ==2)
                            <li><i class="icon-thumbs-up"></i>
                                <div><span class="point-span">+{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Bir soruya cevap yazdınız.</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>
                        @elseif($puan->pointType ==3)
                            <li><i class="icon-thumbs-up"></i>
                                <div><span class="point-span">+{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Sorunuza + oy verildi.</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>
                        @elseif($puan->pointType ==4)
                            <li><i class="icon-thumbs-down"></i>
                                <div><span class="point-span">{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Sorunuza - oy verildi..</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>
                        @elseif($puan->pointType ==5)
                            <li><i class="icon-thumbs-up"></i>
                                <div><span class="point-span">+{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Cevabınıza +oy verildi.</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>
                        @elseif($puan->pointType ==6)
                            <li><i class="icon-thumbs-down"></i>
                                <div><span class="point-span">{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Cevabınıza - oy verildi.</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>
                        @elseif($puan->pointType ==7)
                            <li><i class="icon-thumbs-up"></i>
                                <div><span class="point-span">+{{$puan->pointValue}}</span>
                                    <a href="{{$puan->url}}"> Teşekkürler! Yazdığınız cevap bir soruya çözüm olarak işaretlendi.</a>
                                    <span class="notifications-date">{{$puan->date}}</span>
                                </div>
                            </li>

                            @else

                            @endif
                    @endforeach

                    @endif
            </ul>
        </div>
    </div>
@endsection
