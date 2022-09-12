@extends('welcome')
@section('title',$detail->title.' - Perfect Companion Indonesia')
@section('content')

<div class="transition">
	<div class="inside"></div>
</div>

<div class="content-wrapper sub-detail-page" id="news-detail-page">
	<div class="content">
		<!-- SECTION HEADER -->
		<div class="fullwidth-master section-1 section-header">
			<div class="header-slider-item lazy pos-r max-w-100% mx-10 mt-10 sm:mx-0" style="background-image: url('<?php echo url('/assets/lampiran/banner_file/' . $detail->banner_file) ?>">
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
						<div class="t-n-s w-100% mb-10">
							<div class="row sm:fw-w">
								<div class="col col-4 pt-2 sm:col-12 sm:mb-4">
									<div class="p-lg ff-2 p lh-6 tc-dark-contrast d-flex ai-center jc-start">
										<span class="pos-r mr-4 d-flex ai-center"><span class="ff-2-bd">{{ date('l',strtotime($detail->date)) }}</span>, {{ date('d M Y',strtotime($detail->date)) }}</span>
										<div class="h-2px w-20 bg-dark-contrast op-20%"></div>
									</div>
								</div>
								<div class="col col-8 sm:col-12">
									<div class="h4 ff-1 tc-dark-contrast sm:h6">
										<span>{{ $detail->title }}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="inner">
				<div class="d-flex mt-10 ai-center -ml-4 -mr-4">
					<p class="p-xl ml-4 mr-4 tc-primary-500 make_transition cur-p" id="index" data-transition-to="{{ url('/') }}">Home</p>
					<i class="far fa-chevron-right op-25%"></i>
					<p class="p-xl ml-4 mr-4 tc-primary-500 make_transition cur-p" id="news" data-transition-to="{{ url('news') }}">News</p>
					<i class="far fa-chevron-right op-25%"></i>
					<p class="p-xl ml-4 mr-4 tc-medium">News Detail</p>
				</div>
			</div>
		</div>

		<div class="fullwidth-master section-2 mt-20 sm:mt-10">
			<div class="inner">
				<div class="row sm:fw-w">
					<div class="col col-3 sm:col-12 sm:order-2 sm:mt-10">
						<div class="h-1px w-100% bg-primary-500 op-10% d-none sm:d-block"></div>
						<div class="pos-s t-20 sm:pt-10">
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
					<div class="col col-9 sm:col-12 sm:order-1">
						<div class="p-lg max-w-100% tc-primary-500 news-content-wrapper">
							<?= json_decode($detail->description); ?>
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

		<script>
			$(".share_link").click(function() {
				navigator.clipboard.writeText(window.location.href);
			})
		</script>

	</div>
</div>



@endsection