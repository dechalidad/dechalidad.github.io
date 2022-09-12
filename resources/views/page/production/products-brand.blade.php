@extends('welcome')
@section('title','Perfect Companion Indonesia - Binatang')
@section('content')

<!-- -=-=-=-=-=-=-=-=- PAGE TRANSITION -=-=-=-=-=-=-=-=- -->
<div class="transition">
	<div class="inside"></div>
</div>
<!-- -=-=-=-=-=-=-=-=- PAGE TRANSITION -=-=-=-=-=-=-=-=- - - - END -->

<div class="content-wrapper sub-page all-page" id="product-all-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header sm:h-100vh sm:d-flex sm:ai-end">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40 sm:mx-0" style="background-image: url('<?php echo url('/assets/lampiran/banner_file/' . $animal->banner_file) ?>">
				<div class="rotate-wrapper mb-10 sm:v-h sm:op-0%">
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
							<div class="row sm:fw-w">
								<div class="col col-3 sm:col-12 sm:mb-6">
									<div class="ff-2 p lh-6 tc-dark-contrast mr-20 sm:mr-0">
										<span class="pos-r">
											Dibuat hanya dari bahan
											<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></i></span>
										</span> <br class="sm:d-block" />berkualitas terbaik.
									</div>
								</div>
								<div class="col col-9 sm:col-12">
									<div class="h1 ff-1-bd tc-dark-contrast max-w-80% -mt-4 sm:h2 sm:max-w-100%">
										<span><?= $animal->tagline ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PRODUCT CHOICE  -->
		<div class="fullwidth-master section-2 mt-20 sm:pt-12">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<!-- BRANDS -->
			<div class="inner">
				<div class="row sm:fd-col">
					<div class="col col-12">
						<div class="t-n-s d-flex fd-col ai-center mb-20">
							<div class="d-flex ai-center op-80% mb-2">
								<div class="h-2px w-20 bg-primary-500"></div>
								<div>
									<p class="p-sm ff-2-bd mx-4 tc-primary-500 ta-center">Brand Pilihan</p>
								</div>
								<div class="h-2px w-20 bg-primary-500 sm:w-10"></div>
							</div>
							<div class="h3 ff-1-bd max-w-50% ta-center tc-primary-500 txtf-c sm:h4 sm:max-w-100%">Produk Terbaik dari Brand Terbaik</div>
						</div>
						<div class="row mt-10 jc-center fw-w sm:fw-w">
							<?php
							foreach ($brand as $key => $value) {
							?>
								<div class="col col-2-4 mb-6 sm:col-6">
									<div class="px-4">
										<div class="d-flex ai-center jc-center w-100% h-28 bd-rs-3 bg-dark-contrast cur-p make_transition" data-transition-to="{{ url('products/'.$animal->id.'/'.$value->id.'/brand') }}">
											<img src="<?php echo url('/assets/lampiran/brand_file/' . $value->brand_file) ?>" alt="<?= $value->name ?>" class="logo h-100% lazy">
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- FOOD TYPE -->
			<div class="inner pt-20 sm:pt-12">
				<div class="row sm:fd-col">
					<div class="col col-12">
						<div class="t-n-s d-flex fd-col ai-center mb-20">
							<div class="d-flex ai-center op-80% mb-2">
								<div class="h-2px w-20 bg-primary-500"></div>
								<div>
									<p class="p-sm ff-2-bd mx-4 tc-primary-500 ta-center">Tipe Makanan</p>
								</div>
								<div class="h-2px w-20 bg-primary-500 sm:w-10"></div>
							</div>
							<div class="h3 ff-1-bd max-w-50% ta-center tc-primary-500 txtf-c sm:h4 sm:max-w-100%">Yuk, Pilih Makanan yang Cocok untuk Si Manis</div>
						</div>
						<div class="row mt-10 jc-center fw-w sm:fw-w">
							<?php
							foreach ($food_type as $key => $value) {
							?>
								<div class="col col-2-4 mb-6 sm:col-6">
									<div class="px-4 d-flex ai-center jc-center fd-col">
										<div class="d-flex ai-center jc-center w-36 h-36 bd-rs-36 bg-dark-contrast cur-p make_transition" data-transition-to="{{ url('products/'.$animal->id.'/'.$value->id.'/food') }}">
											<div class="d-flex ai-center jc-center w-28 h-28 bd-rs-28 of-h bg-medium">
												<img src="<?php echo url('assets/lampiran/cover_file/' . $value->cover_file) ?>" alt="<?= $value->name ?>" class="logo h-100% lazy">
											</div>
										</div>
										<h6 class="tc-primary-500 ta-center ff-1-bd txtf-c mt-2"><?= $value->name ?></h6>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('template/footer')

	</div>
</div>

@endsection