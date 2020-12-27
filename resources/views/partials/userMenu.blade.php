<div class="wrap-tabs">
    <div class="menu-tabs">
        <ul class="menu flex">
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/">Hakkında</a>
            </li>
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/sorular")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/sorular">Sorular</a></li>
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/cevaplar")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/cevaplar">Cevaplar</a></li>
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/cozumler")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/cozumler">Çözümler</a></li>
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/takipci")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/takipci">Takipçi</a></li>
            <li @if(request()->getPathInfo() == "/profil/".$data->username."/takip")class="active-tab" @endif>
                <a href="/profil/{{$data->username}}/takip">Takip Edilen</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li @if(request()->getPathInfo() == "/profil/".$data->username."/aktivite")class="active-tab" @endif>
                    <a href="/profil/{{$data->username}}/aktivite">Aktivite</a></li>
                <li @if(request()->getPathInfo() == "/profil/".$data->username."/takip")class="active-tab" @endif>
                    <a href="/profil/{{$data->username}}/puanlar">Puanlar</a></li>
            @endif
        </ul>
    </div>
</div>
