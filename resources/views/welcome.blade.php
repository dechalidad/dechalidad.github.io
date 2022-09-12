<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id">

<head>

	<style>
		.nicescroll-rails-vr {
			z-index: 9 !important
		}

		.nicescroll-rails-hr {
			display: none !important
		}

		.ytp-chrome-top .ytp-show-cards-title {
			display: none
		}

		.video-js .vjs-control-bar {
			background-color: #000 !important;
			z-index: 2
		}

		.example_video_1-dimensions.vjs-fluid {
			padding-top: 48%
		}

		@media screen and (max-width:540px) {
			.example_video_1-dimensions.vjs-fluid {
				padding-top: 84% !important
			}

			.video-js.vjs-has-started::after {
				border-top: 52px solid #000 !important;
				border-bottom: 52px solid #000 !important
			}
		}

		.video-js.vjs-has-started::after {
			position: absolute;
			border-top: 60px solid #000;
			border-bottom: 60px solid #000;
			box-sizing: border-box;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 0;
			background: rgba(0, 0, 0, 0)
		}

		.block {
			position: relative;
			width: 100%;
			height: 100vh;
			background-color: rgba(0, 0, 0, .3)
		}

		.transition {
			position: fixed;
			z-index: 9;
			left: 0;
			top: 0;
			width: 100%;
			height: 100vh;
			background-color: #fbc000;
			transition: all .4s cubic-bezier(0.76, 0, 0.07, 1);
			transition-delay: .6s
		}

		.transition .inside {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100vh;
			background-color: #fff;
			transition: all .4s cubic-bezier(0.76, 0, 0.07, 1)
		}

		.transition.off {
			height: 0
		}

		.transition.off .inside {
			height: 0
		}

		.section-5>img {
			display: none;
		}
	</style>
	<title>@yield('title')</title>
	<meta charset="utf-8">

	<meta name="Author" content="Perfect Companion Indonesia">
	<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
	<meta name="description" content="Perfect Companion Group (PCG) adalah perusahaan makanan hewan kesayangan kelas dunia yang dibangun untuk memenuhi kebutuhan industri produk hewan kesayangan.">

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo url('favicon.ico') ?>">
	<!-- <link rel="preload" href="<?php echo url('assets/fonts/') ?>" as="font" type="font/woff2" crossorigin>  -->
	<!-- <link rel="preload" href="<?php echo url('styles/main.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
	<!-- <noscript><link rel="stylesheet" href="<?php echo url('styles/main.min.css') ?>"></noscript> -->
	<link rel="preload" type="text/css" as="style" href="<?php echo url('styles/core.min.css') ?>" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" as="style" href="<?php echo url('styles/custom.min.css') ?>" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" href="<?php echo url('modules/fontawesome-pro-6.0.0/css/fontawesome.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" href="<?php echo url('modules/fontawesome-pro-6.0.0/css/regular.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" href="<?php echo url('modules/fontawesome-pro-6.0.0/css/solid.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" href="<?php echo url('modules/fontawesome-pro-6.0.0/css/brands.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" type="text/css" href="<?php echo url('modules/fontawesome-pro-6.0.0/css/duotone.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<!-- <script src="https://cdn.tutorialjinni.com/vibrant.js/1.0.0/Vibrant.min.js"></script> -->
	<link href="https://vjs.zencdn.net/7.0/video-js.min.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" />
	<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css" href="<?php echo url('modules/slick/slick.css') ?>" />
	<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css" href="<?php echo url('modules/slick/slick-theme.css') ?>" />
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.0/pikaday.min.js"></script> -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="https://vjs.zencdn.net/7.0/video-js.min.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" />

	<!-- JQUERY -->
	<script src="<?php echo url('js/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?php echo url('js/blur.min.js') ?>"></script>
	<!-- VIDEO JS -->
	<!-- <script src="https://vjs.zencdn.net/7.0/video.min.js"></script> -->
	<!-- BARBA JS -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script> -->
	<!-- TWEENMAX JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
	<!-- SLICK JS -->
	<script type="text/javascript" src="<?php echo url('modules/slick/slick.min.js') ?>"></script>
	<!-- MOMENT JS -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<!-- MODERNIZR JS -->
	<script src="<?php echo url('js/modernizr.min.js') ?>"></script>
	<!-- LAZY LOAD JS -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
	<!-- NICESCROLL JS -->
	<script src="https://artexdigital.id/assets_frontend/assets/NicescrollJs/jquery.nicescroll.js"></script>
	<!-- ANIMATE ON SCROLL JS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!-- VIDEO MASTER JS -->
	<script src="https://vjs.zencdn.net/7.0/video.min.js"></script>

	<script src="<?php echo url('js/main.min.js') ?>" class="main-script"></script>

	<!-- <script>
		// var perfEntries = performance.getEntriesByType("navigation");

		// if (perfEntries[0].type === "back_forward") {
		// 	location.reload(true);
		// 	console.log("reload");
		// }

		// const [entry] = performance.getEntriesByType("navigation");

		// // Show it in a nice table in the developer console
		// console.table(entry.toJSON());

		// if (entry["type"] === "back_forward")
		// 	location.reload();

		$(document).ready(function(e) {
			var $input = $('#refresh');

			console.log(">>> reload head : " + $input.val());
		});
	</script> -->
	<script type="text/javascript">
		// jQuery(document).ready(function() {
		// 	console.log(">>> input val : " + $("#refresh").val());
		// 	var d = new Date();
		// 	d = d.getTime();
		// 	if (jQuery('#reloadValue').val().length == 0) {
		// 		jQuery('#reloadValue').val(d);
		// 		console.log(">>> reload head : " + d);
		// 		// jQuery('body').show();
		// 	} else {
		// 		jQuery('#reloadValue').val('');
		// 		console.log(">>> should've reload : " + d);
		// 		location.reload();
		// 	}
		// });

		(function() {
			window.onpageshow = function(event) {
				if (event.persisted) {
					window.location.reload();
				}
			};
		})();
	</script>
