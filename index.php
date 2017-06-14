index
<?php get_header(); ?>


  <div id="content">

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
      <article id="article">
        <h1><?php the_title(); ?></h1>

          <div>
            <?php the_content(); ?>
          </div>

      </article>
    <?php endwhile; endif; ?>

  </div>

<?php get_footer(); ?>
