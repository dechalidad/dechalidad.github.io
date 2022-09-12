$(document).ready(function () {
  AOS.init();

  // var timer = setTimeout(function () {
  //   $('.complex-preload').addClass('hide');
  //   $('.close-box.box-2').addClass('hide');
  //   setTimeout(function() {
  //     $('.close-box.box-2').removeClass('hide');
  //   }, 600);
  // }, 600);

  if ($(".vjs-fluid")[0]) {
    var vjsHeight = $(".vjs-fluid").outerHeight();
    $(".video-wrapper").css({
      height: vjsHeight,
    });
  }

  // -=-=-=-=-=-=-=-=- DIFFERENT BUILD FOR MOBILE AND DEKSTOP -=-=-=-=-=-=-=-=-
  if (
    !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    )
  ) {
    // -=-=-=-=-=-=-=-=- NICE SCROLL -=-=-=-=-=-=-=-=-
    $("html").niceScroll({
      cursorcolor: "#6E7179", // change cursor color in hex
      cursorborder: "0px solid #FFF", // css definition for cursor border
      railpadding: {
        top: 0,
        right: 3,
        left: 0,
        bottom: 0,
      }, // set padding for rail bar
      hidecursordelay: 4000,
      enablekeyboard: true,
      bouncescroll: true,
      smoothscroll: true,
      iframeautoresize: true,
      touchbehavior: false,
      scrollspeed: 80, // scrolling speed
      mousescrollstep: 30, // scrolling speed with mouse wheel (pixel)
    });

    // -=-=-=-=-=-=-=-=- POSITION STICKY DETECTOR -=-=-=-=-=-=-=-=-
    if ($(".pos-sticky")[0]) {
      $("body").css({
        overflow: "visible",
      });
    }
  } else {
    $("body").attr("id", "mobile");
  }
  // -=-=-=-=-=-=-=-=- DIFFERENT BUILD FOR MOBILE AND DEKSTOP - - - END -=-=-=-=-=-=-=-=-

  // -=-=-=-=-=-=-=-=- IMAGE LAZINESS -=-=-=-=-=-=-=-=-
  if ($(".lazy")[0]) {
    $(".lazy").lazy();
  }

  // -=-=-=-=-=-=-=-=- SCROLL TO FUNCTION -=-=-=-=-=-=-=-=-
  if ($(".scroll_to")[0]) {
    var scroll_to = $(".scroll_to");

    $.each(scroll_to, function (index, item) {
      var $this = $(item),
        scroll_to = $this.data("scroll-to"),
        scroll_offset = $this.data("scroll-offset");
      // console.log("🚀 ~ file: main.js ~ line 51 ~ scroll_to", scroll_to);
      // console.log(
      //   "🚀 ~ file: main.js ~ line 53 ~ scroll_offset",
      //   scroll_offset
      // );

      function scroll_init($item, $o) {
        $item.click(function (e) {
          e.preventDefault();

          $("html, body").animate(
            {
              scrollTop: $("." + scroll_to).offset().top - $o,
            },
            500
          );
        });
      }

      if ($this.is("[data-scroll-offset]")) {
        scroll_init($this, scroll_offset);
        // console.log("has specs");
      } else {
        scroll_init($this, 0);
        // console.log("no specs");
      }
    });

    // HOW TO USE
    // <div class="this_section"></div>
    // ...
    // <div class="scroll_to" data-scroll-to="this_section" data-scroll-offset="0"></div>
  }

  // -=-=-=-=-=-=-=-=- SLIDER SETTING AND CLASS TARGET -=-=-=-=-=-=-=-=-
  if ($(".slider")[0]) {
    var slider = $(".slider"),
      slider_array = [];

    $.each(slider, function (index, item) {
      var children_length = $(item).children(".row").children().length,
        slider_min = $(item).data("minimum"),
        slider_min_m = $(item).data("minimum-m"),
        slider_min_t = $(item).data("minimum-t"),
        slider_type = $(item).data("type");

      slider_array.push(
        {
          name: "minimum",
          value: slider_min,
        },
        {
          name: "type",
          value: slider_type,
        }
      );

      if (slider_type == "responsive") {
        if (children_length >= slider_min) {
          $(item).addClass("responsive-slider-activated");

          // -=-=-=-=-=-=-=-=- SLIDER - - - START -=-=-=-=-=-=-=-=-
          if ($(item).hasClass("complex-header-slider")) {
            $(".complex-header-slider .row")
              .on("init", function (event, slick) {
                $(slick.$slides).each(function () {
                  var $this = $(this);

                  if ($this.children(".header-slider-item").hasClass("video")) {
                    // console.log(
                    //   ">>>> init header-slider-item",
                    //   $this.children(".header-slider-item.video")
                    // );
                    $this
                      .find(".header-slider-item.video")
                      .children(".video")
                      .children("video")[0]
                      .pause();
                  }
                });
              })
              .on("afterChange", function (event, slick, direction) {
                $(slick.$slides).each(function () {
                  var $this = $(this);

                  if ($this.children(".header-slider-item").hasClass("video")) {
                    if ($this.hasClass("slick-current")) {
                      $this
                        .children(".header-slider-item.video")
                        .children(".video")
                        .children("video")[0]
                        .play();
                    } else {
                      $this
                        .children(".header-slider-item.video")
                        .children(".video")
                        .children("video")[0]
                        .pause();
                    }
                  }
                });
              })
              .slick({
                slidesToScroll: 1,
                slidesToShow: slider_min,
                // centerMode: true,
                // variableWidth     : true,
                dots: false,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 4000,
                touchThreshold: 100,
                // centerPadding: 250,
                // draggable: false,
                arrows: true, // true
                // prevArrow: true,
                // nextArrow: true,
                prevArrow:
                  '<div class="btn-icon btn-prev"><div class="icon"><i class="fas fa-arrow-left />"</div></div>',
                nextArrow:
                  '<div class="btn-icon btn-next"><div class="icon"><i class="fas fa-arrow-right />"</div></div>',
              });
          } else if ($(item).hasClass("complex-news-slider")) {
            $(".complex-news-slider .row")
              .on("init", function (event, slick) {})
              .on(
                "beforeChange",
                function (event, slick, currentSlide, nextSlide) {}
              )
              .on("afterChange", function (event, slick) {})
              .slick({
                slidesToScroll: 1,
                slidesToShow: slider_min,
                dots: false,
                infinite: true,
                autoplay: false,
                touchThreshold: 100,
                centerMode: false,
                arrows: true, // true
                prevArrow: $(".section-5 .btn-prev"),
                nextArrow: $(".section-5 .btn-next"),
                // prevArrow:
                //   '<div class="btn-icon btn-prev"><div class="icon pr-1"><i class="far fa-chevron-left"></i></div></div>',
                // nextArrow:
                //   '<div class="btn-icon btn-next"><div class="icon pl-1"><i class="far fa-chevron-right"></i></div></div>',
                responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                      // infinite: true,
                      // dots: true
                    },
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                    },
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                    },
                  },
                ],
              });
          } else if ($(item).hasClass("complex-review-slider")) {
            $(".complex-review-slider .row")
              .on("init", function (event, slick) {})
              .on(
                "beforeChange",
                function (event, slick, currentSlide, nextSlide) {}
              )
              .on("afterChange", function (event, slick) {})
              .slick({
                slidesToScroll: 1,
                slidesToShow: slider_min,
                dots: false,
                infinite: true,
                autoplay: true,
                touchThreshold: 100,
                centerMode: false,
                arrows: true, // true
                // prevArrow:
                //   '<div class="btn-icon btn-prev"><div class="icon pr-1"><i class="far fa-chevron-left"></i></div></div>',
                // nextArrow:
                //   '<div class="btn-icon btn-next"><div class="icon pl-1"><i class="far fa-chevron-right"></i></div></div>',
                responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                      // infinite: true,
                      // dots: true
                    },
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                    },
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                    },
                  },
                ],
              });
          } else if ($(item).hasClass("complex-marquee-slider")) {
            $(".complex-marquee-slider .row").slick({
              speed: 5000,
              autoplay: true,
              autoplaySpeed: 0,
              centerMode: true,
              cssEase: "linear",
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
              infinite: true,
              initialSlide: 1,
              arrows: false,
              buttons: false,
            });
          }
          // -=-=-=-=-=-=-=-=- SLIDER - - - END -=-=-=-=-=-=-=-=-
        }
      }
    });
  }

  // -=-=-=-=-=-=-=-=- IMAGE WITH SHADOW BLUR FRAME -=-=-=-=-=-=-=-=-
  if ($(".img-frame")[0]) {
    var image_frame = $(".img-frame");

    $.each(image_frame, function (index, item) {
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

  // -=-=-=-=-=-=-=-=- ADD CLASS ON SCROLL -=-=-=-=-=-=-=-=-
  $(function () {
    var nav = $(".navbar");
    var nav_bullet = $(".navbar-bullet");
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 100) {
        nav.addClass("scroll-active");
        nav_bullet.addClass("scroll-active");
      } else {
        nav.removeClass("scroll-active");
        nav_bullet.removeClass("scroll-active");
      }
    });
  });
  // -=-=-=-=-=-=-=-=- ADD CLASS ON SCROLL - - - END -=-=-=-=-=-=-=-=-

  // -=-=-=-=-=-=-=-=- ADD + REMOVE CLASS ON UP / DOWN SCROLL -=-=-=-=-=-=-=-=-
  if ($(".master-body")[0]) {
    var nav = $(".navbar");
    var nav_bullet = $(".navbar-bullet");

    $("body").on("DOMMouseScroll mousewheel", function (e) {
      if ($(window).scrollTop() + screen.height > $("body").height()) {
        nav.removeClass("hide-on-scroll");
        nav_bullet.removeClass("hide-on-scroll");
        // console.log('reach bottom page');
      } else {
        if (e.originalEvent.detail > 0 || e.originalEvent.wheelDelta < 0) {
          //alternative options for wheelData: wheelDeltaX & wheelDeltaY
          //scroll down
          nav.addClass("hide-on-scroll");
          nav_bullet.addClass("hide-on-scroll");
          // console.log('Down');
        } else {
          //scroll up
          nav.removeClass("hide-on-scroll");
          nav_bullet.removeClass("hide-on-scroll");
          // console.log('Up');
        }
      }

      //prevent page fom scrolling
      // return false;
    });

    currentY: var swipe = false,
      lastY,
      timer,
      wScrolltop,
      wHeight = $("body").outerHeight();

    $(document).bind("touchstart", function (e) {
      lastY = e.originalEvent.touches
        ? e.originalEvent.touches[0].pageY
        : e.pageY;
      // console.log();
    });

    $(document)
      .bind("touchmove", function (e) {
        wScrolltop = $(window).scrollTop();

        if (
          wScrolltop +
            $(".master-body").children(".smooth-sc-wp").outerHeight() >=
          wHeight
        ) {
          nav.removeClass("hide-on-scroll").addClass("reach-bottom-page");
          nav_bullet
            .removeClass("hide-on-scroll")
            .addClass("reach-bottom-page");
          // console.log('reach bottom page');
        } else {
          nav.removeClass("reach-bottom-page");
          nav_bullet.removeClass("reach-bottom-page");
        }

        // console.log(wScrolltop+screen.height +' == '+ wHeight);

        var currentY = e.originalEvent.touches
          ? e.originalEvent.touches[0].pageY
          : e.pageY;

        if (!swipe) {
          if (Math.abs(currentY - lastY) < 1) {
            return;
          }
          swipe = true;
          if (currentY > lastY) {
            // console.log('up');
            nav.removeClass("hide-on-scroll");
            nav_bullet.removeClass("hide-on-scroll");
          } else {
            // console.log('down');
            nav.addClass("hide-on-scroll");
            nav_bullet.addClass("hide-on-scroll");
          }
        }
      })
      .on("touchend", function () {
        swipe = false;
      });
  }
  // -=-=-=-=-=-=-=-=- ADD + REMOVE CLASS ON UP / DOWN SCROLL - - - END -=-=-=-=-=-=-=-=-

  // -=-=-=-=-=-=-=-=- OVERLAY TOGGLE -=-=-=-=-=-=-=-=-
  $(".overlay_toggle").click(function () {
    const target_id = $(this).attr("id");

    $(this).toggleClass("active").siblings(this).removeClass("active");

    $(`.overlay.` + target_id)
      .toggleClass("active")
      .siblings(".overlay")
      .removeClass("active");
  });
  // -=-=-=-=-=-=-=-=- OVERLAY TOGGLE - - - END -=-=-=-=-=-=-=-=-

  // -=-=-=-=-=-=-=-=- MAKE TRANSITION -=-=-=-=-=-=-=-=-
  $(".make_transition").click(function (e) {
    $(".overlay").removeClass("active");

    {
      (e) => dragging && e.preventDefault();
    }
    $(".transition").removeClass("off");
    var gotoPage = $(this).data("transition-to");
    e.preventDefault(); //will stop the link href to call the blog page

    setTimeout(function () {
      window.location.href = gotoPage; //will redirect to your blog page (an ex: blog.html)
    }, 600); //will call the function after 2 secs.
  });
  // -=-=-=-=-=-=-=-=- MAKE TRANSITION - - - END -=-=-=-=-=-=-=-=-

  if ($("#about-page")[0]) {
    $(function () {
      let line1 = document.querySelector(
        ".product-highlight-wrapper .col#col-1"
      );
      let line2 = document.querySelector(
        ".product-highlight-wrapper .col#col-2"
      );
      let line3 = document.querySelector(
        ".product-highlight-wrapper .col#col-3"
      );
      let wrapper = document.querySelector(".product-highlight-wrapper");
      let wrapper_end = document.querySelector(".section-4-1");

      elemRect = wrapper.getBoundingClientRect();
      elemEndRect = wrapper_end.getBoundingClientRect();

      window.onscroll = () => {
        if (
          !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
          )
        ) {
          if (
            window.scrollY >= elemRect.top - 800 &&
            window.scrollY <= elemEndRect.top
          ) {
            let pos = -(window.scrollY - elemRect.top) * 0.15;
            // console.log(">>>>>>", pos);
            line1.style.top = `${pos}px`;
            line2.style.bottom = `${pos}px`;
            line3.style.top = `${pos}px`;
          }
        } else {
          if (
            window.scrollY >= elemRect.top - 200 &&
            window.scrollY <= elemEndRect.top - 588
          ) {
            let pos = -(window.scrollY - elemRect.top) * 0.15;
            // console.log(">>>>>>", pos);
            line1.style.top = `${pos}px`;
            line2.style.bottom = `${pos}px`;
            line3.style.top = `${pos}px`;
          }
        }
      };
    });

    // $(function () {
    //   function changeColor() {
    //     var triggerElement = document.getElementById("change_color_trigger");
    //     if (triggerElement.getBoundingClientRect().top <= 0) {
    //       // console.log("top of #section_partner reached.");
    //       $(".master-body").addClass("dark");
    //     } else {
    //       $(".master-body").removeClass("dark");
    //     }
    //   }

    //   window.addEventListener("scroll", changeColor);
    // });
  }

  // -=-=-=-=-=-=-=-=- TAB -=-=-=-=-=-=-=-=-
  if ($(".tab")[0]) {
    const th = document.querySelector(".tab-header");
    let isDown = false;
    let startX;
    let scrollLeft;

    $(".tab").on("mouseover", function () {
      th.addEventListener("mousedown", (e) => {
        isDown = true;
        th.classList.add("active");
        startX = e.pageX - th.offsetLeft;
        scrollLeft = th.scrollLeft;
      });
      th.addEventListener("mouseleave", () => {
        isDown = false;
        th.classList.remove("active");
      });
      th.addEventListener("mouseup", () => {
        isDown = false;
        th.classList.remove("active");
      });
      th.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - th.offsetLeft;
        const walk = (x - startX) * 1; //scroll-fast
        th.scrollLeft = scrollLeft - walk;
        // console.log(walk);
      });
    });

    $(".tab .tab-header .tab-header-item").on("click", function (e) {
      e.preventDefault();
      $(this).addClass("active").siblings().removeClass("active");

      var item = $(this)
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
        0.5,
        {
          y: 0,
          opacity: 1,
          ease: Back.easeOut,
        },
        0.05
      );
    });

    $(".tab .dropdown-body .dropdown-item").on("click", function (e) {
      e.preventDefault();

      var item = $(this)
        .parent()
        .parent()
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
        0.5,
        {
          y: 0,
          opacity: 1,
          ease: Back.easeOut,
        },
        0.05
      );
    });
  }
  // -=-=-=-=-=-=-=-=- TAB - - - END -=-=-=-=-=-=-=-=-

  // -=-=-=-=-=-=-=-=- FILTER -=-=-=-=-=-=-=-=-
  if ($(".filter-option-wrapper")[0]) {
    var filter_wrapper = $(".filter-option-wrapper");

    // $(".apply-filter-wrapper").watch("display,visibility", function () {
    //   if ($(this).is(":visible")) {
    //     console.log(">>>", $(this), "is not visible");
    //   } else {
    //     console.log(">>>", $(this), "is visible");
    //   }
    // });

    $.each(filter_wrapper, function (index, item) {
      // console.log("🚀 ~ file: main.js ~ line 608 ~ item", item);

      var $item = $(item);

      $item.children(".filter-option-item").on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");

        // var item = $("#result-product").children(".col");

        if ($item.children(".active").length > 0) {
          $(".apply-filter-wrapper").addClass("active");
        } else {
          $(".apply-filter-wrapper").removeClass("active");
        }

        // if ($(this).hasClass(".active")[0]) {
        //   $(".apply-filter-wrapper").addClass("active");
        //   console.log(
        //     "🚀 ~ file: main.js ~ line 623 ~ active",
        //     $(this).hasClass(".active")[0]
        //   );
        // } else {
        //   $(".apply-filter-wrapper").removeClass("active");
        //   console.log(
        //     "🚀 ~ file: main.js ~ line 626 ~ active",
        //     $(this).hasClass(".active")[0]
        //   );
        // }

        // var fow = $(".filter-option-wrapper");

        // $.each(fow, function () {
        //   if ($(this).children(".active")[0]) {
        //     $(".apply-filter-wrapper").addClass("active");
        //   } else {
        //     $(".apply-filter-wrapper").removeClass("active");
        //   }
        // });

        // TweenLite.set(item, {
        //   y: 25,
        //   opacity: 0,
        // });

        // var tl = new TimelineLite();
        // tl.staggerTo(
        //   item,
        //   0.5,
        //   {
        //     y: 0,
        //     opacity: 1,
        //     ease: Back.easeOut,
        //   },
        //   0.05
        // );
      });
    });
  }
  // -=-=-=-=-=-=-=-=- FILTER - - - END -=-=-=-=-=-=-=-=-

  $(".product_image").each(function () {
    var $this = $(this);
    // console.log(
    //   "🚀 ~ file: main.js ~ line 603 ~ $this",
    //   $this.width(),
    //   $this.height()
    // );
    if ($this.width() == $this.height() || $this.width() > $this.height()) {
      $this.addClass("is-horizontal");
    }
  });

  // -=-=-=-=-=-=-=-=- PAGINATION -=-=-=-=-=-=-=-=-
  if ($(".pagination")[0]) {
    $(".pagination .pagination-control").on("click", function (e) {
      e.preventDefault();
      $(this).addClass("active").siblings().removeClass("active");
    });
  }
  // -=-=-=-=-=-=-=-=- PAGINATION - - - END -=-=-=-=-=-=-=-=-

  if ($(".vjs-fluid")[0]) {
    var vjs_fluid = $(".vjs-fluid");

    $.each(vjs_fluid, function (index, item) {
      var vjsHeight = $(item).outerHeight();
      $(item).parent().parent().css({
        height: vjsHeight,
      });
    });

    // -=-=-=-=-=-=-=-=- VIDEO TOGGLE -=-=-=-=-=-=-=-=-
    if ($(".video-toggle")[0]) {
      $(".video-toggle").click(function () {
        $(this).parent().parent().addClass("video-active");
      });
    }

    if ($(".video-js")[0]) {
      // var vjs = $('.video-js');

      // $.each(vjs, function (index, item) {

      //   var player = videojs('example_video_1');
      //   $(item).parent().parent().css({
      //     height: vjsHeight,
      //   })
      // })

      var player = videojs("example_video_1");
      player.on("pause", function () {
        if (!player.seeking()) {
          $(".video-toggle").parent().parent().removeClass("video-active");
          // console.log("PAUSE");
        }
      });
    }

    if ($(".btn-close-video")[0]) {
      $(".btn-close-video").click(function () {
        player.pause();
        $(".video-toggle").parent().removeClass("video-active");
        // console.log("PAUSE");
      });
    }
    // -=-=-=-=-=-=-=-=- VIDEO TOGGLE - - - END -=-=-=-=-=-=-=-=-

    // var vjsHeight = $('.vjs-fluid').outerHeight();
    // $('.video-wrapper').css({
    //   height: vjsHeight,
    // })
  }

  if ($(".aspect_ratio")[0]) {
    // Set aspect ratio of .box
    var aspect_ratio = $(".aspect_ratio");

    // Store the jQuery object for future reference
    $.each(aspect_ratio, function (index, item) {
      var $box = $(item),
        aspect_ratio_number = $(item).data("ratio");

      // Initial resize of .box
      $(document).ready(function ($) {
        $box.height($box.width() * aspect_ratio_number);
      });

      // Resize .box on browser resize
      $(window).resize(function () {
        $box.height($box.width() * aspect_ratio_number);
      });
    });
  }

  if ($(".custom-select")[0]) {
    $(".custom-select").each(function () {
      var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
      var template = '<div class="' + classes + '">';
      template +=
        '<span class="custom-select-trigger">' +
        $(this).attr("placeholder") +
        "</span>";
      template += '<div class="custom-options">';
      $(this)
        .find("option")
        .each(function () {
          template +=
            '<span class="custom-option ' +
            $(this).attr("class") +
            '" data-name="' +
            $(this).attr("id") +
            '" data-link="' +
            $(this).data("link") +
            '" data-value="' +
            $(this).attr("value") +
            '">' +
            $(this).html() +
            "</span>";
        });
      template += "</div></div>";

      $(this).wrap('<div class="custom-select-wrapper"></div>');
      $(this).hide();
      $(this).after(template);
    });
    $(".custom-option:first-of-type").hover(
      function () {
        $(this).parents(".custom-options").addClass("option-hover");
      },
      function () {
        $(this).parents(".custom-options").removeClass("option-hover");
      }
    );
    $(".custom-select-trigger").on("click", function () {
      $("html").one("click", function () {
        $(".custom-select").removeClass("opened");
      });
      $(this).parents(".custom-select").toggleClass("opened");
      event.stopPropagation();
    });
    $(".custom-option").on("click", function () {
      $(this)
        .parents(".custom-select-wrapper")
        .find("select")
        .val($(this).data("value"));
      $(this)
        .parents(".custom-options")
        .find(".custom-option")
        .removeClass("selection");
      $(this).addClass("selection");
      $(this).parents(".custom-select").removeClass("opened");
      $(this)
        .parents(".custom-select")
        .find(".custom-select-trigger")
        .text($(this).text());

      $("#product_name").text($(this).data("name"));
      $(".btn-link").attr("href", $(this).data("link"));
      $("#product_image").attr("src", $(this).data("value"));
    });
  }

  if ($(".pos-s")[0]) {
    $(".master-body").css({
      overflowX: "visible",
    });
  }

  if ($(".show_alert")[0]) {
    var alert_trigger = $(".show_alert"),
      alert_array = [],
      elements = $(),
      n_click = 0;

    function close_alert($var) {
      $var.css({
        top: 0,
      });
      $var.removeClass("active");
    }

    $.each(alert_trigger, function (index, item) {
      var alert_length = $(item).length,
        alert_type = $(item).data("alert"),
        alert_for = $(item).data("alert-for"),
        alert_text = $(item).data("alert-text"),
        alert_icon = $(item).data("alert-icon");

      alert_array.push(
        {
          name: "type",
          value: alert_type,
        },
        {
          name: "for",
          value: alert_for,
        },
        {
          name: "text",
          value: alert_text,
        },
        {
          name: "icon",
          value: alert_icon,
        }
      );

      // console.log(alert_array);

      elements = elements.add(
        '<div class="alert ' +
          alert_type +
          '" id="' +
          alert_for +
          '"><div class="icon mr-4 tc-dark-contrast"> <i class="' +
          alert_icon +
          '"></i></div><p class="tc-dark-contrast">' +
          alert_text +
          '</p><div class="btn-icon btn-sm btn-red ml-auto close-alert"><div class="icon"> <i class="far fa-times"></i></div></div></div>'
      );
      $("body").append(elements);

      $(item).on("click", function () {
        $(".alert#" + alert_for).css({
          top: 100 * ++n_click,
        });
        $(".alert#" + alert_for).addClass("active");

        setTimeout(function () {
          close_alert($(".alert#" + alert_for));
          n_click = $(".alert.active#" + alert_for).length;
        }, 2000);
      });
    });

    $(".close-alert").click(function () {
      close_alert($(this).parent());
      n_click = 0;
    });

    // how to use alert
    // add class 'show_alert' to any element
    // then add >> data-alert="default" data-alert-for="alert-for" data-alert-text="text here" data-alert-icon="fas fa-exclamation-circle"
  }

  //   if ($(".quiz-wrapper")[0]) {
  //     const quizdata = [
  //       {
  //         question: "Apasih peliharaan yang kamu pelihara dirumah?",
  //         options: ["Kucing", "Anjing", "Ikan", "Kelinci", "Burung"],
  //         answer: "Burung",
  //         name: "question-1",
  //         category: 1,
  //       },
  //       {
  //         question: "Berapakah usia hewan peliharaanmu sekarang ?",
  //         options: [
  //           "1 - 6 Bulan",
  //           "6 - 12 Bulan",
  //           "1 - 2 Tahun",
  //           "Lebih Dari 2 Tahun",
  //         ],
  //         answer: "1 - 6 Bulan",
  //         name: "question-2",
  //         category: 2,
  //       },
  //       {
  //         question: "Berapa kali sehari kamu memberi makan mereka?",
  //         options: ["1 Kali", "2 Kali", "3 Kali", "4 Kali"],
  //         answer: "2 Kali",
  //         name: "question-3",
  //         category: 3,
  //       },
  //       {
  //         question:
  //           "Adakah kebiasaan/kesukaan hewan peliharaanmu yang kamu amati?",
  //         options: [
  //           "Pilih Pilih Terhadap Makanan",
  //           "Tidur/Beristirahat Di Tempat Tertentu",
  //           "Menggit / Menggaruk / Menggali Sesuatu",
  //           "Suka Pura-Pura Mati",
  //         ],
  //         answer: "Pilih Pilih Terhadap Makanan",
  //         name: "question-4",
  //         category: 1,
  //       },
  //       {
  //         question:
  //           "Dari jenis makanannya hewan peliharaanmu suka makanan jenis apasih?",
  //         options: ["Dry Food", "Wet Food", "Snacks"],
  //         answer: "Dry Food",
  //         name: "question-5",
  //         category: 2,
  //       },
  //       // {
  //       //   question:
  //       //     "An expression of disapproval or blame personally addressed to one censured",
  //       //   options: ["Pitiful", "Reproof", "Mutation", "Raillery"],
  //       //   answer: "Reproof",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question: "To deliver an elaborate or formal public speech.",
  //       //   options: ["Orate", "Magician", "Access", "Guzzle"],
  //       //   answer: "Orate",
  //       //   category: 2,
  //       // },
  //       // {
  //       //   question:
  //       //     "A wharf or artificial landing-place on the shore of a harbor or projecting into it",
  //       //   options: ["Intolerable", "Quay", "Fez", "Insatiable"],
  //       //   answer: "Quay",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question:
  //       //     "Friendly counsel given by way of warning and implying caution or reproof",
  //       //   options: ["Credence", "Colloquy", "Abyss", "Monition"],
  //       //   answer: "Monition",
  //       //   category: 1,
  //       // },
  //       // {
  //       //   question: "To make a beginning in some occupation or scheme",
  //       //   options: ["Muster", "Embark", "Ocular", "Apprehensible"],
  //       //   answer: "Ocular",
  //       //   category: 2,
  //       // },
  //       // {
  //       //   question: "Able to reinforce sound by sympathetic vibrations",
  //       //   options: ["Resonance", "Clandestine", "Diffusion", "Quietus"],
  //       //   answer: "Resonance",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question:
  //       //     "To send off or consign, as to an obscure position or remote destination",
  //       //   options: ["Monolith", "Endurable", "Efficient", "Relegate"],
  //       //   answer: "Relegate",
  //       //   category: 1,
  //       // },
  //     ];
  //     const quizdata_en = [
  //       {
  //         question: "What pets do you have at home?",
  //         options: ["Cat", "Dog", "Fish", "Rabbit", "Bird"],
  //         answer: "Bird",
  //         name: "question-1",
  //         category: 1,
  //       },
  //       {
  //         question: "How old is your pet now?",
  //         options: [
  //           "1 - 6 Months old",
  //           "6 - 12 Months old",
  //           "1 - 2 Years old",
  //           "Lebih Dari 2 Years old",
  //         ],
  //         answer: "1 - 6 Months old",
  //         name: "question-2",
  //         category: 2,
  //       },
  //       {
  //         question: "How many times a day do you feed them?",
  //         options: ["1 Times", "2 Times", "3 Times", "4 Times"],
  //         answer: "2 Times",
  //         name: "question-3",
  //         category: 3,
  //       },
  //       {
  //         question:
  //           "Are there any habits/interests of your pet that you observe?",
  //         options: [
  //           "Being picky about food",
  //           "Sleeping/laying on certain places",
  //           "Biting / Scratching / Digging Something",
  //           "Likes to Pretend to be Dead",
  //         ],
  //         answer: "Being picky about food",
  //         name: "question-4",
  //         category: 1,
  //       },
  //       {
  //         question: "What kind of food that your pet like the most?",
  //         options: ["Dry Food", "Wet Food", "Snacks"],
  //         answer: "Dry Food",
  //         name: "question-5",
  //         category: 2,
  //       },
  //     ];

  //     var $progressValue = 0;
  //     var resultList = [];

  //     /** Random shuffle questions **/
  //     function shuffleArray(question) {
  //       var shuffled = question.sort(function () {
  //         return 0.5 - Math.random();
  //       });
  //       return shuffled;
  //     }

  //     function shuffle(a) {
  //       for (var i = a.length; i; i--) {
  //         var j = Math.floor(Math.random() * i);
  //         var _ref = [a[j], a[i - 1]];
  //         a[i - 1] = _ref[0];
  //         a[j] = _ref[1];
  //       }
  //     }

  //     /*** Return shuffled question ***/
  //     function generateQuestions() {
  //       // var questions = shuffleArray(quizdata);
  //       var questions = quizdata;
  //       return questions;
  //     }

  //     /*** Return list of options ***/
  //     function returnOptionList(opts, i, optsName) {
  //       var optionHtml =
  //         '<li class="myoptions">' +
  //         '<input value="' +
  //         opts +
  //         '" name="' +
  //         optsName +
  //         '" type="radio" id="rd_' +
  //         i +
  //         '">' +
  //         '<label for="rd_' +
  //         i +
  //         '">' +
  //         opts +
  //         "</label>" +
  //         '<div class="bullet">' +
  //         '<div class="line zero"></div>' +
  //         '<div class="line one"></div>' +
  //         '<div class="line two"></div>' +
  //         '<div class="line three"></div>' +
  //         '<div class="line four"></div>' +
  //         '<div class="line five"></div>' +
  //         '<div class="line six"></div>' +
  //         '<div class="line seven"></div>' +
  //         "</div>" +
  //         "</li>";

  //       return optionHtml;
  //     }

  //     /** Render Options **/
  //     function renderOptions(optionList, optionName) {
  //       var ulContainer = $("<ul>").attr("id", "optionList");
  //       for (var i = 0, len = optionList.length; i < len; i++) {
  //         var optionContainer = returnOptionList(optionList[i], i, optionName);
  //         ulContainer.append(optionContainer);
  //       }
  //       $(".answerOptions").html("").append(ulContainer);
  //     }

  //     /** Render question **/
  //     function renderQuestion(question) {
  //       $(".question").html("<h6>" + question + "</h6>");
  //     }

  //     /** Render quiz :: Question and option **/
  //     function renderQuiz(questions, index) {
  //       var currentQuest = questions[index];
  //       renderQuestion(currentQuest.question);
  //       renderOptions(currentQuest.options, currentQuest.name);
  //       // console.log("Question");
  //       // console.log(questions[index]);
  //     }

  //     /** Return correct answer of a question ***/
  //     function getCorrectAnswer(questions, index) {
  //       return questions[index].answer;
  //     }

  //     /** pushanswers in array **/
  //     function correctAnswerArray(resultByCat) {
  //       var arrayForChart = [];
  //       for (var i = 0; i < resultByCat.length; i++) {
  //         arrayForChart.push(resultByCat[i].correctanswer);
  //       }

  //       return arrayForChart;
  //     }
  //     /** Generate array for percentage calculation **/
  //     function genResultArray(results, wrong) {
  //       var resultByCat = resultByCategory(results);
  //       var arrayForChart = correctAnswerArray(resultByCat);
  //       arrayForChart.push(wrong);
  //       return arrayForChart;
  //     }

  //     /** percentage Calculation **/
  //     function percentCalculation(array, total) {
  //       var percent = array.map(function (d, i) {
  //         return ((100 * d) / total).toFixed(2);
  //       });
  //       return percent;
  //     }

  //     /*** Get percentage for chart **/
  //     function getPercentage(resultByCat, wrong) {
  //       var totalNumber = resultList.length;
  //       var wrongAnwer = wrong;
  //       //var arrayForChart=genResultArray(resultByCat, wrong);
  //       //return percentCalculation(arrayForChart, totalNumber);
  //     }

  //     /** count right and wrong answer number **/
  //     function countAnswers(results) {
  //       var countCorrect = 0,
  //         countWrong = 0;

  //       for (var i = 0; i < results.length; i++) {
  //         if (results[i].iscorrect == true) countCorrect++;
  //         else countWrong++;
  //       }

  //       return [countCorrect, countWrong];
  //     }

  //     /**** Categorize result *****/
  //     function resultByCategory(results) {
  //       var categoryCount = [];
  //       var ctArray = results.reduce(function (res, value) {
  //         if (!res[value.category]) {
  //           res[value.category] = {
  //             category: value.category,
  //             correctanswer: 0,
  //           };
  //           categoryCount.push(res[value.category]);
  //         }
  //         var val = value.iscorrect == true ? 1 : 0;
  //         res[value.category].correctanswer += val;
  //         return res;
  //       }, {});

  //       categoryCount.sort(function (a, b) {
  //         return a.category - b.category;
  //       });

  //       return categoryCount;
  //     }

  //     /** Total score pie chart**/
  //     function totalPieChart(_upto, _cir_progress_id, _correct, _incorrect) {
  //       $("#" + _cir_progress_id)
  //         .find("._text_incor")
  //         .html("Incorrect : " + _incorrect);
  //       $("#" + _cir_progress_id)
  //         .find("._text_cor")
  //         .html("Correct : " + _correct);

  //       var unchnagedPer = _upto;

  //       _upto = _upto > 100 ? 100 : _upto < 0 ? 0 : _upto;

  //       var _progress = 0;

  //       var _cir_progress = $("#" + _cir_progress_id).find("._cir_P_y");
  //       var _text_percentage = $("#" + _cir_progress_id).find("._cir_Per");

  //       var _input_percentage;
  //       var _percentage;

  //       var _sleep = setInterval(_animateCircle, 25);

  //       function _animateCircle() {
  //         //2*pi*r == 753.6 +xxx=764
  //         _input_percentage = (_upto / 100) * 764;
  //         _percentage = (_progress / 100) * 764;

  //         _text_percentage.html(_progress + "%");

  //         if (_percentage >= _input_percentage) {
  //           _text_percentage.html(
  //             '<tspan x="50%" dy="0em">' +
  //               unchnagedPer +
  //               '% </tspan><tspan  x="50%" dy="1.9em">Your Score</tspan>'
  //           );
  //           clearInterval(_sleep);
  //         } else {
  //           _progress++;

  //           _cir_progress.attr("stroke-dasharray", _percentage + ",764");
  //         }
  //       }
  //     }

  //     function renderBriefChart(correct, total, incorrect) {
  //       var percent = (100 * correct) / total;
  //       if (Math.round(percent) !== percent) {
  //         percent = percent.toFixed(2);
  //       }

  //       totalPieChart(percent, "_cir_progress", correct, incorrect);
  //     }
  //     /*** render chart for result **/
  //     function renderChart(data) {
  //       var ctx = document.getElementById("myChart");
  //       var myChart = new Chart(ctx, {
  //         type: "doughnut",
  //         data: {
  //           labels: [
  //             "Verbal communication",
  //             "Non-verbal communication",
  //             "Written communication",
  //             "Incorrect",
  //           ],
  //           datasets: [
  //             {
  //               data: data,
  //               backgroundColor: ["#e6ded4", "#968089", "#e3c3d4", "#ab4e6b"],
  //               borderColor: [
  //                 "rgba(239, 239, 81, 1)",
  //                 "#8e3407",
  //                 "rgba((239, 239, 81, 1)",
  //                 "#000000",
  //               ],
  //               borderWidth: 1,
  //             },
  //           ],
  //         },
  //         options: {
  //           pieceLabel: {
  //             render: "percentage",
  //             fontColor: "black",
  //             precision: 2,
  //           },
  //         },
  //       });
  //     }

  //     /** List question and your answer and correct answer

  // *****/
  //     function getAllAnswer(results) {
  //       var innerhtml = "";
  //       for (var i = 0; i < results.length; i++) {
  //         var _class = results[i].iscorrect ? "item-correct" : "item-incorrect";
  //         var _classH = results[i].iscorrect ? "h-correct" : "h-incorrect";

  //         var _html =
  //           '<div class="_resultboard ' +
  //           _class +
  //           '">' +
  //           '<div class="_header">' +
  //           results[i].question +
  //           "</div>" +
  //           '<div class="_yourans ' +
  //           _classH +
  //           '">' +
  //           results[i].clicked +
  //           "</div>";

  //         var html = "";
  //         if (!results[i].iscorrect)
  //           html = '<div class="_correct">' + results[i].answer + "</div>";
  //         _html = _html + html + "</div>";
  //         innerhtml += _html;
  //       }

  //       $(".allAnswerBox").html("").append(innerhtml);
  //     }
  //     /** render  Brief Result **/
  //     function renderResult(resultList) {
  //       var results = resultList;
  //       // console.log(results);
  //       var countCorrect = countAnswers(results)[0],
  //         countWrong = countAnswers(results)[1];

  //       renderBriefChart(countCorrect, resultList.length, countWrong);
  //     }

  //     function renderChartResult() {
  //       var results = resultList;
  //       var countCorrect = countAnswers(results)[0],
  //         countWrong = countAnswers(results)[1];
  //       var dataForChart = genResultArray(resultList, countWrong);
  //       renderChart(dataForChart);
  //     }

  //     /** Insert progress bar in html **/
  //     function getProgressindicator(length) {
  //       // console.log(
  //       //   "🚀 ~ file: main.js ~ line 1219 ~ getProgressindicator ~ length",
  //       //   length
  //       // );
  //       var progressbarhtml = " ";
  //       for (var i = 0; i < length; i++) {
  //         progressbarhtml +=
  //           '<div class="my-progress-indicator progress_' +
  //           (i + 1) +
  //           " " +
  //           (i == 0 ? "active" : "") +
  //           '"></div>';
  //       }
  //       $(progressbarhtml).insertAfter(".my-progress-bar");
  //     }

  //     /*** change progress bar when next button is clicked ***/
  //     function changeProgressValue() {
  //       $progressValue += 100 / (quizdata.length - 1);
  //       // console.log(">>>>", quizdata.length);
  //       $(".my-progress")
  //         .find(".my-progress-indicator.active")
  //         .next(".my-progress-indicator")
  //         .addClass("active");
  //       $("progress").val($progressValue);
  //       $(".js-my-progress-completion").html($("progress").val() + "% complete");
  //     }
  //     function addClickedAnswerToResult(questions, presentIndex, clicked) {
  //       var correct = getCorrectAnswer(questions, presentIndex);
  //       var result = {
  //         index: presentIndex,
  //         question: questions[presentIndex].question,
  //         clicked: clicked,
  //         iscorrect: clicked == correct ? true : false,
  //         answer: correct,
  //         category: questions[presentIndex].category,
  //       };
  //       resultList.push(result);

  //       // console.log("result");
  //       // console.log(result);
  //     }

  //     $(document).ready(function () {
  //       var presentIndex = 0;
  //       var clicked = 0;

  //       var questions = generateQuestions();
  //       renderQuiz(questions, presentIndex);
  //       getProgressindicator(questions.length);

  //       $(".answerOptions ").on("click", ".myoptions>input", function (e) {
  //         clicked = $(this).val();
  //         $(this).parent().addClass("active").siblings().removeClass("active");
  //         // $(this).parent().addClass("active");
  //         console.log(">>>> ", $(this));

  //         if (questions.length == presentIndex + 1) {
  //           $("#submit").removeClass("hidden");
  //           $("#next").addClass("hidden");
  //         } else {
  //           $("#next").removeClass("hidden");
  //         }
  //       });

  //       $("#next").on("click", function (e) {
  //         e.preventDefault();
  //         addClickedAnswerToResult(questions, presentIndex, clicked);

  //         $(this).addClass("hidden");

  //         presentIndex++;
  //         renderQuiz(questions, presentIndex);
  //         changeProgressValue();
  //       });

  //       $("#submit").on("click", function (e) {
  //         addClickedAnswerToResult(questions, presentIndex, clicked);
  //         $(".multipleChoiceQues").hide();
  //         $(".resultArea").addClass("active");
  //         $(".quiz-wrapper").addClass("result-active");
  //         renderResult(resultList);
  //       });

  //       $(".resultArea").on("click", ".viewchart", function () {
  //         $(".resultPage2").show();
  //         $(".resultPage1").hide();
  //         $(".resultPage3").hide();
  //         renderChartResult();
  //       });

  //       $(".resultArea").on("click", ".backBtn", function () {
  //         $(".resultPage1").show();
  //         $(".resultPage2").hide();
  //         $(".resultPage3").hide();
  //         renderResult(resultList);
  //       });

  //       $(".resultArea").on("click", ".viewanswer", function () {
  //         $(".resultPage3").show();
  //         $(".resultPage2").hide();
  //         $(".resultPage1").hide();
  //         getAllAnswer(resultList);
  //       });

  //       $(".resultArea").on("click", ".replay", function () {
  //         window.location.reload(true);
  //       });
  //     });
  //   }

  //   if ($(".quiz-wrapper-en")[0]) {
  //     const quizdata = [
  //       {
  //         question: "What pets do you have at home?",
  //         options: ["Cat", "Dog", "Fish", "Rabbit", "Bird"],
  //         answer: "Bird",
  //         name: "question-1",
  //         category: 1,
  //       },
  //       {
  //         question: "How old is your pet now?",
  //         options: [
  //           "1 - 6 Months old",
  //           "6 - 12 Months old",
  //           "1 - 2 Years old",
  //           "Lebih Dari 2 Years old",
  //         ],
  //         answer: "1 - 6 Months old",
  //         name: "question-2",
  //         category: 2,
  //       },
  //       {
  //         question: "How many times a day do you feed them?",
  //         options: ["1 Times", "2 Times", "3 Times", "4 Times"],
  //         answer: "2 Times",
  //         name: "question-3",
  //         category: 3,
  //       },
  //       {
  //         question:
  //           "Are there any habits/interests of your pet that you observe?",
  //         options: [
  //           "Being picky about food",
  //           "Sleeping/laying on certain places",
  //           "Biting / Scratching / Digging Something",
  //           "Likes to Pretend to be Dead",
  //         ],
  //         answer: "Being picky about food",
  //         name: "question-4",
  //         category: 1,
  //       },
  //       {
  //         question: "What kind of food that your pet like the most?",
  //         options: ["Dry Food", "Wet Food", "Snacks"],
  //         answer: "Dry Food",
  //         name: "question-5",
  //         category: 2,
  //       },
  //       // {
  //       //   question:
  //       //     "An expression of disapproval or blame personally addressed to one censured",
  //       //   options: ["Pitiful", "Reproof", "Mutation", "Raillery"],
  //       //   answer: "Reproof",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question: "To deliver an elaborate or formal public speech.",
  //       //   options: ["Orate", "Magician", "Access", "Guzzle"],
  //       //   answer: "Orate",
  //       //   category: 2,
  //       // },
  //       // {
  //       //   question:
  //       //     "A wharf or artificial landing-place on the shore of a harbor or projecting into it",
  //       //   options: ["Intolerable", "Quay", "Fez", "Insatiable"],
  //       //   answer: "Quay",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question:
  //       //     "Friendly counsel given by way of warning and implying caution or reproof",
  //       //   options: ["Credence", "Colloquy", "Abyss", "Monition"],
  //       //   answer: "Monition",
  //       //   category: 1,
  //       // },
  //       // {
  //       //   question: "To make a beginning in some occupation or scheme",
  //       //   options: ["Muster", "Embark", "Ocular", "Apprehensible"],
  //       //   answer: "Ocular",
  //       //   category: 2,
  //       // },
  //       // {
  //       //   question: "Able to reinforce sound by sympathetic vibrations",
  //       //   options: ["Resonance", "Clandestine", "Diffusion", "Quietus"],
  //       //   answer: "Resonance",
  //       //   category: 3,
  //       // },
  //       // {
  //       //   question:
  //       //     "To send off or consign, as to an obscure position or remote destination",
  //       //   options: ["Monolith", "Endurable", "Efficient", "Relegate"],
  //       //   answer: "Relegate",
  //       //   category: 1,
  //       // },
  //     ];

  //     var $progressValue = 0;
  //     var resultList = [];

  //     /** Random shuffle questions **/
  //     function shuffleArray(question) {
  //       var shuffled = question.sort(function () {
  //         return 0.5 - Math.random();
  //       });
  //       return shuffled;
  //     }

  //     function shuffle(a) {
  //       for (var i = a.length; i; i--) {
  //         var j = Math.floor(Math.random() * i);
  //         var _ref = [a[j], a[i - 1]];
  //         a[i - 1] = _ref[0];
  //         a[j] = _ref[1];
  //       }
  //     }

  //     /*** Return shuffled question ***/
  //     function generateQuestions() {
  //       // var questions = shuffleArray(quizdata);
  //       var questions = quizdata;
  //       return questions;
  //     }

  //     /*** Return list of options ***/
  //     function returnOptionList(opts, i, optsName) {
  //       var optionHtml =
  //         '<li class="myoptions">' +
  //         '<input value="' +
  //         opts +
  //         '" name="' +
  //         optsName +
  //         '" type="radio" id="rd_' +
  //         i +
  //         '">' +
  //         '<label for="rd_' +
  //         i +
  //         '">' +
  //         opts +
  //         "</label>" +
  //         '<div class="bullet">' +
  //         '<div class="line zero"></div>' +
  //         '<div class="line one"></div>' +
  //         '<div class="line two"></div>' +
  //         '<div class="line three"></div>' +
  //         '<div class="line four"></div>' +
  //         '<div class="line five"></div>' +
  //         '<div class="line six"></div>' +
  //         '<div class="line seven"></div>' +
  //         "</div>" +
  //         "</li>";

  //       return optionHtml;
  //     }

  //     /** Render Options **/
  //     function renderOptions(optionList, optionName) {
  //       var ulContainer = $("<ul>").attr("id", "optionList");
  //       for (var i = 0, len = optionList.length; i < len; i++) {
  //         var optionContainer = returnOptionList(optionList[i], i, optionName);
  //         ulContainer.append(optionContainer);
  //       }
  //       $(".answerOptions").html("").append(ulContainer);
  //     }

  //     /** Render question **/
  //     function renderQuestion(question) {
  //       $(".question").html("<h6>" + question + "</h6>");
  //     }

  //     /** Render quiz :: Question and option **/
  //     function renderQuiz(questions, index) {
  //       var currentQuest = questions[index];
  //       renderQuestion(currentQuest.question);
  //       renderOptions(currentQuest.options, currentQuest.name);
  //       // console.log("Question");
  //       // console.log(questions[index]);
  //     }

  //     /** Return correct answer of a question ***/
  //     function getCorrectAnswer(questions, index) {
  //       return questions[index].answer;
  //     }

  //     /** pushanswers in array **/
  //     function correctAnswerArray(resultByCat) {
  //       var arrayForChart = [];
  //       for (var i = 0; i < resultByCat.length; i++) {
  //         arrayForChart.push(resultByCat[i].correctanswer);
  //       }

  //       return arrayForChart;
  //     }
  //     /** Generate array for percentage calculation **/
  //     function genResultArray(results, wrong) {
  //       var resultByCat = resultByCategory(results);
  //       var arrayForChart = correctAnswerArray(resultByCat);
  //       arrayForChart.push(wrong);
  //       return arrayForChart;
  //     }

  //     /** percentage Calculation **/
  //     function percentCalculation(array, total) {
  //       var percent = array.map(function (d, i) {
  //         return ((100 * d) / total).toFixed(2);
  //       });
  //       return percent;
  //     }

  //     /*** Get percentage for chart **/
  //     function getPercentage(resultByCat, wrong) {
  //       var totalNumber = resultList.length;
  //       var wrongAnwer = wrong;
  //       //var arrayForChart=genResultArray(resultByCat, wrong);
  //       //return percentCalculation(arrayForChart, totalNumber);
  //     }

  //     /** count right and wrong answer number **/
  //     function countAnswers(results) {
  //       var countCorrect = 0,
  //         countWrong = 0;

  //       for (var i = 0; i < results.length; i++) {
  //         if (results[i].iscorrect == true) countCorrect++;
  //         else countWrong++;
  //       }

  //       return [countCorrect, countWrong];
  //     }

  //     /**** Categorize result *****/
  //     function resultByCategory(results) {
  //       var categoryCount = [];
  //       var ctArray = results.reduce(function (res, value) {
  //         if (!res[value.category]) {
  //           res[value.category] = {
  //             category: value.category,
  //             correctanswer: 0,
  //           };
  //           categoryCount.push(res[value.category]);
  //         }
  //         var val = value.iscorrect == true ? 1 : 0;
  //         res[value.category].correctanswer += val;
  //         return res;
  //       }, {});

  //       categoryCount.sort(function (a, b) {
  //         return a.category - b.category;
  //       });

  //       return categoryCount;
  //     }

  //     /** Total score pie chart**/
  //     function totalPieChart(_upto, _cir_progress_id, _correct, _incorrect) {
  //       $("#" + _cir_progress_id)
  //         .find("._text_incor")
  //         .html("Incorrect : " + _incorrect);
  //       $("#" + _cir_progress_id)
  //         .find("._text_cor")
  //         .html("Correct : " + _correct);

  //       var unchnagedPer = _upto;

  //       _upto = _upto > 100 ? 100 : _upto < 0 ? 0 : _upto;

  //       var _progress = 0;

  //       var _cir_progress = $("#" + _cir_progress_id).find("._cir_P_y");
  //       var _text_percentage = $("#" + _cir_progress_id).find("._cir_Per");

  //       var _input_percentage;
  //       var _percentage;

  //       var _sleep = setInterval(_animateCircle, 25);

  //       function _animateCircle() {
  //         //2*pi*r == 753.6 +xxx=764
  //         _input_percentage = (_upto / 100) * 764;
  //         _percentage = (_progress / 100) * 764;

  //         _text_percentage.html(_progress + "%");

  //         if (_percentage >= _input_percentage) {
  //           _text_percentage.html(
  //             '<tspan x="50%" dy="0em">' +
  //               unchnagedPer +
  //               '% </tspan><tspan  x="50%" dy="1.9em">Your Score</tspan>'
  //           );
  //           clearInterval(_sleep);
  //         } else {
  //           _progress++;

  //           _cir_progress.attr("stroke-dasharray", _percentage + ",764");
  //         }
  //       }
  //     }

  //     function renderBriefChart(correct, total, incorrect) {
  //       var percent = (100 * correct) / total;
  //       if (Math.round(percent) !== percent) {
  //         percent = percent.toFixed(2);
  //       }

  //       totalPieChart(percent, "_cir_progress", correct, incorrect);
  //     }
  //     /*** render chart for result **/
  //     function renderChart(data) {
  //       var ctx = document.getElementById("myChart");
  //       var myChart = new Chart(ctx, {
  //         type: "doughnut",
  //         data: {
  //           labels: [
  //             "Verbal communication",
  //             "Non-verbal communication",
  //             "Written communication",
  //             "Incorrect",
  //           ],
  //           datasets: [
  //             {
  //               data: data,
  //               backgroundColor: ["#e6ded4", "#968089", "#e3c3d4", "#ab4e6b"],
  //               borderColor: [
  //                 "rgba(239, 239, 81, 1)",
  //                 "#8e3407",
  //                 "rgba((239, 239, 81, 1)",
  //                 "#000000",
  //               ],
  //               borderWidth: 1,
  //             },
  //           ],
  //         },
  //         options: {
  //           pieceLabel: {
  //             render: "percentage",
  //             fontColor: "black",
  //             precision: 2,
  //           },
  //         },
  //       });
  //     }

  //     /** List question and your answer and correct answer

  // *****/
  //     function getAllAnswer(results) {
  //       var innerhtml = "";
  //       for (var i = 0; i < results.length; i++) {
  //         var _class = results[i].iscorrect ? "item-correct" : "item-incorrect";
  //         var _classH = results[i].iscorrect ? "h-correct" : "h-incorrect";

  //         var _html =
  //           '<div class="_resultboard ' +
  //           _class +
  //           '">' +
  //           '<div class="_header">' +
  //           results[i].question +
  //           "</div>" +
  //           '<div class="_yourans ' +
  //           _classH +
  //           '">' +
  //           results[i].clicked +
  //           "</div>";

  //         var html = "";
  //         if (!results[i].iscorrect)
  //           html = '<div class="_correct">' + results[i].answer + "</div>";
  //         _html = _html + html + "</div>";
  //         innerhtml += _html;
  //       }

  //       $(".allAnswerBox").html("").append(innerhtml);
  //     }
  //     /** render  Brief Result **/
  //     function renderResult(resultList) {
  //       var results = resultList;
  //       // console.log(results);
  //       var countCorrect = countAnswers(results)[0],
  //         countWrong = countAnswers(results)[1];

  //       renderBriefChart(countCorrect, resultList.length, countWrong);
  //     }

  //     function renderChartResult() {
  //       var results = resultList;
  //       var countCorrect = countAnswers(results)[0],
  //         countWrong = countAnswers(results)[1];
  //       var dataForChart = genResultArray(resultList, countWrong);
  //       renderChart(dataForChart);
  //     }

  //     /** Insert progress bar in html **/
  //     function getProgressindicator(length) {
  //       // console.log(
  //       //   "🚀 ~ file: main.js ~ line 1219 ~ getProgressindicator ~ length",
  //       //   length
  //       // );
  //       var progressbarhtml = " ";
  //       for (var i = 0; i < length; i++) {
  //         progressbarhtml +=
  //           '<div class="my-progress-indicator progress_' +
  //           (i + 1) +
  //           " " +
  //           (i == 0 ? "active" : "") +
  //           '"></div>';
  //       }
  //       $(progressbarhtml).insertAfter(".my-progress-bar");
  //     }

  //     /*** change progress bar when next button is clicked ***/
  //     function changeProgressValue() {
  //       $progressValue += 100 / (quizdata.length - 1);
  //       // console.log(">>>>", quizdata.length);
  //       $(".my-progress")
  //         .find(".my-progress-indicator.active")
  //         .next(".my-progress-indicator")
  //         .addClass("active");
  //       $("progress").val($progressValue);
  //       $(".js-my-progress-completion").html($("progress").val() + "% complete");
  //     }
  //     function addClickedAnswerToResult(questions, presentIndex, clicked) {
  //       var correct = getCorrectAnswer(questions, presentIndex);
  //       var result = {
  //         index: presentIndex,
  //         question: questions[presentIndex].question,
  //         clicked: clicked,
  //         iscorrect: clicked == correct ? true : false,
  //         answer: correct,
  //         category: questions[presentIndex].category,
  //       };
  //       resultList.push(result);

  //       // console.log("result");
  //       // console.log(result);
  //     }

  //     $(document).ready(function () {
  //       var presentIndex = 0;
  //       var clicked = 0;

  //       var questions = generateQuestions();
  //       renderQuiz(questions, presentIndex);
  //       getProgressindicator(questions.length);

  //       $(".answerOptions ").on("click", ".myoptions>input", function (e) {
  //         clicked = $(this).val();
  //         $(this).parent().addClass("active").siblings().removeClass("active");
  //         // $(this).parent().addClass("active");
  //         console.log(">>>> ", $(this));

  //         if (questions.length == presentIndex + 1) {
  //           $("#submit").removeClass("hidden");
  //           $("#next").addClass("hidden");
  //         } else {
  //           $("#next").removeClass("hidden");
  //         }
  //       });

  //       $("#next").on("click", function (e) {
  //         e.preventDefault();
  //         addClickedAnswerToResult(questions, presentIndex, clicked);

  //         $(this).addClass("hidden");

  //         presentIndex++;
  //         renderQuiz(questions, presentIndex);
  //         changeProgressValue();
  //       });

  //       $("#submit").on("click", function (e) {
  //         addClickedAnswerToResult(questions, presentIndex, clicked);
  //         $(".multipleChoiceQues").hide();
  //         $(".resultArea").addClass("active");
  //         $(".quiz-wrapper").addClass("result-active");
  //         renderResult(resultList);
  //       });

  //       $(".resultArea").on("click", ".viewchart", function () {
  //         $(".resultPage2").show();
  //         $(".resultPage1").hide();
  //         $(".resultPage3").hide();
  //         renderChartResult();
  //       });

  //       $(".resultArea").on("click", ".backBtn", function () {
  //         $(".resultPage1").show();
  //         $(".resultPage2").hide();
  //         $(".resultPage3").hide();
  //         renderResult(resultList);
  //       });

  //       $(".resultArea").on("click", ".viewanswer", function () {
  //         $(".resultPage3").show();
  //         $(".resultPage2").hide();
  //         $(".resultPage1").hide();
  //         getAllAnswer(resultList);
  //       });

  //       $(".resultArea").on("click", ".replay", function () {
  //         window.location.reload(true);
  //       });
  //     });
  //   }

  // var url = new URL(window.location.href);
  // console.log("🚀 ~ file: main.js ~ line 752 ~ url", url["host"]);
  // if (url["host"] != "127.0.0.1:8000") {
  //   $(".make_transition#index").data("transition-to", "/PCI-landing");
  // }
});

