terashimaブランチで作業しました。
<?php get_header(); ?>
<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
<?php
$thumbnail_id = get_post_thumbnail_id();
$eye_img = wp_get_attachment_image_src( $thumbnail_id ,'column_detail_photo' );
?>

  <article>

		<div id="column_list">
			<div class="inner clearfix">
				<div id="main_column" class="mh">

					<span class="date"><?php the_time('Y.m.d'); ?></span>
					<span class="category"><?php $cat= get_the_category(); echo $cat[0]->cat_name; ?></span>
					<h2><?php the_title(); ?></h2>
          <div class="editor">
            <div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/staff-img/<?php the_author_login(); ?>.png" alt=""></div>
            <?php the_author(); ?>
          </div>


<?php /*
					<div class="eyecatch">
						<img src="<?php echo $eye_img[0]; ?>" alt="">
					</div>
*/ ?>

					<div id="article_body">
						<?php the_content(); ?>
					</div>


					<div id="editor_data">
						<div class="editor">
							<div class="row">
	              <div class="cell"><div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/staff-img/<?php the_author_login(); ?>.png" alt=""></div></div>
	              <div class="name"><?php the_author(); ?></div>
								
							</div>
						</div>
						<div class="plofile">
							<h3>この記事を書いた人</h3>
              <?php the_author_meta('description'); ?>
						</div>
					</div>


					<nav id="prev_next">
						<ul class="clearfix">
              <li><?php previous_post_link('%link', 'NEXT ▶'); ?></li>
              <li><?php next_post_link('%link', '◀ PREV'); ?></li>
						</ul>
					</nav>
				</div>

        <?php get_sidebar(); ?>

			</div>
		</div>
	</article>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
