<?php get_header(); ?>


<?php if( get_post_meta( get_the_id(),'role_display_check',true) == 0 || is_user_logged_in() ): ?>


<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
<article id="contents_detail">
  <section id="sec01">
      <div class="inner">
        <div class="title">
          <div class="sub_title"><?php echo get_post_meta( get_the_ID(),'sub_title',true ); ?></div>
          <h2><?php the_title(); ?></h2>
        </div>

        <?php if( get_post_meta(get_the_ID(),'main_movie',true) ): ?>
        <div class="movie">
          <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(),'main_movie',true); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <?php else: ?>
        <div class="movie">
          <?php the_post_thumbnail( 'full'); ?>
        </div>
        <?php endif; ?>
        <?php echo get_post_meta(get_the_ID(),'lead_text',true); ?>
      </div>
  </section>


  <section id="sec02">
    <h2>PHOTO GALLERY</h2>
    <div class="slide">

      <?php
        $html = "";
        $contents_photo = get_post_meta(get_the_ID(), 'contents_photo');
        foreach( $contents_photo as $cp ):
        $thumb = wp_get_attachment_image_src( $cp , 'other_space_list' );
        $large = wp_get_attachment_image_src( $cp , 'space_venue_photo' );

        $html .= "<div>";
        $html .= "<a href='".$large[0]."' data-lightbox='image-1'>";
        $html .= "<img src='".$thumb[0]."' alt=''>";
        $html .= "</a>";
        $html .= "</div>";
      ?>
      <?php endforeach; ?>

      <?php echo $html; ?>
      <?php echo $html; ?>
    </div>
  </section>

  <nav id="button">
    <ul>
      <li><a href="<?php echo home_url(); ?>/#contact-form">お問い合わせ</a></li>
    </ul>
  </nav>

  		<section id="sec04">
  			<h2>PARTNER INFORMATION</h2>
  			<div class="inner">
  				<div class="clearfix mb30">
  					<div class="photo">
  						<div class="bihin">

                <?php
                  $html = "";
                  $option_photo = get_post_meta(get_the_ID(), 'contents_option_photo');
                  foreach( $option_photo as $op ) {
                    $thumb = wp_get_attachment_image_src( $op , 'contents_holder_option_image' );

                    $html .= "<div>";
                    $html .= "<img src='".$thumb[0]."' alt=''>";
                    $html .= "</div>";
                  }
                  echo $html;
                ?>

  						</div>
  					</div>
  					<div class="data">
  						<h3><?php the_title(); ?></h3>
              <?php echo get_post_meta(get_the_ID(),'contents_option_1',true); ?>
  					</div>
  				</div>

  				<div class="text">
            <?php echo get_post_meta(get_the_ID(),'contents_option_2',true); ?>
  				</div>

  				<!-- 20170207 追加 -->
  				<div class="kyouryoku">
  					<div class="logo">
              <?php $company_logo = wp_get_attachment_image_src( get_post_meta(get_the_ID(),'contents_company',true) , 'contents_company_logo' ); ?>
              <img src="<?php echo $company_logo[0]; ?>" alt="">
            </div>
					  <p><?php echo get_post_meta(get_the_ID(),'contents_company_text',true); ?></p>
  				</div>
  				<!-- 20170207 追加 ここまで -->
  			</div>
  		</section>

</article>
<?php endwhile; endif; ?>


<?php else: ?>
  <div id="restriction">

    <p>この記事は弊社のお得意様限定表示になっております。<br>あらかじめご了承ください。</p>
<!--
    <p>こちらのページはお得意様限定表示にさせて頂いております。<br>あらかじめご了承ください。</p>
    <p id="toContact"><a href="<?php echo home_url(); ?>/#contact-form">お問合せはこちら</a></p>

    <p id="toMore"><a href="<?php echo home_url(); ?>/space/">一覧へ戻る</a></p>
-->
  </div>
<?php endif; ?>

<?php get_footer(); ?>
