@if(\Illuminate\Support\Facades\Auth::check()==0)
<div class="not-login-area" >
    <a class="sign-in-lock mob-sign-in" href="/giris" data-toggle="modal"><i class="icon-lock"></i></a>
    <a class="button-default button-sign-in" href="/giris" data-toggle="modal">Giriş Yap</a>
    <a class="button-default-2 button-sign-up" href="/kaydol">Kayıt Ol</a>
</div>
@else
<div class="user-login-area">
    <div class="notifications-area user-notifications float_r"><span class="notifications-click" id="notifications-click"></span><i class="icon-bell"></i>
        <div class="notification-bar" style="">
            <ul>
                <li><i class="icon-bucket"></i>
                    <div> 20 Puan Kazandınız.<span class="notifications-date">9 Aralık 2019 - 09:01</span></div>
                </li>
            </ul>
            <a href="/profil/{{session('user')->username}}/bildirimler/">Tüm bildirimleri göster.</a></div>
    </div>

        <a class="loggedUser" id="loggedUser" style="display: none">{{session('user')->username}}</a>


    <div class="user-login-click float_r"><span class="user-click"></span>
        <div class="user-image float_l"><img class="avatar avatar-29 photo" alt="{{session('user')->name}}" title="{{session('user')->name}}" width="29" height="29" src="{{session('user')->ppURL}}"></div>
        <div class="user-login float_l" style="margin-top: 22px;"><span>Merhaba</span>
            <br>
            <div class="float_l username">{{session('user')->username}}</div>
        </div><i class="icon-down-open-mini"></i>
        <ul style="display: none;">
            <li><a href="/profil/{{session('user')->username}}"><i class="icon-user"></i>Profil</a></li>
            <li><a href="/profil/{{session('user')->username}}/duzenle"><i class="icon-pencil"></i>Profili Düzenle</a></li>
            <li><a href="/profil/{{session('user')->username}}/sorular"><i class="icon-sound"></i>Sorularım</a></li>
            <li><a href="/profil/{{session('user')->username}}/cozumler"><i class="icon-graduation-cap"></i>Çözümlerim</a></li>
            <li><a href="/profil/{{session('user')->username}}/puanlar"><i class="icon-bucket"></i>Puanlarım</a></li>
            <li><a href="/profil/{{session('user')->username}}/aktivite"><i class="icon-cog"></i>Aktivite</a></li>
            <li><a href="/cikis"><i class="icon-logout"></i>Çıkış Yap</a></li>
        </ul>
    </div>
</div>

    <script type="text/javascript">
            $('.notifications-click').click(function () {
                $('.notification-bar').toggle();
            })
    </script>
@endif
