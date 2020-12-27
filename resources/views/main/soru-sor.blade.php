@extends('Layouts.mainLayout')
@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current"><a href="/profil.php">akaracali58</a></span><span class="crumbs-span"> / </span><span class="current">Soru Sor</span></span>
                                    </span>
                                    </span>
    </div>

    <div class="clearfix"></div>
    <form class="form-post wpqa_form" method="post" enctype="multipart/form-data" action="/sor">
        @csrf
        <div class="form-inputs clearfix">
            <p>
                <label for="soruTitle">Soru Başlığı<span class="required">*</span></label>
                <input name="soruTitle" id="soruTitle" class="the-title" type="text" value="{{old('soruTitle')}}" required><i class="icon-chat"></i>
                <span class="form-description">Lütfen uygun bir konu başlığı seçiniz. 130 karakterden az olmalı.</span></p>
            <div class="wpqa_category">
                <label for="question-category-134">Topluluk<span class="required">*</span></label>
                <span class="styled-select">
                    <select name="topluluk" id="topluluk" class="postform" required>
                <option value="0">Topluluk seçiniz.</option>
                        @foreach($topluluklar as $topluluk)
                <option class="level-0" value="{{$topluluk->id}}">{{$topluluk->name}}</option>
                            @endforeach

            </select></span>
                <i class="icon-folder"></i>
                <span class="form-description">Daha kolay cevap almak için doğru kategoriyi seçiniz..</span></div>

            <p class="wpqa_tag">
                <label for="question_tags-134">Etiketler</label>
                <input type="text" class="input question_tags" name="etiketler" id="etiketler" value="{{old('etiketler')}}" data-seperator=",">

           <span class="form-description">Aralarında virgül kullanarak alakalı etiketler giriniz. Örn: <span class="color">php, html</span>.</span>
            </p>

            <div class="clearfix"></div>

            <div class="wpqa_textarea">
                <label for="question-details-add-134">Detaylar<span class="required">*</span></label>
                <div class="the-details the-textarea">
                    <div id="wp-question-details-add-134-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                        <div id="wp-question-details-add-134-editor-tools" class="wp-editor-tools hide-if-no-js">
                            <textarea id="mytextarea" name="mytextarea">{{old('mytextarea')}}</textarea>

                        </div>

                    </div>
                </div><span class="form-description">Sorununuzu detaylı bir şekilde anlatın.</span></div>


            <p class="wpqa_checkbox_p">
                <label for="remember_answer-134"><span class="wpqa_checkbox"><input type="checkbox" id="remember_answer-134" class="remember_answer" name="remember_answer" value="on" checked="checked"></span><span class="wpqa_checkbox_span">Soruya cevap gelirse beni e-mail ile haberdar et.</span></label>
            </p>
            <p class="wpqa_checkbox_p">
                <label for="terms_active-134"><span class="wpqa_checkbox"><input type="checkbox" id="terms" name="terms" value="on" required></span>
                    <span class="wpqa_checkbox_span">Kodcevap <a target="_blank" href=""> Hizmet Koşulları </a> ve <a target="_blank" href=""> Gizlilik Sözleşmesi </a>'ni kabul ediyorum.<span class="required">*</span></span>
                </label>
            </p>
        </div>
        <p class="form-submit">
            <input type="submit" value="Soruyu yayınla." class="button-default button-hide-click"><span class="load_span"><span class="loader_2"></span></span>
        </p>
    </form>
@endsection
