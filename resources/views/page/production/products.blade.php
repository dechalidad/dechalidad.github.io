@extends('welcome')
@section('title','Perfect Companion Indonesia - Semua Produk')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<div class="content-wrapper sub-page all-page" id="product-all-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header sm:h-100vh sm:d-flex sm:ai-end">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40 sm:mx-0" style="background-image: url('<?php echo url('/assets/lampiran/banner_file/' . $detail_animal->banner_file) ?>">
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
									<div class="h3 ff-1-bd tc-dark-contrast max-w-80% -mt-4 sm:h2 sm:max-w-100%">
										<span>Pilihan Tepat <br> Untuk Peliharaan Anda</span>
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
				<div class="t-n-s mb-10 sm:mb-4">
					<div class="d-flex ai-center op-80% mb-2">
						<div class="h-2px w-20 bg-primary-500"></div>
						<div>
							<p class="p-sm ff-2-bd ml-4 tc-primary-500">Pilihan Tepat</p>
						</div>
					</div>
					<div class="h3 ff-1-bd tc-primary-500 txtf-c sm:h4">Produk Kami.</div>
				</div>
				<div class="row sm:fw-w">
					<div class="col col-3 sm:d-none">
						<div class="w-100% pos-s t-20 pr-20">
							<div class="pr-10">
								<?php
								$filter_options = array(
									'0' => array(
										'title'     => 'Binatang',
										'options'	=> $animals
									),
									'1' => array(
										'title'     => 'Brand',
										'options'	=> $brands
									),
								);

								foreach ($filter_options as $key => $value) {
								?>
									<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80% <?= $key != 0 ? "mt-8" : "" ?>"><?= $value['title'] ?></p>
									<div class="filter-option-wrapper -ml-4">
										<?php foreach ($value['options'] as $key => $item) { ?>
											<div class="filter-option-item ml-3 mb-3 filter-<?= $value['title'] ?>" id="<?= $item->id ?>">
												<span class="p-md"><?= $item->name ?></span>
											</div>
										<?php } ?>
									</div>
								<?php }
								?>

								<div class="d-flex fd-col mt-6 apply-filter-wrapper">
									<div class="h-1px w-100% bg-medium op-25%"></div>
									<button class="btn bg-primary-500 tc-link-contrast h-12 px-10 mt-8 bd-n bd-rs-8 d-flex ai-center jc-center hidden btn-filter" id="submit">
										<span class="text ff-1-bd">Terapkan Filter</span>
									</button>
									<button class="btn bg-danger-500 tc-link-contrast h-12 px-10 mt-4 bd-n bd-rs-8 d-flex ai-center jc-center hidden btn-reset-filter" id="submit">
										<span class="text ff-1-bd">Reset </span>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col col-12 d-none mb-8 sm:d-block">
						<div class="d-flex">
							<div class="filter-button bd-1 bd-solid bd-c-medium-tint tc-primary-500 py-2 px-5 bd-rs-8 overlay_toggle" id="filter">
								<span class="p-lg ff-1">Filter</span>
								<span class="icon"><i class="far fa-filter-list ml-2 p-lg"></i></span>
							</div>
						</div>
					</div>
					<div class="col col-9 sm:col-12">
						<div class="row fw-w -ml-2 -mr-2 sm:fw-w" id="result-product">
							<?php
							foreach ($products as $key => $value) {
							?>
								<div class="col col-3 mb-10 sm:col-6">
									<div class="px-2">
										<div class="product-item <?= $value->type ?> make_transition cur-p" id="product-detail" data-transition-to="{{ url('product-detail/'.$value->id_product) }}">
											<div class="product-image-wrapper aspect_ratio" data-ratio="1">
												<img class="product_image" src="<?php echo url('/assets/lampiran/cover_file/' . $value->cover_file) ?>" alt="<?= $value->product ?>">
												<span class="icon d-flex ai-center jc-center h6 tc-primary-500 sm:p-lg">
													<i class="<?= $value->icon ?>"></i>
												</span>
											</div>
											<div class="product-text-wrapper px-2">
												<div class="d-flex ai-end jc-between mb-3 sm:mb-0">
													<div class="p-md ff-1 sm:p-lg lc-2"><?= $value->product ?></div>
												</div>
												{{-- <div class="d-flex ai-start sm:fd-col">
													<!-- <p class="p-sm mr-3">Variants :</p> -->
													<!-- style="height: calc((1.5rem + .5rem) * 2) -->
													<div class="pos-r d-flex f-1 fw-w jc-start max-w-100% sm:fw-w sm:mt-1" id=<?= $key ?>> --}}
												@if (count($value->variants) > 0)
												<?php foreach ($value->variants as $k => $var) { ?>
													{{-- <span class=" variant-item d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-primary-300 bd-rs-3 mb-2 max-w-75% mr-2" data-key="<?= $k ?>">
																<p class="p-xs ff-2 lc-2 tc-primary-500"><?= $var->name ?></p>
															</span> --}}
												<?php
												}
												?>
												@else
												{{-- <span class="d-flex ai-center jc-center px-2 h-6 mb-2 bd-1 bd-solid bd-c-light-shade bd-rs-3">
															<p class="p-xs ff-2">Belum ada varian</p>
														</span> --}}
												@endif
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
				<div class="d-flex ai-center pagination pagination-wrapper mt-10 sm:d-none">
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

<!-- -=-=-=-=-=-=-=-=- FILTER OVERLAY -=-=-=-=-=-=-=-=- -->
<div class="overlay filter">
	<div class="inner-wrapper">
		<div class="inner">
			<div class="d-flex fd-col pt-4">
				<div class="h5 mb-4">Filter</div>
				<div class="h-1px w-100% pr-12 bg-medium op-25% -ml-6 -mr-6"></div>
			</div>
		</div>
		<div class="filter-wrapper pt-8 pos-r">
			<div class="inner pb-28">
				<?php
				$filter_options = array(
					'0' => array(
						'title'     => 'Binatang',
						'options'	=> $animals
					),
					'1' => array(
						'title'     => 'Brand',
						'options'	=> $brands
					),
				);

				foreach ($filter_options as $key => $values) {
				?>
					<p class="p-sm ff-2 txtf-u ls-3 mb-2 tc-primary-500 op-80% <?= $key != 0 ? "mt-4" : "" ?>"><?= $values['title'] ?></p>
					<div class="filter-option-wrapper -ml-4">
						<?php foreach ($values['options'] as $k => $item) { ?>
							<div class="filter-option-item ml-3 mb-3 filter-<?= $values['title'] ?>" id="<?= $item->id ?>">
								<span class="p-lg"><?= $item->name ?></span>
							</div>
						<?php } ?>
					</div>
				<?php }
				?>
			</div>
		</div>
		<div class="pos-a l-0 b-0 bg-dark-contrast w-100%">
			<div class="inner pb-4">
				<div class="d-flex fd-col">
					<div class="h-1px w-100% pr-12 bg-medium op-25% -ml-6 -mr-6 "></div>
					<button class="btn bg-primary-500 tc-link-contrast h-12 px-10 mt-4 bd-n bd-rs-8 d-flex ai-center jc-center hidden btn-filter" id="submit">
						<span class="text ff-1-bd">Terapkan Filter</span>
					</button>
					<button class="btn bg-danger-500 tc-link-contrast h-12 px-10 mt-4 bd-n bd-rs-8 d-flex ai-center jc-center hidden btn-reset-filter" id="submit">
						<span class="text ff-1-bd">Reset </span>
					</button>
				</div>
			</div>
		</div>
		<span class="icon cur-p overlay_toggle" id="filter">
			<i class="far fa-xmark"></i>
		</span>
	</div>
</div>
<!-- -=-=-=-=-=-=-=-=- FILTER OVERLAY -=-=-=-=-=-=-=-=- - - - END -->

<script>
	// $(".apply-filter-wrapper")

	// if ($(".filter-option-item").hasClass("active")) {
	// 	$(".apply-filter-wrapper").addClass("active");
	// }

	// var fow = $(".filter-option-wrapper");

	// $.each(fow, function() {
	// 	if ($(this).children(".active")[0]) {
	// 		$(".apply-filter-wrapper").addClass("active");
	// 	} else {
	// 		$(".apply-filter-wrapper").removeClass("active");
	// 	}
	// })


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

				item.append(`<span class=" variant-item d-flex ai-center jc-center px-2 h-6 bd-1 bd-solid bd-c-primary-300 bd-rs-3 mb-2 max-w-75% mr-2">
																<p class="p-xs ff-2 lc-2 tc-primary-500">${countBlueChildren}+</p>
															</span>`);
			})

		});
	}

	$(window).ready(function() {
		// variantWrapping();
	})

	list_animal = [];
	list_brand = [];

	$('.filter-Binatang').on('click', function() {
		if (list_animal.length > 0) {
			if (list_animal.indexOf($(this).attr('id')) == -1) {
				list_animal.push($(this).attr('id'))
			} else {
				list_animal.splice($.inArray($(this).attr('id'), list_animal), 1);
			}
		} else {
			list_animal.push($(this).attr('id'))
		}
	})

	$('.filter-Brand').on('click', function() {
		if (list_brand.length > 0) {
			if (list_brand.indexOf($(this).attr('id')) == -1) {
				list_brand.push($(this).attr('id'))
			} else {
				list_brand.splice($.inArray($(this).attr('id'), list_brand), 1);
			}
		} else {
			list_brand.push($(this).attr('id'))
		}
	})

	$('.btn-filter').on('click', function() {
		$.ajax({
			url: "{{ url('filter-product') }}",
			method: 'post',
			data: {
				animal: list_animal,
				brand: list_brand,
				_token: "{{ csrf_token() }}"
			},
			dataType: 'json',
			success: function(xhr) {
				html = ""
				$.each(xhr.data, function(key, value) {
					html += `<div class="col col-3 mb-10 sm:col-6">
								<div class="px-2">
									<div class="product-item ${value.type} make_transition cur-p" id="product-detail" data-transition-to="{{ url('product-detail/${value.id_product}') }}">
										<div class="product-image-wrapper aspect_ratio" data-ratio="1">
											<img class="product_image" src="<?php echo url('/assets/lampiran/cover_file/${value.cover_file}') ?>" alt="${value.product}">
											<span class="icon d-flex ai-center jc-center h6 tc-primary-500 sm:p-lg">
												<i class="${value.icon}"></i>
											</span>
										</div>
										<div class="product-text-wrapper px-2">
											<div class="d-flex ai-end jc-between mb-3 sm:mb-0">
												<div class="p-md ff-1 sm:p-lg lc-2">${value.product}</div>
											</div>`;

					html += `</div>
									</div>
								</div>
							</div>`;
				})

				$('#result-product').html(html)

				// variantWrapping();
				$('.overlay.filter').removeClass('active');
				$("html").getNiceScroll().resize();

				effectAfterLoaded();
			}
		})
	})

	$('.btn-reset-filter').on('click', function() {
		location.reload();
	})

	function effectAfterLoaded() {
		var item = $("#result-product").children(".col");

		TweenLite.set(item, {
			y: 25,
			opacity: 0,
		});

		var tl = new TimelineLite();
		tl.staggerTo(
			item,
			0.5, {
				y: 0,
				opacity: 1,
				ease: Back.easeOut,
			},
			0.05
		);

		var aspect_ratio = $(".aspect_ratio");

		// Store the jQuery object for future reference
		$.each(aspect_ratio, function(index, item) {
			var $box = $(item),
				aspect_ratio_number = $(item).data("ratio");

			// Initial resize of .box
			$(document).ready(function($) {
				$box.height($box.width() * aspect_ratio_number);
			});

			// Resize .box on browser resize
			$(window).resize(function() {
				$box.height($box.width() * aspect_ratio_number);
			});
		});

		$(".product_image").each(function() {
			var $this = $(this);

			if ($this.width() == $this.height() || $this.width() > $this.height()) {
				$this.addClass("is-horizontal");
			}
		});

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

		// variantWrapping();
	}
</script>
@endsection