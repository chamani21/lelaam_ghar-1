@extends($layout)

@section('content')

    @include('home/home-slider')

    @include('home/live-auctions')

    @include('home/fixed-price-sale')

    {{-- @include('home/home-latest-auctions') --}}
    
    @include('home/ads')
    
    @include('home/home-premium-auctions')
    
    @include('home/how-it-works')
    
    @include('home/testimonials')
    
    @include('home/home-notification')

    @include('home/partners')

@endsection