@extends('welcome')
@section('title','Name of product - Perfect Companion Indonesia')
@section('content')

<div class="content-wrapper sub-detail-page" id="product-detail-page">
	<div class="content">

		<div class="fullwidth-master section-1 product-detail-header">
			<div class="inner">
				<div class="row mt-40">
					<div class="col col-3">
						<div class="d-flex jc-start w-100% pos-s t-20">
							<div class="product-image-wrapper aspect_ratio" data-ratio="1">
								<img class="product_image" id="product_image" src="<?php echo url('/assets/images/products/meo_can_tuna_170g.png') ?>" alt="cat">
							</div>
						</div>
					</div>
					<div class="col col-6">
						<div class="maxc-w-100% mx-8">
							<div class="d-flex ai-center mt-8">
								<span class="product-icon d-flex ai-center jc-center h6 tc-primary-500 mr-4">
									<i class="fad fa-cat-space"></i>
								</span>
								<h4 class="ff-1-bd tc-primary-500" id="product_name">
									Me-O Canned Tuna 170g
								</h4>
							</div>

							<div class=" description mt-8">
								<div class="d-flex ai-center mb-2">
									<p class="p-lg mr-4 tc-medium">Deskripsi</p>
									<div class="h-2px w-10 bg-medium op-25%"></div>
								</div>
								<p class="p-lg max-w-100% tc-primary-500">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum unde, fuga eaque similique dolorum consectetur repellendus mollitia reprehenderit quisquam expedita! Pariatur assumenda deleniti aut odit repellendus distinctio exercitationem labore impedit.
								</p>
							</div>

							<div class="ingredients mt-8">
								<div class="d-flex ai-center mb-2">
									<p class="p-lg mr-4 tc-medium">Bahan</p>
									<div class="h-2px w-10 bg-medium op-25%"></div>
								</div>
								<ul class="ls-d tc-primary-500 pl-4">
									<?php
									for ($x = 1; $x <= 25; $x++) {
									?>
										<li class="pl-2">
											<p class="p-lg">
												Lorem ipsum dolor sit amet consectetur adipisicing elit.
											</p>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col col-3">
						<div class="pos-s t-20">
							<div class="d-flex tc-medium mb-4 px-2">
								<span class="icon mr-4 op-50%">
									<i class="fas fa-circle-1 p-xl"></i>
								</span>
								<p class="-mt-1">Pilih varian favorit si manis</p>
							</div>
							<div class="d-flex pos-r zi-2">
								<select name="variants" id="product_variants" class="custom-select variants" placeholder="Pilih Varian">
									<?php
									$arr = array(
										'0' => array(
											'image'  		 => 'meo_can_tuna_170g.png',
											'link'			=> 'https://www.tokopedia.com/officialstoreme-o/me-o-canned-cat-food-tuna-in-jelly-170-g-isi-2-pack',
											'id'			 => '#',
											'trigger'			 => 'tuna',
											'name'			=> 'Me-O Canned Tuna 170g',
										),
										'1' => array(
											'image'  		 => 'meo_can_seafood_170g.png',
											'link'			=> 'https://www.tokopedia.com/officialstoreme-o/me-o-canned-cat-food-seafood-platter-in-prawn-jelly-170-g-isi-2-pack',
											'id'			 => '#',
											'trigger'			 => 'seafood',
											'name'			=> 'Me-O Canned Seafood 170g',
										),
									);
									foreach ($arr as $key => $value) {
									?>
										<option class="txtf-c" id="<?= $value['name'] ?>" data-link="<?= $value['link'] ?>" value="<?php echo url('/assets/images/products/' . $value['image']) ?>">
											<?= $value['trigger'] ?>
										</option>
									<?php  } ?>
								</select>
							</div>

							<div class="d-flex tc-medium mt-8 mb-4 px-2">
								<span class="icon mr-4 op-50%">
									<i class="fas fa-circle-2 p-xl"></i>
								</span>
								<p class="-mt-1">Langsung checkout <br />di marketplace favoritmu</p>
							</div>
							<div class="row fw-w w-100%">
								<?php
								$arr = array(
									'0' => array(
										'image'  		 => 'tokopedia.png',
										'link'			 => '#',
										'name'			 => 'tokopedia',
									),
									'1' => array(
										'image'  		 => 'jdid.png',
										'link'			 => '#',
										'name'			 => 'jdid',
									),
									'2' => array(
										'image'  		 => 'blibli.png',
										'link'			 => '#',
										'name'			 => 'blibli',
									),
									'3' => array(
										'image'  		 => 'shopee.png',
										'link'			 => '#',
										'name'			 => 'shopee',
									),
								);
								foreach ($arr as $key => $value) {
								?>
									<div class="col col-12 mb-4">
										<div class="pr-0">
											<a href="#" target="_blank" class="btn-link d-flex ai-center jc-center <?= $value['name'] ?>" style="background-image: url(<?php echo url('/assets/images/logo/' . $value['image']) ?>)"></a>
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

<div class="transition">
	<div class="inside"></div>
</div>

@endsection