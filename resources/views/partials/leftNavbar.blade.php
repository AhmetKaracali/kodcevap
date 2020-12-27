<nav class="nav_menu float_r fixed_nav_menu">
    <h3 class="screen-reader-text">Navigasyon</h3>
    <ul id="menu-explore-not-login" class="menu">
        <li class="nav_menu_open menu-item @if(request()->getPathInfo() == "/")current-menu-item @endif""><a class="" href="/sorular"><i class="icon-book-open"></i>Sorular</a>
        <ul class="sub-menu">
            <li class="menu-item @if(request()->getPathInfo() == "/") @if(request()->get('show') == "")current-menu-item @endif @endif"><a class="" href="/">Yeni Sorular</a></li>
            <li class="menu-item @if(request()->get('show') == "most-views") current-menu-item @endif"><a class="" href="/?show=most-views">En Çok Görüntülenen Sorular</a></li>
            <li class="menu-item @if(request()->get('show') == "most-voted") current-menu-item @endif"><a class="" href="/?show=most-voted">En Çok Oylanan Sorular</a></li>
        </ul>
        </li>
        <li class="menu-item @if(request()->getPathInfo() == "/topluluklar")current-menu-item @endif""><a class="" href="/topluluklar"><i class="icon-folder"></i>Topluluklar</a></li>

        <li class="menu-item @if(request()->getPathInfo() == "/etiketler")current-menu-item @endif""><a class="" href="/etiketler"><i class="icon-tag"></i>Etiketler</a></li>
        <li class="menu-item @if(request()->getPathInfo() == "/rozetler")current-menu-item @endif""><a class="" href="/rozetler"><i class="icon-trophy"></i>Rozetler</a></li>
        <li class="menu-item @if(request()->getPathInfo() == "/uyeler")current-menu-item @endif""><a class="" href="/uyeler"><i class="icon-users"></i>Kullanıcılar</a></li>
        <li class="menu-item @if(request()->getPathInfo() == "/yardim")current-menu-item @endif""><a class="" href="/yardim"><i class="icon-lifebuoy"></i>Yardım</a></li>
    </ul>
</nav>
