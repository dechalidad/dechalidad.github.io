@extends('en-welcome')
@section('title','Perfect Companion Indonesia - About Us')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<div class="content-wrapper sub-page" id="about-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header zi-3 sm:d-flex sm:fd-col sm:h-100vh">
			<div class="inner">
				<div class="t-n-s mt-20 mb-28 sm:mb-10" data-aos="fade-up">
					<div class="row sm:fw-w">
						<div class="col col-3 sm:col-12 sm:mb-6">
							<div class="ff-2 p lh-6 tc-primary-300 mr-20 sm:mr-0 sm:max-w-75%">
								<span class="pos-r"><span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>Built to meet the needs</span> <br class="sm:d-block" />of the pet products industry.
							</div>
						</div>
						<div class="col col-9 sm:col-12">
							<div class="h3 ff-1-bd tc-primary-500 max-w-80% -mt-4 sm:h4 sm:max-w-100%">
								<span>The Pioneer of Proper Nutrition of Your Pet, The Perfect Companion.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 sm:mx-0" style="background-image: url('<?php echo url('/assets/images/banner/about-header.jpg') ?>">

			</div>
		</div>

		<!-- SECTION ABOUT US -->
		<div class="fullwidth-master section-2 mt-20 zi-2 sm:pt-12">
			<div class="inner">
				<div class="row sm:fd-col">
					<div class="col col-6 pl-0 sm:col-12">
						<div class="t-n-s" data-aos="fade-up">
							<div class="d-flex ai-center op-80% mb-4">
								<div class="h-2px w-20 bg-primary-500"></div>
								<div>
									<p class="p-sm ff-2-bd ml-4 tc-primary-500">We are Here</p>
								</div>
							</div>
							<div class="h4 ff-1-bd tc-primary-500 txtf-c sm:h6 max-w-75% sm:max-w-100%">Because your pet deserve the best care.</div>
						</div>
					</div>
					<div class="col col-6 pr-0 sm:col-12">
						<div class="ml-20 mt-32 sm:ml-0 sm:mt-4 sm:pt-0">
							<p class="p-lg tc-primary-400 max-w-85% ml-2 sm:p-md sm:ml-0" data-aos="fade-up">
								Perfect Companion Group (PCG) is a world-class pet food company built to meet the needs of the pet products industry.
							</p>
							<!-- <button class="btn bg-link-500 tc-link-contrast py-3 bd-n bd-rs-8" data-aos="fade-up">
								<span class="text ff-1-bd px-8">Tentang Kami</span>
							</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PRODUCT HIGHLIGHT -->
		<div class="fullwidth-master section-3 mt-20 sm:mt-40">
			<div class="accent-1"></div>
			<div class="accent-2"></div>
			<div class="inner">
				<div class="row product-highlight-wrapper">
					<?php
					$arr = array(
						'0' => array(
							'row' => 'col-1',
							'data' => array(
								'0' => array(
									'image'  		 => 'cat-about.png',
									'type'			 => 'cat',
									'name' 	 		 => 'Cat Food',
								),

								'1' => array(
									'image'  		 => 'fish-about.png',
									'type'			 => 'fish',
									'name' 	 		 => 'Fish Food',
								),
							)
						),
						'1' => array(
							'row' => 'col-2',
							'data' => array(
								'0' => array(
									'image'  		 => 'dog-about.png',
									'type'			 => 'dog',
									'name' 	 		 => 'Dog Food',
								),
								'1' => array(
									'image'  		 => 'puppy-about.png',
									'type'			 => 'puppy',
									'name' 	 		 => 'Puppy Food',
								),


							)
						),
						'2' => array(
							'row' => 'col-3',
							'data' => array(
								'0' => array(
									'image'  		 => 'kitten-about.png',
									'type'			 => 'kitten',
									'name' 	 		 => 'Kitten Food',
								),

								'1' => array(
									'image'  		 => 'rabbit-about.png',
									'type'			 => 'rabbit',
									'name' 	 		 => 'Rabit Food',
								),
							)
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<div class="col col-4 d-flex fd-col ai-center jc-center mb-20" id="<?= $value['row'] ?>">
							<?php foreach ($value['data'] as $key => $data) { ?>
								<div class="sm:px-4">
									<div class="product-item <?= $key != 0 ? 'mt-10' : '' ?>" id="<?= $data['type'] ?>">
										<div class="product-image-wrapper">
											<div class="product-overflow">
												<img src="<?php echo url('/assets/images/animals/' . $data['image']) ?>" alt="cat">
											</div>
											<div class="rotate-wrapper">
												<div class="h6 ff-1-bd tc-dark-contrast pl-24"><?= $data['name'] ?></div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<div class="d-flex pl-20 sm:pl-0">
					<p class="p-lg tc-primary-400 max-w-45% ml-2 sm:ml-0 sm:max-w-100%" data-aos="fade-up">
						PCG was built to expand and support Charoen Pokphand Group's specialization in providing pet food to participate in a growing market where pet owners are increasingly aware of product quality for their pets.
						<br />
						<br />
						In the process of producing and manufacturing products to meet the demands of pets and their owners, we understand that pets can be friends for life and deserve the best care. Therefore, our company makes every effort to keep this in mind in providing nutrition and a better life for our pets.
					</p>
				</div>
			</div>
		</div>

		<!-- SECTION FACTORY -->
		<div class="fullwidth-master section-4-1 mt-20 zi-2 sm:mt-40">
			<div class="inner">
				<div class="t-n-s" data-aos="fade-up">
					<div class="d-flex ai-center op-80% mb-4">
						<div class="h-2px w-20 bg-primary-500"></div>
						<div>
							<p class="p-sm ff-2-bd ml-4 tc-primary-500">Research and Improvement</p>
						</div>
					</div>
					<div class="h3 ff-1-bd tc-primary-500 max-w-50% sm:max-w-100% sm:h6">Best Quality Products.</div>
				</div>
			</div>
		</div>
		<div class="fullwidth-master section-4-2 -mt-10 zi-1 sm:mt-10" style="background-image: url(<?php echo url('/assets/images/banner/about-factory.jpg') ?>)">
			<div class="inner zi-1">
				<div class="row h-100vh sm:fw-w sm:h-a">
					<div class="col col-8 sm:col-12 sm:pt-20 sm:mb-6">
						<div class="d-flex ai-center h-100%">
							<div class="t-n-s pr-10 sm:pr-0">
								<div class="h3 ff-1-bd tc-dark-contrast sm:h5" data-aos="fade-up">Coming from the Best <br class="sm:d-none" /> Research & Development Center<br class="sm:d-none" />in the Field.</div>
							</div>
						</div>
					</div>
					<div class="col col-4 sm:col-12">
						<div class="d-flex ai-end h-100% sm:ai-start">
							<p class="p-lg tc-dark-contrast max-w-90% pb-20 sm:max-w-100%" data-aos="fade-up">
								To ensure that each of our products is made with only quality ingredients and proper nutrition, Perfect Companion Group has a highly qualified research center to research and develop pet food products.
								<br />
								<br />
								Our nutritionists and veterinary specialists work at the Pet Food Research Center to evaluate and ensure the quality of our products, both in terms of palatability, as well as performance and reproduction, are in accordance with the established formula standards.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PARTNER -->
		<!-- id="change_color_trigger" -->
		<div class="fullwidth-master section-5 pt-20">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<div class="inner">
				<div class="t-n-s d-flex fd-col ai-center mb-10">
					<div class="d-flex ai-center op-80%">
						<div class="h-2px w-20 bg-primary-500 dark:bg-dark-contrast"></div>
						<div>
							<p class="p-sm ff-2-bd mx-4 tc-primary-500 dark:tc-dark-contrast ta-center">Partners & Support</p>
						</div>
						<div class="h-2px w-20 bg-primary-500 dark:bg-dark-contrast"></div>
					</div>
					<div class="h4 ff-1-bd tc-primary-500 dark:tc-dark-contrast max-w-75% txtf-c ta-center mt-6 mb-8 sm:h6 sm:max-w-100% sm:mb-6">
						Available at nearby outlets <br class="sm:d-none" /> and within touch.
					</div>
				</div>
				<div class="row fw-w jc-center sm:fw-w sm:-ml-4 sm:-mr-4">
					<?php
					$arr = array(
						// '0' => array(
						// 	'image'     => 'partner-1.png',
						// 	'alt'		=> 'partner'
						// ),
						// '1' => array(
						// 	'image'     => 'partner-2.png',
						// 	'alt'		=> 'partner'
						// ),
						// '2' => array(
						// 	'image'     => 'partner-3.png',
						// 	'alt'		=> 'partner'
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
						<div class="col col-2 mb-12 sm:col-6">
							<div class="d-flex ai-center jc-center px-8 sm:w-100% sm:px-0">
								<div class="sm:px-4">
									<img class="w-100%" src="<?php echo url('/assets/images/partners/' . $value['image']) ?>" alt="<?= $value['alt'] ?>">

								</div>
							</div>
						</div>
					<?php }
					?>

				</div>
			</div>
		</div>

		@include('template/en-footer')

	</div>
</div>

@endsection