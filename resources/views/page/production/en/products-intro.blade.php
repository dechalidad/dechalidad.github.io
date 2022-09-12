@extends('en-welcome')
@section('title','Perfect Companion Indonesia - Animals')
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
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40 sm:mx-0" style="background-image: url('<?php echo url('/assets/images/banner/products-all.jpg') ?>">
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
											Made from only
											<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></i></span>
										</span> <br class="sm:d-block" />the best quality materials.
									</div>
								</div>
								<div class="col col-9 sm:col-12">
									<div class="h3 ff-1-bd tc-dark-contrast max-w-80% -mt-4 sm:h2 sm:max-w-100%">
										<span>Come on, See Our <br class="sm:d-none"> Available Animal!</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION PRODUCTS -->
		<div class="fullwidth-master section-4 mt-20">
			<div class="inner">

				<div class="product-wrapper row fw-w max-w-100% jc-center ml-a mr-a pos-r pt-20 sm:fw-w sm:pt-0">
					<?php
					foreach ($total_product as $key => $value) {
					?>
						<div class="col col-4 d-flex jc-center mb-20 sm:col-12 sm:mb-10">
							<div class="px-10 w-100% sm:px-0">
								<div class="product-item make_transition cur-p" id="<?= $value->type ?>" data-transition-to="{{ url('en/products-brand/'.$value->id_animal) }}">
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
											<div class="h6 ff-1-bd txtf-c"><?= $value->type ?> food</div>
											<span class="d-flex ai-center jc-center px-3 h-6 bg-dark-contrast bd-rs-4">
												<p class="p-sm ff-2-bd"><?= $value->total_product ?><?= $value->total_product >= 10 ? "+" : "" ?> Product<?= $value->total_product > 1 ? "s" : "" ?></p>
											</span>
										</div>
										{{-- <div class="d-flex ai-start">
											<p>Brands</p>
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
										{{-- </div>
										</div> --}}
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		@include('template/en-footer')

	</div>
</div>

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
	})
</script>
@endsection