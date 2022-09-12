@extends('welcome')
@section('title','Perfect Companion Indonesia - Kontak')
@section('content')
<!-- MAP BOX GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

<div class="content-wrapper sub-page" id="contact-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="inner">
				<div class="t-n-s mt-20 mb-28" data-aos="fade-up">
					<div class="row">
						<div class="col col-3">
							<div class="ff-2 p lh-6 tc-primary-300 mr-20">
								<span class="pos-r">Halo, Ada yang <br />
									<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>bisa kami bantu kak?
								</span>
							</div>
						</div>
						<div class="col col-9">
							<div class="h1-xl ff-1-bd tc-primary-500 max-w-80% -mt-4">
								<span>Informasi <br /> & Konsultasi</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-slider-item lazy pos-r max-w-100% mx-10">
				<div class="map-wrapper">
					<div class="map">
						<div id="contact-map"></div>
					</div>

					<div class="map-info-wrapper p-6 l-6 b-6 bd-rs-6">
						<p class="p-xs ls-3 ff-2 tc-medium mb-1">TELEPON</p>
						<a href="tel:[+02129675811]" class="p-xl link ff-2 tc-primary-500">021-29675811</a>

						<p class="p-xs ls-3 ff-2 tc-medium mb-1 mt-6">ALAMAT</p>
						<p class="p-xl ff-2 tc-primary-500">
							PT Perfect Companion Indonesia, <br />Wisma 77 Tower 2 18th Floor, <br />Jl. S Parman Kav. 77 Slipi Palmerah <br />Jakarta Barat - 11410 Indonesia.
							<!-- Jl. Modern Industri XVI Blok A1 No. 05 Cikande, Kabupaten Serang, 42186, Banten. -->

						<p class="p-xs ls-3 ff-2 tc-medium mb-1 mt-6">EMAIL</p>
						<a href="mailto:marketing@perfectcompanion.co.id" class="p-xl link ff-2 tc-primary-500">marketing@perfectcompanion.co.id</a>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION INQUIRIES -->
		<div class="fullwidth-master section-2 pt-40">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<div class="inner">
				<div class="row">
					<div class="col col-6 pl-0">
						<div class="t-n-s">
							<div class="title mb-10">
								<div class="h4 ff-1 tc-primary-500 max-w-80% txtf-c">Kami berharap dapat membantu <br />Anda dengan semua kebutuhan <br /> si manis — <span class="ff-1-bd">Sahabat Sempurna.</span><br /></div>
							</div>
						</div>
					</div>
					<div class="col col-6 pr-0">
						<div class="inquiries-form">
							<form action="https://pesonaalamresort.com/send/send_email/contact" method="post">
								<input class="input-type" type="text" name="name" id="cd-name" placeholder="Name" required="">
								<input class="input-type" type="text" name="email" id="cd-name" placeholder="Email" required="">
								<input class="input-type" type="text" name="phone" id="cd-name" placeholder="Phone Number" required="">
								<textarea class="input-type" type="text" name="message" id="cd-name" placeholder="Your Queries" required=""></textarea>
								<input type="hidden" name="url" value="https://pesonaalamresort.com/menu/contact">
								<br class="clear">
								<div class="btn-wrapper d-flex mt-4">
									<div class="btn bg-primary-500 ml-a d-flex jc-center py-3 px-6 bd-rs-2">
										<p class="p-xl tc-dark-contrast">
											Send
										</p>
									</div>
								</div>
								<!-- type="submit" value="Submit" -->
								<br class="clear">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('template/footer')
	</div>
</div>

<div class="transition">
	<div class="inside"></div>
</div>

<script>
	mapboxgl.accessToken = "pk.eyJ1IjoiZ2xhbnRpbm9wdXRyYSIsImEiOiJjanNsa3ZjNHgxd2Q0NDRrNnByczExdHlmIn0.IFpiWi3P1wxDnRbVAXJ47w";

	/* Map: This represents the map on the page. */
	var map = new mapboxgl.Map({
		container: "contact-map",
		style: "mapbox://styles/mapbox/streets-v11",
		zoom: 12.89,
		center: [106.79776784147373, -6.1904499955184145]
	});

	map.scrollZoom.disable();
	map.on("load", function() {
		/* Image: An image is loaded and added to the map. */
		map.loadImage("https://artexdigital.id/PCI-landing/assets/images/icons/map-marker.png", function(error, image) {
			if (error) throw error;
			map.addImage("custom-marker", image);
			/* Style layer: A style layer ties together the source and image and specifies how they are displayed on the map. */
			map.addLayer({
				id: "markers",
				type: "symbol",
				/* Source: A data source specifies the geographic coordinate where the image marker gets placed. */
				source: {
					type: "geojson",
					data: {
						type: 'FeatureCollection',
						features: [{
							type: 'Feature',
							properties: {},
							geometry: {
								type: "Point",
								coordinates: [106.79776784147373, -6.1904499955184145]
							}
						}]
					}
				},
				layout: {
					"icon-image": "custom-marker",
				}
			});
			const nav = new mapboxgl.NavigationControl();
			map.addControl(nav, 'bottom-right');
		});
	});
</script>
@endsection