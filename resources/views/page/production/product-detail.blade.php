@extends('welcome')
@section('title',$item["detail"]->product.' - Perfect Companion Indonesia')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<div class="content-wrapper sub-detail-page" id="product-detail-page">
	<div class="content">

		<div class="fullwidth-master section-1 product-detail-header">
			<div class="inner">
				<div class="row mt-40 sm:mt-20 sm:fw-w">
					<div class="col col-3 sm:col-12 ">
						<div class="d-flex jc-start w-100% pos-s t-20">
							<div class="product-image-wrapper aspect_ratio" data-ratio="1">
								<img class="product_image" id="product_image" src="<?php echo url('/assets/lampiran/cover_file/' . $item["detail"]->cover_file) ?>" alt="cat">
							</div>
						</div>
					</div>
					<div class="col col-6 sm:col-12 sm:mb-12">
						<div class="max-w-100% mx-8 sm:mx-0">
							<div class="d-flex ai-center mt-8 sm:ai-start">
								<span class="product-icon d-flex ai-center jc-center h6 tc-primary-500 mr-4 sm:p-xl">
									<i class="{{ $item['detail']->icon }}"></i>
								</span>
								<h4 class="ff-1-bd f-1 tc-primary-500 sm:h6 sm:mt-1" id="product_name">
									{{ $item['detail']->product }}
								</h4>
							</div>

							<div class="description mt-8">
								<div class="d-flex ai-center mb-2">
									<p class="p-lg mr-4 tc-medium">Deskripsi</p>
									<div class="h-2px w-10 bg-medium op-25%"></div>
								</div>
								<div class="max-w-100% description-wrapper">
									<?= $item['detail']->description ?>
								</div>
							</div>

							<div class="ingredients mt-8">
								<div class="d-flex ai-center mb-2">
									<p class="p-lg mr-4 tc-medium">Bahan</p>
									<div class="h-2px w-10 bg-medium op-25%"></div>
								</div>
								<div class="description-wrapper">
									<?= $item['detail']->ingredient ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col col-3 sm:col-12">
						<div class="pos-s t-20">
							<div class="d-flex ai-center jc-center mb-4">
								<div class="h-2px f-1 bg-primary-500 op-25%"></div>
								<p class="p-lg tc-primary-500 mx-4 ff-1-bd">Cara Membeli Produk Kami </p>
								<div class="h-2px f-1 bg-primary-500 op-25%"></div>
							</div>
							<div class="d-flex tc-medium mb-4 px-2">
								<span class="icon mr-4 op-50%">
									<i class="fas fa-circle-1 p-xl"></i>
								</span>
								<p class="-mt-1">Pilih varian favorit si manis</p>
							</div>
							<div class="d-flex pos-r zi-2">
								<select name="variants" id="product_variants" class="custom-select variants" placeholder="{{ (count($item['variants']) > 0) ? 'Pilih Varian' : 'Belum ada varian' }}">
									<?php
									if (count($item['variants']) > 0) {
										foreach ($item['variants'] as $key => $value) {
									?>
											<option class="txtf-c" id="<?= $value->name ?>" data-link="<?= $value->name ?>" value="<?php echo url('/assets/lampiran/variant_file/' . $value->variant_file) ?>">
												<?= $value->name ?>
											</option>
									<?php  }
									} ?>
								</select>
							</div>

							<div class="d-flex tc-medium mt-8 mb-4 px-2">
								<span class="icon mr-4 op-50%">
									<i class="fas fa-circle-2 p-xl"></i>
								</span>
								<p class="-mt-1">Langsung checkout <br />di marketplace favoritmu</p>
							</div>
							<div class="row fw-w w-100% jc-center -ml-4 -mr-4">
								<?php
								$arr = array(
									'0' => array(
										'image'  		 => 'icon-tokped.jpg',
										'name'			 => 'tokped',
										'groups' 	 	 => array(
											"0" => array(
												"animal_name" => "Kucing",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Me-O',
														'link'   => 'https://www.tokopedia.com/officialstoreme-o/product',
													),
													'1' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/smartheart-cat',
													),
													'2' => array(
														'brand'  => 'Cat Choize',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/cat-choize',
													),
													'3' => array(
														'brand'  => 'Lezato',
														'link'   => '-',
													),
													'4' => array(
														'brand'  => 'Cat Comfy',
														'link'   => 'https://www.tokopedia.com/officialstoreme-o/etalase/cat-comfy-cat-litter',
													)
												)
											),
											"1" => array(
												"animal_name" => "Anjing",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/smartheart-dog',
													),
													'1' => array(
														'brand'  => 'Luvcare',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/luvcare',
													),
													'2' => array(
														'brand'  => 'Dog Choize',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/dog-choize',
													),
												)
											),
											"2" => array(
												"animal_name" => "Kelinci",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/smartheart-rabbit',
													),
												)
											),
											"3" => array(
												"animal_name" => "Ikan",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Oratus',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/oratus',
													),
												)
											),
											"4" => array(
												"animal_name" => "Burung",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Bird Choize',
														'link'   => 'https://www.tokopedia.com/smartheartindo/etalase/bird-choize',
													),
												)
											)
										)
									),
									'1' => array(
										'image'  		 => 'icon-shopee.jpg',
										'name'			 => 'shopee',
										'groups' 	 	 => array(
											"0" => array(
												"animal_name" => "Kucing",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Me-O',
														'link'   => 'https://shopee.co.id/meoofficialstore',
													),
													'1' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=111438398#product_list',
													),
													'2' => array(
														'brand'  => 'Cat Choize',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=111438613#product_list',
													),
													'3' => array(
														'brand'  => 'Lezato',
														'link'   => '-',
													),
													'4' => array(
														'brand'  => 'Cat Comfy',
														'link'   => 'https://shopee.co.id/meoofficialstore?shopCollection=144386316#product_list',
													)
												)
											),
											"1" => array(
												"animal_name" => "Anjing",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=111438344#product_list',
													),
													'1' => array(
														'brand'  => 'Luvcare',
														'link'   => '-',
													),
													'2' => array(
														'brand'  => 'Dog Choize',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=111438353#product_list',
													),
												)
											),
											"2" => array(
												"animal_name" => "Kelinci",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Smartheart',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=111438539#product_list',
													),
												)
											),
											"3" => array(
												"animal_name" => "Ikan",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Oratus',
														'link'   => 'https://shopee.co.id/smartheart.indonesia?shopCollection=154061310#product_list',
													),
												)
											),
											"4" => array(
												"animal_name" => "Burung",
												"marketplace" => array(
													'0' => array(
														'brand'  => 'Bird Choize',
														'link'   => '-',
													),
												)
											)
										)
									),
									// '1' => array(
									// 	'image'  		 => 'icon-jd.jpg',
									// 	'link'			 => '#',
									// 	'name'			 => 'jdid',
									// ),
									// '2' => array(
									// 	'image'  		 => 'icon-blibli.jpg',
									// 	'link'			 => '#',
									// 	'name'			 => 'blibli',
									// ),
									// '3' => array(
									// 	'image'  		 => 'icon-shopee.jpg',
									// 	'link'			 => '#',
									// 	'name'			 => 'shopee',
									// ),
									// '4' => array(
									// 	'image'  		 => 'icon-lazada.jpg',
									// 	'link'			 => '#',
									// 	'name'			 => 'lazada',
									// ),
								);
								foreach ($arr as $key => $value) {
								?>
									<div>
										<?php
										foreach ($value['groups'] as $key => $group_value) {
											if ($item['detail']->animal == $group_value['animal_name']) {
												foreach ($group_value['marketplace'] as $key => $marketplace_value) {
													if ($item['detail']->brand == $marketplace_value['brand']) {

										?>
														<a href="<?= $marketplace_value['link'] ?>" target="_blank" class="d-flex ai-center jc-center mx-2 mb-4 h-20 w-20 bd-rs-20 of-h <?= $value['name'] ?>">
															<img src="<?php echo url('/assets/images/icons/' . $value['image']) ?>" alt="<?= $value['name'] ?>" class="h-100%">
														</a>
										<?php
													}
												}
											}
										}
										?>
										<div class="ta-center d-none pos-a">
											{{ $item['detail']->brand }} <br /> {{ $item['detail']->animal }} </br>
										</div>
									</div>
								<?php } ?>
								<!-- <div class="col col-12 mb-4">
									<div class="pl-0">
										<button class="btn-link d-flex ai-center jc-center shopee">
											<img class="product_image" src="<?php echo url('/assets/images/logo/shopee.png') ?>" alt="cat">
										</button>
									</div>
								</div>
								<div class="col col-12">
									<div class="pr-0">
										<button class="btn-link d-flex ai-center jc-center blibli">
											<img class="product_image" src="<?php echo url('/assets/images/logo/blibli.png') ?>" alt="cat">
										</button>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="fullwidth-master section-2 mt-20">
			<div class="inner">
				<div class="row mb-10">
					<div class="col col-3">

					</div>
					<div class="col col-9">

					</div>
				</div>
				<div class="row">
					<div class="col col-3">
						<div class="d-flex ai-center mb-2">
							<div class="h-2px w-20 bg-medium op-50%"></div>
							<div>
								<h6 class="ml-6 tc-medium">Bahan</h6>
							</div>
						</div>
					</div>
					<div class="col col-9">
						<p class="p-xl max-w-80% tc-primary-500">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum unde, fuga eaque similique dolorum consectetur repellendus mollitia reprehenderit quisquam expedita! Pariatur assumenda deleniti aut odit repellendus distinctio exercitationem labore impedit.
						</p>
					</div>
				</div>
			</div>
		</div> -->

		@include('template/footer')

	</div>
</div>

@endsection