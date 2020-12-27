@extends('Layouts.mainLayout')
@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Giriş Yap</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class='wpqa-login-template'>
        <form class="wpqa_form login-form wpqa_login" action="/giris" method="post">
            @csrf
            <div class="wpqa_error_desktop wpqa_hide">
                <div class="wpqa_error"></div>
            </div>
            <div class="form-inputs clearfix">
                <p class="login-text">
                    <label for="username">Kullanıcı Adı<span class="required">*</span></label>
                    <input id="username" class="required-item" type="text" name="username" required><i class="icon-user"></i></p>
                @error('username')
                <div class="wpqa_error" style="display: block">{{$errors->first('username')}}</div>
                @enderror
                <p class="login-password">
                    <label for="password">Şifre<span class="required">*</span></label>
                    <input id="password" class="required-item" type="password" name="password" required><i class="icon-lock-open"></i></p>

            </div>
            <div class="rememberme normal_label">
                <label><span class="wpqa_checkbox"><input type="checkbox" name="rememberme" checked="checked"></span> <span class="wpqa_checkbox_span">Beni Hatırla!</span></label>
            </div><a href="/sifre-yenile" class="lost-password">Şifremi Unuttum?</a>
            <div class="clearfix"></div>
            <div class="wpqa_error_mobile wpqa_hide">
                <div class="wpqa_error"></div>
            </div>
            <p class="form-submit login-submit"><span class="load_span"><span class="loader_2"></span></span>
                <input type="submit" value="Giriş Yap" class="button-default login-submit">
            </p>

        </form>

    </div>
@endsection
