<?php get_header(); ?>

<article id="project">

	<section id="post_list" class="case">

		<?php
		$i = 0;
		  $args = array(
				'post_type' => 'project_post',
				'posts_per_page' => 5,
				'order' => 'ASC'
			);
		  $query = new WP_Query($args);
		  while($query->have_posts()): $query->the_post();

			$title = explode("_", the_title('','',false) );
		?>

		<div class="one_post">
			<div class="wrap clearfix mh">
				<div class="wrap2">
					<div class="inner">
						<div class="clearfix pb40">
							<div class="right">
								<div class="case_number">CASE<span><?php echo $title[0]; ?></span></div>
							</div><!-- .right -->
							<div class="left">
								<h2><?php echo $title[1]; ?></h2>

								<?php $text_size = ( $i <= 0 || $i >= 3 ) ? 170 : 130; ?>

								<div class="sp-hide"><?php echo rollup_text( get_post_meta( get_the_ID(),'lead_text',true),$text_size); ?></div>
								<div class="pc-hide"><?php echo rollup_text( get_post_meta( get_the_ID(),'lead_text',true),70); ?></div>

							</div><!-- .left -->
						</div>
					</div><!-- .inner -->
					<div class="photo">
						<a href="<?php the_permalink(); ?>" class="thumbnail">
							<?php
							$thumbnail_id = get_post_thumbnail_id();
							$thumb_size = ( $i == 0 ) ? "project_large_photo" : "project_small_photo";
							$eye_img = wp_get_attachment_image_src( $thumbnail_id , $thumb_size );
							?>
							<img src="<?php echo $eye_img[0]; ?>" alt="">
						</a>
					</div>
					<div class="button"><a href="<?php the_permalink(); ?>">MORE</a></div>
				</div><!-- .wrap2 -->
			</div><!-- .wrap -->
		</div><!-- .one_post -->

		<?php
			$i++;
		  endwhile;
		  wp_reset_postdata();
		?>

<!--
			<div id="next10">
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/images/pages/project/next_10.png" alt="next 10 project" class="sp-hide">
					<img src="<?php echo get_template_directory_uri(); ?>/images/pages/project/sp_next_10.png" alt="next 10 project" width="96" class="pc-hide">
				</a>
			</div>
-->
	</section><!-- #post_list -->

</article>

<?php get_footer(); ?>
