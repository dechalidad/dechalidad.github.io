@extends('welcome')
@section('title','Perfect Companion Indonesia - Berita & Acara')
@section('content')
<div class="content-wrapper sub-page all-page" id="news-all-page">
	<div class="content">

		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-40" style="background-image: url('<?php echo url('/assets/images/banner/news-all-header.jpg') ?>">
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
										<span class="pos-r">Ada cerita apa ya hari ini? <br />
											<span class="pos-a -r-4 t-0 h-100% d-flex ai-end"><i class="fas fa-caret-right"></span></i>Yuk cari tahu.
										</span>
									</div>
								</div>
								<div class="col col-9">
									<div class="h2 ff-1-bd tc-dark-contrast -mt-4">
										<span><span class="ff-1">Berita dan Acara </span> <br />Perfect Companion Indonesia</span>
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
							<?php
							$arr = array(
								'0' => array(
									'id'			=> 'Semua',
									'active'	=> 1,
								),
								'1' => array(
									'id'			=> 'Berita',
									'active'	=> 0,
								),
								'2' => array(
									'id'			=> 'Acara',
									'active'	=> 0,
								),
								'3' => array(
									'id'			=> 'Blog',
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
										'image'     => 'news-1.jpg',
										'type'		=> 'berita, acara',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
									'1' => array(
										'image'     => 'news-1.jpg',
										'type'		=> 'acara',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
									'2' => array(
										'image'     => 'news-1.jpg',
										'type'		=> 'berita',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
									'3' => array(
										'image'     => 'news-1.jpg',
										'type'		=> 'blog',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
									'4' => array(
										'image'     => 'news-1.jpg',
										'type'		=> 'berita, acara',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
									'5' => array(
										'image'     => 'news-1.jpg',
										'type'		=> 'acara',
										'title'		=> '7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno',
									),
								);
								foreach ($arr as $key => $value) {
								?>
									<div class="col col-3 mb-10">
										<div class="px-2 pb-4">
											<div class="news-slider-item make_transition cur-p" id="news-detail" data-transition-to="news-detail">
												<div class="img-frame img-news-thumbnail mb-4" data-blur=15>
													<div class="img lazy" style="background-image: url('<?php echo url('/assets/images/banner/' . $value['image']) ?>')"></div>
													<div class="img-shadow img-news-thumbnail-shadow lazy" style="background-image: url('<?php echo url('/assets/images/banner/' . $value['image']) ?>')"></div>
												</div>
												<p class="p-xs ff-2 txtf-u ls-5 tc-dark px-2 op-80% mb-2"><?= $value['type'] ?></p>
												<p class="p-xl ff-1 tc-dark px-2"><?= $value['title'] ?></p>
											</div>
										</div>
									</div>
								<?php }  ?>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex ai-center pagination pagination-wrapper">
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
					<div class="d-flex ai-center ml-a">
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

<div class="transition">
	<div class="inside"></div>
</div>

@endsection