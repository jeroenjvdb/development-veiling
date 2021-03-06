@extends('global.master')

@section('page-title')
	Home
@stop

@section('header')
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="z-index: -1;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/img/kaders.jpg" alt="kaders aan de muur">
      <div class="carousel-caption">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a.</p>
      </div>
    </div>
    <div class="item">
      <img src="/img/platenspeler.jpg" alt="een platenspeler">
      <div class="carousel-caption">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a.</p>
      </div>
    </div>
    <div class="item">
      <img src="img/antiek.jpg" alt="antiek fototoestel">
      <div class="carousel-caption">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a.</p>
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@stop

@section('content')
	<div class="white">
		<div class="container">
      <div class="row">
        <div class="col-md-12 center"><h1 class="center">how does it work?</h1></div>
      </div>
      <div class="row">
        <div class="col-md-4 center" >
          <img src="/img/icon-pencil.png" alt="pencil icon">
          <h3>Sign up</h3>
          <p>Lorem ipsum dolor sit amet,</br> consectetur adipisicing elit,</br> sed do eiusmod tempor incididunt.</p>
        </div>
        <div class="col-md-4 center">
          <img src="/img/icon-check.png" alt="check icon">
          <h3>Make Deals</h3>
          <p>Lorem ipsum dolor sit amet,</br> consectetur adipisicing elit,</br> sed do eiusmod tempor incididunt.</p>
        </div>
        <div class="col-md-4 center">
          <img src="/img/icon-smiley.png" alt="smiley icon">
          <h3>Everyone Happy</h3>
          <p>Lorem ipsum dolor sit amet,</br> consectetur adipisicing elit,</br> sed do eiusmod tempor incididunt.</p>
        </div>
      </div>
		</div>
	</div>
	<div class="grey">
		<div class="container">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <h2 class="center">Most Popular this week</h2>
          <div class="col-md-4 ">
            <div class="row home-small-img"><img src="{{$auctions[1]->pictures->first()->url}}" alt="">
              <span class="glyphicon glyphicon-search magnifier"></span>
            </div>
            <div class="row home-small-img"><img src="{{$auctions[2]->pictures->first()->url}}" alt="">
                          <span class="glyphicon glyphicon-search magnifier"></span>
            </div>

          </div>
          <div class="col-md-8 home-big-img">
            <div class="row"><img src="{{$auctions[0]->pictures->first()->url}}" alt=""></div>
                          <span class="glyphicon glyphicon-search magnifier"></span>

          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.carousel').carousel();
		});
	</script>
@stop