$.fn.watch = function (props, func, interval, id) {
  /// <summary>
  /// Allows you to monitor changes in a specific
  /// CSS property of an element by polling the value.
  /// when the value changes a function is called.
  /// The function called is called in the context
  /// of the selected element (ie. this)
  /// </summary>
  /// <param name="prop" type="String">CSS Property to watch. If not specified (null) code is called on interval</param>
  /// <param name="func" type="Function">
  /// Function called when the value has changed.
  /// </param>
  /// <param name="func" type="Function">
  /// optional id that identifies this watch instance. Use if
  /// if you have multiple properties you're watching.
  /// </param>
  /// <param name="id" type="String">A unique ID that identifies this watch instance on this element</param>
  /// <returns type="jQuery" />
  if (!interval) interval = 200;
  if (!id) id = "_watcher";

  return this.each(function () {
    var _t = this;
    var el = $(this);
    var fnc = function () {
      __watcher.call(_t, id);
    };
    var itId = null;

    if (typeof this.onpropertychange == "object")
      el.bind("propertychange." + id, fnc);
    else itId = setInterval(fnc, interval);

    var data = { id: itId, props: props.split(","), func: func, vals: [] };
    $.each(data.props, function (i) {
      data.vals[i] = el.css(data.props[i]);
    });
    el.data(id, data);
  });

  function __watcher(id) {
    var el = $(this);
    var w = el.data(id);

    var changed = false;
    var i = 0;
    for (i; i < w.props.length; i++) {
      var newVal = el.css(w.props[i]);
      if (w.vals[i] != newVal) {
        w.vals[i] = newVal;
        changed = true;
        break;
      }
    }
    if (changed && w.func) {
      var _t = this;
      w.func.call(_t, w, i);
    }
  }
};
$.fn.unwatch = function (id) {
  this.each(function () {
    var w = $(this).data(id);
    var el = $(this);
    el.removeData();

    if (typeof this.onpropertychange == "object")
      el.unbind("propertychange." + id, fnc);
    else clearInterval(w.id);
  });
  return this;
};
