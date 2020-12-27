<nav class="nav_menu float_r fixed_nav_menu">
    <h3 class="screen-reader-text">Navigasyon</h3>
    <ul id="menu-explore-not-login" class="menu">
        <li class="menu-item menu-item-type-custom"> <a class="" href="/blog/"><i class="icon-book"></i>Blog Anasayfa</a></li>
        <li class="nav_menu_open menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-130">

            <a class="" href="/blog"><i class="icon-book-open"></i>Blog Kategorileri</a>
            <ul class="sub-menu">
                @foreach($categories as $cat)
                <li class="menu-item menu-item-type-custom"><a class="" href="/blog/kategori/{{$cat->slug}}">{{$cat->name}}</a></li>
            @endforeach
            </ul>
        </li>
    </ul>
</nav>
