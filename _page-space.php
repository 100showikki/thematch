<?php get_header(); ?>


  <div id="content">

    <ul>
    <?php
      $args = array(
        'post_type' => 'space_post',
        'posts_per_page' => -1
      );
      $query = new WP_Query($args);
      while($query->have_posts()): $query->the_post();
    ?>

      <?php if( display_role_check() ): ?>
        <li>[閲覧OK] [<?php echo redirect_check(); ?>] <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php else: ?>
        <li>[閲覧NG] [<?php echo redirect_check(); ?>] <?php the_title(); ?></li>
      <?php endif; ?>


    <?php
      endwhile;
      wp_reset_postdata();
    ?>
    </ul>

  </div>

<?php get_footer(); ?>
