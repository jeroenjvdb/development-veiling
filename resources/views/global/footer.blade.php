<div class="row">
	<div class="col-md-8 footercolumn">
		<div class="col-md-4">
			<h4>help</h4>
			<ul class="list-unstyled">
				<li><a href="{{ route('auth.login') }}">login</a></li>
				<li><a href="{{ route('auth.register') }}">Register</a></li>
			</ul>
			<h4>Help</h4>
			<ul class="list-unstyled">
				<li>Terms of Service</li>
				<li>Privacy Policy</li>
				<li><a href="{{ route('FAQ') }}">FAQ</a> </li>
				<li><a href="{{ route('contact') }}">contact us</a></li>
				<li><a href="{{ route('home') }}">About Us</a></li>
			</ul>
			<h4>Languages</h4>
			<ul class="list-unstyled">
				<li><a href="{{ route('language.select', 'nl') }}">Nederlands</a></li>
				<li><a href="{{ route('language.select', 'en') }}">English</a></li>
			</ul>
		</div>

		<div class="col-md-4">
			<h4>Style</h4>

			<ul class="list-unstyled">
				@foreach(Session::get('footerStyle') as $style)
					<li><a href="{{  route('art.filter', ['class' => 'style', 'filter' => $style->id, 'sort' => 'new'])  }}">{{ $style->name }}</a></li>
				@endforeach
			</ul>
		</div>

		<div class="col-md-4">
			<h4>Price</h4>
			<ul class="list-unstyled">
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => '5000', 'sort' => 'new']) }}">Up to 5,000</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => '10000', 'sort' => 'new']) }}">5,000-10,000</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => '25000', 'sort' => 'new']) }}">10,000-25,000</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => '50000', 'sort' => 'new']) }}">25,000-50,000</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => '100000', 'sort' => 'new']) }}">50,000-100,000</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'price', 'filter' => 'plus', 'sort' => 'new']) }}">above</a></li>
			</ul>
			<h4>Era</h4>
			<ul class="list-unstyled">
				<li><a href="{{ route('art.filter', ['class' => 'era', 'filter' => 'pre-war', 'sort' => 'new']) }}">Pre-war</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'era', 'filter' => '40-50', 'sort' => 'new']) }}">1940s-1950s</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'era', 'filter' => '60-80', 'sort' => 'new']) }}">1960s-1980s</a></li>
				<li><a href="{{ route('art.filter', ['class' => 'era', 'filter' => '90', 'sort' => 'new']) }}">1990s-Present</a></li>
			</ul>
			
		</div>
	</div>
	<div class="col-md-4 footercolumn footercolumn-right">
		<h4>Find what you need.</h4>
		{!! Form::open(['route' => 'art.search', 'method' => 'post', 'class' => 'navbar-form footer-form', 'role' => 'search']) !!}
              
              <div class="form-group">
                {!! Form::text('search', '', array('placeholder' => trans('global.search'), 'class' => 'form-control')) !!}
              </div>
              
          <button type="submit" class="btn btn-no"><span class="glyphicon glyphicon-search"></span></button>
          {!! Form::close() !!}
		<h4>Contact</h4>
		<div itemscope itemtype="http://schema.org/Organization">
			<span itemprop="legalName">Landoretti ART</span></br>
			<span itemprop="address">straatnaam XXX</br>xxxx, Oostende</span>
			</br></br>
			<span class="glyphicon glyphicon-earphone"></span><span itemprop="telephone">+xx (0)x xxx xx xx</span></br>
			<span class="glyphicon glyphicon-envelope"></span> <span itemprop="email">info@landorettiart.com</span></br>
			<p>facebook twitter youtube g+</p>
			<a href="http://www.facebook.com" class="facebook"></a>
			<a href="http://www.twitter.com" class="twitter"></a>
			<a href="http://www.youtube.com" class="youtube"></a>
			<a href="http://plus.google.com" class="googleplus"></a>
		</div>

	</div>
</div>