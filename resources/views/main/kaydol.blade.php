@extends ('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Kaydol</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class='wpqa-signup-template'>

        @if(session()->has('message'))
            <div class="wpqa_success" style="display: block">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="POST" class="signup_form wpqa_form" enctype="multipart/form-data" action="/kaydol">
            @csrf
            <div class="wpqa_error_desktop wpqa_hide">
                <div class="wpqa_error">aaa</div>
            </div>
            <div class="wpqa_success"></div>
            <div class="form-inputs clearfix">
                <p>
                    <label for="isim">Ad Soyad<span class="required">*</span></label>
                    <input type="text" class="required-item" name="isim" id="isim" value="{{ old('isim') }}" required><i class="icon-user"></i></p>
                <p>
                    <label for="username">Kullanıcı Adı<span class="required">*</span></label>
                    <input type="text" class="required-item" name="username" id="username" value="{{old('username')}}" required><i class="icon-user"></i></p>
                @error('username')
                <div class="wpqa_error" style="display: block">{{$errors->first('username')}}</div>
                @enderror
                <p>
                    <label for="email">E-Mail<span class="required">*</span></label>
                    <input type="email" class="required-item" name="email" id="email" value="{{old('email')}}" required><i class="icon-mail"></i></p>
                @error('email')
                <div class="wpqa_error" style="display: block">{{$errors->first('email')}}</div>
                @enderror
                <p>

                    <label for="pass1">Şifre<span class="required">*</span></label>
                    <input type="password" class="required-item" name="pass1" id="pass1" autocomplete="off" required><i class="icon-lock-open"></i></p>
                <p>
                @error('pass1')
                <div class="wpqa_error" style="display: block">{{$errors->first('pass1')}}</div>
                @enderror
                    <label for="pass2">Tekrar Şifre<span class="required">*</span></label>
                    <input type="password" class="required-item" name="pass1_confirmation" id="pass1_confirmation" autocomplete="off" required><i class="icon-lock"></i></p>

                @error('pass2')
                <div class="wpqa_error" style="display: block">{{$errors->first('pass2')}}</div>
                @enderror

                <p>
                    <label for="birthdate">Doğum Tarihi<span class="required">*</span></label>
                    <input type="date" class="required-item" name="birthdate" id="birthdate" value="" required><i class="icon-calendar"></i></p>
                <p>

                <p class="wpqa_checkbox_p">
                    <label for="agree_terms-376"><span class="wpqa_checkbox">
                            <input type="checkbox" id="agree_terms" name="agree_terms" value="on" required></span>
                        <span class="wpqa_checkbox_span">Kayıt olurken,<a target="_blank" href="#"> Kullanım Şartları </a> ve <a target="_blank" href="#"> Gizlilik Sözleşmesi </a>ni kabul ediyorum...<span class="required">*</span></span>
                    </label>
                </p>
            </div>
            <div class="clearfix"></div>

    <p class="form-submit"><span class="load_span"><span class="loader_2"></span></span>
        <input type="submit" name="register" value="Kaydol" class="button-default ">
    </p>
</form>
</div>

    <script type="text/javascript">
        jQuery('.signup_form').validate({
            rules: {
                pass1: {
                    minlength: 8
                },
                pass2: {
                    minlength: 8,
                    equalTo: "#pass1"
                }
            }
        });
    </script>
@endsection
