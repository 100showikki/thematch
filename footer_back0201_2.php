</div><!-- #container -->

<footer>
	<img src="<?php echo get_template_directory_uri(); ?>/images/copyright.png" alt="copyright">
</footer>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.common.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>

<?php if( $post->post_type == "contents_post" ): ?>
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
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css">
	<script>
	    lightbox.option({
	      'showImageNumberLabel': false
	    })
	</script>

<?php endif; ?>

<?php if(is_page('contents')): ?>
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
	    })
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
</script>


<?php elseif(is_page('column') || is_singular( 'post' )): ?>
	<script>
	$(function () {
	  var $body = $('body');
	  $('#sp_menuopen').on('click', function () {
//	    $body.toggleClass('side-open');
			$body.toggleClass('sideOpen');
	  });
	});

	// SP版サブカラムの追従
	$(function($) {
		var tab = $('#sp_menuopen'),
			sub = $('#sub_column'),
	    offset = tab.offset();

		$(window).scroll(function () {
			  if($(window).scrollTop() + 61 > offset.top) {
			    tab.addClass('fixed');
					sub.addClass('fixed');
					$("body").addClass('fixedBody');
			  } else {
			    tab.removeClass('fixed');
					sub.removeClass('fixed');
					$("body").removeClass('fixedBody');
			  }
			  if ($(this).scrollTop() > 8580) {
			    tab.addClass('fixed2');
			  } else {
			    tab.removeClass('fixed2');
				}
			});
	});

	</script>
	<style>
	@media screen and (max-width: 767px) {
	#column_list > .inner #sub_column {
		top: 0;
		max-height: 100%;
		margin: 0;
		z-index: 100;
		position: absolute;
		background: #e9e7e6;
		display: block;
		padding: 0;
		width: 100%;
	}
	.fixedBody #column_list > .inner #sub_column {
		position: fixed;
		top: 60px;
	}

	.sideOpen #main_column,
	.sideOpen footer {
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
		transition-duration:0.5s;
	}
	#main_column,
	footer {
		transition-duration:0.5s;
	}

	.sideOpen #container #sub_column {
		transform: translate3d(0, 0, 0);
		transition-duration:0.5s;
		transition-property: left;
		display: block;
	}
	#container #sub_column  {
		-webkit-transform: translate3d(100%, 0, 0);
		transform: translate3d(200%, 0, 0);
		transition-duration:0.5s;
	}


	}
	</style>


<?php endif; ?>



</body>
</html>
