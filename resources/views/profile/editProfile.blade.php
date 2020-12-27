@extends('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current"><a href="/profil/{{$user->username}}/">{{$user->username}}</a></span><span class="crumbs-span"> / </span><span class="current">Profili Düzenle</span></span>
                                    </span>
                                    </span>
        <div class="breadcrumb-right">
            <div class="profile-setting"><a href="/profil/{{$user->username}}/duzenle" data-type="setting" class="active-tab">Profili Düzenle</a><a href="/profil/{{$user->username}}/changepw" data-type="password">Şifre Değiştir</a></div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <form class="edit-profile-form wpqa_form wpqa-readonly" method="post" enctype="multipart/form-data" action="/profil/{{$user->username}}/duzenle">
        @csrf
        <div class="form-inputs clearfix">
            <div class="page-sections" id="edit-profile" style="display: block;">
                <div class="page-section page-section-basic">
                    <div class="page-wrap-content">
                        <h2 class="post-title-2"><i class="icon-vcard"></i>Temel Bilgiler</h2>
                        <p class="email_field">
                            <label for="email">E-Mail<span class="required">*</span></label>
                            <input type="text" name="email" id="email" value="{{$user->email}}"><i class="icon-mail"></i></p>
                        <p class="username">
                            <label for="username">Kullanıcı Adı<span class="required"></span></label>
                            <input readonly="readonly" name="username" id="username" type="text" value="{{$user->username}}"><i class="icon-vcard"></i></p>
                        <p class="isim">
                            <label for="isim">Ad Soyad</label>
                            <input name="isim" id="isim" type="text" value="{{$user->name}}"><i class="icon-user"></i></p>

                        <div class="clearfix"></div>
                        <div class="author-image profile-image"><span class="author-image-span wpqa-delete-image-span">
                                <img class="avatar avatar-100 photo" alt="{{$user->name}}" title="{{$user->name}}" width="100" height="100" src="{{$user->ppURL}}"></span></div>
                        <label for="you_avatar_324">Profil Resmi</label>
                        <div class="fileinputs">
                            <input type="file" name="userpp" id="userpp">
                            <div class="fakefile">
                                <button type="button">Dosya Seç</button><span>Seç</span></div><i class="icon-camera"></i></div>
                        <div class="clearfix"></div>
                        <label for="your_cover_324">Kapak Fotoğrafı</label>
                        <div class="fileinputs">
                            <input type="file" name="userCover" id="userCover">
                            <div class="fakefile">
                                <button type="button">Dosya seç</button><span>Seç</span></div><i class="icon-camera"></i></div>
                        <div class="clearfix"></div>
                       <p class="city_field">
                            <label for="konum">Konum</label>
                            <input type="text" name="konum" id="konum" value="{{$user->konum}}"><i class="icon-address"></i></p>
                        <p class="gender_field wpqa_radio_p">
                            <label>Cinsiyet</label>
                        </p>
                        <div class="wpqa_radio_div">
                            <p><span class="wpqa_radio"><input id="gender_male" name="gender" type="radio" value="0"@if($user->cinsiyet ==0){{'checked'}}@endif></span>
                                <label for="gender_male">Erkek</label>
                            </p>
                            <p><span class="wpqa_radio"><input id="gender_female" name="gender" type="radio" value="1"@if($user->cinsiyet ==1){{'checked'}}@endif></span>
                                <label for="gender_female">Kadın</label>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <p class="age_field">
                            <label for="age_324">Doğum Tarihi</label>
                            <input type="date" class="age-datepicker hasDatepicker" name="age" id="age" value="{{$user->birthdate}}"><i class="icon-globe"></i></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="page-section page-section-social">
                    <div class="page-wrap-content">
                        <h2 class="post-title-2"><i class="icon-globe"></i>Sosyal Medya</h2>
                        <div class="wpqa_form_2">
                            <p class="facebook_field">
                                <label for="facebook_324">Facebook (Tam URL)</label>
                                <input type="text" name="facebook" id="facebook_324" value="{{$user->facebookURL}}"><i class="icon-facebook"></i></p>
                            <p class="twitter_field">
                                <label for="twitter_324">Twitter (Tam URL)</label>
                                <input type="text" name="twitter" id="twitter_324" value="{{$user->twitterURL}}"><i class="icon-twitter"></i></p>
                            <p class="linkedin_field">
                                <label for="linkedin_324">Linkedin (Tam URL)</label>
                                <input type="text" name="linkedin" id="linkedin_324" value="{{$user->linkedinURL}}"><i class="icon-linkedin"></i></p>
                            <p class="instagram_field">
                                <label for="instagram_324">Instagram (Put the full URL)</label>
                                <input type="text" name="instagram" id="instagram_324" value="{{$user->instagramURL}}"><i class="icon-instagrem"></i></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="page-section page-section-about">
                    <div class="page-wrap-content">
                        <h2 class="post-title-2"><i class="icon-graduation-cap"></i>Hakkımda</h2>
                        <div class="the-description wpqa_textarea the-textarea">

                            <input name="bio" id="bio" type="text" value="{{$user->about}}">
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>

        </div>
        <p class="form-submit"><span class="load_span"><span class="loader_2"></span></span>

            <input type="submit" value="Güncelle" id="submitEdit"class="button-default button-hide-click login-submit submit">
        </p>
    </form>

    {{$message ?? ''}}
    </div>

@endsection
