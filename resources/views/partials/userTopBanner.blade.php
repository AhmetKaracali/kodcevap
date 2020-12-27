<div class='wpqa-profile-cover'>
    <div class='wpqa-cover-background'>
        <div class='cover-opacity' style="background-image: url('{{$data->userCover}}')"></div>
        <div class='wpqa-cover-inner kodcevap-container'>
            <div class='wpqa-cover-content'>
                <div class='post-section user-area user-advanced user-cover'>
                    <div class='post-inner'>
                        <div class='user-head-area'>
                            <div class="author-image author-image-84"><a href="/profil/{{$data->username}}"><span class="author-image-span"><img class='avatar avatar-84 photo' alt='{{$data->name}}' title='{{$data->name}}' width='84' height='84' src='{{$data->ppURL}}'></span></a></div>
                        </div>
                        <div class='user-content'>
                            <div class='user-inner'>
                                <h4><a href='/profil/{{$data->username}}'>{{$data->name}}</a></h4><span class="badge-span" style="background-color: {{$rozet->color}}">{{$rozet->name}}</span></div>
                        </div>
                    </div>
                </div>
                <div class='wpqa-cover-right'>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(session()->get('user')->username != $data->username)

                            <div class='wpqa-cover-buttons' id="followbutton"  style="background-color: #6033ff;">
                                @if(isFollowing($data->id,session('user')->id))
                                    <i class='icon-plus' style="color: #fff;"></i>
                                <a href="#" class="follow-cat-button" data-clicked="false" style="color: #fff;">Takip Et</a>
                                    @else
                                    <i class='icon-check' style="color: #fff;"></i>
                                    <a href="#" class="follow-cat-button" data-clicked="true" style="color: #fff;">Takip Ediliyor</a>
                                @endif
                            </div>
                        <a class="takipedilen" style="display: none">{{$data->id}}</a>

                        @endif
                    @endif
                    <div class='wpqa-cover-buttons wpqa-cover-following'><i class='icon-users'></i><span class='cover-count following-cover-count'>@if ($data->follows->isNotEmpty()) {{$data->follows->count()}} @else {{0}} @endif</span>Takip Edilen</div>
                    <div class='wpqa-cover-buttons wpqa-cover-followers'><i class='icon-users'></i><span class='cover-count follower-cover-count'>@if ($data->followers->isNotEmpty()) {{$data->followers->count()}} @else {{0}} @endif</span>Takipçi</div>
                    <div><a class='wpqa-cover-buttons wpqa-cover-questions' href='/profil/{{$data->username}}/sorular'><i class='icon-book-open'></i><span class='cover-count'>{{$data->sorular->count()}}</span>Soru</a></div>
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
            var takipedilen = $('.takipedilen').text();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($(".follower-cover-count").text());

            if($(this).attr('data-clicked') === "false") {


                $.ajax({

                    type: 'POST',
                    url: '/takipet',
                    data: {
                        takipeden: takipeden,
                        takipedilen: takipedilen,
                        _token: CSRF_TOKEN,
                        success: function (data) {
                            $('.follow-cat-button').text(" Takip Ediliyor");
                            $(".icon-plus").addClass("icon-check");
                            $(".icon-check").removeClass("icon-plus");
                            $('.follow-cat-button').attr('data-clicked', 'true');
                            $(".follower-cover-count").text(el+1);

                        }
                    }
                })
            }
            else if($(this).attr('data-clicked') === "true") {


                $.ajax({

                    type: 'POST',
                    url: '/takipbirak',
                    data: {
                        takipeden: takipeden,
                        takipedilen: takipedilen,
                        _token: CSRF_TOKEN,
                        success: function (data) {
                            $('.follow-cat-button').text(" Takip Et");
                            $(".icon-check").addClass("icon-plus");
                            $(".icon-plus").removeClass("icon-check");
                            $('.follow-cat-button').attr('data-clicked','false');
                            $(".follower-cover-count").text(el-1);
                        }
                    }
                })
            }

        });
        });
</script>
