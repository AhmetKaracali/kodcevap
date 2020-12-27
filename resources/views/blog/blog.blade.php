@extends ('Layouts.blogLayout')


@section('breadcrumbs')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#">
                                    <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="/">
                                            <i class="icon-home"></i>KodCevap</a>
                                        <span rel="v:child" typeof="v:Breadcrumb">
                                            <span class="crumbs-span"> / </span><span class="current"><a>Blog</a></span>
                                            </span>
                            <div class="breadcrumb-right">
                                <div class="clearfix"></div>
                            </div>
                            </span>
    </div>
    @endsection
@section('blogPosts')
    @foreach($posts as $post)
<article id="post-{{$post->id}}" class="article-post article-post-only">
    <div class="single-inner-content">
        <header class="article-header">
            <div class="post-meta">
                        <time itemprop="datePublished" class="entry-date published" datetime="{{$post->created_at}}">{{$post->created_at}}</time>
                <span class="post-date" datetime="{{$post->created_at}}"> tarihinde paylaşıldı.</span>
                <span class="byline"> <span class="post-cat">Kategori: <a href="/blog/kategori/{{getCategoryData($post->categories->first()->catID)->slug}}" rel="category tag">{{getCategoryData($post->categories->first()->catID)->name}}</a></span></span><span class="post-comment">Yorumlar: <a href="/blog/{{$post->slug}}#comments">{{$post->comments->count()}}</a></span><span class="post-views">Görüntülenme: {{$post->views}}</span></div>
            <h2 class="post-title"><a class="post-title" href="/blog/{{$post->slug}}" rel="bookmark">{{$post->title}}</a></h2><a class="post-author" rel="author" href="/profil/{{$post->writer->username}}">{{$post->writer->name}}</a>
            <figure class="featured-image post-img">
                <a href="/blog/{{$post->slug}}" title="{{$post->title}}" rel="bookmark"><img alt='{{$post->title}}' width='768' height='510' src='{{$post->gorsel}}'></a>
            </figure>
        </header>
        <div class="post-wrap-content post-content ">
            <div class="post-content-text">
                <p>{{Str::limit($post->body, 100, '...')}}</p>
            </div>
        </div>
        <footer><a class="post-read-more" href="/blog/{{$post->slug}}" rel="bookmark" title="{{$post->title}} yazısını okuyun.">Devamını oku</a>
            <div class="post-share"><span><i class="icon-share"></i><span>Paylaş</span></span>
                <ul>
                    <li class="share-facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=/2018/04/18/highlighting-whats-important-about-questions-answers-on-kodcevap/&t=Highlighting+what%E2%80%99s+important+about+questions+&%23038;+Cevap+on+kodcevap+Community!"><i class="icon-facebook"></i><span>Facebook</span></a></li>
                    <li class="share-twitter"><a target="_blank" href="http://twitter.com/share?text=Highlighting+what%E2%80%99s+important+about+questions+&%23038;+Cevap+on+kodcevap+Community!&url=/2018/04/18/highlighting-whats-important-about-questions-answers-on-kodcevap/"><i class="icon-twitter"></i></a></li>
                    <li class="share-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=/2018/04/18/highlighting-whats-important-about-questions-answers-on-kodcevap/&title=Highlighting+what%E2%80%99s+important+about+questions+&%23038;+Cevap+on+kodcevap+Community!"><i class="icon-linkedin"></i></a></li>
                    <li class="share-whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text=Highlighting+what%E2%80%99s+important+about+questions+&%23038;+Cevap+on+kodcevap+Community!%20-%20/2018/04/18/highlighting-whats-important-about-questions-answers-on-kodcevap/"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>
</article>
    @endforeach
    @if($posts->count() <1)
    <a> Henüz blogda yazı paylaşılmamış.</a>
    @endif
@endsection
