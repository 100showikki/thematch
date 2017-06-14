<section id="other_project">
  <div class="inner">
    <h2>OTHER PROJECT</h2>
    <div class="clearfix">
      <div class="service mh clearfix">
        <div class="photo">
          <a href="<?php bloginfo('url'); ?>/project_post/pop-up-store-produce/"><img src="<?php echo get_template_directory_uri(); ?>/images/other01.jpg" alt=""></a>
        </div>
        <div class="text">
          CASE.01<br>
          <a href="<?php bloginfo('url'); ?>/project_post/pop-up-store-produce/">POP UP STORE PRODUCE.</a>
        </div>
      </div>
      <div class="service mh clearfix">
        <div class="photo">
          <a href="<?php bloginfo('url'); ?>/project_post/moving-car-store-produce/"><img src="<?php echo get_template_directory_uri(); ?>/images/other02.jpg" alt=""></a>
        </div>
        <div class="text">
          CASE.02<br>
          <a href="<?php bloginfo('url'); ?>/project_post/moving-car-store-produce/">MOVING CAR STORE PRODUCE.</a>
        </div>
      </div>
      <div class="service mh clearfix">
        <div class="photo">
          <a href="<?php bloginfo('url'); ?>/project_post/intra-company-marketing-produce/"><img src="<?php echo get_template_directory_uri(); ?>/images/other03.jpg" alt=""></a>
        </div>
        <div class="text">
          CASE.03<br>
          <a href="<?php bloginfo('url'); ?>/project_post/intra-company-marketing-produce/">INTRA-COMPANY MARKETING PRODUCE.</a>
        </div>
      </div>
      <div class="service mh clearfix">
        <div class="photo">
          <a href="<?php bloginfo('url'); ?>/project_post/04_sports-produce/"><img src="<?php echo get_template_directory_uri(); ?>/images/other04.jpg" alt=""></a>
        </div>
        <div class="text">
          CASE.04<br>
          <a href="<?php bloginfo('url'); ?>/project_post/04_sports-produce/">SPORTS PRODUCE.</a>
        </div>
      </div>
    </div>
  </div>
</section>
</div><!-- #container -->

<footer>

	<div class="fnavi_container">
		<nav class="nav1 sp-hide">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>/project">PROJECT</a></li>
				<li><a href="<?php bloginfo('url'); ?>/works">WORKS</a></li>
				<li><a href="<?php bloginfo('url'); ?>/column">COLUMN</a></li>
				<li><a href="<?php bloginfo('url'); ?>#partner">PARTNER</a></li>
				<li><a href="<?php bloginfo('url'); ?>/space">SPACE</a></li>
			</ul>
		</nav>
		<img src="<?php echo get_template_directory_uri(); ?>/images/copyright.png" alt="copyright">
		<nav class="nav2 sp-hide">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>/contents">CONTENTS</a></li>
				<li><a href="https://www.wantedly.com/companies/t-standard/projects" target="_blank">RECRUIT</a></li>
				<li><a href="<?php bloginfo('url'); ?>#company-profile">COMPANY</a></li>
				<li><a href="<?php bloginfo('url'); ?>#contact-form">CONTACT</a></li>
			</ul>
		</nav>
	</div>
</footer>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.common.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>

<script>

$(function() {
  if( $(".wpcf7-response-output").text() == "ありがとうございます。メッセージは送信されました。" ) {
    ga('send', 'event', 'ContactForm', 'submit');
    console.log("submit ok");
  }
});
</script>

<?php if( $post->post_type == "contents_post" || $post->post_type == "partner_post" ): ?>
	<script>
	$('.slide').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		centerMode: true,
		responsive: [
			{
				breakpoint: 1050,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
				}
			}
		]
	});
	$('.bihin').slick({
		autoplay: false,
		autoplaySpeed: 2000,
		arrows: false,
		dots: true,
		fade: true,
	});
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css">
	<script>
	    lightbox.option({
	      'showImageNumberLabel': false
	    })
	</script>

<?php endif; ?>

<?php if(is_page('contents') || is_page('partner')): ?>
	<script>
	$('#pickup_post .inner').slick({
		autoplay: false,
	});
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css">
	<script>
	    lightbox.option({
	      'showImageNumberLabel': false
	    });
			$('#c_category dt').on("click", function() {
	        $(this).next().stop().slideToggle();
	        $(this).toggleClass('open');
	    });
	</script>
<?php endif; ?>

<?php if( $post->post_type == "space_post" ): ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css">
<script>
/*$('.slide').slick({
	slidesToShow: 5,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
	arrows: false,
	centerMode: true,
	responsive: [
		{
			breakpoint: 1050,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
			}
		}
	]
});*/
</script>
<script>
lightbox.option({
  'showImageNumberLabel': false
});

