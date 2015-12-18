<div class="row">
	<div class="col-md-8 footercolumn">
		<div class="col-md-4">
			<h4>help</h4>
			<ul class="list-unstyled">
				<li>login</li>
				<li>Register</li>
			</ul>
			<h4>Help</h4>
			<ul class="list-unstyled">
				<li>Terms of Service</li>
				<li>Privacy Policy</li>
				<li>FAQ</li>
				<li>Contact Us</li>
				<li>About Us</li>
			</ul>
			<h4>Languages</h4>
			<ul class="list-unstyled">
				<li>Nederlands</li>
				<li>English</li>
			</ul>


		</div>
		<div class="col-md-4">
			<h4>Style</h4>

			<ul class="list-unstyled">
				@foreach($footerStyle as $style)
					<li>{{ $style->name }}</li>
				@endforeach
			</ul>
			<h4>Style</h4>
			<ul class="list-unstyled">
				<li>Design</li>
				<li>Paintings and Works on Paper</li>
				<li>Photographs</li>
				<li>Prints and Multiples</li>
				<li>Sculpture</li>
			</ul>


		</div>
		<div class="col-md-4">
			<h4>Price</h4>
			<ul class="list-unstyled">
				<li>Up to 5,000</li>
				<li>5,000-10,000</li>
				<li>10,000-25,000</li>
				<li>25,000-50,000</li>
				<li>50,000-100,000</li>
				<li>above</li>
			</ul>
			<h4>Era</h4>
			<ul class="list-unstyled">
				<li>Pre-war</li>
				<li>1940s-1950s</li>
				<li>1960s-1980s</li>
				<li>1990s-Present</li>
			</ul>
			<h4>Endings</h4>
			<ul class="list-unstyled">
				<li>Ending this week</li>
				<li>Newly listed</li>
				<li>Purchase Now</li>
				<li>1990s-present</li>
			</ul>
		</div>
	</div>
	<div class="col-md-4 footercolumn footercolumn-right">
		<h4>Find what you need.</h4>
		<input type="text">
		<h4>Contact</h4>
		<div itemscope itemtype="http://schema.org/Organization">
			<span itemprop="legalName">Landoretti ART</span></br>
			<span itemprop="address">straatnaam XXX</br>xxxx, Oostende</span>
			</br></br>
			<span class="glyphicon glyphicon-earphone"></span><span itemprop="telephone">+xx (0)x xxx xx xx</span></br>
			<span class="glyphicon glyphicon-envelope"></span> <span itemprop="email">info@landorettiart.com</span></br>
			<p>facebook twitter youtube g+</p>
		</div>

	</div>
</div>