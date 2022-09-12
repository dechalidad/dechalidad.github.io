@extends('welcome')
@section('title','Blank Page')
@section('content')
<!-- MAP BOX GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script><link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

<div class="content-wrapper" id="contact-page">
	<div class="content">

		<div class="fullwidth-master first-section">
			<div class="inner">
				<div class="block"></div>
			</div>
		</div>

    <div class="fullwidth-master section-1 section-mt-half" style="">
      <div class="inner">
        <div class="map-wrapper">
          <div class="map">
            <div id="contact-map"></div>
          </div>

          <div class="map-info-wrapper p-6 r-6 t-6">
						<p class="ls-3 ff-2 tc-medium mb-2">TALK</p>
						<a href="tel:[+628518217111]" class="p link ff-2 ls-2 tc-secondary">0251 821 7111</a>

						<p class="ls-3 ff-2 tc-medium mb-2 mt-5">MEET</p>
						<p class="p ff-2 tc-secondary">
							Jalan Taman Safari No. 101 <br>
							Kp. Baru Tegal. <br>
							Desa Cibeureum <br>
							Cisarua, Bogor, Indonesia</p>

						<p class="ls-3 ff-2 tc-medium mb-2 mt-5">WRITE</p>
						<a href="mailto:contact@thebotanica.com" class="p link ff-2 ls-2 tc-secondary">contact@thebotanica.com</a>
          </div>
        </div>
      </div>
    </div>

    <div class="fullwidth-master section-2 section-mt-half">
				<div class="inner">
					<div class="row">
						<div class="col col-6 pl-0">
							<div class="t-n-s">
								<div class="title mb-10">
									<h2 class="text">lorem ipsum <br> & sit amet</h2>
								</div>
								<p class="maw-80" style="color: black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel iusto quibusdam facilis id non aperiam temporibus</p>
							</div>
						</div>
						<div class="col col-6 pr-0">
							<div class="master-form">
								<form action="https://pesonaalamresort.com/send/send_email/contact" method="post">
									<input class="input-type" type="text" name="name" id="cd-name" placeholder="Name" required="">
									<input class="input-type" type="text" name="email" id="cd-name" placeholder="Email" required="">
									<input class="input-type" type="text" name="phone" id="cd-name" placeholder="Phone Number" required="">
									<textarea class="input-type" type="text" name="message" id="cd-name" placeholder="Your Queries" required=""></textarea>
									<input type="hidden" name="url" value="https://pesonaalamresort.com/menu/contact">
									<br class="clear">
									<div class="btn-wrapper mt-4">
										<div class="btn bg-primary ml-auto">
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

    @include('page/footer')
  </div>
</div>

<span class="close-box box-1 on"></span>
<script>
	mapboxgl.accessToken = "pk.eyJ1IjoiZ2xhbnRpbm9wdXRyYSIsImEiOiJjanNsa3ZjNHgxd2Q0NDRrNnByczExdHlmIn0.IFpiWi3P1wxDnRbVAXJ47w";
		
	/* Map: This represents the map on the page. */
	var map = new mapboxgl.Map({
	container: "contact-map",
	style: "mapbox://styles/mapbox/streets-v11",
	zoom: 15.35,
	center: [106.94569363028292, -6.44266728327378]
	});

	map.scrollZoom.disable();
	map.on("load", function () {
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
	features: [
	{
	type: 'Feature',
	properties: {},
	geometry: {
	type: "Point", 
	coordinates: [106.9456634540805, -6.442655262403161]
	}
	}
	]
	}
	},
	layout: {
	"icon-image": "custom-marker",
	}
	});
	});
	});
</script>
@endsection