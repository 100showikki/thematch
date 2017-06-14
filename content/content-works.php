<?php get_header(); ?>

<article>


  <div id="works_post_list">
    <div class="inner clearfix">

      <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if( is_user_logged_in() ) { //ログイン済
          $args = array(
            'post_type' => 'works_post',
            'posts_per_page' => 10,
            'paged' => $paged
          );
        } else { //ログインしていない
          $args = array(
            'post_type' => 'works_post',
            'posts_per_page' => 10,
            'meta_key' => 'role_display_check',
            'meta_value' => 0,
            'paged' => $paged
          );
        }

        $query = new WP_Query($args);
        if($query->have_posts()):
        while($query->have_posts()): $query->the_post();

        $img01 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_01',true),'works_thumbnail');
        $img02 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_02',true),'works_thumbnail');
        $img03 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_03',true),'works_thumbnail');
      ?>

      <section class="works_post">

        <div class="clearfix">
          <?php if( $img01 ): ?><img src="<?php echo $img01[0]; ?>" alt=""><?php endif; ?>
          <?php if( $img02 ): ?><img src="<?php echo $img02[0]; ?>" alt=""><?php endif; ?>
          <?php if( $img03 ): ?><img src="<?php echo $img03[0]; ?>" alt=""><?php endif; ?>
        </div>

        <p class="works_date"><?php echo get_post_meta( get_the_ID(),'works_date',true); ?></p>
        <h3><?php the_title(); ?></h3>
        <div><?php echo get_post_meta( get_the_ID(),'works_text',true); ?></div>
      </section>

      <?php endwhile; ?>

      <div id="pageingBox" class="clearfix">
        <span class="nextBtn"><?php next_posts_link( '前の記事へ', $query->max_num_pages ); ?></span>
        <span class="prevBtn"><?php previous_posts_link( '次の記事へ' ); ?></span>
      </div>

      <?php endif; ?>
      <?php wp_reset_postdata(); ?>



    </div>
  </div>

</article>

<?php get_footer(); ?>