</head>

<!-- <input id="reloadValue" type="hidden" name="reloadValue" value="" /> -->

<body class="master-body" id="dekstop" data-barba="wrapper">

	<!-- -=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=- -->
	<div class="navbar py-4 hide-on-scroll master_body_navbar">
		<div class="px-20 d-flex ai-center pos-r zi-1 sm:px-6 sm:jc-center">
			<img src="<?php echo url('/assets/images/logo/logo_pcg.png') ?>" alt="" class="logo zi-8 lazy cur-p make_transition" id="index" data-transition-to="{{ url('/') }}">
			<div class="d-flex ai-center ml-a sm:d-none md:d-none">
				<img src="<?php echo url('/assets/images/icons/indonesia.png') ?>" alt="indonesia" class="h-10">
				<span class="px-4 op-25%">|</span>
				<img src="<?php echo url('/assets/images/icons/english.png') ?>" alt="english" class="h-10 make_transition cur-p" id="to-english" data-transition-to="{{ url('/en') }}">
			</div>
			<div class="w-1px pb-10 bg-primary-500 op-25% ml-6 mr-6 sm:d-none"></div>
			<div class="navbar-item  tc-primary-500 overlay_toggle cur-p d-flex ai-center sm:d-none" id="search">
				<div class="text-wrapper">
					<div class="h6 ff-1-bd close">Close</div>
					<div class="h6 ff-1-bd text">Search</div>
				</div>
				<span class="icon ml-8 p-lg">
					<i class="fas fa-search"></i>
					<span class="bar bar-2"></span><span class="bar bar-3"></span>
					<!-- <i class="fas fa-times"></i> -->
				</span>
			</div>
			<div class="w-1px pb-10 bg-primary-500 op-25% ml-10 mr-3 sm:d-none"></div>
			<div class="navbar-item tc-primary-500 overlay_toggle cur-p d-flex ai-center sm:d-none" id="fullmenu">
				<div class="text-wrapper">
					<div class="h6 ff-1-bd close">Close</div>
					<div class="h6 ff-1-bd text">Menu</div>
				</div>
				<div class="icon ml-4">
					<div class="bar-wrapper">
						<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- -=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=- - - - END -->

	<!-- -=-=-=-=-=-=-=-=- NAVBAR BULLET -=-=-=-=-=-=-=-=- -->
	<div class="navbar-bullet py-3 bd-rs-4 d-none sm:d-flex jc-center">
		<div class="d-flex ai-center jc-center">
			<div class="navbar-item tc-primary-500 overlay_toggle cur-p d-flex ai-center" id="search">
				<div class="text-wrapper">
					<div class="h6 ff-1-bd close">Close</div>
					<div class="h6 ff-1-bd text">Search</div>
				</div>
				<span class="icon ml-8 p-lg">
					<i class="fas fa-search"></i>
					<span class="bar bar-2"></span><span class="bar bar-3"></span>
					<!-- <i class="fas fa-times"></i> -->
				</span>
			</div>
			<div class="w-1px pb-10 bg-primary-500 op-25% ml-10 mr-3"></div>
			<div class="navbar-item tc-primary-500 overlay_toggle cur-p d-flex ai-center" id="fullmenu">
				<div class="text-wrapper">
					<div class="h6 ff-1-bd close">Close</div>
					<div class="h6 ff-1-bd text">Menu</div>
				</div>
				<div class="icon ml-4">
					<div class="bar-wrapper">
						<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- -=-=-=-=-=-=-=-=- NAVBAR BULLET -=-=-=-=-=-=-=-=- - - - END -->

	<!-- -=-=-=-=-=-=-=-=- FULLMENU -=-=-=-=-=-=-=-=- -->
	<div class="overlay fullmenu">
		<div class="inner-wrapper">
			<div class="inner h-100vh">
				<div class="pos-a r-10 b-10 sm:r-a sm:b-24 sm:l-2 sm:w-100%">
					<div class="d-flex ai-center sm:jc-center sm:w-100%">
						<img src="<?php echo url('/assets/images/icons/indonesia.png') ?>" alt="indonesia" class="h-10">
						<span class="px-4 op-25%">|</span>
						<img src="<?php echo url('/assets/images/icons/english.png') ?>" alt="english" class="h-10 make_transition cur-p" id="to-english" data-transition-to="{{ url('/en') }}">
					</div>
				</div>
				<div class="h-100% w-100% d-flex fd-col jc-center sm:jc-center sm:-mt-20">
					<div class="row">
						<div class="col col-12">
							<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">menu</p>
							<div class="d-flex fd-col">
								<div class="h5 ff-1 txtf-c tc-primary-500 mb-4 make_transition cur-p" id="index" data-transition-to="{{ url('/') }}">Home</div>
								<div class="h5 ff-1 txtf-c tc-primary-500 mb-4 make_transition cur-p" id="about" data-transition-to="{{ url('about') }}">Tentang Kami</div>
								<div class="h5 ff-1 txtf-c tc-primary-500 mb-4 make_transition cur-p" id="products" data-transition-to="{{ url('products-intro') }}">Semua Produk</div>
								<div class="h5 ff-1 txtf-c tc-primary-500 mb-4 make_transition cur-p" id="news" data-transition-to="{{ url('news') }}">Berita & Acara</div>
								<!-- <div class="h5 ff-1 txtf-c tc-primary-500 mb-4">Komunitas</div> -->
								<div class="h5 ff-1 txtf-c tc-primary-500 make_transition cur-p" id="contact" data-transition-to="{{ url('contact') }}">Kontak</div>
							</div>
						</div>
					</div>

					<div class="row mb-10">
						<!-- <div class="col col-4">
							<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">tentang</p>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Pusat Penelitian</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Tent</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Karir</div>
						</div> -->
						<!-- <div class="col col-4 pl-4">
							<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">produk</p>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Makanan Kucing</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Makanan Anjing</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Makanan Kelinci</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Makanan Ikan</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Lokasi Petshop</div>
						</div> -->
						<!-- <div class="col col-4 pl-4">
							<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">komunitas</p>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Blog</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Kontes</div>
							<div class="p-xl link ff-1 mb-3 tc-primary-500">Giveaway</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="overlay search">
		<div class="inner-wrapper">
			<div class="inner h-100vh">
				<div class="row h-100% ai-center">
					<div class="col col-12">
						<!-- <div class="form-control search mb-25">
							<input type="text" class="input" id="input_search" placeholder="Bisa cari aktivitas, berita atau produk">
							<span class="icon">
								<i class="far fa-search"></i>
							</span>
						</div> -->
						<div class="h6 mb-4 tc-medium-tint d-flex ai-center sm:d-block sm:p-lg sm:mb-2"><span class="tc-secondary-500 mr-2">Cari produk apa kak?</span> Biar kami bantu carikan.</div>
						<div class="d-flex ai-center">
							<div class="form-control mb-25 f-1">
								<input type="text" name="product_name" id="input_search" class="input bd-tl-rs-2 bd-bl-rs-2 bg-secondary-100 bd-n py-3 px-4 w-100% p-lg" placeholder="Cari sesuatu...">
								<!-- <input type="hidden" name="receive_from" value="Botanica"> -->
							</div>
							<button id="btn-search-product" type="submit" aria-label="submit-search" class="btn-icon py-3 w-14 bd-tr-rs-2 bd-br-rs-2 bg-secondary-500 bd-n tc-dark-contrast d-flex ai-center jc-center p-lg">
								<div class="icon">
									<i class="fad fa-search mr-1 -mt-1"></i>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- -=-=-=-=-=-=-=-=- FULLMENU -=-=-=-=-=-=-=-=- - - - END -->

	@yield('content')

