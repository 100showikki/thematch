<?php get_header(); ?>


<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
<?php $title = explode("_", the_title('','',false) ); ?>

<article id="project_detail">

  <section id="case<?php echo $title[0]; ?>" class="case">
      <div class="first">
        <div class="inner">
          <div class="clearfix pb40">
            <div class="right">
              <div class="case_number">CASE<span><?php echo $title[0]; ?></span></div>
            </div><!-- .right -->
            <div class="left">
              <h2 class="mb30"><?php echo $title[1]; ?></h2>
              <?php echo get_post_meta( get_the_ID(),'lead_text',true); ?>
            </div><!-- .left -->
          </div>
        </div><!-- .inner -->
        <div class="photo">

          <?php
          $thumbnail_id = get_post_thumbnail_id();
          $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'project_large_photo' );
          ?>
          <img src="<?php echo $eye_img[0]; ?>" alt="">
        </div>

      </div>

      <?php the_content(); ?>

  </section><!-- #case01 -->


</article>



    <?php endwhile; endif; ?>
<?php get_footer(); ?>
