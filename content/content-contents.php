<?php
  $nonce = $_REQUEST['search_nonce'];
  if( wp_verify_nonce($nonce, 'search_nonce') && isset($_GET['c']) ) {
    $content_keyword = $_GET['c'];
  }
?>

<?php get_header(); ?>

<article>
  <section id="pickup_post">

    <div class="inner">

      <?php
        $args = array(
          'post_type' => 'contents_post',
          'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        while($query->have_posts()): $query->the_post();
      ?>

      <div class="container clearfix">
        <div class="title">
          <div class="sub_title"><?php echo get_post_meta( get_the_ID(),'sub_title',true ); ?></div>
          <h2><?php the_title(); ?></h2>
          <p><?php echo get_post_meta( get_the_ID(),'short_lead_text',true ); ?></p>

          <a href="<?php the_permalink(); ?>">詳細はこちら</a>
        </div>
        <div class="movie">
<?php if( get_post_meta(get_the_ID(),'main_movie',true) ): ?>
          <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(),'main_movie',true ); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<?php else: ?>
          <?php the_post_thumbnail( 'full'); ?>
<?php endif; ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="pc-hide">詳細はこちら</a>
      </div>

      <?php
        endwhile;
        wp_reset_postdata();
      ?>

    </div>
  </section>

  <!-- 20170207 追加 -->
  <div id="cc" style="margin-top:-60px;padding-top:60px;display: block;"></div>
  <div id="c_category">
    <div class="inner">
      <dl>
        <dt>Category</dt>
        <dd>

          <ul class="clearfix">

            <li><a href="<?php echo home_url(); ?>/contents/#cc">ALL</a></li><!--
            <?php
              $term = get_categories( array('taxonomy'=>'contents_category') );
              foreach( $term as $t ):
            ?>
            --><li><a href="<?php echo home_url(); ?>/contents/?c=<?php echo $t->slug; ?>&search_nonce=<?php echo wp_create_nonce('search_nonce'); ?>#cc"><?php echo $t->name; ?></a></li><!--
            <?php endforeach; ?>
-->
          </ul>

        </dd>
      </dl>
    </div>
  </div>
  <!-- 20170207 追加 ここまで -->


  <div id="other_post">
    <div class="inner clearfix">

      <?php
        $args = array(
          'post_type' => 'contents_post',
          'posts_per_page' => -1
        );

        if($content_keyword) {
          $args += array(
            'tax_query' => array(
              array(
                'taxonomy' => 'contents_category',
                'field' => 'slug',
                'terms' => $content_keyword
              )
            )
          );
        }

        $query = new WP_Query($args);
        while($query->have_posts()): $query->the_post();
      ?>

<div class="box mh">
  <a href="<?php the_permalink(); ?>" class="thumbnail movie">
    <?php $eye_catch_img = role_display_check( get_post_meta(get_the_ID(),'role_display_check', true) ); ?>
    <img src="<?php echo $eye_catch_img; ?>" alt="">
  </a>
  <h3><?php the_title(); ?></h3>
  <div class="claerfix">
    <div class="link">
      <a href="<?php the_permalink(); ?>">詳細はこちら 〉</a>
    </div>
    <div class="category">

      <?php
        $terms = get_the_terms(get_the_ID(),'contents_category');

        if( is_array($terms) ):
        foreach( $terms as $t ):
      ?>
      <a href="<?php echo home_url(); ?>/contents/?c=<?php echo $t->slug; ?>&search_nonce=<?php echo wp_create_nonce('search_nonce'); ?>#cc"><?php echo $t->name; ?></a>
      <?php
        endforeach;
        else:
      ?>
      <span style="font-size: 12px;">カテゴリー指定なし</span>
      <?php
        endif;
      ?>
      <?php// echo get_the_term_list( $post->ID, 'contents_category' ); ?>
    </div>
  </div>
</div>

      <?php
        endwhile;
        wp_reset_postdata();
      ?>



    </div>
  </div>
</article>

<?php get_footer(); ?>
