<?php 

$total_auctions       = \App\Auction::getHomeTotalAuctions();
$total_sale_auctions  = \App\Auction::getHomeSaleAuctions();
// $total_live_auctions  = \App\Auction::getLiveAuctions()->count();
$total_live_auctions = \App\Auction::getBidLiveAuctions()->count();//live which are happening today,which gonna happen today
$total_bidders = \App\User::getTotalBidders();
// $total_sellers = \App\User::getTotalSellers();

 ?>
 <!-- NOTIFICATION SECTION-->
<div class="bg-light">
  <div class="container pb-5">
  <hr>
    <div class="row pt-5">
        <div class="col-lg-12 col-md-12 col-sm-12 au-deals">
            <h2 class="text-center font-weight-bold"> 
                Insider
            </h2> 
        </div>
    </div>
    <div class="row d-flex  justify-content-center">
        <div class="col-md-3">
            <div class="rounded-circle how-it-works pt-3 text-center">
              <i class="fa-3x">
                {{$total_auctions}}
              </i>
              <br>
                <i class="fa fa-box-open fa-5x "></i>
            </div>
            <h2 class="text-bold py-2">
                Total Auctions
            </h2>
            {{-- <p class=" text-justify">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quia in animi cum? Dolorem libero non unde, cum delectus ipsum suscipit ducimus quisquam sint dolor. Ipsa corporis illum accusamus accusantium!
            </p> --}}
        </div>
        <div class="col-md-3">
            <div class="rounded-circle how-it-works pt-3 text-center">
              <i class="fa-3x">
                {{$total_bidders}}
              </i>
              <br>
                <i class="fa fa-users fa-5x "></i>
            </div>
            <h2 class="text-bold py-2">
                Total Bidders
            </h2>
            {{-- <p class=" text-justify">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quia in animi cum? Dolorem libero non unde, cum delectus ipsum suscipit ducimus quisquam sint dolor. Ipsa corporis illum accusamus accusantium!
            </p> --}}
        </div>
        <div class="col-md-3">
            <div class="rounded-circle how-it-works pt-3 text-center">
              <i class="fa-3x">
                {{$total_sale_auctions}}
              </i>
              <br>
                <i class="fa fa-money-check-alt fa-5x "></i>
            </div>
            <h2 class="text-bold py-2">
                Sale Auctions
            </h2>
            {{-- <p class=" text-justify">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quia in animi cum? Dolorem libero non unde, cum delectus ipsum suscipit ducimus quisquam sint dolor. Ipsa corporis illum accusamus accusantium!
            </p> --}}
        </div>
        <div class="col-md-3">
            <div class="rounded-circle how-it-works pt-3 text-center">
              <i class="fa-3x">
                {{$total_live_auctions}}
              </i>
              <br>
                <i class="fa fa-signal fa-5x "></i>
            </div>
            <h2 class="text-bold py-2">
                Live Auctions
            </h2>
            {{-- <p class=" text-justify">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quia in animi cum? Dolorem libero non unde, cum delectus ipsum suscipit ducimus quisquam sint dolor. Ipsa corporis illum accusamus accusantium!
            </p> --}}
        </div>
    </div>
</div>
</div>

{{-- Old View --}}
    {{-- <section class="au-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 au-media">
                   <div class="au-middle">
                      <div class="media au-notify-media mt-3"> 
                        <div class="media-body">
                            <h5 class="au-owl-card">{{$total_auctions}}</h5>
                            <p class="au-owl-sub">{{getPhrase('auctions_available')}}</p>
                        </div>
                    </div>
                  </div>    
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-media">
                   <div class="au-middle">
                     <div class="media au-notify-media mt-3"> 
                        <div class="media-body">
                            <h5 class="au-owl-card">{{$total_bidders}}</h5>
                            <p class="au-owl-sub">{{getPhrase('bidders')}}</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-media">
                   <div class="au-middle">
                    <div class="media au-notify-media mt-3">
                        <div class="media-body">
                            <h5 class="au-owl-card">{{$total_sale_auctions}}</h5>
                            <p class="au-owl-sub">{{getPhrase('sale_auctions')}}</p>
                        </div>
                    </div>
                  </div>    
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-media">
                   <div class="au-middle">
                    <div class="media au-notify-media mt-3"> 
                        <div class="media-body">
                            <h5 class="au-owl-card">{{$total_live_auctions}}</h5>
                            <p class="au-owl-sub">{{getPhrase('live_auctions')}}</p>
                        </div>
                    </div>
                  </div>
                </div>
               
            </div>
        </div>
    </section> --}}
    <!-- NOTIFICATION SECTION-->