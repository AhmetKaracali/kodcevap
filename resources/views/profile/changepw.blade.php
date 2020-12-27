@extends('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span><a href="/profil/{{$user->username}}/">{{$user->username}}</a></span><span class="crumbs-span"> / </span><span class="current">Şifre Değiştir</span></span>
                                    </span>
                                    </span>
        <div class="breadcrumb-right">
            <div class="profile-setting"><a href="/profil/{{$user->username}}/duzenle" data-type="setting">Profili Düzenle</a><a href="/profil/{{$user->username}}/changepw" data-type="password" class="active-tab">Şifre Değiştir</a></div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>


    <form class="edit-profile-form wpqa_form wpqa-readonly" method="post" enctype="multipart/form-data" action="/profil/{{$user->username}}/changepw">
        @csrf
        <div class="form-inputs clearfix">


<div class="page-sections" id="change-password" style="display: block;">
    <div class="page-section">
        <div class="page-wrap-content">
            <h2 class="post-title-2"><i class="icon-lock"></i>Şifre Değiştir</h2>
            <p class="login-password">
            <label for="oldpassword">Mevcut Şifre<span class="required">*</span></label>
            <input id="oldpassword" class="required-item" type="password" name="oldpassword" required><i class="icon-lock-open" ></i></p>
            @error('oldpassword')
            <div class="wpqa_error" id="forpass1">{{$errors->first('oldpassword')}}</div>
            @enderror
            <p class="login-password">
                <label for="newpassword">Yeni Şifre<span class="required">*</span></label>
                <input id="newpassword" class="required-item" type="password" name="newpassword" required><i class="icon-lock-open"></i></p>
            @error('newpassword')
            <div class="wpqa_error" id="forpass1">{{$errors->first('newpassword')}}</div>
            @enderror
            <p class="login-password">
                <label for="newpassword2">Yeni Şifre (Tekrar)<span class="required">*</span></label>
                <input id="newpassword_confirmation" class="required-item" type="password" name="newpassword_confirmation" required><i class="icon-lock-open"></i></p>
            @error('newpassword_confirmation')
            <div class="wpqa_error" id="forpass1">{{$errors->first('newpassword_confirmation')}}</div>
            @enderror
        </div>
        @if(session()->has('message'))
            @if(session()->get('message') == "Şifre Başarıyla değiştirildi.")
            <div class="wpqa_success" style="display: block">
               {{session()->get('message')}}
            </div>
                @else
                <div class="wpqa_error">{{session()->get('message')}}</div>
        @endif
            @endif
    </div>
</div>
        </div>
            <p class="form-submit"><span class="load_span"><span class="loader_2"></span></span>

                <input type="submit" value="Güncelle" id="submitEdit"class="button-default button-hide-click login-submit submit">
            </p>
    </form>


@endsection
