@extends('layouts.app')

@section('content')
    <!-- Portfolio Start -->
<div class="portfolio">
    <div class="container">
        <div class="section-header">
            <p>Daftar Satwa</p>
            <h2>Dilindungi</h2>
        </div>
        <div class="row portfolio-container">
        @foreach($satwas as $satwa)
            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ url('img/satwa')}}/{{ $satwa->gambar }}" alt="Portfolio Image">
                        <a href="{{ url('img/satwa')}}/{{ $satwa->gambar }}" class="link-preview" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                        <a class="portfolio-title" href="#">{{ $satwa->nama }}</a>
                    </figure>
                </div>
            </div>
        @endforeach
        </div>
        {{ $satwas->links() }}
    </div>
</div>
<!-- Portfolio End -->
@endsection