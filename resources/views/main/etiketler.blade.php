@extends('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/"><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Etiketler</span></span>
                                </span>
                                </span>

    </div>
    <div class="clearfix"></div>
    <section>
        <article id="post-32" class="article-post article-post-only clearfix post-32 page type-page status-publish hentry">
            <div class="single-inner-content">
                <header class="article-header header-no-author header-no-meta">
                    <figure class="featured-image post-img post-img-0"></figure>
                </header>

                <div class="post-wrap-content">
                    <div class="post-content-text"></div>
                    <div class="row cats-sections tags-sections">
                        @foreach($etiketler as $etiket)
                        <div class="col col6">
                            <div class="cat-sections-follow">
                                <div class="cat-sections"><a href="../etiketler/{{$etiket->slug}}" title="{{$etiket->name}} etiketli soruları gör."><i class="icon-tag"></i>{{$etiket->name}}</a></div>

                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
