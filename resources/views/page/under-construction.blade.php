@extends('welcome')
@section('title','Blank Page')
@section('content')

<!-- -=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=- -->
<div class="navbar py-20">
	<div class="px-20 d-flex ai-center jc-center pos-r zi-1 sm:px-6">
		<img src="<?php echo url('/assets/images/logo/logo.png') ?>" alt="" class="logo zi-8 lazy">
	</div>
</div>
<!-- -=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=- - - - END -->

<div class="content-wrapper h-100vh of-h bg-dark-contrast" id="under-construction-page">
	<div class="content">

		<div class="fullwidth-master section-2">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-left">
			<img src="<?php echo url('/assets/images/accents/line.svg') ?>" alt="accents" class="accent-line line-right">
			<div class="inner">
				<div class="w-100% h-100vh d-flex ai-center jc-center">
					<div class="h1-xl tc-primary-500 txtf-c d-flex ai-center jc-center fw-w sm:h2 sm:ff-1-bd sm:jc-start"><span>Sorry, We're </span> <img src="<?php echo url('/assets/images/animals/cat.gif') ?>" alt="cat" class="h-48 sm:h-24"> <span>still</span> <span>under construction.</span></div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- <span class="close-box box-1 on"></span> -->

<script>
	$(document).ready(function() {

		$(".master_body_navbar").hide()
		$(".navbar-bullet").hide()
	})
</script>

@endsection