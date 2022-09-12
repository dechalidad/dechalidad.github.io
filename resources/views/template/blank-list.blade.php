@extends('welcome')
@section('title','Blank List Page')
@section('content')
<div class="content-wrapper" id="">
	<div class="content">

		<div class="fullwidth-master first-section">
			<div class="inner">
				<div class="block"></div>
			</div>
		</div>

		<div class="fullwidth-master second-section section-mt-half">
			<div class="inner">
				<div class="tab">
					<div class="d-flex">
						<div class="btn-wrapper mr-6">
							<div class="btn-dropdown btn-sm ml-auto f-left" onclick="event.stopPropagation();">
								<div class="dropdown-toggle">
									<div class="btn-icon bg-medium-tint tc-dark-contrast p-2">
										<span class="icon">
											<i class="far fa-sort-alt"></i>
										</span>
									</div>
								</div>
								<div class="dropdown-body pt-3 pb-3 bg-light-shade bd-rs-2">
									<div class="dropdown-item p-2 pr-12 active">
										<div class="link no-accent">
											<span class="text tc-dark-tint">
												Newest
											</span>
										</div>
									</div>
									<div class="dropdown-item p-2 pr-12">
										<div class="link no-accent">
											<span class="text tc-dark-tint">
												Latest
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-header">
							<?php
								$arr = array (
									'0' => array(
										'id'			=> 'All',
										'active'	=> 1,	
									),
									'1' => array(
										'id'			=> 'Category 1',
										'active'	=> 0,	
									),
									'2' => array(
										'id'			=> 'Category 2',
										'active'	=> 0,	
									),
									'3' => array(
										'id'			=> 'Category 3',
										'active'	=> 0,	
									),
								);
								foreach ($arr as $key => $value) {                
							?>
								<div class="tab-header-item <?= $value['active'] == 0 ? '' : 'active' ?>" id=<?= $value['id'] ?>>
									<span><?= $value['id'] ?></span>
								</div>
							<?php } ?>
							<div class="tab-header-item no-display">adjuster</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="result-wrapper">
							<div class="row fxw-wrap">
								<!-- <?php for ($k = 1; $k <= 5; $k++) { ?> -->
									<div class="col col-4 mb-10">
										<div class="block" style="height: 256px"></div>
									</div>
								<!-- <?php }  ?> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('page/footer')

	</div>
</div>

<span class="close-box box-1 on"></span>

@endsection