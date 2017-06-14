<?php get_header(); ?>


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


      <?php if( get_post_meta(get_the_ID(), 'search_text', true) ): ?>
      <li><a href="<?php echo home_url(); ?>/space/?contents=<?php echo get_post_meta(get_the_ID(), 'search_text', true); ?>&search_nonce=<?php echo wp_create_nonce('search_nonce'); ?>">開催できる会場はこちら</a></li>
      <?php endif; ?>

      <?php if( get_post_meta(get_the_ID(), 'project_link', true) ): ?>
      <li><a href="<?php echo get_post_meta(get_the_ID(), 'project_link', true); ?>">開催事例はこちら</a></li>
      <?php endif; ?>

      <li><a href="<?php echo home_url(); ?>/#contact-form">お問い合わせ</a></li>
    </ul>
  </nav>


  		<!-- 20170207 追加 -->
      <?php if( get_post_meta(get_the_ID(), 'contents_holder_01_text',true) ): ?>
  		<section id="sec02_2">
  			<h2>コンテンツホルダー事例</h2>
  			<div class="inner">
  				<div class="clearfix">

            <?php if( get_post_meta(get_the_ID(),'contents_holder_01_photo',true) ): ?>
  					<div class="holder">
  						<div class="photo">
                <?php $holder_1 = wp_get_attachment_image_src( get_post_meta(get_the_ID(),'contents_holder_01_photo',true) , 'contents_holder_option_image' ); ?>
  							<img src="<?php echo $holder_1[0]; ?>" alt="">
  						</div>
  						<p><?php echo get_post_meta(get_the_ID(), 'contents_holder_01_text',true); ?></p>
  					</div>
            <?php endif; ?>

            <?php if( get_post_meta(get_the_ID(),'contents_holder_02_photo',true) ): ?>
  					<div class="holder">
  						<div class="photo">
                <?php $holder_2 = wp_get_attachment_image_src( get_post_meta(get_the_ID(),'contents_holder_02_photo',true) , 'contents_holder_option_image' ); ?>
  							<img src="<?php echo $holder_2[0]; ?>" alt="">
  						</div>
              <p><?php echo get_post_meta(get_the_ID(), 'contents_holder_02_text',true); ?></p>
  					</div>
            <?php endif; ?>

            <?php if( get_post_meta(get_the_ID(),'contents_holder_03_photo',true) ): ?>
  					<div class="holder">
  						<div class="photo">
                <?php $holder_3 = wp_get_attachment_image_src( get_post_meta(get_the_ID(),'contents_holder_03_photo',true) , 'contents_holder_option_image' ); ?>
  							<img src="<?php echo $holder_3[0]; ?>" alt="">
  						</div>
              <p><?php echo get_post_meta(get_the_ID(), 'contents_holder_03_text',true); ?></p>
  					</div>
            <?php endif; ?>

  				</div>
  			</div>
  		</section>
    <?php endif; ?>
  		<!-- 20170207 追加 ここまで -->


  		<section id="sec03">
  			<h2>開催メリット</h2>

  			<!-- 20170207 追加 -->
  			<div class="inner clearfix">
  				<div class="merit">
  					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/contents/merit1.png" alt=""></div>
  					<div class="merit_text mh"><div><?php echo get_post_meta( get_the_ID(),'contents_merit_left',true); ?></div></div>
  				</div>
  				<div class="merit">
  					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/contents/merit2.png" alt=""></div>
            <div class="merit_text mh"><div><?php echo get_post_meta( get_the_ID(),'contents_merit_center',true); ?></div></div>
  				</div>
  				<div class="merit">
  					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/contents/merit3.png" alt=""></div>
            <div class="merit_text mh"><div><?php echo get_post_meta( get_the_ID(),'contents_merit_right',true); ?></div></div>
  				</div>
  			</div>
  		<!-- 20170207 追加 ここまで -->
  		</section>


  		<section id="sec04">
  			<h2>必要備品</h2>
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
  						<h3>商品：<?php the_title(); ?></h3>
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
<?php get_footer(); ?>
