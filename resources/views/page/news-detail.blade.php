@extends('welcome')
@section('title','Title of news - Perfect Companion Indonesia')
@section('content')

<div class="content-wrapper sub-detail-page" id="news-detail-page">
	<div class="content">
		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-10" style="background-image: url('<?php echo url('/assets/images/banner/news-1.jpg') ?>">
				<div class="inner h-100%">
					<div class="d-flex fd-col h-100% jc-between">
						<div class="d-flex mt-10">
							<div class="btn bg-0 d-flex ai-center jc-center py-3 px-6 bd-rs-2 tc-dark-contrast cur-p bd-1 bd-solid bd-c-light" onclick="location.href='{{ URL::previous() }}'">
								<span class="icon mr-4">
									<i class="far fa-chevron-left"></i>
								</span>
								<p class="p-xl">
									Back
								</p>
							</div>
						</div>
						<div class="t-n-s w-100% mb-10" data-aos="fade-up">
							<div class="row">
								<div class="col col-3">
									<div class="p-lg ff-2 p lh-6 tc-dark-contrast d-flex ai-center jc-center">
										<span class="pos-r mr-4 d-flex ai-center"><span class="ff-2-bd">Kamis</span>, 31 Maret 2022 </span>
										<div class="h-2px w-20 bg-dark-contrast op-20%"></div>
									</div>
								</div>
								<div class="col col-9">
									<div class="h4 ff-1 tc-dark-contrast -mt-4">
										<span>7 Fakta dan mitos seputar anjing ras Shiba Inu, ras anjing asli Jepang yang sudah ada sejak zaman kuno.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="inner">
				<div class="d-flex mt-10 ai-center">
					<p class="p-xl ml-4 mr-4 tc-primary-500 cur-p make_transition" id="index" data-transition-to="/">Home</p>
					<i class="fal fa-chevron-right"></i>
					<p class="p-xl ml-4 mr-4 tc-primary-500 cur-p make_transition" id="news" data-transition-to="news">News</p>
					<i class="fal fa-chevron-right"></i>
					<p class="p-xl ml-4 mr-4 tc-medium">News Detail</p>
				</div>
			</div>
		</div>

		<div class="fullwidth-master section-2 mt-20">
			<div class="inner">
				<div class="row">
					<div class="col col-3">
						<div class="pos-s t-20">
							<div class="d-flex ai-center mb-4">
								<div class="icon bd-rs-12 h-12 w-12 d-flex ai-center jc-center bd-1 bd-solid bd-c-primary-100">
									<i class="fas fa-eye tc-primary-500"></i>
								</div>
								<p class="p-lg ff-2 ml-4 tc-primary-500">101 Dilihat</p>
							</div>
							<div class="d-flex ai-center show_alert" data-alert="default" data-alert-for="alert-for-copy-link" data-alert-text="Link copied to clipboard" data-alert-icon="fas fa-paperclip">
								<div class="icon bd-rs-12 h-12 w-12 d-flex ai-center jc-center bd-1 bd-solid bd-c-primary-100">
									<i class="fas fa-paperclip tc-primary-500"></i>
								</div>
								<p class="p-lg ff-2 ml-4 tc-primary-500">Bagikan Link</p>
							</div>
						</div>
					</div>
					<div class="col col-9">
						<p class="p-lg max-w-100% tc-primary-500">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas neque dui, sit amet euismod sapien pellentesque eu. Etiam ac rhoncus libero. Nullam ut ex felis. Vivamus tortor dolor, viverra sed dui consequat, viverra ullamcorper nibh. Aliquam non commodo ligula. Maecenas euismod est in orci luctus auctor. Donec elit eros, condimentum vel nulla ut, maximus finibus lacus. In laoreet finibus metus, sed varius nibh rutrum sit amet.
							<br /><br />
							Maecenas leo dui, euismod eget sapien vitae, lacinia posuere sapien. Sed maximus eu felis sed convallis. Quisque lobortis, ex eget blandit ornare, urna ipsum feugiat justo, vitae posuere dolor ipsum et mi. Sed suscipit consequat sodales. Etiam in varius ante. Mauris at velit vitae urna vestibulum semper ac vitae neque. Proin sollicitudin elit ex, id dictum tortor congue quis. Phasellus hendrerit nunc ac neque elementum fringilla.
							<br /><br />
							Proin vitae consequat massa. Nullam vel pretium lectus. In vel neque hendrerit, suscipit eros quis, suscipit mi. Pellentesque suscipit sem augue, quis molestie mauris semper id. Maecenas accumsan ipsum orci, in tristique ante molestie a. Vivamus euismod tellus vel sapien ultricies dictum. In ornare vitae massa non placerat. Aenean quis vestibulum lacus.
						</p>
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