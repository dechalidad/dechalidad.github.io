@extends('en-welcome')
@section('title','Perfect Companion Indonesia - Contact')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<!-- MAP BOX GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

<div class="content-wrapper sub-page" id="contact-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="inner">
				<div class="t-n-s mt-20 mb-28 sm:mb-10" data-aos="fade-up">
					<div class="row sm:fw-w">
						<div class="col col-3 sm:col-12 sm:mb-6">
							<div class="ff-2 p lh-6 tc-primary-300 mr-20">
								<span class="pos-r">Hello, is there anything <br />
									<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>we can help you with?
								</span>
							</div>
						</div>
						<div class="col col-9 sm:col-12">
							<div class="h3 ff-1-bd tc-primary-500 max-w-80% -mt-4 sm:h4 sm:max-w-100%">
								<span>Information <br class="sm:d-none" /> & Consultation</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 sm:mx-0">
				<div class="map-wrapper sm:d-flex sm:fd-col">
					<div class="map">
						<div id="contact-map"></div>
					</div>

					<div class="map-info-wrapper pos-a p-6 l-6 b-6 bd-rs-6 sm:pos-r sm:l-0 sm:b-0 sm:bd-tl-rs-0 sm:bd-tr-rs-0">
						<p class="p-xs ls-3 ff-2 tc-medium mb-1">PHONE</p>
						<a href="tel:[+02129675811]" class="p-xl link ff-2 tc-primary-500">021-29675811</a>

						<p class="p-xs ls-3 ff-2 tc-medium mb-1 mt-6">ADDRESS</p>
						<p class="p-xl ff-2 tc-primary-500 cur-p" onclick="window.open('https://goo.gl/maps/tW3y9k2x76bGUy6d8', '_blank')">
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
				<div class="row sm:fw-w">
					<div class="col col-6 pl-0 sm:col-12">
						<div class="t-n-s">
							<div class="title mb-10">
								<div class="h4 ff-1 tc-primary-500 max-w-90% txtf-c sm:max-w-100%">We Hope to Help You<br class="sm:d-none" />with all needs of <br class="sm:d-none" /> your lovely pet — <span class="ff-1-bd">Perfect Companion.</span><br /></div>
							</div>
						</div>
					</div>
					<div class="col col-6 pr-0 sm:col-12">
						<div class="inquiries-form">
							<form action="{{ url('save-consultation') }}" method="post">
								@csrf
								<input class="input-type" type="text" name="name" id="cd-name" placeholder="Name" required="">
								<input class="input-type" type="text" name="email" id="cd-name" placeholder="Email" required="">
								<input class="input-type" type="text" name="phone" id="cd-name" placeholder="Phone Number" required="">
								<textarea class="input-type" type="text" name="message" id="cd-name" placeholder="Your Queries" required=""></textarea>
								<input type="hidden" name="url" value="#">
								<br class="clear">
								<div class="btn-wrapper d-flex mt-4">
									<button class="btn bg-primary-500 ml-a d-flex jc-center py-3 px-6 bd-rs-2 sm:w-100% show_alert" data-alert="default" data-alert-for="alert-for-subscribe" data-alert-text="Form is submitted" data-alert-icon="fas fa-paper-plane">
										<p class="p-xl tc-dark-contrast">
											Send
										</p>
									</button>
								</div>
								<!-- type="submit" value="Submit" -->
								<br class="clear">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('template/en-footer')
	</div>
</div>



<script>
	mapboxgl.accessToken = "pk.eyJ1IjoiZ2xhbnRpbm9wdXRyYSIsImEiOiJjanNsa3ZjNHgxd2Q0NDRrNnByczExdHlmIn0.IFpiWi3P1wxDnRbVAXJ47w";

	/* Map: This represents the map on the page. */
	var map = new mapboxgl.Map({
		container: "contact-map",
		style: "mapbox://styles/mapbox/streets-v11",
		zoom: 13.12,
		center: [106.79804389157377, -6.190413550000001]
	});

	map.scrollZoom.disable();
	map.on("load", function() {
		/* Image: An image is loaded and added to the map. */
		map.loadImage("<?php echo url('/assets/images/icons/map-marker.png') ?>", function(error, image) {
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
								coordinates: [106.79804389157377, -6.190413550000001]
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