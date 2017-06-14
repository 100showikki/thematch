<?php get_header(); ?>


  <div id="content">

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

      <?php
        $slug = get_page($post->ID)->post_name;
      ?>

      <?php if( locate_template('content/content-'.$slug.'.php') != "" ): ?>
        <?php get_template_part('content/content',$slug); ?>
      <?php else: ?>
        <?php the_content(); ?>
      <?php endif; ?>

    <?php endwhile; endif; ?>

  </div>

<?php get_footer(); ?>
