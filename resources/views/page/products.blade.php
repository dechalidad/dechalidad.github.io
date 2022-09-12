@extends('welcome')
@section('title','Perfect Companion Indonesia - Semua Produk')
@section('content')
<div class="content-wrapper sub-page all-page" id="product-all-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40" style="background-image: url('<?php echo url('/assets/images/banner/product-all-header.jpg') ?>">
				<div class="rotate-wrapper mb-10">
					<div class="scroll-indicator p-lg tc-dark-contrast cur-p scroll_to" data-scroll-to="section-2" data-scroll-offset="0">
						<span class="text txtf-c ff-2">scroll</span>
						<span class="icon ml-4">
							<i class="h5 far fa-arrow-right-long"></i>
						</span>
					</div>
				</div>
				<div class="inner h-100%">
					<div class="d-flex h-100% ai-end">
						<div class="t-n-s w-100% mb-32" data-aos="fade-up">
							<div class="row">
								<div class="col col-3">
									<div class="ff-2 p lh-6 tc-dark-contrast mr-20">
										<span class="pos-r"><span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>Dibuat hanya dari bahan</span> berkualitas terbaik.
									</div>
								</div>
								<div class="col col-9">
									<div class="h1 ff-1-bd tc-dark-contrast max-w-80% -mt-4">
										<span>Pilihan Tepat <br />Untuk Si Manis.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PRODUCT LIST -->
		<div class="fullwidth-master section-2 mt-20">
			<div class="inner">
				<div class="t-n-s mb-10">
					<div class="d-flex ai-center op-80% mb-2">
						<div class="h-2px w-20 bg-primary-500"></div>
						<div>
							<p class="p-sm ff-2-bd ml-4 tc-primary-500">Pilihan Tepat</p>
						</div>
					</div>
					<div class="h3 ff-1-bd tc-primary-500 txtf-c">Produk Kami.</div>
				</div>
				<div class="tab ">
					<div class="d-flex">
						<div class="tab-header mb-10">
							<div class="filter-button bg-medium tc-dark-contrast mr-3 py-3 px-5 bd-rs-8">
								<span class="p-lg ff-1-bd">Filter</span>
								<span class="icon"><i class="far fa-filter-list ml-2"></i></span>
							</div>
							<?php
							$arr = array(
								'0' => array(
									'id'			=> 'Semua Produk',
									'active'	=> 1,
								),
								'1' => array(
									'id'			=> 'Me-O',
									'active'	=> 0,
								),
								'2' => array(
									'id'			=> 'Choize',
									'active'	=> 0,
								),
								'3' => array(
									'id'			=> 'SmartHeart',
									'active'	=> 0,
								),
								'4' => array(
									'id'			=> 'Lezato',
									'active'	=> 0,
								),
								'5' => array(
									'id'			=> 'Luvcare',
									'active'	=> 0,
								),
								'6' => array(
									'id'			=> 'Oratus',
									'active'	=> 0,
								),
							);
							foreach ($arr as $key => $value) {
							?>
								<div class="tab-header-item <?= $value['active'] == 0 ? '' : 'active' ?> <?= $key != 0 ? "ml-3" : "" ?>" id=<?= $value['id'] ?>>
									<span class="p-lg"><?= $value['id'] ?></span>
								</div>
							<?php } ?>
							<div class="tab-header-item no-display">adjuster</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="result-wrapper">
							<div class="row fw-w">
								<?php
								$arr = array(
									'0' => array(
										'image'  		 => 'meo_can_tuna_170g.png',
										'type'			 => 'cat',
										"icon"			 => 'fad fa-cat-space',
										'name' 	 		 => 'Me-O Canned Tuna 170g',
										'variant_types'	 => array(
											"Tuna", "Seafood", "Sardine"
										),
									),
									'1' => array(
										'image'  		 => 'meo_can_tuna_400g.png',
										'type'			 => 'cat',
										"icon"			 => 'fad fa-cat-space',
										'name' 	 		 => 'Me-O Canned Tuna 400g',
										'variant_types'	 => array(
											"Tuna", "Seafood", "Sardine"
										),
									),
									'2' => array(
										'image'  		 => 'meo_tuna_1.3kg.png',
										'type'			 => 'cat',
										"icon"			 => 'fad fa-cat-space',
										'name' 	 		 => 'Me-O Tuna 1.3kg',
										'variant_types'	 => array(
											"Tuna", "Seafood", "Sardine"
										),
									),
									'3' => array(
										'image'  		 => 'meo_tuna_400g.png',
										'type'			 => 'cat',
										"icon"			 => 'fad fa-cat-space',
										'name' 	 		 => 'Me-O Tuna 400g',
										'variant_types'	 => array(
											"Tuna", "Seafood", "Sardine"
										),
									),
								);
								foreach ($arr as $key => $value) {
								?>
									<div class="col col-3 mb-10">
										<div class="px-4">
											<div class="product-item <?= $value['type'] ?> make_transition cur-p" id="product-detail" data-transition-to="product-detail">
												<div class="product-image-wrapper">
													<img class="product_image" src="<?php echo url('/assets/images/products/' . $value['image']) ?>" alt="cat">
													<span class="icon d-flex ai-center jc-center h6 tc-primary-500">
														<i class="<?= $value['icon'] ?>"></i>
													</span>
												</div>
												<div class="product-text-wrapper px-2">
													<div class="d-flex ai-end jc-between mb-4">
														<div class="h6 ff-1-bd"><?= $value['name'] ?></div>
													</div>
													<div class="d-flex ai-start">
														<p>Variants</p>
														<div class="d-flex fw-w jc-end max-w-80% ml-a">
															<?php foreach ($value['variant_types'] as $key => $var) { ?>
																<span class="d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-medium-tint bd-rs-3 mb-2 <?= $key != 0 ? 'ml-2' : '' ?>">
																	<p class="p-xs ff-2"><?= $var ?></p>
																</span>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php }  ?>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex ai-center pagination pagination-wrapper mt-10">
					<p class="p-lg ff-1 tc-primary-500 mr-4">Jumlah produk per halaman</p>
					<!-- PAGINATION OPTIONS CONTROL -->
					<?php
					$arr = array(
						'0' => array(
							'option_text'  		=> 20,
							'option_value'		=> 20,
							'active'			=> 0,
						),
						'1' => array(
							'option_text'  		=> 40,
							'option_value'		=> 40,
							'active'			=> 0,
						),
						'2' => array(
							'option_text'  		=> 80,
							'option_value'		=> 80,
							'active'			=> 1,
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<div class="pagination-control cur-p h-10 w-10 d-flex ai-center jc-center bd-rs-2 <?= $key != 0 ? 'ml-2' : '' ?> <?= $value['active'] == 1 ? 'active' : '' ?>">
							<span class="text"><?= $value['option_text'] ?></span>
						</div>
					<?php } ?>
					<!-- PAGINATION OPTIONS CONTROL - - - END -->
					<div class="d-flex ai-center ml-a">
						<span class="icon h-10 w-10 d-flex ai-center jc-center btn-arrow btn-arrow-left">
							<i class="h6 far fa-arrow-left-long"></i>
						</span>
						<span class="icon h-10 w-10 d-flex ai-center jc-center btn-arrow btn-arrow-right active">
							<i class="h6 far fa-arrow-right-long"></i>
						</span>
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

@endsection