function initMap() {
	var geocoder = new google.maps.Geocoder();
	var address = $("#mapAddress").text();
	geocoder.geocode({'address': address}, function(results, status) {
		if( status === google.maps.GeocoderStatus.OK) {
			var myLatLng = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()};
			var map = new google.maps.Map(document.getElementById('map'), {
				center: myLatLng,
				scrollwheel: false,
				zoom: 18
			});
			var marker = new google.maps.Marker({
				map: map,
				position: myLatLng
			});
		} else {
		}
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdznupF49qGM49k6-h9bH2TRx1kHT0Yjg&callback=initMap" async defer></script>
<?php endif; ?>


<?php if( is_home() ): ?>
<script>
$('#mainvisual_new #slide').slick({
	autoplay: true,
	autoplaySpeed:4000,
	centerMode: true,
	slidesToShow: 1,
	variableWidth: true,
	responsive: [
		{
			breakpoint: 1050,
			settings: {
				variableWidth: false,
				centerMode: false,
			}
		}
	]

});
$('#project .slide').slick({
	autoplay: false,

});
$('#works .inner').slick({
	autoplay: false,
});
$('#space_slide, #space_slide_sp').slick({
	cssEase: 'linear',
	autoplay: true,
	speed: 30000,
	autoplaySpeed: 0,
	dots: false,
	arrows: false,
});

</script>

<?php elseif(is_page('space')): ?>
<script>
$('dt').on("click", function() {
    $(this).next().slideToggle();
    $('#search_container').toggleClass('padding');
});

</script>


<?php elseif(is_single() && $post->post_type == "project_post"): ?>
	<script>
	$('.one_stop_matching').slick({
		slidesToShow: 11,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		responsive: [
			{
				breakpoint: 1800,
				settings: {
					slidesToShow: 9,
				}
			},
			{
				breakpoint: 1600,
				settings: {
					slidesToShow: 8,
				}
			},
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 7,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 7,
				}
			},
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 6,
				}
			},
			{
				breakpoint: 1000,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
				}
			}
		]
	});
	</script>


<?php elseif(is_page('about')): ?>
<script>
$('#about_mainvisual #slide').slick({
	autoplay: true,
	autoplaySpeed: 4000,
	arrows: false,
	fade: true
});
	$('.one_stop_matching').slick({
		slidesToShow: 11,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		responsive: [
			{
				breakpoint: 1800,
				settings: {
					slidesToShow: 9,
				}
			},
			{
				breakpoint: 1600,
				settings: {
					slidesToShow: 8,
				}
			},
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 7,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 7,
				}
			},
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 6,
				}
			},
			{
				breakpoint: 1000,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
				}
			}
		]
	});
</script>


<?php elseif(is_page('column') || is_singular( 'post' ) || is_author() || is_category()): ?>
	<style>
	@media screen and (max-width: 767px) {
		#container {
			z-index: inherit;
		}
		#column_list > .inner #sub_column {
			width: 100%;
			padding: 50px 10%;
			top: 0;
			left: 100%;
			right: 0;
			bottom: 0;
			overflow-y: scroll;
			z-index: 300;
			background: rgba(233, 231, 230, 0.9);
			display: block;
			max-height: 100%;
			box-sizing: border-box;
			transition: 0.5s;
			opacity: 0;
		}
		#column_list #sub_column .widget_box:last-child {
			margin-bottom: 0;
		}
		.sideOpen #column_list > .inner #sub_column {
			opacity: 1;
			left: 0;
		}
		#subClose {
		  height: 30px;
		  position: absolute;
		  right: 15px;
		  top: 12px;
		  width: 30px;
		}
		#subClose::before,
		#subClose::after {
		  background: #000;
		  content: "";
		  height: 1px;
		  left: 0;
		  position: absolute;
		  top: 50%;
		  width: 100%;
		}
		#subClose::before {
		  transform: rotate(45deg);
		}
		#subClose::after {
		  transform: rotate(-45deg);
		}


	}
	</style>
	<script>
	$(function () {
	  var $body = $('body');
	  $('#sp_menuopen').on('click', function () {
			$body.addClass("sideOpen");
	  });
		$('#subClose').on('click', function () {
			$body.removeClass("sideOpen");
	  });
	});
	// SP版サブカラムの追従
	$(function($) {
		var tab = $('#sp_menuopen'),
	    offset = tab.offset();
		$(window).scroll(function () {
			  if($(window).scrollTop() + 61 > offset.top) {
			    tab.addClass('fixed');
			  } else {
			    tab.removeClass('fixed');
			  }
			  if ($(this).scrollTop() > 8580) {
			    tab.addClass('fixed2');
			  } else {
			    tab.removeClass('fixed2');
				}
			});
		});


	</script>

<?php endif; ?>



</body>
</html>
