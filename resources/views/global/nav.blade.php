<nav class="navbar " >
 
     <!-- Brand and toggle get grouped for better mobile display -->
     <div style="border-top: 4px solid #01a6a0; z-index:1"></div>
     <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="/img/logo-header.jpg" alt="logo Landoretti art" style="height: 140px; z-index: 125;"></a>
      </div>
     </div>
    <div>
      <div ></div>
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-10">
              <ul class="navbar-nav navbar-top">
                @if(Auth::guest())
                  <li><a href="{{ route('auth.register') }}">{{trans('global.register')}}</a></li>
                  <li class="divider-vertical">|</li>
                  <li><a href="#" class="show-login">{{trans('global.login')}}</a></li>
                  {!! Form::open(['route' => 'auth.login', 'method' => 'post', 'class' => 'form-login hidden navbar-form']) !!}
                  <li>{!! Form::text('user', '', array('placeholder' => 'User', 'class' => 'form-control')) !!}</li>
                  <li>{!! Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) !!}</li>
                  <li>{!! Form::submit('>', array('class' => 'btn grey')) !!}</li>
                  {!! Form::close() !!}
                @else
                  <li><a href="{{ route('watchlist.index') }}"><span class="glyphicon glyphicon-menu-hamburger"></span> {{ trans('global.watchlist') }}</a></li>
                  <li>|</li>
                  <li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user"></span> {{trans('global.profile')}}</a></li>
                  <li>|</li>
                  <li><a href="{{ route('auth.logout') }}">{{trans('global.logout')}}</a></li>
                @endif
              </ul>
              {!! Form::open(['route' => 'art.search', 'method' => 'post', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
              
              <div class="form-group">
                {!! Form::text('search', '', array('placeholder' => trans('global.search'), 'class' => 'form-control')) !!}
              </div>
              
              <button type="submit" class="btn btn-no"><span class="glyphicon glyphicon-search"></span></button>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div style="background-color: #f3f3f3;">
      <div class="container">
        <div class="row" >
          <div class="col-md-offset-2 col-md-offset-10">
            
            <ul class="nav navbar-nav">
              <li><a href="{{ route('home') }}">{{trans('global.home')}}</a></li>
              <li><a href="{{ route('art.index') }}">{{trans('global.art')}}</a></li>
              <li><a href="#">{{ trans('global.Isearch') }}</a></li>
              <li><a href="{{ route('myAuctions') }}">{{trans('global.myauctions')}}</a></li>
              <li><a href="{{ route('myBids') }}">{{trans('global.mybids')}}</a></li>
              <li><a href="{{ route('contact') }}">{{ trans('global.contact') }}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('language.select', 'nl') }}">NL</a></li>
              <li><a href="{{ route('language.select', 'en') }}">EN</a></li>
            </ul>
          </div>
          </div>
      </div>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li>
          @if(Auth::check())
            <a href="{{ route('auth.logout') }}">logout</a>
          @else
            <a href="{{ route('auth.login') }}">login</a>
          @endif
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> 
    </div><!-- /.navbar-collapse -->--}}
  </div><!-- /.container-fluid -->
</nav>