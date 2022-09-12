@extends('welcome')
@section('title','Blank Page')
@section('content')

<div class="pos-s l-0 t-0 w-auto pv-4 w-100% zi-6 bg-dark-contrast bd-solid bd-b-1 bd-b-c-light">
	<div class="d-flex ai-center ph-10 sm:ph-6">
		<img src="<?php echo url('/assets/images/logo/logo-developer.png') ?>" alt="" class="lazy h-14 mr" id="/">
	</div>
</div>

<div class="w-100% max-w-8xl ml-auto mr-auto">
	<div class="d-flex">

		<div id="sidebar" class="pos-f l-0 t-0 w-72 h-auto">
			<div class="pos-r pt-20 mt-6">
				<div class="pos-r ml-4 pv-4 bd-rs-2 bg-light">
					<?php
					$arr = array(
						'0' => array(
							'category' 		=> "typography",
							'attribute'   => array(
								'0' => array(
									'class'			=> 'Font Family',
								),
								'1' => array(
									'class'			=> 'Font Size',
								),
								'2' => array(
									'class'			=> 'Text Align',
								),
								'3' => array(
									'class'			=> 'Text Transform',
								),
								'4' => array(
									'class'			=> 'Letter Spacing',
								),
								'5' => array(
									'class'			=> 'Color',
								),
								'6' => array(
									'class'			=> 'Background Color',
								),
							),
						),
						'1' => array(
							'category' 		=> "spacing",
							'attribute'   => array(
								'0' => array(
									'class'			=> 'Margin and Padding',
								),
								'1' => array(
									'class'			=> 'Single Side',
								),
								'2' => array(
									'class'			=> 'Horizontal',
								),
								'3' => array(
									'class'			=> 'Vertical',
								),
								'4' => array(
									'class'			=> 'All Side',
								),
								'5' => array(
									'class'			=> 'Negative',
								),
								'6' => array(
									'class'			=> 'Responsive',
								),
							)
						)
					);
					foreach ($arr as $key => $x) {
					?>
						<p class="p-sm txtf-u ph-4 ls-5 op-50% <?= $key == 0 ? '' : 'mt-5' ?>"><?= $x['category'] ?></p>
						<ul class="mt-2">
							<?php
							foreach ($x['attribute'] as $key => $z) {
							?>
								<li class="cur-p scroll_to" data-scroll-to="<?= str_replace(" ", "_", $z['class']) ?>" data-scroll-offset="109">
									<div class="pv-1 ph-4 bg-light hover:bg-info-1">
										<p class="p-lg"><?= $z['class'] ?></p>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
		<div id="content-wrapper" class="w-100% pv-8 ph-6 ml-72">
			<div class="row pb-10 sm:pb-5">
				<div class="col col-12">
					<h2 class="sm:h6">Typography</h2>
				</div>
			</div>

			<div class="row pb-1 Font_Family">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Font Family</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'ff-1',
							'size'	=> 'font-family : PTSans',
						),
						'1' => array(
							'name'	=> 'ff-1-bd',
							'size'	=> 'font-family : PTSans-Bold',
						),
						'2' => array(
							'name'	=> 'ff-2',
							'size'	=> 'font-family : Lato',
						),
						'3' => array(
							'name'	=> 'ff-2-bd',
							'size'	=> 'font-family : Lato-Bold',
						),
						'4' => array(
							'name'	=> 'ff-2-bd',
							'size'	=> 'font-family : Lato-Light',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade">
							<td class="pv-3 w-50%">
								<p class="tc-info-5 ff-menlo"><?= $value['name']  ?></p>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo"><?= $value['size']  ?></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="bg-info-500 p-8 mb-20 sm:p-4 sm:mb-10">
				<h1 class="h1-xl tc-dark-contrast mb-4 sm:h3 sm:ff-1-bd">PTSans</h1>
				<div class="d-flex jc-end sm:jc-start">
					<h1 class="h1-xl ta-right tc-dark-contrast sm:h6 sm:ta-left sm:ff-1-bd">
						AaBbCc <br>
						0123456789
					</h1>
				</div>
			</div>

			<div class="row pb-1 Font_Size">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Font Size</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-25% p-xl ff-1">Size Value</th>
						<th class="pv-3 w-25% p-xl ff-1">Line Height</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'p-xs',
							'size'	=> '0.75rem',
							'lh'		=> '1rem',
						),
						'1' => array(
							'name'	=> 'p-sm',
							'size'	=> '0.875rem',
							'lh'		=> '1.25rem',
						),
						'2' => array(
							'name'	=> 'p-md',
							'size'	=> '1rem',
							'lh'		=> '1.5rem',
						),
						'3' => array(
							'name'	=> 'p-lg',
							'size'	=> '1.125rem',
							'lh'		=> '1.75rem',
						),
						'4' => array(
							'name'	=> 'p-xl',
							'size'	=> '1.25rem',
							'lh'		=> '1.75rem',
						),
						'5' => array(
							'name'	=> 'h6',
							'size'	=> '1.5rem',
							'lh'		=> '2rem',
						),
						'6' => array(
							'name'	=> 'h5',
							'size'	=> '1.875rem',
							'lh'		=> '2.25rem',
						),
						'7' => array(
							'name'	=> 'h4',
							'size'	=> '2.25rem',
							'lh'		=> '2.5rem',
						),
						'8' => array(
							'name'	=> 'h3',
							'size'	=> '3rem',
							'lh'		=> '1',
						),
						'9' => array(
							'name'	=> 'h2',
							'size'	=> '3.75rem',
							'lh'		=> '1',
						),
						'10' => array(
							'name'	=> 'h1',
							'size'	=> '4.5rem',
							'lh'		=> '1',
						),
						'11' => array(
							'name'	=> 'h1-lg',
							'size'	=> '6rem',
							'lh'		=> '1',
						),
						'12' => array(
							'name'	=> 'h1-xl',
							'size'	=> '8rem',
							'lh'		=> '1',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade">
							<td class="pv-3 w-50%">
								<p class="<?= $value['name']  ?> tc-info-5 ff-menlo"><?= $value['name']  ?></p>
							</td>
							<td class="pos-r w-25%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo"><?= $value['size']  ?></p>
								</div>
							</td>
							<td class="pos-r w-25%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo"><?= $value['lh']  ?></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-1 Text_Align">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Text Align</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'ta-left',
							'size'	=> 'text-align : left',
						),
						'1' => array(
							'name'	=> 'ta-center',
							'size'	=> 'text-align : center',
						),
						'2' => array(
							'name'	=> 'ta-right',
							'size'	=> 'text-align : right',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade">
							<td class="pv-3 w-50%">
								<p class="tc-info-5 ff-menlo"><?= $value['name']  ?></p>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo"><?= $value['size']  ?></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-1 Text_Transform">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Text Transform</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'txtf-u',
							'size'	=> 'text-transform : uppercase',
						),
						'1' => array(
							'name'	=> 'txtf-capitalize',
							'size'	=> 'text-transform : capitalize',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade">
							<td class="pv-3 w-50%">
								<p class="tc-info-5 ff-menlo"><?= $value['name']  ?></p>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo"><?= $value['size']  ?></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-1 Letter_Spacing">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Letter Spacing</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'ls-',
							'size'	=> 'letter-spacing :',
						),
					);
					foreach ($arr as $key => $value) {
						for ($x = 1; $x <= 6; $x++) {
					?>
							<tr class="bd-b-1 bd-c-light-shade">
								<td class="pv-3 w-50%">
									<p class="tc-info-5 ff-menlo"><?= $value['name'] ?><?= $x ?></p>
								</td>
								<td class="pos-r w-50%">
									<div class="d-flex ai-center h-100%">
										<p class="p-lg tc-link-5 ff-menlo"><?= $value['size']  ?> <?= $x ?>px</p>
									</div>
								</td>
							</tr>
					<?php }
					} ?>
				</tbody>
			</table>

			<div class="row pb-1 Color">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Color</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'primary-(100-600)',
							'size'	=> 'primary-500',
							'bg'		=> 'bg-0',
						),
						'1' => array(
							'name'	=> 'secondary-(100-600)',
							'size'	=> 'secondary-500',
							'bg'		=> 'bg-0',
						),
						'2' => array(
							'name'	=> 'success-(100-600)',
							'size'	=> 'success-500',
							'bg'		=> 'bg-0',
						),
						'3' => array(
							'name'	=> 'warning-(100-600)',
							'size'	=> 'warning-500',
							'bg'		=> 'bg-0',
						),
						'4' => array(
							'name'	=> 'danger-(100-600)',
							'size'	=> 'danger-500',
							'bg'		=> 'bg-0',
						),
						'5' => array(
							'name'	=> 'link-(100-600)',
							'size'	=> 'link-500',
							'bg'		=> 'bg-0',
						),
						'6' => array(
							'name'	=> 'info-(100-600)',
							'size'	=> 'info-500',
							'bg'		=> 'bg-0',
						),
						'7' => array(
							'name'	=> 'dark | -tint | -shade',
							'size'	=> 'dark',
							'bg'		=> 'bg-0',
						),
						'8' => array(
							'name'	=> 'medium | -tint | -shade',
							'size'	=> 'medium',
							'bg'		=> 'bg-0',
						),
						'9' => array(
							'name'	=> 'light | -tint | -shade',
							'size'	=> 'light',
							'bg'		=> 'bg-medium-tint',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade <?= $value['bg'] ?>">
							<td class="pv-3 w-50%">
								<p class="tc-<?= $value['size'] ?> ff-menlo">tc-<?= $value['name'] ?></p>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo">color : <span class="tc-<?= $value['size'] ?>">var(--d-color-<?= $value['size']  ?>)</span></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-1 Background_Color">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Background Color</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-50% p-xl ff-1">Class</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$arr = array(
						'0' => array(
							'name'	=> 'success-(100-600)',
							'size'	=> 'success-500',
							'bg'		=> 'bg-0',
						),
						'1' => array(
							'name'	=> 'warning-(100-600)',
							'size'	=> 'warning-500',
							'bg'		=> 'bg-0',
						),
						'2' => array(
							'name'	=> 'danger-(100-600)',
							'size'	=> 'danger-500',
							'bg'		=> 'bg-0',
						),
						'3' => array(
							'name'	=> 'link-(100-600)',
							'size'	=> 'link-500',
							'bg'		=> 'bg-0',
						),
						'4' => array(
							'name'	=> 'info-(100-600)',
							'size'	=> 'info-500',
							'bg'		=> 'bg-0',
						),
						'5' => array(
							'name'	=> 'dark | -tint | -shade',
							'size'	=> 'dark',
							'bg'		=> 'bg-0',
						),
						'6' => array(
							'name'	=> 'medium | -tint | -shade',
							'size'	=> 'medium',
							'bg'		=> 'bg-0',
						),
						'7' => array(
							'name'	=> 'light | -tint | -shade',
							'size'	=> 'light',
							'bg'		=> 'bg-0',
						),
					);
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade <?= $value['bg'] ?>">
							<td class="pv-3 w-50%">
								<span class="p bg-<?= $value['size'] ?> tc-<?= $value['size'] ?>-contrast ff-menlo">bg-<?= $value['name'] ?></span>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo">background-color : <span class="bg-<?= $value['size'] ?> tc-<?= str_replace("-5", "", $value['size']) ?>-contrast">var(--d-color-<?= $value['size']  ?>)</span></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-10 sm:pb-5">
				<div class="col col-12">
					<h2 class="sm:h6">Spacing</h2>
				</div>
			</div>

			<?php
			$arr = array(
				'0' => array(
					'name'	=> '0',
					'size'	=> '0',
				),
				'1' => array(
					'name'	=> '1',
					'size'	=> '0.25rem',
				),
				'2' => array(
					'name'	=> '2',
					'size'	=> '0.5rem',
				),
				'3' => array(
					'name'	=> '3',
					'size'	=> '0.75rem,',
				),
				'4' => array(
					'name'	=> '4',
					'size'	=> '1rem',
				),
				'5' => array(
					'name'	=> '5',
					'size'	=> '1.25rem',
				),
				'6' => array(
					'name'	=> '6',
					'size'	=> '1.5rem',
				),
				'7' => array(
					'name'	=> '7',
					'size'	=> '1.75rem',
				),
				'8' => array(
					'name'	=> '8',
					'size'	=> '2rem',
				),
				'9' => array(
					'name'	=> '9',
					'size'	=> '2.25rem',
				),
				'10' => array(
					'name'	=> '10',
					'size'	=> '2.5rem',
				),
				'11' => array(
					'name'	=> '11',
					'size'	=> '2.75rem',
				),
				'12' => array(
					'name'	=> '12',
					'size'	=> '3rem',
				),
				'13' => array(
					'name'	=> '14',
					'size'	=> '3.5rem',
				),
				'14' => array(
					'name'	=> '16',
					'size'	=> '4rem',
				),
				'15' => array(
					'name'	=> '20',
					'size'	=> '5rem',
				),
				'16' => array(
					'name'	=> '24',
					'size'	=> '6rem',
				),
				'17' => array(
					'name'	=> '28',
					'size'	=> '7rem',
				),
				'18' => array(
					'name'	=> '32',
					'size'	=> '8rem',
				),
				'19' => array(
					'name'	=> '36',
					'size'	=> '9rem',
				),
				'20' => array(
					'name'	=> '40',
					'size'	=> '10rem',
				),
				'21' => array(
					'name'	=> '44',
					'size'	=> '11rem',
				),
				'22' => array(
					'name'	=> '48',
					'size'	=> '12rem',
				),
				'23' => array(
					'name'	=> '52',
					'size'	=> '13rem',
				),
				'24' => array(
					'name'	=> '56',
					'size'	=> '14rem',
				),
				'25' => array(
					'name'	=> '60',
					'size'	=> '15rem',
				),
				'26' => array(
					'name'	=> '64',
					'size'	=> '16rem',
				),
				'27' => array(
					'name'	=> '72',
					'size'	=> '18rem',
				),
				'28' => array(
					'name'	=> '80',
					'size'	=> '20rem',
				),
				'29' => array(
					'name'	=> '96',
					'size'	=> '24rem',
				),
			);
			?>
			<div class="row pb-1 Margin_and_Padding">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Margin and Padding</h6>
					</div>
				</div>
			</div>
			<table class="mb-20">
				<thead>
					<tr class="bd-b-1 bd-c-dark">
						<th class="pv-3 w-25% p-xl ff-1">Class Margin</th>
						<th class="pv-3 w-25% p-xl ff-1">Class Padding</th>
						<th class="pv-3 w-50% p-xl ff-1">Property</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($arr as $key => $value) {
					?>
						<tr class="bd-b-1 bd-c-light-shade">
							<td class="pv-3 w-25%">
								<p class="ff-menlo tc-info-5">m-<?= $value['name'] ?></p>
							</td>
							<td class="pv-3 w-25%">
								<p class="ff-menlo tc-info-5">p-<?= $value['name'] ?></p>
							</td>
							<td class="pos-r w-50%">
								<div class="d-flex ai-center h-100%">
									<p class="p-lg tc-link-5 ff-menlo">margin | Padding : <?= $value['size']  ?></p>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="row pb-1 Single_Side">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Single Side</h6>
					</div>
				</div>
			</div>

			<div class="row pb-1 Horizontal">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Horizontal</h6>
					</div>
				</div>
			</div>

			<div class="row pb-1 Vertical">
				<div class="col col-12">
					<div class="d-flex ai-center">
						<div class="h-6px w-6px bd-rs-1 bg-dark mr-3"></div>
						<h6 class="ff-1-bd">Vertical</h6>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- <div class="content-wrapper" id="index-page">
	<div class="content">

		

    <div class="fullwidth-master first-section">
			<div class="inner yz:max-w-8xl yz:ml-a yz:mr-a mh-10 sm:mh-6">
				
			</div>
		</div>

    <div class="frame-master yz:max-w-8xl yz:ml-a yz:mr-a ph-10 sm:ph-6 mt-20">
			<div class="inner">
				<div class="block"></div>
			</div>
		</div>

  </div>
</div> -->

<span class="close-box box-1 on"></span>

@endsection