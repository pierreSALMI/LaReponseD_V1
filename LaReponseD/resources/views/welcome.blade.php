@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth

            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            La Réponse D
        </div>
        <section class="section-content">
            <div class="container">

                <header class="section-heading">
                    <h3 class="section-title">Popular products</h3>
                </header><!-- sect-heading -->


                <div class="row">
                    <div class="col-md-3">
                        <div href="#" class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ asset('/images/unidab.PNG')  }}" flex="wrap"> </a>
                            <figcaption class="info-wrap">
                                <a href="#">Just another product name</a>
                            </figcaption>
                        </div>
                    </div> <!-- col.// -->
                    <div class="col-md-3">
                        <div href="#" class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ asset('/images/unidab.PNG')  }}" flex="wrap"> </a>
                            <figcaption class="info-wrap">
                                <a href="#">Some item name here</a>
                            </figcaption>
                        </div>
                    </div> <!-- col.// -->
                    <div class="col-md-3">
                        <div href="#" class="card card-product-grid">
                            <a href="#" class="img-wrap" > <img src="{{ asset('/images/unidab.PNG')  }}"> </a>
                            <figcaption class="info-wrap">
                                <a href="#">Great product name here</a>
                            </figcaption>
                        </div>
                    </div> <!-- col.// -->
                    <div class="col-md-3">
                        <div href="#" class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ asset('/images/unidab.PNG')  }}" > </a>
                            <figcaption class="info-wrap">
                                <a href="#">Just another product name</a>
                            </figcaption>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

            </div> <!-- container .//  -->
        </section>

    </div>
</div>
@endsection
