<?php get_header(); ?>

<article>

  <div id="column_list">
    <div class="inner clearfix">
      <div id="main_column" class="mh">

        <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged
          );
          $query = new WP_Query($args);
          while($query->have_posts()): $query->the_post();

          $thumbnail_id = get_post_thumbnail_id();
          $eye_img = wp_get_attachment_image_src( $thumbnail_id ,'column_list_photo' );
        ?>

        <a href="<?php the_permalink(); ?>" class="box clearfix">
          <div class="text">
            <span class="date"><?php the_time('Y.m.d'); ?></span>
            <span class="category"><?php $cat= get_the_category(); echo $cat[0]->cat_name; ?></span>
            <h2><?php the_title(); ?></h2>
            <div class="editor">
              <div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/staff-img/<?php the_author_login(); ?>.png" alt=""></div>
              <?php the_author(); ?>
            </div>
          </div>
          <div class="thumbnail">
            <img src="<?php echo $eye_img[0]; ?>" alt="">
          </div>
        </a>

        <?php endwhile; ?>

        <!--ページャー-->

        <nav id="pager">

          <span class="next"><?php previous_posts_link( 'PREV ◀' ); ?></span>

          <?php
          global $wp_rewrite; $paginate_base = get_pagenum_link(1);
          if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
            $paginate_format = '';
            $paginate_base = add_query_arg('paged','%#%');
          } else {
            $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/','paged');;
            $paginate_base .= '%_%';
          }
          echo paginate_links(array(
            'base' => $paginate_base,
            'format' => $paginate_format,
            'total' => $query->max_num_pages,
            'mid_size' => 5,
            'current' => ($paged ? $paged : 1),
            'prev_next' => false,
            'type' => 'list'
          ));
          ?>
          <span class="prev"><?php next_posts_link( '▶ NEXT', $query->max_num_pages ); ?></span>

        </nav>

        <?php wp_reset_postdata(); ?>

      </div>

      <?php get_sidebar(); ?>

    </div>
  </div>
</article>

<?php get_footer(); ?>
