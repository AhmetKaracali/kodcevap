@extends('Layouts.mainLayout')

@section('content')
    <div class="clearfix"></div>
    @include('partials.userMenu')
    <section id='section-followed'>
        <div class='alert-message warning'><i class='icon-flag'></i>
            <p>Takip ettiğiniz soru bulunmamakta.</p>
        </div>
    </section>
@endsection
