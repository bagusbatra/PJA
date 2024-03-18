		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<div class="collapse navbar-collapse fixed-top p-3 ps-5 pe-5" id="navbarsFurni">
                    <a class="navbar-brand" href="{{ route('home') }}">PJA<span>.</span></a>
                    
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 align-items-center">
                        <form class="form-inline">
                            <input class="form-control-search mr-sm-2 ps-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn-search my-2 my-sm-0" type="submit">Search</button>
                        </form>
						<li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
						<li><a class="nav-link" href="{{ route('shop.index') }}">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
                        <li><a class="account" href=""><i class="bi bi-person-circle fs-5"></i></a></li>
						<li><a class="account" href="{{ route('actionlogout') }}"><i class="bi bi-box-arrow-left fs-5 "></i></a></li>
                        <li><a class="cart" href="{{ route('list') }}"><i class="bi bi-cart fs-5"></i></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Header/Navigation -->
