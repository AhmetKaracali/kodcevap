<div class='wpqa-profile-cover wpqa-cat-cover'>
    <div class='wpqa-cover-background'>
        <div class='cover-opacity' style="
            background-image: url({{$topluluk->first()->toplulukCover}});
            "></div>
        <div class='wpqa-cover-inner kodcevap-container'>
            <div class='wpqa-cover-content'>
                <div class='cat-cover-left'><span class='cover-cat-span' style="
                        background-image: url({{$topluluk->first()->toplulukPP}});
                        background-color: {{$topluluk->first()->color}};
                        background-size: cover;
                        "></span>
                    <div class='cover-cat-right'>
                        <h4>{{$topluluk->first()->name}}</h4></div>
                    <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                        <ul>
                            <li class="share-facebook"><a target="_blank" href=""><i class="icon-facebook"></i><span>Facebook</span></a></li>
                            <li class="share-twitter"><a target="_blank" href=""><i class="icon-twitter"></i></a></li>
                            <li class="share-linkedin"><a target="_blank" href=""><i class="icon-linkedin"></i></a></li>
                            <li class="share-whatsapp"><a target="_blank" href=""><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class='wpqa-cover-right'>
                    @if(\Illuminate\Support\Facades\Auth::check())

                            <div class='wpqa-cover-buttons' id="followbutton"  style="background-color: #6033ff;">
                                @if(isCommunityUser(session('user')->id,$topluluk->first()->id))
                                    <i class='icon-plus' style="color: #fff;"></i>
                                    <a href="#" class="follow-cat-button" data-clicked="false" style="color: #fff;">Takip Et</a>
                                @else
                                    <i class='icon-check' style="color: #fff;"></i>
                                    <a href="#" class="follow-cat-button" data-clicked="true" style="color: #fff;">Takip Ediliyor</a>
                                @endif
                            </div>
                            <a class="takipedilen" style="display: none">{{$topluluk->first()->id}}</a>


                    @endif

                    <div class='wpqa-cover-buttons wpqa-cover-followers'><i class='icon-users'></i><span class='cover-count follow-cover-count'>{{$topluluk->first()->user->count()}}</span>Takipçi</div>
                   @php($cevapCount = 0)
                        @foreach($topluluk->first()->soruTopluluk as $soru)
                       @php($cevapCount += getCommentCount($soru))
                        @endforeach
                    <div class='wpqa-cover-buttons wpqa-cover-answers'><i class='icon-comment'></i><span class='cover-count'>{{$cevapCount}}</span>Cevap</a>
                    </div>
                    <div class='wpqa-cover-buttons wpqa-cover-questions'><i class='icon-book-open'></i><span class='cover-count'>{{$topluluk->first()->soruTopluluk->count()}}</span>Soru</a>
                    </div>
                </div>
            </div>
            <div class='clearfix'></div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".follow-cat-button").click(function() {
            var takipeden = $('.loggedUser').text();
            var topluluk = $('.takipedilen').text();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($(".follow-cover-count").text());


            if($(this).attr('data-clicked') === "false") {


                $.ajax({

                    type: 'POST',
                    url: '/followTopluluk',
                    data: {
                        takipeden: takipeden,
                        topluluk: topluluk,
                        _token: CSRF_TOKEN,
                        success: function (data) {
                            $('.follow-cat-button').text(" Takip Ediliyor");
                            $(".icon-plus").addClass("icon-check");
                            $(".icon-check").removeClass("icon-plus");
                            $('.follow-cat-button').attr('data-clicked', 'true');
                            $(".follow-cover-count").text(el+1);
                        }
                    }
                })
            }
            else if($(this).attr('data-clicked') === "true") {


                $.ajax({

                    type: 'POST',
                    url: '/unfollowTopluluk',
                    data: {
                        takipeden: takipeden,
                        topluluk: topluluk,
                        _token: CSRF_TOKEN,
                        success: function (data) {
                            $('.follow-cat-button').text(" Takip Et");
                            $(".icon-check").addClass("icon-plus");
                            $(".icon-plus").removeClass("icon-check");
                            $('.follow-cat-button').attr('data-clicked','false');
                            $(".follow-cover-count").text(el-1);
                        }
                    }
                })
            }

        });
    });
</script>
