@extends('welcome')
@section('title','Perfect Companion Indonesia')
@section('content')

<!-- -=-=-=-=-=-=-=-=- PAGE TRANSITION -=-=-=-=-=-=-=-=- -->
<div class="transition off">
	<div class="inside"></div>
</div>
<!-- -=-=-=-=-=-=-=-=- PAGE TRANSITION -=-=-=-=-=-=-=-=- - - - END -->

<!-- -=-=-=-=-=-=-=-=- PAGE PRELOADING -=-=-=-=-=-=-=-=- -->
<div class="pre-loading-screen">
	<!-- <img src="<?php echo url('/assets/images/animals/cat-2.webm') ?>" alt="cat" class="loading-animate"> -->
	<video class="loading-animate" autoplay muted loop>
		<source src="<?php echo url('/assets/images/animals/cat-2.mp4') ?>" type="video/mp4">
		Your browser does not support the video tag.
	</video>
	<div class="progress" style="display: none"></div>
</div>
<!-- -=-=-=-=-=-=-=-=- PAGE PRELOADING -=-=-=-=-=-=-=-=- - - - END -->

<div class="content-wrapper" id="index-page" data-barba="container" data-barba-namespace="index-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master complex-header section-1 of-h">
			<div class="complex-header-slider-wp mx-14 sm:mx-6">
				<div class="rotate-wrapper d-flex sm:d-none">
					<div class="scroll-indicator p-lg tc-dark-contrast cur-p scroll_to" data-scroll-to="section-2" data-scroll-offset="0" data-aos="fade-up">
						<span class="text txtf-c ff-2">scroll</span>
						<span class="icon ml-4">
							<i class="h3 far fa-arrow-right-long"></i>
						</span>
					</div>
				</div>
				<div class="slider complex-header-slider" data-type="responsive" data-minimum=1>
					<div class="row">
						<?php
						$arr = array(
							// '0' => array(
							// 	'type'   => 'image',
							// 	'file'   => 'index-header.jpg',
							// 	'id'	=> 'banner-image',
							// 	'text_1' => '',
							// 	'text_2' => '',
							// 	'text_3' => '',
							// ),
							// '1' => array(
							// 	'type'   => 'video',
							// 	'file'   => 'Me-O-Motion.mp4',
							// 	'id'	 => 'meo',
							// 	'text_1' => '',
							// 	'text_2' => '',
							// 	'text_3' => '',
							// ),
							// '2' => array(
							// 	'type'   => 'video',
							// 	'file'   => 'SmartHeart-Motion.mp4',
							// 	'id'	 => 'smartheart',
							// 	'text_1' => '',
							// 	'text_2' => '',
							// 	'text_3' => '',
							// ),
							'0' => array(
								'type'   => 'image',
								'file'   => 'index-header-1.jpg',
								'id'	=> 'banner-image-1',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'1' => array(
								'type'   => 'image',
								'file'   => 'index-header-2.jpg',
								'id'	=> 'banner-image-2',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'2' => array(
								'type'   => 'image',
								'file'   => 'index-header-3.jpg',
								'id'	=> 'banner-image-3',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'3' => array(
								'type'   => 'image',
								'file'   => 'index-header-4.jpg',
								'id'	=> 'banner-image-4',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'4' => array(
								'type'   => 'image',
								'file'   => 'index-header-5.jpg',
								'id'	=> 'banner-image-5',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'5' => array(
								'type'   => 'video',
								'file'   => 'Me-O-Motion.mp4',
								'id'	 => 'meo',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
							'6' => array(
								'type'   => 'video',
								'file'   => 'SmartHeart-Motion.mp4',
								'id'	 => 'smartheart',
								'text_1' => '',
								'text_2' => '',
								'text_3' => '',
							),
						);
						foreach ($arr as $key => $value) {
						?>
							<div class="col col-12">
								<?php
								if ($value['type'] === 'image') { ?>
									<div class="header-slider-item lazy" id="<?= $value["id"] ?>" style="background-image: url('<?php echo url('/assets/images/banner/' . $value['file']) ?>')">
										<div class="inner d-flex ai-center">
											<div class="t-n-s mb-8" data-aos="fade-up">
												<div class="ff-2 p-xl ml-2 mb-2 tc-dark-contrast"><?= $value['text_1'] ?></div>
												<div class="h3-lg lh-21 ff-1-bd title tc-dark-contrast">
													<span><?= $value['text_2'] ?> </span>
													<br class="<?= ($value['text_2']) === "" ? "d-none" : "" ?>">
													<span><?= $value['text_3'] ?></span>
												</div>
											</div>
										</div>
									</div>
								<?php } else if ($value['type'] === 'video') { ?>
									<div class="header-slider-item <?= $value['type'] ?>" id="<?= $value["id"] ?>">
										<div class="video">
											<video loop src="<?= url('/assets/videos/' . $value['file']) ?>"></video>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION ABOUT US -->
		<div class="fullwidth-master section-2 py-20 of-h sm:pt-12 sm:pb-12">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<div class="inner">
				<div class="row sm:fd-col">
					<div class="col col-6 pl-0 sm:col-12">
						<div class="t-n-s" data-aos="fade-up">
							<div class="d-flex ai-center op-80% mb-4">
								<div class="h-2px w-20 bg-primary-500"></div>
								<div>
									<p class="p-sm ff-2-bd ml-4 tc-primary-500">Tentang Kami</p>
								</div>
							</div>
							<div class="h3 ff-1-bd tc-primary-500 max-w-80% sm:h6 sm:max-w-100%">Sahabat Sempurna Hewan Kesayangan.</div>
						</div>
					</div>
					<div class="col col-6 pr-0 sm:col-12">
						<!-- mt-20 pt-20 -->
						<div class="ml-20 pt-10 sm:ml-0 sm:mt-4 sm:pt-0">
							<p class="p-lg tc-primary-400 max-w-85% ml-2 mb-6 sm:p-md sm:ml-0" data-aos="fade-up">
								Kami merupakan bagian dari Charoen Pokphand (CP) Group, PCG dibangun untuk memperluas dan mendukung spesialisasi Charoen Pokphand Group dalam menyediakan makanan hewan kesayangan
							</p>
							<button class="btn bg-link-500 tc-link-contrast py-3 bd-n bd-rs-8 make_transition" id="about-us" data-transition-to="{{ url('about') }}" data-aos="fade-up">
								<span class="text ff-1-bd px-8">Tentang Kami</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION TRIVIA -->
		<div class="fullwidth-master section-3" style="background-image: url(<?php echo url('/assets/images/banner/section-3-bg.jpg ') ?>)">
			<div class="inner">
				<div class="row sm:fd-col">
					<div class="col col-8 sm:col-12 sm:pt-20 sm:mb-10">
						<div class="d-flex ai-center h-100%">
							<div class="t-n-s sm:d-flex sm:fd-col sm:ai-center">
								<div class="d-flex ai-center op-80% mb-4" data-aos="fade-up">
									<div class="h-2px w-20 bg-dark-contrast"></div>
									<div>
										<p class="p-sm ff-2-bd ml-4 tc-dark-contrast sm:mx-4">Quiz Trivia</p>
									</div>
									<div class="h-2px w-20 bg-dark-contrast d-none sm:d-block"></div>
								</div>
								<div class="h3 ff-1-bd tc-dark-contrast txtf-c max-w-75% sm:max-w-100% sm:h6 sm:ta-center" data-aos="fade-up">Pahami apa yang mereka coba katakan.</div>
							</div>
						</div>
					</div>
					<div class="col col-4 sm:col-12 sm:pt-20 sm:pb-10">
						<div class="d-flex ai-end jc-center h-100% sm:ai-start">
							<button class="btn d-flex fd-col ai-center jc-center bg-n bd-n mb-28 sm:mb-0 overlay_toggle" id="quiz-wrapper" data-aos=" fade-up">
								<span class="icon bg-secondary-500 tc-dark-contrast">
								</span>
								<span class="text ff-1-bd h6 tc-primary-500 mt-5">Mulai Mainkan</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PRODUCTS -->
		<div class="fullwidth-master section-4 mt-20 sm:mt-10">
			<div class="inner">
				<div class="t-n-s d-flex fd-col ai-center mb-10">
					<div class="d-flex ai-center op-80%" data-aos="fade-up">
						<div class="h-2px w-20 bg-primary-500 sm:w-10"></div>
						<div>
							<p class="p-sm ff-2-bd mx-4 tc-primary-500 ta-center">Kualitas Produk Terjamin</p>
						</div>
						<div class="h-2px w-20 bg-primary-500 sm:w-10"></div>
					</div>
					<div class="h3 ff-1-bd tc-primary-500 max-w-50% txtf-c ta-center mt-6 mb-8 sm:h6 sm:max-w-100%" data-aos="fade-up">Nutrisi yang tepat untuk si manis</div>
					<p class="p-lg tc-primary-400 max-w-40% ta-center sm:p-md sm:max-w-100%" data-aos="fade-up">
						Kami memusatkan semua keahlian dan semangat untuk memberikan nutrisi kesehatan terbaik bagi mereka.
					</p>
				</div>

				<div class="product-wrapper row fw-w max-w-100% jc-center ml-a mr-a pos-r pt-0 sm:fw-w sm:pt-0">
					<?php
					foreach ($total_product as $key => $value) {
					?>
						<div class="col col-4 d-flex jc-center mb-20 sm:col-12 sm:mb-10">
							<div class="px-10 w-100% sm:px-0">
								<div class="product-item make_transition cur-p" id="<?= $value->type ?>" data-transition-to="{{ url('products-brand/'.$value->id_animal) }}">
									<div class="product-image-wrapper">
										<div class="product-overflow">
											<img src="<?php echo url('/assets/lampiran/animal_file/' . $value->animal_file) ?>" alt="cat">
										</div>
										<span class="icon d-flex ai-center jc-center h6 tc-dark-contrast">
											<i class="<?= $value->icon ?>"></i>
										</span>
									</div>
									<div class="product-text-wrapper px-2">
										<div class="d-flex ai-end jc-between mb-4">
											<div class="h6 ff-1-bd">Makanan <?= $value->name ?></div>
											<span class="d-flex ai-center jc-center px-3 h-6 bg-dark-contrast bd-rs-4">
												<p class="p-sm ff-2-bd"><?= $value->total_product ?><?= $value->total_product >= 10 ? "+" : "" ?> Produk</p>
											</span>
										</div>
										{{-- <div class="d-flex ai-start"> --}}
										{{-- <p>Brands</p>
											<div class="d-flex fw-w jc-end max-w-65% ml-a"> --}}
										{{-- <span class="d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 ml-2">
													<p class="p-xs ff-2 txtf-c">cat comfy</p>
												</span>
												<span class="d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 ml-2">
													<p class="p-xs ff-2 txtf-c">kittie bittie</p>
												</span>
												<span class="d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 ml-2">
													<p class="p-xs ff-2 txtf-c">cat choize</p>
												</span>
												<span class="d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 ml-2">
													<p class="p-xs ff-2 txtf-c">3+</p>
												</span> --}}
										<?php foreach ($value->brands as $key => $var) { ?>
											{{-- <span class="variant-item d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 ml-2">
														<p class="p-xs ff-2 txtf-c"><?= $var->name ?></p>
													</span> --}}
										<?php } ?>
										{{-- </div> --}}
										{{-- </div> --}}
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- SECTION NEWS -->
		<div class="fullwidth-master section-5 mt-20 sm:mt-10">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<div class="inner">
				<div class="row ai-end mb-10 sm:fd-col">
					<div class="col col-8 sm:col-12">
						<div class="t-n-s">
							<div class="d-flex ai-center op-80% mb-4" data-aos="fade-up">
								<div class="h-2px w-20 bg-primary-500"></div>
								<div>
									<p class="p-sm ff-2-bd ml-4 tc-primary-500">Berita, Acara dan Artikel</p>
								</div>
							</div>
							<div class="h3 ff-1-bd tc-primary-500 max-w-90% sm:h6 sm:max-w-100%" data-aos="fade-up">Jangan Sampai Terlewat, Informasi Terkini.</div>
						</div>
					</div>
					<div class="col col-4 sm:col-12 sm:d-none">
						<div class="d-flex jc-end">
							<div class="pos-r d-flex mx-2">
								<div class="btn-icon btn-prev mx-2 cur-p">
									<div class="icon mb-1 p-xl"><i class="far fa-chevron-left"></i></div>
								</div>
								<div class="btn-icon btn-next mx-2 cur-p">
									<div class="icon mb-1 p-xl"><i class="far fa-chevron-right"></i></div>
								</div>
							</div>
							<button class="btn bg-link-500 tc-link-contrast py-3 bd-n bd-rs-8 make_transition" id="news-all" data-transition-to="{{ url('news') }}" data-aos="fade-up">
								<span class="text ff-1-bd px-8">Lebih Banyak</span>
							</button>
						</div>
					</div>
				</div>
				<div class="complex-news-slider-wp" data-aos="fade-up">
					<div class="slider complex-news-slider" data-type="responsive" data-minimum=3>
						<div class="row">
							<?php
							foreach ($news as $key => $value) {
							?>
								<div class="col col-4">
									<div class="news-slider-item make_transition cur-p" id="news-detail" data-transition-to="{{ url('news-detail/'.$value->id) }}">
										<div class="img-frame img-news-thumbnail mb-4" data-blur=15>
											<div class="img lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/' . $value->cover_file) ?>')"></div>
											<div class="img-shadow img-news-thumbnail-shadow lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/' . $value->cover_file) ?>')"></div>
										</div>
										<p class="p-xs ff-2 txtf-u ls-5 tc-dark px-2 op-80% mb-2"><?= date('d M Y', strtotime($value->date)) ?></p>
										<p class="p-xl ff-1 tc-dark px-2"><?= $value->title ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="d-none jc-center sm:d-flex mt-8">
					<div class="btn-icon btn-prev mx-4 cur-p">
						<div class="icon mb-1 p-xl"><i class="far fa-chevron-left"></i></div>
					</div>
					<button class="btn bg-link-500 tc-link-contrast py-3 bd-n bd-rs-8 make_transition sm:py-1" id="news-all" data-transition-to="{{ url('news') }}" data-aos="fade-up">
						<span class="text ff-1-bd px-8 sm:px-4">Lebih Banyak</span>
					</button>
					<div class="btn-icon btn-next mx-4 cur-p">
						<div class="icon mb-1 p-xl"><i class="far fa-chevron-right"></i></div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION REVIEW -->
		<div class="fullwidth-master section-6 mt-20 sm:mt-10 bg-secondary-500 <?= count($review) == 0 ? 'd-none' : 'd-block' ?>">
			<div class="inner">
				<div class="row ai-end sm:fw-w sm:fd-col">
					<div class="col col-6 py-20 sm:col-12 sm:pb-0">
						<div class="t-n-s mb-12 sm:mb-8">
							<div class="d-flex ai-center mb-4" data-aos="fade-up">
								<div class="h-2px w-20 bg-dark-contrast op-80%"></div>
								<div>
									<p class="p-sm ff-2-bd ml-4 tc-dark-contrast">Star Testimonial</p>
								</div>
							</div>
							<div class="h3 ff-1-bd tc-dark-contrast max-w-90% sm:h6 sm:max-w-100%" data-aos="fade-up">Dengar langsung dari pelanggan Setia Kami.</div>
						</div>
						<!-- <button class="btn bg-link-500 tc-link-contrast py-3 bd-n bd-rs-8 sm:d-none" data-aos="fade-up">
							<span class="text ff-1-bd px-8">Lebih Banyak</span>
						</button> -->
					</div>
					<div class="col col-6 -mb-24 sm:col-12">
						<div class="complex-review-slider-wp" data-aos="fade-up">
							<div class="slider complex-review-slider" data-type="responsive" data-minimum=3>
								<div class="row">
									<?php
									foreach ($review as $key => $value) {
									?>

										<div class="col col-4">
											<div class="review-slider-item bg-dark-contrast bd-rs-4 p-4">
												<div class="d-flex fd-col jc-between h-100%">
													<div class="f-1">
														<p class="p-lg tc-dark lc-6"><?= json_decode($value->review) ?></p>
													</div>
													<div class="d-flex ai-center">
														<div class="img-frame img-review-thumbnail">
															<?php
															if ($value->animal_file == null) {
																$image = '/assets/images/avatars/cat-grey.jpg';
															} else {
																$image = '/assets/lampiran/animal_file/' . $value->animal_file;
															}

															?>
															<div class="img lazy" style="background-image: url('<?php echo url($image) ?>')"></div>
														</div>
														<div class="pl-4">
															<p class="p-sm ff-2 tc-dark txtf-c -mb-1"><?= $value->pet_type ?></p>
															<p class="p-lg ff-1-bd tc-dark lc-1"><?= $value->pet_name ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION SUPPORT -->
		<div class="fullwidth-master section-7 mt-20">
			<div class="inner">
				<div class="t-n-s mb-10">
					<div class="d-flex ai-center op-80% mb-4" data-aos="fade-up">
						<div class="h-2px w-20 bg-primary-500"></div>
						<div>
							<p class="p-sm ff-2-bd ml-4 tc-primary-500">Tempat Membeli</p>
						</div>
					</div>
					<div class="h3 ff-1-bd tc-primary-500 max-w-70% txtf-c sm:h6 sm:max-w-100%" data-aos="fade-up">Tersedia di gerai <br /> Online maupun Offline terdekat.</div>
				</div>
				<div class="complex-marquee-slider-wp" data-aos="zoom-out">
					<div class="slider complex-marquee-slider" data-type="responsive" data-minimum=5>
						<div class="row">
							<?php
							$arr = array(
								// '0' => array(
								// 	'image'     => 'image-1.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '1' => array(
								// 	'image'     => 'image-2.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '2' => array(
								// 	'image'     => 'image-3.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '3' => array(
								// 	'image'     => 'image-4.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '4' => array(
								// 	'image'     => 'image-1.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '5' => array(
								// 	'image'     => 'image-2.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '6' => array(
								// 	'image'     => 'image-3.jpg',
								// 	'alt'		=> 'logo'
								// ),
								// '7' => array(
								// 	'image'     => 'image-4.jpg',
								// 	'alt'		=> 'logo'
								// ),
								'0' => array(
									'image'     => 'p-1.png',
									'alt'		=> 'alfamart'
								),
								'1' => array(
									'image'     => 'p-2.png',
									'alt'		=> 'indomart'
								),
								'2' => array(
									'image'     => 'p-3.png',
									'alt'		=> 'alfamidi'
								),
								'3' => array(
									'image'     => 'p-4.png',
									'alt'		=> 'hypermart'
								),
								'4' => array(
									'image'     => 'p-5.png',
									'alt'		=> 'lotte-mart'
								),
								'5' => array(
									'image'     => 'p-6.png',
									'alt'		=> 'transmart'
								),
								'6' => array(
									'image'     => 'p-7.png',
									'alt'		=> 'superindo'
								),
								'7' => array(
									'image'     => 'p-8.png',
									'alt'		=> 'farmers-market'
								),
								'8' => array(
									'image'     => 'p-9.png',
									'alt'		=> 'branch-market'
								),
								'9' => array(
									'image'     => 'p-10.png',
									'alt'		=> 'aeon'
								),
								'10' => array(
									'image'     => 'p-11.png',
									'alt'		=> 'borma'
								),
								'11' => array(
									'image'     => 'p-12.png',
									'alt'		=> 'yogya'
								),
							);
							foreach ($arr as $key => $value) {
							?>
								<div class="col col-2-5">
									<div class="marquee-slider-item bg-dark-contrast bd-rs-4">
										<div class="d-flex ai-center jc-center h-100%">
											<img src="<?php echo url('/assets/images/partners/' . $value['image']) ?>" alt="<?= $value['alt'] ?>">
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<div class="fullwidth-master footer mt-20">
			<div class="inner">
				<div class="subscribe-wrapper bd-rs-8 bg-primary-500 of-h -ml-8 -mr-8 mb-20 sm:mx-0">
					<div class="accent-rotate-wrapper">
						<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line">
					</div>
					<div class="row px-10 py-14 sm:px-6 sm:py-8 sm:fd-col sm:fx-w">
						<div class="col col-8 sm:col-12 sm:mb-8">
							<div class="t-n-s">
								<div class="d-flex ai-center mb-4" data-aos="fade-up">
									<div class="h-2px w-20 bg-dark-contrast op-80%"></div>
									<div>
										<p class="p-sm ff-2-bd ml-4 tc-dark-contrast">Jangan Sampai Terlewat</p>
									</div>
								</div>
								<div class="h5 ff-1 tc-dark-contrast max-w-90% txtf-c sm:h6 sm:max-w-100%" data-aos="fade-up">Berita & Promo terkini, <br class="sm:d-none" /> langsung ke laman email-mu.</div>
							</div>
						</div>
						<div class="col col-4 d-flex sm:col-12">
							<form action="{{ url('save-subscribe') }}" method="post" class="d-flex ai-center h-100% w-100%">
								<div class="d-flex ai-end w-100% h-100%" data-aos="fade-up">
									@csrf
									<div class="form-control f-1">
										<input type="email" class="input bd-tl-rs-2 bd-bl-rs-2 bg-dark-contrast bd-n py-3 px-4 w-100% p-lg" name="email" placeholder="ex : meowmeow@cat.com">
										<!-- <input type="hidden" name="receive_from" value="Botanica"> -->
									</div>
									<button type="submit" aria-label="submit-subscribe" class="btn-icon py-3 w-14 bd-tr-rs-2 bd-br-rs-2 bg-link-500 bd-n tc-dark-contrast d-flex ai-center jc-center p-lg show_alert" data-alert="default" data-alert-for="alert-for-subscribe" data-alert-text="Form is submitted" data-alert-icon="fas fa-paper-plane">
										<div class="icon">
											<i class="fas fa-paper-plane mr-1 -mt-1"></i>
										</div>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="footer-content-wrapper mb-12 pos-r">
					<div class="rotate-wrapper">
						<div class="scroll-indicator p-lg tc-primary-300 cur-p light-bg scroll_to" data-scroll-to="section-1" data-scroll-offset="0" data-aos="fade-up">
							<span class="text txtf-c ff-2">scroll</span>
							<span class="icon ml-4">
								<i class="h3 far fa-arrow-right-long"></i>
							</span>
						</div>
					</div>
					<div class="row sm:fx-w sm:fd-col" data-aos="fade-up">
						<div class="col col-8 sm:col-12 sm:mb-10">
							<img src="<?php echo url('/assets/images/logo/logo_pcg.png') ?>" alt="" class="logo zi-8 lazy cur-p make_transition pl-24 h-12 sm:pl-0" id="index" data-transition-to="/">
							<div class="row mt-8 pl-24 sm:fw-w sm:pl-0">
								<div class="col col-4 sm:col-6 sm:mb-8">
									<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">produk</p>
									<div class="p-xl link ff-1 mb-3 tc-primary-500 make_transition cur-p" id="catalog" data-transition-to="{{ url('products/1/1/brand') }}">Katalog</div>
									<div class="p-xl link ff-1 mb-3 tc-primary-500 make_transition cur-p" id="products" data-transition-to="{{ url('products-intro') }}">Kategori</div>
									<div class="p-xl link ff-1 mb-3 tc-primary-500 make_transition cur-p" id="news" data-transition-to="{{ url('news') }}">Artikel</div>
								</div>
								<div class="col col-4 sm:col-6 sm:mb-8">
									<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">tentang</p>
									<div class="p-xl link ff-1 mb-3 tc-primary-500 make_transition cur-p" id="about" data-transition-to="{{ url('about') }}">Tentang Kami</div>
									<div class="p-xl link ff-1 mb-3 tc-primary-500 make_transition cur-p" id="contact" data-transition-to="{{ url('contact') }}">Kontak Kami</div>
									<!-- <div class="p-xl link ff-1 mb-3 tc-primary-500">Price List</div> -->
									<!-- <div class="p-xl link ff-1 mb-3 tc-primary-500">FAQ</div> -->
								</div>
								<!-- <div class="col col-4 sm:col-6">
									<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80%">Kontak</p>
									<div class="p-xl link ff-1 mb-3 tc-primary-500">Kontak Kami</div>
									<div class="p-xl link ff-1 mb-3 tc-primary-500">Lokasi Gerai</div>
								</div> -->
							</div>
						</div>
						<div class="col col-4 sm:col-12">
							<div class="row sm:fw-w">
								<div class="col col-6 d-flex ai-end">
									<div class="d-flex ai-end fd-col sm:ai-center">
										<img src="<?php echo url('/assets/images/logo/logo-meo.jpg') ?>" alt="" class="logo h-16 mb-8 lazy cur-p">
										<div class="d-flex jc-center w-100%">
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://www.facebook.com/MeoIndonesia/" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-facebook"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://instagram.com/meo_indonesia?utm_medium=copy_link" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-instagram"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://vt.tiktok.com/ZSdjsjSML/" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-tiktok"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://youtube.com/channel/UCt-6GAh3eoZOpyClNw-rzAg" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-youtube"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col col-6 d-flex ai-end sm:jc-end">
									<div class="d-flex ai-end fd-col sm:ai-center">
										<img src="<?php echo url('/assets/images/logo/logo-smartheart.png') ?>" alt="" class="logo h-24 mb-4 lazy cur-p">
										<div class="d-flex jc-center w-100%">
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://www.facebook.com/SmartheartIndonesia/" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-facebook"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://instagram.com/smartheart_indonesia?utm_medium=copy_link" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-instagram"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://www.tiktok.com/@smartheart_indonesia" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-tiktok"></i>
											</a>
											<a class="tc-primary-500 dark:tc-dark-contrast p-lg sm:p-xl" href="https://youtube.com/channel/UCL20x89qUe-L9iXrfWobHjA" target="_blank" rel="noopener">
												<i class="fab mx-2 fa-youtube"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-wrapper py-4 bg-primary-500">
				<div class="inner">
					<div class="d-flex ai-center sm:fd-col">
						<p class="tc-dark-contrast sm:order-3 sm:ta-center">
							<span>2022 © Perfect Companion Indonesia - All right reserved</span>
							<!-- <a href="https://artexdigital.id/" target="_blank" rel="noopener">
								<span class="tc-dark-contrast ml-2 op-80%">Site by Artex</span>
							</a> -->
						</p>
						<span class="f-1 h-1px bg-dark-contrast op-10% ml-8 sm:d-none"></span>
						<div class="d-flex ai-center mx-4 sm:order-1 sm:mb-4">
							<a class="tc-dark-contrast sm:p-xl" href="https://www.facebook.com/perfectcompanion.id/" target="_blank" rel="noopener">
								<i class="fab mx-3 fa-facebook cur-p"></i>
							</a>
							<a class="tc-dark-contrast sm:p-xl" href="https://www.instagram.com/sahabatsempurna.id/" target="_blank" rel="noopener">
								<i class="fab mx-3 fa-instagram" cur-p></i>
							</a>
							<a class="tc-dark-contrast sm:p-xl" href="https://www.youtube.com/channel/UCCnbEZCD2oc70mtMzmyG6Fg/featured" target="_blank" rel="noopener">
								<i class="fab mx-3 fa-youtube cur-p"></i>
							</a>
						</div>
						<!-- <span class="f-1 h-1px bg-dark-contrast op-10% mr-8 sm:d-none"></span>
						<div class="d-flex ai-center ml-a sm:order-2 sm:ml-0 sm:mb-4">
							<div class="p-md link ff-1 tc-dark-contrast">Privacy Policy</div>
							<span class="p-lg mx-4 tc-dark-contrast">•</span>
							<div class="p-md link ff-1 tc-dark-contrast">Term & Condition</div>
						</div> -->
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<!-- -=-=-=-=-=-=-=-=- ADS BANNER -=-=-=-=-=-=-=-=- -->
<div class="overlay ads-banner" id="status-ads-banner">
	<div class="inner-wrapper" style="background-image: url(<?php echo url('/assets/lampiran/banner_file/' . $banner->banner_file) ?>)">
		<!-- <div class="inner h-100vh">

		</div> -->

		<span class="icon cur-p overlay_toggle" id="ads-banner">
			<i class="far fa-xmark"></i>
		</span>
	</div>
</div>
<!-- -=-=-=-=-=-=-=-=- ADS BANNER -=-=-=-=-=-=-=-=- - - - END -->

<!-- -=-=-=-=-=-=-=-=- QUIZ -=-=-=-=-=-=-=-=- -->
<div class="overlay quiz-wrapper">
	<!-- style="background-image: url(<?php /* echo url('/assets/images/banner/section-3-bg.jpg ') */ ?>)" -->
	<div class="inner-wrapper">
		<div class="inner">
			<div class="quizArea" id="quizArea">
				<div class="multipleChoiceQues">
					<h3 class="mc_quiz">
						Quiz Trivia
					</h3>
					<div class="my-progress">
						<progress class="my-progress-bar" min="0" max="100" value="0" step="9" aria-labelledby="my-progress-completion"></progress>
						<p id="my-progress-completion" class="js-my-progress-completion sr-only" aria-live="polite">0% complete</p>
					</div>
					<div class="quizBox">
						<div class="question"></div>
						<div class="answerOptions"></div>
						<div class="buttonArea mt-8 d-flex jc-center">
							<button class="btn bg-secondary-500 tc-link-contrast h-12 px-6 bd-n bd-rs-8 d-flex ai-center jc-center hidden" id="next">
								<span class="text ff-1-bd">Selanjutnya</span>
								<span class="icon ml-3 p-xl d-flex ai-center">
									<i class="fad fa-circle-chevron-right"></i>
								</span>
							</button>
							<button class="btn bg-primary-500 tc-link-contrast h-12 px-10 bd-n bd-rs-8 d-flex ai-center jc-center hidden btn-submit-quiz" id="submit">
								<span class="text ff-1-bd">Submit</span>
								<span class="icon ml-3 p-xl d-flex ai-center">
									<i class="fad fa-paper-plane"></i>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="resultArea">
					<div class="resultPage1 pos-r">
						<!-- <img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
						<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right"> -->
						<div class="resultBox pos-r zi-2">
							<div class="d-flex fd-col ai-center mb-10">
								<span class="paw-icon bg-secondary-500 tc-dark-contrast">
								</span>
								<div class="text ff-1-bd h3 tc-secondary-500 mt-8">Wah, Selamat!</div>
								<p class="p-lg  max-w-75% txtf-c ta-center mt-6 sm:max-w-100%"><span class="op-50%">ternyata kamu sangat mengetahui karakter peliharaanmu.</span> <br class="d-none" /> <span class="op-50%">dari pemahamanmu tentang keinginannya, inilah </span><span class="tc-secondary-500">daftar produk yang kami rekomendasikan!</span></p>
							</div>
							<!-- <div class="block"></div> -->
							<div class="row fw-w -ml-4 -mr-4 sm:fw-w" id="product-quiz">

							</div>
							<div class="d-flex fd-col ai-center jc-center mt-8">
								<div class="text ff-1 h6 tc-primary-500 mb-6 ta-center txtf-c max-w-45% sm:max-w-100% sm:p-md">Masih banyak loh produk kami yang lain, yuk lihat produk yang lain!</div>
								<button class="btn bg-secondary-500 tc-dark-contrast py-3 bd-n bd-rs-8 make_transition" data-transition-to="{{ url('products-intro') }}">
									<span class="text ff-1-bd px-8">Lihat Lainya</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<span class="icon cur-p overlay_toggle" id="quiz-wrapper">
			<i class="far fa-xmark"></i>
		</span>
	</div>
</div>
<!-- -=-=-=-=-=-=-=-=- QUIZ -=-=-=-=-=-=-=-=- - - - END -->

<!-- -=-=-=-=-=-=-=-=- QUIZ PROCESS AND RENDER -=-=-=-=-=-=-=-=- -->
<script>
	if ($(".quiz-wrapper")[0]) {
		const quizdata = [{
				question: "Apasih peliharaan yang kamu pelihara dirumah?",
				options: ["Kucing", "Anjing", "Ikan", "Kelinci", "Burung"],
				answer: "Burung",
				name: "question-1",
				category: 1,
			},
			{
				question: "Berapakah usia hewan peliharaanmu sekarang ?",
				options: [
					"1 - 6 Bulan",
					"6 - 12 Bulan",
					"1 - 2 Tahun",
					"Lebih Dari 2 Tahun",
				],
				answer: "1 - 6 Bulan",
				name: "question-2",
				category: 2,
			},
			{
				question: "Berapa kali sehari kamu memberi makan mereka?",
				options: ["1 Kali", "2 Kali", "3 Kali", "4 Kali"],
				answer: "2 Kali",
				name: "question-3",
				category: 3,
			},
			{
				question: "Adakah kebiasaan/kesukaan hewan peliharaanmu yang kamu amati?",
				options: [
					"Pilih Pilih Terhadap Makanan",
					"Tidur/Beristirahat Di Tempat Tertentu",
					"Menggit / Menggaruk / Menggali Sesuatu",
					"Suka Pura-Pura Mati",
				],
				answer: "Pilih Pilih Terhadap Makanan",
				name: "question-4",
				category: 1,
			},
			{
				question: "Dari jenis makanannya hewan peliharaanmu suka makanan jenis apasih?",
				options: ["Dry Food", "Wet Food", "Snacks"],
				answer: "Dry Food",
				name: "question-5",
				category: 2,
			},
			// {
			//   question:
			//     "An expression of disapproval or blame personally addressed to one censured",
			//   options: ["Pitiful", "Reproof", "Mutation", "Raillery"],
			//   answer: "Reproof",
			//   category: 3,
			// },
			// {
			//   question: "To deliver an elaborate or formal public speech.",
			//   options: ["Orate", "Magician", "Access", "Guzzle"],
			//   answer: "Orate",
			//   category: 2,
			// },
			// {
			//   question:
			//     "A wharf or artificial landing-place on the shore of a harbor or projecting into it",
			//   options: ["Intolerable", "Quay", "Fez", "Insatiable"],
			//   answer: "Quay",
			//   category: 3,
			// },
			// {
			//   question:
			//     "Friendly counsel given by way of warning and implying caution or reproof",
			//   options: ["Credence", "Colloquy", "Abyss", "Monition"],
			//   answer: "Monition",
			//   category: 1,
			// },
			// {
			//   question: "To make a beginning in some occupation or scheme",
			//   options: ["Muster", "Embark", "Ocular", "Apprehensible"],
			//   answer: "Ocular",
			//   category: 2,
			// },
			// {
			//   question: "Able to reinforce sound by sympathetic vibrations",
			//   options: ["Resonance", "Clandestine", "Diffusion", "Quietus"],
			//   answer: "Resonance",
			//   category: 3,
			// },
			// {
			//   question:
			//     "To send off or consign, as to an obscure position or remote destination",
			//   options: ["Monolith", "Endurable", "Efficient", "Relegate"],
			//   answer: "Relegate",
			//   category: 1,
			// },
		];
		const quizdata_en = [{
				question: "What pets do you have at home?",
				options: ["Cat", "Dog", "Fish", "Rabbit", "Bird"],
				answer: "Bird",
				name: "question-1",
				category: 1,
			},
			{
				question: "How old is your pet now?",
				options: [
					"1 - 6 Months old",
					"6 - 12 Months old",
					"1 - 2 Years old",
					"Lebih Dari 2 Years old",
				],
				answer: "1 - 6 Months old",
				name: "question-2",
				category: 2,
			},
			{
				question: "How many times a day do you feed them?",
				options: ["1 Times", "2 Times", "3 Times", "4 Times"],
				answer: "2 Times",
				name: "question-3",
				category: 3,
			},
			{
				question: "Are there any habits/interests of your pet that you observe?",
				options: [
					"Being picky about food",
					"Sleeping/laying on certain places",
					"Biting / Scratching / Digging Something",
					"Likes to Pretend to be Dead",
				],
				answer: "Being picky about food",
				name: "question-4",
				category: 1,
			},
			{
				question: "What kind of food that your pet like the most?",
				options: ["Dry Food", "Wet Food", "Snacks"],
				answer: "Dry Food",
				name: "question-5",
				category: 2,
			},
		];

		var $progressValue = 0;
		var resultList = [];

		/** Random shuffle questions **/
		function shuffleArray(question) {
			var shuffled = question.sort(function() {
				return 0.5 - Math.random();
			});
			return shuffled;
		}

		function shuffle(a) {
			for (var i = a.length; i; i--) {
				var j = Math.floor(Math.random() * i);
				var _ref = [a[j], a[i - 1]];
				a[i - 1] = _ref[0];
				a[j] = _ref[1];
			}
		}

		/*** Return shuffled question ***/
		function generateQuestions() {
			// var questions = shuffleArray(quizdata);
			var questions = quizdata;
			return questions;
		}

		/*** Return list of options ***/
		function returnOptionList(opts, i, optsName) {
			var optionHtml =
				'<li class="myoptions">' +
				'<input value="' +
				opts +
				'" name="' +
				optsName +
				'" type="radio" id="rd_' +
				i +
				'">' +
				'<label for="rd_' +
				i +
				'">' +
				opts +
				"</label>" +
				'<div class="bullet">' +
				'<div class="line zero"></div>' +
				'<div class="line one"></div>' +
				'<div class="line two"></div>' +
				'<div class="line three"></div>' +
				'<div class="line four"></div>' +
				'<div class="line five"></div>' +
				'<div class="line six"></div>' +
				'<div class="line seven"></div>' +
				"</div>" +
				"</li>";

			return optionHtml;
		}

		/** Render Options **/
		function renderOptions(optionList, optionName) {
			var ulContainer = $("<ul>").attr("id", "optionList");
			for (var i = 0, len = optionList.length; i < len; i++) {
				var optionContainer = returnOptionList(optionList[i], i, optionName);
				ulContainer.append(optionContainer);
			}
			$(".answerOptions").html("").append(ulContainer);
		}

		/** Render question **/
		function renderQuestion(question) {
			$(".question").html("<h6>" + question + "</h6>");
		}

		/** Render quiz :: Question and option **/
		function renderQuiz(questions, index) {
			var currentQuest = questions[index];
			renderQuestion(currentQuest.question);
			renderOptions(currentQuest.options, currentQuest.name);
			// console.log("Question");
			// console.log(questions[index]);
		}

		/** Return correct answer of a question ***/
		function getCorrectAnswer(questions, index) {
			return questions[index].answer;
		}

		/** pushanswers in array **/
		function correctAnswerArray(resultByCat) {
			var arrayForChart = [];
			for (var i = 0; i < resultByCat.length; i++) {
				arrayForChart.push(resultByCat[i].correctanswer);
			}

			return arrayForChart;
		}
		/** Generate array for percentage calculation **/
		function genResultArray(results, wrong) {
			var resultByCat = resultByCategory(results);
			var arrayForChart = correctAnswerArray(resultByCat);
			arrayForChart.push(wrong);
			return arrayForChart;
		}

		/** percentage Calculation **/
		function percentCalculation(array, total) {
			var percent = array.map(function(d, i) {
				return ((100 * d) / total).toFixed(2);
			});
			return percent;
		}

		/*** Get percentage for chart **/
		function getPercentage(resultByCat, wrong) {
			var totalNumber = resultList.length;
			var wrongAnwer = wrong;
			//var arrayForChart=genResultArray(resultByCat, wrong);
			//return percentCalculation(arrayForChart, totalNumber);
		}

		/** count right and wrong answer number **/
		function countAnswers(results) {
			var countCorrect = 0,
				countWrong = 0;

			for (var i = 0; i < results.length; i++) {
				if (results[i].iscorrect == true) countCorrect++;
				else countWrong++;
			}

			return [countCorrect, countWrong];
		}

		/**** Categorize result *****/
		function resultByCategory(results) {
			var categoryCount = [];
			var ctArray = results.reduce(function(res, value) {
				if (!res[value.category]) {
					res[value.category] = {
						category: value.category,
						correctanswer: 0,
					};
					categoryCount.push(res[value.category]);
				}
				var val = value.iscorrect == true ? 1 : 0;
				res[value.category].correctanswer += val;
				return res;
			}, {});

			categoryCount.sort(function(a, b) {
				return a.category - b.category;
			});

			return categoryCount;
		}

		/** Total score pie chart**/
		function totalPieChart(_upto, _cir_progress_id, _correct, _incorrect) {
			$("#" + _cir_progress_id)
				.find("._text_incor")
				.html("Incorrect : " + _incorrect);
			$("#" + _cir_progress_id)
				.find("._text_cor")
				.html("Correct : " + _correct);

			var unchnagedPer = _upto;

			_upto = _upto > 100 ? 100 : _upto < 0 ? 0 : _upto;

			var _progress = 0;

			var _cir_progress = $("#" + _cir_progress_id).find("._cir_P_y");
			var _text_percentage = $("#" + _cir_progress_id).find("._cir_Per");

			var _input_percentage;
			var _percentage;

			var _sleep = setInterval(_animateCircle, 25);

			function _animateCircle() {
				//2*pi*r == 753.6 +xxx=764
				_input_percentage = (_upto / 100) * 764;
				_percentage = (_progress / 100) * 764;

				_text_percentage.html(_progress + "%");

				if (_percentage >= _input_percentage) {
					_text_percentage.html(
						'<tspan x="50%" dy="0em">' +
						unchnagedPer +
						'% </tspan><tspan  x="50%" dy="1.9em">Your Score</tspan>'
					);
					clearInterval(_sleep);
				} else {
					_progress++;

					_cir_progress.attr("stroke-dasharray", _percentage + ",764");
				}
			}
		}

		function renderBriefChart(correct, total, incorrect) {
			var percent = (100 * correct) / total;
			if (Math.round(percent) !== percent) {
				percent = percent.toFixed(2);
			}

			totalPieChart(percent, "_cir_progress", correct, incorrect);
		}
		/*** render chart for result **/
		function renderChart(data) {
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
				type: "doughnut",
				data: {
					labels: [
						"Verbal communication",
						"Non-verbal communication",
						"Written communication",
						"Incorrect",
					],
					datasets: [{
						data: data,
						backgroundColor: ["#e6ded4", "#968089", "#e3c3d4", "#ab4e6b"],
						borderColor: [
							"rgba(239, 239, 81, 1)",
							"#8e3407",
							"rgba((239, 239, 81, 1)",
							"#000000",
						],
						borderWidth: 1,
					}, ],
				},
				options: {
					pieceLabel: {
						render: "percentage",
						fontColor: "black",
						precision: 2,
					},
				},
			});
		}

		/** List question and your answer and correct answer

  *****/
		function getAllAnswer(results) {
			var innerhtml = "";
			for (var i = 0; i < results.length; i++) {
				var _class = results[i].iscorrect ? "item-correct" : "item-incorrect";
				var _classH = results[i].iscorrect ? "h-correct" : "h-incorrect";

				var _html =
					'<div class="_resultboard ' +
					_class +
					'">' +
					'<div class="_header">' +
					results[i].question +
					"</div>" +
					'<div class="_yourans ' +
					_classH +
					'">' +
					results[i].clicked +
					"</div>";

				var html = "";
				if (!results[i].iscorrect)
					html = '<div class="_correct">' + results[i].answer + "</div>";
				_html = _html + html + "</div>";
				innerhtml += _html;
			}

			$(".allAnswerBox").html("").append(innerhtml);
		}
		/** render  Brief Result **/
		function renderResult(resultList) {
			var results = resultList;
			// console.log(results);
			var countCorrect = countAnswers(results)[0],
				countWrong = countAnswers(results)[1];

			renderBriefChart(countCorrect, resultList.length, countWrong);
		}

		function renderChartResult() {
			var results = resultList;
			var countCorrect = countAnswers(results)[0],
				countWrong = countAnswers(results)[1];
			var dataForChart = genResultArray(resultList, countWrong);
			renderChart(dataForChart);
		}

		/** Insert progress bar in html **/
		function getProgressindicator(length) {
			// console.log(
			//   "🚀 ~ file: main.js ~ line 1219 ~ getProgressindicator ~ length",
			//   length
			// );
			var progressbarhtml = " ";
			for (var i = 0; i < length; i++) {
				progressbarhtml +=
					'<div class="my-progress-indicator progress_' +
					(i + 1) +
					" " +
					(i == 0 ? "active" : "") +
					'"></div>';
			}
			$(progressbarhtml).insertAfter(".my-progress-bar");
		}

		/*** change progress bar when next button is clicked ***/
		function changeProgressValue() {
			$progressValue += 100 / (quizdata.length - 1);
			// console.log(">>>>", quizdata.length);
			$(".my-progress")
				.find(".my-progress-indicator.active")
				.next(".my-progress-indicator")
				.addClass("active");
			$("progress").val($progressValue);
			$(".js-my-progress-completion").html($("progress").val() + "% complete");
		}

		function addClickedAnswerToResult(questions, presentIndex, clicked) {
			var correct = getCorrectAnswer(questions, presentIndex);
			var result = {
				index: presentIndex,
				question: questions[presentIndex].question,
				clicked: clicked,
				iscorrect: clicked == correct ? true : false,
				answer: correct,
				category: questions[presentIndex].category,
			};
			resultList.push(result);

			// console.log("result");
			// console.log(result);
		}

		$(document).ready(function() {
			var presentIndex = 0;
			var clicked = 0;

			var questions = generateQuestions();
			renderQuiz(questions, presentIndex);
			getProgressindicator(questions.length);

			$(".answerOptions ").on("click", ".myoptions>input", function(e) {
				clicked = $(this).val();
				$(this).parent().addClass("active").siblings().removeClass("active");
				// $(this).parent().addClass("active");
				console.log(">>>> ", $(this));

				if (questions.length == presentIndex + 1) {
					$("#submit").removeClass("hidden");
					$("#next").addClass("hidden");
				} else {
					$("#next").removeClass("hidden");
				}
			});

			$("#next").on("click", function(e) {
				e.preventDefault();
				addClickedAnswerToResult(questions, presentIndex, clicked);

				$(this).addClass("hidden");

				presentIndex++;
				renderQuiz(questions, presentIndex);
				changeProgressValue();
			});

			$("#submit").on("click", function(e) {
				addClickedAnswerToResult(questions, presentIndex, clicked);
				$(".multipleChoiceQues").hide();
				$(".resultArea").addClass("active");
				$(".quiz-wrapper").addClass("result-active");
				renderResult(resultList);
			});

			$(".resultArea").on("click", ".viewchart", function() {
				$(".resultPage2").show();
				$(".resultPage1").hide();
				$(".resultPage3").hide();
				renderChartResult();
			});

			$(".resultArea").on("click", ".backBtn", function() {
				$(".resultPage1").show();
				$(".resultPage2").hide();
				$(".resultPage3").hide();
				renderResult(resultList);
			});

			$(".resultArea").on("click", ".viewanswer", function() {
				$(".resultPage3").show();
				$(".resultPage2").hide();
				$(".resultPage1").hide();
				getAllAnswer(resultList);
			});

			$(".resultArea").on("click", ".replay", function() {
				window.location.reload(true);
			});
		});
	}
</script>
<!-- -=-=-=-=-=-=-=-=- QUIZ PROCESS AND RENDER -=-=-=-=-=-=-=-=- - - - END -->

<script>
	function variantWrapping() {
		var variantItem = $('.variant-item');
		var variansParent = variantItem.parent();
		var variantParentWidth = $('.variant-item').parent().width();
		var hiddenItem = new Array();

		$.when(variantItem[0]).then(function() {

			$.each(variantItem, function() {
				var item = $(this);
				var key = item.data("key");
				var itemWidth = item.width();
				var itemHeight = item.outerHeight();
				var variantParentHeight = $(this).parent().outerHeight();
				var heighLimit = itemHeight * 2;
				var itemPosition = item.position();

				// console.log(key, "<<< x >>>", heighLimit, "<<< = >>>", itemPosition.top);

				if (itemWidth < variantParentWidth) {
					if (variantParentHeight > itemHeight * 3) {

						if (itemPosition.top > heighLimit) {
							item.addClass("bg-link-300 pos-a l-0 t-0 v-h op-0%");
							// item.addClass("bg-link-300")
							item.parent().addClass("blue_parent");
							// console.log(">>>>", key, "i am doomed", itemPosition.left, variantParentWidth - (variantParentWidth * 50 / 100));
						} else {
							// item.addClass("bg-link-100")
							// console.log(">>>>", key, "i am quite safe");
						}
					} else {
						// item.addClass("bg-light-shade");
						// console.log(">>>>", key, "i am safe");
					}
				}
			})

			var blueParent = $(".blue_parent");

			$.each(blueParent, function(key) {
				var item = $(this);
				var countBlueChildren = item.children(".bg-link-300").length
				// console.log("🚀 ~ file: products.blade.php ~ line 335 ~ $.each ~ countBlueChildren", countBlueChildren)

				item.append(`<span class="variant-item d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-primary-300 bd-rs-3 mb-2 max-w-75% ml-2">
																<p class="p-xs ff-2 lc-1 tc-primary-500">${countBlueChildren}+</p>
															</span>`);
			})

		});
	}

	$(window).ready(function() {
		variantWrapping();

		<?php if ($banner->is_active == 0) { ?>
			$('#status-ads-banner').removeClass('active')
		<?php } else { ?>
			$('#status-ads-banner').addClass('active')
		<?php } ?>
	})

	$('#quizArea').on('change', '[name="question-1"]', function() {
		localStorage.setItem("animal_name", $(this).val());
	})

	$('.btn-submit-quiz').on('click', function() {
		$.ajax({
			url: "{{ url('filter-product-quiz') }}",
			method: 'post',
			data: {
				animal: localStorage.getItem("animal_name"),
				food_type: $('[name="question-5"]:checked').val(),
				_token: "{{ csrf_token() }}",
				lang: "{{ $lang }}"
			},
			dataType: 'json',
			success: function(xhr) {
				html = ""
				$.each(xhr.data, function(key, val) {
					html += `<div class="col col-4 mb-10 sm:col-12 sm:mb-6">
								<div class="px-4">
									<div class="product-item ${val.type} make_transition cur-p" data-transition-to="{{ url('product-detail/${val.id_product}') }}">
										<div class="product-image-wrapper">
											<img class="product_image" src="<?php echo url('/assets/lampiran/cover_file/${val.cover_file}') ?>" alt="cat">
											<span class="icon d-flex ai-center jc-center h6 tc-primary-500">
												<i class="${val.icon}"></i>
											</span>
										</div>
										<div class="product-text-wrapper px-2">
											<div class="d-flex ai-end jc-between mb-4">
												<div class="p-md ff-1">${val.product}</div>
											</div>`;
					html += `</div></div></div></div>`;
				})
				$('#product-quiz').html(html);

				$(".make_transition").click(function(e) {
					$(".overlay").removeClass("active");

					{
						(e) => dragging && e.preventDefault();
					}
					$(".transition").removeClass("off");
					var gotoPage = $(this).data("transition-to");
					e.preventDefault(); //will stop the link href to call the blog page

					setTimeout(function() {
						window.location.href = gotoPage; //will redirect to your blog page (an ex: blog.html)
					}, 2000); //will call the function after 2 secs.
				});
			}
		})
	})
</script>
@endsection