@extends('welcome')
@section('title','Perfect Companion Indonesia - Berita & Acara')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<div class="content-wrapper sub-page all-page" id="news-all-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header sm:h-100vh sm:d-flex sm:ai-end">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40 sm:mx-0" style="background-image: url('<?php echo url('/assets/images/banner/news-all-header.jpg') ?>">
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
										<span class="pos-r">Ada cerita apa ya hari ini? <br />
											<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>Yuk cari tahu.
										</span>
									</div>
								</div>
								<div class="col col-9 sm:col-12">
									<div class="h4 ff-1-bd tc-dark-contrast -mt-4 sm:h4 sm:max-w-100% sm:ff-1">
										<span><span class="ff-1">Berita dan Acara </span> <br class="sm:d-none" />Perfect Companion Indonesia</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SECTION NEWS LIST -->
		<div class="fullwidth-master section-2 mt-20">
			<div class="inner">
				<div class="tab ">
					<div class="d-flex">
						<div class="tab-header mb-10">
							<!-- <div class="filter-button bg-medium tc-dark-contrast mr-3 py-3 px-5 bd-rs-8">
								<span class="p-lg ff-1-bd">Filter</span>
								<span class="icon"><i class="far fa-filter-list ml-2"></i></span>
							</div> -->
							<div class="tab-header-item active" id="all">
								<span class="p-lg">Semua</span>
							</div>
							<?php
							foreach ($category as $key => $value) {
							?>
								<div class="tab-header-item ml-3" id=<?= $value->id ?>>
									<span class="p-lg"><?= $value->name ?></span>
								</div>
							<?php } ?>
							<div class="tab-header-item no-display">adjuster</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="result-wrapper" id="list-news">
							<?php
							foreach ($news as $animal => $list_news) {
							?>
								<div class="t-n-s mb-10 sm:mb-4">
									<div class="h3 ff-1-bd tc-primary-500 txtf-c sm:h6">{{ $animal }}</div>
								</div>
								<div class="row fw-w sm:fw-w">
									<?php foreach ($list_news as $key => $value) { ?>
										<div class="col col-3 mb-10 sm:col-12">
											<div class="px-2 pb-4">
												<div class="news-slider-item make_transition cur-p" id="news-detail" data-transition-to="{{ url('news-detail/'.$value->id) }}">
													<div class="img-frame img-news-thumbnail mb-4" data-blur=15>
														<div class="img lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/' . $value->cover_file) ?>')"></div>
														<div class="img-shadow img-news-thumbnail-shadow lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/' . $value->cover_file) ?>')"></div>
													</div>
													<p class="p-xs ff-2 txtf-u ls-5 tc-dark px-2 op-80% mb-2"><?= date('d M Y', strtotime($value->date)) ?></p>
													<p class="p-xl ff-1 tc-dark px-2"><?= $value->title ?></p>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							<?php }  ?>
						</div>
					</div>
				</div>
				<div class="d-flex ai-center pagination pagination-wrapper sm:jc-center">
					<!-- <p class="p-lg ff-1 tc-primary-500 mr-4">Jumlah produk per halaman</p> -->
					<!-- PAGINATION OPTIONS CONTROL -->
					<!-- <?php
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
					<?php } ?> -->
					<!-- PAGINATION OPTIONS CONTROL - - - END -->
					<div class="d-flex ai-center ml-a sm:ml-0">
						<span class="icon h-10 w-10 d-flex ai-center jc-center btn-arrow btn-arrow-left">
							<i class="h6 far fa-arrow-left-long"></i>
						</span>
						<span class="p-xl tc-primary-500 d-flex ai-center ls-5 mx-4">1/3</span>
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

<script>
	$('.tab-header-item').on('click', function() {
		id_category = $(this).attr('id')
		$.ajax({
			url: "{{ url('filter-news') }}",
			method: 'post',
			data: {
				id_category: id_category,
				_token: "{{ csrf_token() }}",
				lang: "{{ $lang }}"
			},
			dataType: 'json',
			success: function(xhr) {
				res = xhr.data
				html = ""
				$.each(res, function(animal, list_news) {
					html += `<div class="t-n-s mb-10 sm:mb-4">
								<div class="h3 ff-1-bd tc-primary-500 txtf-c sm:h6">${animal}</div>
							</div>
							<div class="row fw-w sm:fw-w">`
					$.each(list_news, function(key, val) {
						html += `<div class="col col-3 mb-10 sm:col-12">
									<div class="px-2 pb-4">
										<div class="news-slider-item make_transition cur-p" id="news-detail" data-transition-to="{{ url('news-detail/${val.id}') }}">
											<div class="img-frame img-news-thumbnail mb-4" data-blur=15>
												<div class="img lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/${val.cover_file}') ?>')"></div>
												<div class="img-shadow img-news-thumbnail-shadow lazy" style="background-image: url('<?php echo url('/assets/lampiran/cover_file/${val.cover_file}') ?>')"></div>
											</div>
											<p class="p-xs ff-2 txtf-u ls-5 tc-dark px-2 op-80% mb-2">${val.date}</p>
											<p class="p-xl ff-1 tc-dark px-2">${val.title}</p>
										</div>
									</div>
								</div>`;
					})
					html += `</div>`

				})

				$('#list-news').html(html)
				effectAfterLoaded()
			}
		})
	})

	function effectAfterLoaded() {
		$(".tab .tab-header .tab-header-item").addClass("active").siblings().removeClass("active");
		$("html").getNiceScroll().resize();

		var item = $(".tab .tab-header .tab-header-item")
			.parent()
			.parent()
			.siblings(".tab-content")
			.children(".result-wrapper")
			.children(".row")
			.children(".col");

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

		if ($(".img-frame")[0]) {
			var image_frame = $(".img-frame");

			$.each(image_frame, function(index, item) {
				var shadow_radius = $(item).data("blur"),
					img_shadow = $(item).children(".img-shadow");

				img_shadow.blurjs({
					customClass: "blurjs",
					radius: shadow_radius,
					persist: false,
				});
				// console.log(shadow_radius);
			});
			$;
		}

		$(".make_transition").click(function(e) {
			$(".overlay").removeClass("active"); {
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
</script>
@endsection