<?php get_header(); ?>

<article>

  <?php if( get_post_meta( get_the_id(),'display_roles',true) <= current_user_role()->no  ): ?>

  <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

  <section id="search_container">

    <div class="inner">
      <div class="first">
        <h2><?php the_title(); ?></h2>

        <?php if( get_post_meta(get_the_ID(),'space_name',true) ): ?>
        <h2><?php echo get_post_meta(get_the_ID(),'space_name',true); ?></h2>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'lead_text',true) != "" ): ?>
        <p><?php echo get_post_meta( get_the_ID(),'lead_text',true); ?></p>
        <?php endif; ?>

        <?php
        $thumbnail_id = get_post_thumbnail_id();
        $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'space_first_mainphoto' );
        ?>
        <div class="tac"><img src="<?php echo $eye_img[0]; ?>" alt=""></div>

      </div>

    </div>
  </section>

  <div id="address">
    <div class="inner clearfix">

      <?php if( get_post_meta(get_the_ID(),'map_address',true) != "" ): ?>
      <div id="map" style="height:450px;"></div>
      <?php endif; ?>

      <div id="data">

        <?php if( get_post_meta(get_the_ID(),'map_address',true) != "" ): ?>
        <dl>
          <dt>住所</dt>
          <dd id="mapAddress"><?php echo get_post_meta(get_the_ID(),'map_address',true); ?></dd>
        </dl>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'venue_area_select',true) != "" ): ?>
        <dl>
          <dt>会場面積</dt>
          <dd>
            <?php echo venue_area_name( get_post_meta(get_the_ID(),'venue_area_select',true) ); ?>
          </dd>
        </dl>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'venue_area_text',true) != "" ): ?>
        <dl>
          <dt>会場面積説明</dt>
          <dd>
            <?php echo get_post_meta(get_the_ID(), 'venue_area_text', true); ?>
          </dd>
        </dl>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'capacity',true) != "" ): ?>
        <dl>
          <dt>収容人数</dt>
          <dd><?php echo get_post_meta(get_the_ID(), 'capacity', true); ?></dd>
        </dl>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'visitors',true) != "" ): ?>
        <dl>
          <dt>来場者</dt>
          <dd><?php echo get_post_meta(get_the_ID(), 'visitors', true); ?></dd>
        </dl>
        <?php endif; ?>

        <?php if( current_user_role()->no >= 3 ): ?>

        <?php if( get_post_meta(get_the_ID(),'other_result',true) != "" ): ?>
        <dl>
          <dt>他社実績</dt>
          <dd><?php echo get_post_meta(get_the_ID(), 'other_result', true); ?></dd>
        </dl>
        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'cost',true) != "" ): ?>
        <dl>
          <dt>概算の費用</dt>
          <dd><?php echo get_post_meta(get_the_ID(), 'cost', true); ?></dd>
        </dl>
        <?php endif; ?>

        <?php endif; ?>

        <?php if( get_post_meta(get_the_ID(),'option',true) != "" ): ?>
        <dl>
          <dt>設備・オプション</dt>
          <dd>

            <?php
            $arr = array();
            $data = array();
            $html = "";
            $i = 0;
            $pages = get_posts(
              array(
                'posts_per_page' => -1,
                'post_type' => 'page',
                'pagename' => 'tstd_option_page'
              )
            );
            foreach( $pages as $p ) {
              $data = explode(',',$p->post_content);
            }
            foreach( $data as $value ) {
              $v = explode(':',$value);

              $arr = $arr + array($v[0] => $v[1]);

            }
            wp_reset_postdata();
            ?>
            <?php
              $op = get_post_meta(get_the_ID(), 'option');
              $op = array_filter($op,'strlen');

              $html = "";
              foreach( $op as $o ) {
                $html .= $arr[$o]."、";
              }

              echo mb_substr($html, 0, -1, 'utf-8');
            ?>
          </dd>
        </dl>
        <?php endif; ?>

      </div>
    </div>

    <?php
      $documentId = get_post_meta(get_the_ID(), 'document', true);
      $documentPath = wp_get_attachment_url($documentId);
    ?>

    <?php if( $documentPath != "" ): ?>
    <div class="button">
      <a href="<?php echo $documentPath; ?>" target="_blank">添付資料</a>
    </div>
    <?php endif; ?>


  </div><!-- #address -->


  <?php if( get_post_meta(get_the_ID(), 'free_text', true) != "" ): ?>
  <div id="outline">
    <div class="inner clearfix">
      <div class="text">
        <?php echo get_post_meta(get_the_ID(), 'free_text', true); ?>
      </div>
    </div>
  </div><!-- #outline -->
  <?php endif; ?>

  <?php if( get_post_meta(get_the_ID(), 'space_photo', true) != "" ): ?>
  <div id="other_post">
    <h2>SPACE GALLERY</h2>
    <div class="inner clearfix">
      <?php
        $space_gallery = get_post_meta(get_the_ID(), 'space_photo');
        foreach( $space_gallery as $sg ):
        $large = wp_get_attachment_image_src( $sg , 'space_venue_photo' );
        $thumb = wp_get_attachment_image_src( $sg , 'space_list_photo' );
      ?>
      <div class="box mh">
        <a href="<?php echo $large[0]; ?>" data-lightbox="image-1" class="thumbnail movie">
          <img src="<?php echo $thumb[0]; ?>" alt="">
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php
    $map_pref = get_post_meta(get_the_ID(), 'map_pref', true);
    $spaceId = get_the_ID();
  ?>
  <?php endwhile; endif; ?>

  <section id="other_space">
    <h2>OTHER SPACE</h2>


      <?php
        $args = array(
          'post_type' => 'space_post',
          'posts_per_page' => 8,

          'meta_query' => array(
            array(
              'key' => 'map_pref',
              'value' => $map_pref,
              'compare' => '='
            ),
            array(
              'key' => 'display_roles',
              'value' => current_user_role()->no,
              'compare' => '<=',
              'type' => 'NUMERIC'
            )
          ),
          'post__not_in' => array($spaceId)
        );
        $query = new WP_Query($args);
        if($query->have_posts()):
      ?>

      <div class="slide clearfix">
      <?php while($query->have_posts()): $query->the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id();
      $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'other_space_list' );
      ?>

      <div>
        <a href="<?php the_permalink(); ?>">
          <div class="thumbnail"><img src="<?php echo $eye_img[0]; ?>" alt=""></div>
        </a><br>
        <div class="title"><?php the_title(); ?></div>
      </div>

      <?php endwhile; ?>
      </div>
      <?php else: ?>
        <p style="text-align:center;font-size:14px;padding:20px 0;">関連SPACEは見つかりませんでした</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>


  </section>
  <div id="back" class="button">
    <a href="<?php echo home_url(); ?>/space/">一覧へ戻る</a>
  </div>


  <?php else: ?>
    <div id="restriction">
      <p>こちらのページはお得意様限定表示にさせて頂いております。<br>あらかじめご了承ください。</p>
      <p id="toContact"><a href="<?php echo home_url(); ?>/#contact-form">お問合せはこちら</a></p>

      <p id="toMore"><a href="<?php echo home_url(); ?>/space/">一覧へ戻る</a></p>
    </div>
  <?php endif; ?>

</article>

<?php get_footer(); ?>
