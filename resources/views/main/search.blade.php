@extends('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Search</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="section-all-search">
        <div class="main-search post-search search-not-get">
            <form role="search" method="get" class="searchform main-search-form" action="/search/">
                <div class="row">
                    <div class="col col6">
                        <input type="search" class='live-search' autocomplete='off' name="search" value="Hit enter to search" onfocus="if(this.value=='Hit enter to search')this.value='';" onblur="if(this.value=='')this.value='Hit enter to search';">
                        <div class="loader_2 search_loader"></div>
                        <div class="search-results results-empty"></div>
                    </div>
                    <div class="col col6"><span class="styled-select"><select name="search_type" class="search_type user_filter_active"><option value="-1">Select kind of search</option><option selected='selected' value="questions">Soru</option><option value="answers">Cevap</option><option value="question-category">Question categories</option><option value="question_tags">Question tags</option><option value="posts">Posts</option><option value="comments">Comments</option><option value="category">Post categories</option><option value="post_tag">Post tags</option><option value="users">Users</option></select></span></div>
                    <div class="col col6 user-filter-div"><span class="styled-select user-filter"><select><option value="user_registered" selected='selected'>Kayıt Tarihi</option><option value="display_name" >Name</option><option value="ID" >ID</option><option value="question_count" >Soru</option><option value="answers" >Cevap</option><option value="the_best_answer" >Çözüm</option><option value="points" >Puan</option><option value="post_count" >Posts</option><option value="comments" >Comments</option></select></span></div>
                </div>
                <div class="wpqa_form">
                    <input type="submit" class="button-default" value="Search">
                </div>
            </form>
        </div>
    </div>
@endsection
