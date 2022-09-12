@extends('welcome')
@section('title','Blank Page')
@section('content')

<div class="content-wrapper all-page" id="gallery-all">
	<div class="content">

    <div class="fullwidth-master first-section">
        <div class="inner">
            <div class="block"></div>
        </div>
    </div>

    <div class="fullwidth-master complex-gallery-card section-mt-half">
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
                                    'active'	    => 1,	
                                ),
                                '1' => array(
                                    'id'			=> 'Category 1',
                                    'active'	    => 0,	
                                ),
                                '2' => array(
                                    'id'			=> 'Category 2',
                                    'active'	    => 0,	
                                ),
                                '3' => array(
                                    'id'			=> 'Category 3',
                                    'active'	    => 0,	
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
                            <?php
                                $arr = array (
                                    '0' => array(
                                        'data-index'    => '1',
                                        'image'         => 'superior-room.jpg',
                                        'text_1'		=> 'Superior Rooms',
                                    ),
                                    '1' => array(
                                        'data-index'    => '2',
                                        'image'         => 'deluxe-room.jpg',
                                        'text_1'		=> 'Deluxe Rooms',
                                    ),
                                    '2' => array(
                                        'data-index'    => '3',
                                        'image'         => 'premiere-room.jpg',
                                        'text_1'		=> 'Premiere Rooms',
                                    ),
                                    '3' => array(
                                        'data-index'    => '4',
                                        'image'         => 'loft-family-room.jpg',
                                        'text_1'		=> 'The Loft Family Rooms',
                                    ),
                                    '4' => array(
                                        'data-index'    => '5',
                                        'image'         => 'unique-corner-room.jpg',
                                        'text_1'		=> 'Unique Corner Rooms',
                                    ),
                                    '5' => array(
                                        'data-index'    => '6',
                                        'image'         => 'garden-room.jpg',
                                        'text_1'		=> 'The Garden Suites',
                                    ),
                                    '6' => array(
                                        'data-index'    => '7',
                                        'image'         => 'valley-room.jpg',
                                        'text_1'		=> 'The Valley Suites',
                                    ),
                                    '7' => array(
                                        'data-index'    => '8',
                                        'image'         => 'botanica-room.jpg',
                                        'text_1'		=> 'The Botanica Suites',
                                    ),
                                    '8' => array(
                                        'data-index'    => '9',
                                        'image'         => 'superior-room.jpg',
                                        'text_1'		=> 'Superior Rooms',
                                    ),
                                    '9' => array(
                                        'data-index'    => '10',
                                        'image'         => 'deluxe-room.jpg',
                                        'text_1'		=> 'Deluxe Rooms',
                                    ),
                                    '10' => array(
                                        'data-index'    => '11',
                                        'image'         => 'premiere-room.jpg',
                                        'text_1'		=> 'Premiere Rooms',
                                    ),
                                    '11' => array(
                                        'data-index'    => '12',
                                        'image'         => 'loft-family-room.jpg',
                                        'text_1'		=> 'The Loft Family Rooms',
                                    ),
                                );
                                foreach ($arr as $key => $value) {                
                            ?>
                                <a href="#" class="col col-4 sm:col-12 sm:pl-0 sm:pr-0 mb-6 detail-foto" data-slide="<?= $value['data-index'] ?>">
                                    <div class="img-zoom img-gallery expand_gallery">
                                        <div class="img lazy" style="background-image: url('<?php echo url('/assets/images/rooms/'.$value['image']) ?>')"></div>
                                        <p class="p-xl p-4 tc-secondary pos-r zi-8"><?= $value['text_1'] ?></p>
                                    </div>
                                </a>
                            <?php }  ?>
                            <script>
                                $(document).ready(function() {

                                    $('.expand_gallery').click(function() {
                                        $('.fm-gallery').addClass('active');
                                    })
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('page/footer')

    <div class="fullmenu fm-gallery zi-20">
      <div class="btn-icon zi-20 fullmenu_toggle" id="fm-gallery">
        <span class="icon h5 tc-dark-contrast">
          <i class="fal fa-times"></i>
        </span>
      </div>
      <div class="inner">
        <div class="complex-gallery-slider-wrapper">
          <div class="complex-gallery-slider slider complex-big-image" data-minimum='1' data-type="responsive">
            <div class="row">
              <?php
                foreach($arr as $value) {
              ?>
              <div class="col col-12">
                <div class="complex-gallery-item">
                  <img src="<?php echo url('/assets/images/rooms/'.$value['image']) ?>" alt="">
                </div>
                <p class="p-xl p-4 tc-secondary pos-r zi-8"><?= $value['text_1'] ?></p>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="complex-gallery-slider-wrapper">
          <div class="d-flex jc-center ai-center">
            <div class="h-2px w-16 bg-medium-tint"></div>
            <div id="slide-count-wrap" class="p p-lg ff-2 tc-dark-contrast zi-10 ml-6 mr-6">
              <span id="current"></span> /
              <span id="total"></span>
            </div>
            <div class="h-2px w-16 bg-medium-tint"></div>
          </div>
          <div class="complex-gallery-slider slider complex-thumbnail-image" data-minimum='10' data-type="responsive">
            <div class="row">
              <?php
                foreach($arr as $value) {
              ?>
              <div class="col col-2-5">
                <div class="complex-gallery-item" style="background-image: url('<?php echo url('/assets/images/rooms/'.$value['image']) ?>')"></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<span class="close-box box-1 on"></span>

<script>
    $(document).ready(function() {
        $('a[data-slide]').click(function(e) {
            e.preventDefault();
            var slideno = $(this).data('slide');
            $('.complex-thumbnail-image .row').slick('slickGoTo', slideno - 1);
        });
    })
</script>

@endsection