</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-90S5KRCYD8"></script> -->
<!-- <script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'G-90S5KRCYD8');
</script> -->

<!-- <script>
	$(document).ready(function(e) {
		var $input = $('#refresh');

		$input.val() == 'yes' ? location.reload(true) : $input.val('yes');
		console.log(">>> reload : " + $input.val());
	});
</script> -->
<script>
	$(document).ready(function() {
		$('a').attr('rel', "noopener");
	})

	$('#btn-search-product').on('click', function() {
		product_name = $('[name="product_name"]').val()
		if (product_name == '') {
			alert('Harap isi produk yang akan dicari')
		} else {
			window.location.href = `{{ url('search-product/${product_name}') }}`
		}
	})
</script>

<script>
	$(document).ready(function() {
		// -=-=-=-=-=-=-=-=- LOADING EFFECT -=-=-=-=-=-=-=-=-
		function onReady(callback) {
			var intervalId = window.setInterval(function() {
				if (document.getElementsByTagName('body')[0] !== undefined) {
					window.clearInterval(intervalId);
					callback.call(this);
				}
			}, 300);
		}

		setTimeout(function() {
			$('.transition').addClass('off');
		}, 600);


		function setVisible(selector, visible) {
			document.querySelector(selector).style.display = visible ? 'block' : 'none';
			$('.navbar').removeClass('hide-on-scroll');
			// $('.ads-banner').addClass('active');
		}

		onReady(function() {
			setVisible('.content-wrapper', true);
			$('.transition').addClass('off');

			function elt(type, prop, ...childrens) {
				let elem = document.createElement(type);
				if (prop) Object.assign(elem, prop);
				for (let child of childrens) {
					if (typeof child == "string")
						elem.appendChild(document.createTextNode(child));
					else elem.appendChild(elem);
				}
				return elem;
			}
			class Progress {
				constructor(now, min, max, options) {
					this.dom = elt("div", {
						className: "progress-bar",
					});
					this.min = min;
					this.max = max;
					this.intervalCode = 0;
					this.now = now;
					this.syncState();
					if (options.parent) {
						document.querySelector(options.parent).appendChild(this.dom);

					} else document.body.appendChild(this.dom);
				}

				syncState() {
					this.dom.style.width = this.now + "%";
				}

				startTo(step, time) {
					if (this.intervalCode !== 0) return;
					this.intervalCode = setInterval(() => {
						// console.log("sss");
						if (this.now + step > this.max) {
							this.now = this.max;
							this.syncState();
							clearInterval(this.interval);
							this.intervalCode = 0;
							return;
						}
						this.now += step;
						this.syncState();
					}, time);
				}
				end() {
					this.now = this.max;
					clearInterval(this.intervalCode);
					this.intervalCode = 0;
					this.syncState();
					$('.pre-loading-screen').addClass('off');
				}
			}

			let pb = new Progress(15, 0, 100, {
				parent: ".progress"
			});

			pb.startTo(5, 500);

			setTimeout(() => {
				pb.end();
			}, 3000);

		});
		// -=-=-=-=-=-=-=-=- LOADING EFFECT - - - END -=-=-=-=-=-=-=-=-
	})
</script>

</html>