{{-- menghubungkan dengan file master --}}
@extends('master')

{{-- konten --}}
@section('konten')

	<body>
		<!-- Start Hero Section -->
			<div class="hero pt-8 mt-4">
				<div class="container">
					<div class="row justify-content-between mt-4">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>PRIMA JAYA <span class="d-block">ANUGRAH</span></h1>
								<p class="mb-4">Tempat penyedia alat laboratorium, bahan kimia dan barang umum <br> lainnya dengan kwalitas serta harga terbaik sesuai kebutuhan Anda, <br> Selengkapnya di sini.</p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('image/elemen.png') }}" class="img-fluid elemen">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Alat Laboratorium Dan Perdagangan Umum Lainnya.</h2>
						<p class="mb-4">Memberikan produk berkualitas dengan harga
							kompetitif dan bermanfaat demi memastikan
							kepuasan pelanggan dan membina hubungan
							baik dengan mitra berkelanjutan.</p>
						<p><a href="{{ route('shop.index') }}" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					@foreach($produks as $key => $produk)
					@if($key < 3)	
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="{{ route('addToCart', ['id' => $produk->id]) }}">
							<img src="{{ asset('storage/'.$produk->gambar) }}" class="img-fluid product-thumbnail rounded">
							<h3 class="">{{ $produk->nama_produk }}</h3>
							<p>{{ $produk->tipe_produk }}</p>
						</a>
					</div> 
					@endif
					@endforeach
					<!-- End Column 2 -->
				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Product Line</h2>
						<p>Perusahaan kami menyediakan alat laboratorium untuk memenuhi laboratorium user meliputi Alat Uji, Alat Analisa, Glassware, dan lain-lain.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Alat Laboratorium</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Bahan Kimia</h3>
									<p>untuk menunjang kinerja alat laboratorium kami menyediakan</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Peralatan Elektronik</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Peralatan Komputer</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
<<<<<<< HEAD
		{{-- <div class="we-help-section">
=======
		<div class="we-help-section">
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
						</ul>
						<p><a herf="#" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
<<<<<<< HEAD
		</div> --}}
=======
		</div>
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
		<!-- End We Help Section -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.owl-carousel').owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:5
						}
					}
				})
			});
		</script>
@endsection