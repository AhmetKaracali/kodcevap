@extends ('Layouts.mainLayout')

@section('content')
                        <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">İletişim</span></span>
                                </span>
                                </span>
                            <div class="breadcrumb-right">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='post-content-text'>
                            <section>
                                <article id="post-36" class="article-post article-post-only clearfix post-36 page type-page status-publish hentry">
                                    <div class="single-inner-content">
                                        <header class="article-header header-no-author">
                                            <h1 class="post-title-2"><i class='icon-paper-plane'></i>İletişim</h1>
                                            <figure class="featured-image post-img post-img-0"></figure>
                                        </header>
                                        <div class="post-wrap-content">
                                            <div class="post-contact">
                                                <p>Bize mesaj bırakmak için aşağıdaki formu doldurabilirsiniz.</p>
    <div role="form" class="wpcf7" id="wpcf7-f4-p36-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    <form action="/iletisim" method="get" class="wpcf7-form" novalidate="novalidate">
                                                        <div style="display: none;">

                                                        </div>
                                                        <div class="form-input"><i class="icon-vcard"></i>İsim
                                                            <br /><span class="wpcf7-form-control-wrap your-name"><input type="text" name="isim" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span></div>
                                                        <div class="form-input"><i class="icon-mail"></i>Email
                                                            <br /><span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span></div>
                                                        <div class="form-input form-input-last"><i class="icon-pencil"></i>Mesajınız
                                                            <br /><span class="wpcf7-form-control-wrap your-message"><textarea name="mesaj" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span></div>

                                                            <input type="submit" value="Gönder" class="button-default" />
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
@endsection
