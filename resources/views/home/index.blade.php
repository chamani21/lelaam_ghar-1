@extends($layout)

@section('content')

    @include('home/home-slider')

    @include('home/home-premium-auctions')
    
    @include('home/home-latest-auctions')
    
    @include('home/ads')
    
    @include('home/how-it-works')

    @include('home/upcoming-auctions')
    
    @include('home/testimonials')

    @include('home/live-auctions')
    
    @include('home/home-notification')

    @include('home/partners')

@endsection