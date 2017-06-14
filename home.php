<?php get_header(); ?>

<div id="container" class="top">
	<section id="about">
		<div>
			<div class="clearfix inner">
				<div class="left">
					<div class="tac mb20"><img src="<?php echo get_template_directory_uri(); ?>/images/themach.png" alt="THE・MATCH" width="320"></div>
					<div id="title">株式会社THE・STANDARDが提供する<br>マッチングサービス</div>
					<div class="button"><a href="https://www.facebook.com/thestandard0110/" target="_blank" class="hover">実績はコラム・facebookページなどにて掲載
					</a></div>
					<div class="button"><a href="<?php bloginfo('url') ?>/about/" title="" class="hover">THE・MATCHのサービス詳細はこちら</a></div>
				</div>
				<div class="right">
					<div class="catch">コンセプトづくりから、会場選定、企画・コンテンツ提案、店舗施工/デザイン、<br class="sp-hide">スタッフなどの人員手配までトータルプロデュースが可能！</div>
					<p>POPUPSHOP企画運営と実施スペースの手配、大手企業内の社員食堂プロモーション展開＆販売、<br class="sp-hide">話題性の高い新スポーツやアクティビティーなどのタイアップご提案、運営プロデュースも可能です。</p>
					<p>さらに、弊社お得意様限定にて、上記の「施設」「コンテンツ」から、最新情報を随時入手することも可能です。</p>
					<p>気になる「施設」「コンテンツ」を見つけられた方は、<br class="sp-hide">THE・STANDARDの各担当プロデューサーまでお問い合わせくださいませ。</p>
				</div>
			</div>
		</div>
	</section>

  <div id="project">
    <h2>PROJECT</h2>
    <div class="setsumei">
      弊社の事例を少しだけご紹介しています。
    </div>
    <div class="slide">

      <?php
  		  $args = array(
  				'post_type' => 'project_post',
  				'posts_per_page' => 5,
  				'order' => 'ASC'
  			);
  		  $query = new WP_Query($args);
  		  while($query->have_posts()): $query->the_post();

  			$title = explode("_", the_title('','',false) );
  			$i = 0;
  		?>

      <section id="case0<?php echo $i; ?>" class="case">
        <div class="first">
          <div class="inner">
            <div class="clearfix pb40">
              <div class="right">
                <div class="case_number">CASE<span><?php echo $title[0]; ?></span></div>
              </div><!-- .right -->
              <div class="left">
                <h3><?php echo $title[1]; ?></h3>

                <span class="sp-hide"><?php echo rollup_text( get_post_meta( get_the_ID(),'lead_text',true),170); ?></span>

              </div><!-- .left -->
            </div>
            <div class="photo">
              <?php
              $thumbnail_id = get_post_thumbnail_id();
              $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'project_large_photo' );
              ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $eye_img[0]; ?>" alt=""></a>
            </div>

            <div class="button">
              <a href="<?php the_permalink(); ?>" class="hover">MORE</a>
            </div>
          </div><!-- .inner -->
        </div><!-- .first -->
      </section><!-- #case01 -->

  		<?php
  			$i++;
  		  endwhile;
  		  wp_reset_postdata();
  		?>

    </div><!-- .slide -->
  </div><!-- #project -->


<section id="pickup" style="display:none;">
  <h2>PICKUP</h2>
  <div class="inner clearfix">
    <a href="<?php echo home_url(); ?>/space/" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup01.jpg" alt="">
      </div>
      <div class="text">
        <span>SPACE</span>施設
      </div>
    </a><!-- .box -->
    <a href="<?php echo home_url(); ?>/contents/" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup02.jpg" alt="">
      </div>
      <div class="text">
        <span>CONTENTS</span>コンテンツ
      </div>
    </a><!-- .box -->
    <a href="<?php echo home_url(); ?>/#contact-form" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup03.jpg" alt="">
      </div>
      <div class="text">
        <span>CONTACT</span>お問い合わせ
      </div>
    </a><!-- .box -->
  </div><!-- .inner -->
</section><!-- #pickup -->

<section id="works">
  <h2>WORKS</h2>
  <p>株式会社THE・STANDARDが実施した、プロジェクト実績・事例の１部をご紹介いたします。</p>
  <div class="inner clearfix">

		<?php
			if( is_user_logged_in() ) { //ログイン済
				$args = array(
					'post_type' => 'works_post',
					'posts_per_page' => 5
				);
			} else { //ログインしていない
				$args = array(
					'post_type' => 'works_post',
					'posts_per_page' => 5,
					'meta_key' => 'role_display_check',
					'meta_value' => 0
				);
			}
			$query = new WP_Query($args);
			if($query->have_posts()):
			while($query->have_posts()): $query->the_post();

			$img01 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_01',true),'works_thumbnail');
			$img02 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_02',true),'works_thumbnail');
			$img03 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'works_img_03',true),'works_thumbnail');
		?>
		<a href="<?php echo home_url(); ?>/works/" class="box">
			<div class="thumbnail clearfix">
				<?php if( $img01 ): ?><img src="<?php echo $img01[0]; ?>" alt=""><?php endif; ?><?php if( $img02 ): ?><img src="<?php echo $img02[0]; ?>" alt=""><?php endif; ?><?php if( $img03 ): ?><img src="<?php echo $img03[0]; ?>" alt=""><?php endif; ?>
			</div>
			<div class="text">
				<div class="date"><?php echo get_post_meta( get_the_ID(),'works_date',true); ?></div>
				<div class="title"><?php the_title(); ?></div>
				<div><?php echo get_post_meta( get_the_ID(),'works_text',true); ?></div>
			</div>
		</a><!-- .box -->



		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>



  </div>
</section>



<section id="column">
  <h2>COLUMN</h2>
  <div class="setsumei">
    業界のトレンドを抑える有益な情報を発信。<br>時々弊社の裏話も。
  </div>
  <div class="inner clearfix">

    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4
      );
      $query = new WP_Query($args);
      while($query->have_posts()): $query->the_post();
    ?>

    <a href="<?php the_permalink(); ?>" class="box">
      <div class="thumbnail">
        <?php
          $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
          $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'top_list_thumbnail_L' );
        ?>
        <?php if( $eye_img ): ?>
          <img src="<?php echo $eye_img[0]; ?>" alt="">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/column01.jpg" alt="">
        <?php endif; ?>
      </div>
      <div class="text">
        <span class="date"><?php the_time('Y.m.d'); ?></span>
        <span class="category"><?php $cat= get_the_category(); echo $cat[0]->cat_name; ?></span>
        <div class="title">
          <span class="sp-hide"><?php echo rollup_text(the_title('','',false),31); ?></span>
          <span class="pc-hide"><?php echo rollup_text(the_title('','',false),20); ?></span>
        </div>
        <div class="editor">
          <div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/staff-img/<?php the_author_login(); ?>.png" alt=""></div>
          <?php the_author(); ?>
        </div>
      </div>
    </a><!-- .box -->

    <?php
      endwhile;
      wp_reset_postdata();
    ?>

  </div><!-- .inner -->
  <div class="button"><a href="<?php echo home_url(); ?>/column/" class="hover">BACK NUMBER</a></div>
</section><!-- #column -->

<section id="partner">
  <h2>PARTNER</h2>
	<div class="setsumei">株式会社THE・STANDARDが連携している、個人・法人のプロフェッショナルパートナーをご紹介いたします。</div>
  <div class="inner clearfix">

		<div style="text-align:center;padding:80px 0;background:#f8f8f8;font-size:13px;">本ページは現在、作成中です。</div>

		<?php /*
		<?php
			$args = array(
				'post_type' => 'partner_post',
				'posts_per_page' => 4
			);
			$query = new WP_Query($args);
			while($query->have_posts()): $query->the_post();
		?>
		<a href="<?php the_permalink(); ?>" class="box">
			<div class="thumbnail">
				<?php
					$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
					$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'top_list_thumbnail' );
				?>
				<?php if( $eye_img ): ?>
					<img src="<?php echo $eye_img[0]; ?>" alt="">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/contents01.jpg" alt="">
				<?php endif; ?>
			</div>
			<div class="text">
				<div class="title">
					<span class="sp-hide"><?php echo rollup_text(the_title('','',false),31); ?></span>
					<span class="pc-hide"><?php echo rollup_text(the_title('','',false),20); ?></span>
				</div>
				<div class="read">
					<?php echo rollup_text(get_post_meta(get_the_ID(), 'short_lead_text', true),45,true); ?>
				</div>
			</div>
		</a><!-- .box -->
		<?php
			endwhile;
			wp_reset_postdata();
		?>
		*/ ?>

  </div><!-- .inner -->

	<!--
  <div class="button"><a href="<?php echo home_url(); ?>/partner/" class="hover">MORE</a></div>
	-->
</section><!-- #space -->


<section id="space">
  <h2>SPACE</h2>
  <p>「イベントを開催したい」「POPUPSTORE（期間限定店舗）を出したい」など様々なニーズに対応できる先取りした催事場、スペースをご紹介。<br>掲載していない物件も多数ございますのでお問い合わせください。</p>
  <div id="space_slide" class="sp-hide">
    <div><img src="<?php echo get_template_directory_uri(); ?>/images/space.jpg" alt="" width="100%"></div>
    <div><img src="<?php echo get_template_directory_uri(); ?>/images/space.jpg" alt="" width="100%"></div>
  </div>
  <div id="space_slide_sp" class="pc-hide">
    <div><img src="<?php echo get_template_directory_uri(); ?>/images/space_sp01.jpg" alt=""></div>
    <div><img src="<?php echo get_template_directory_uri(); ?>/images/space_sp02.jpg" alt=""></div>
  </div>
  <div class="button"><a href="<?php echo home_url(); ?>/space/" class="hover">MORE</a></div>
</section><!-- #space -->


<section id="contents">
  <h2>CONTENTS</h2>
  <div class="setsumei">
    お客様に最適なコンテンツを選んでいただけるよう、常に更新しております。<br>ぜひチェックしてくださいませ。
  </div>
  <div class="inner clearfix">

    <?php
      $args = array(
        'post_type' => 'contents_post',
        'posts_per_page' => 4
      );
      $query = new WP_Query($args);
      while($query->have_posts()): $query->the_post();
    ?>
    <a href="<?php the_permalink(); ?>" class="box">
      <div class="thumbnail">
        <?php
          $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
          $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'top_list_thumbnail' );
        ?>
        <?php if( $eye_img ): ?>
          <img src="<?php echo $eye_img[0]; ?>" alt="">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/contents01.jpg" alt="">
        <?php endif; ?>
      </div>
      <div class="text">
        <div class="title">
          <span class="sp-hide"><?php echo rollup_text(the_title('','',false),31); ?></span>
          <span class="pc-hide"><?php echo rollup_text(the_title('','',false),20); ?></span>
        </div>
        <div class="read">
					<?php echo rollup_text(get_post_meta(get_the_ID(), 'short_lead_text', true),45,true); ?>
				</div>
      </div>
      <div class="c_name"><?php echo get_post_meta(get_the_ID(), 'company_name', true); ?></div>
    </a><!-- .box -->
    <?php
      endwhile;
      wp_reset_postdata();
    ?>

  </div><!-- .inner -->
  <div class="button"><a href="<?php echo home_url(); ?>/contents/" class="hover">MORE</a></div>
</section><!-- #contents -->


<div id="company-profile" class="anchor"></div>
<section id="company">
  <h2>COMPANY</h2>
  <div class="setsumei">
    弊社の会社概要でございます。
  </div>
  <img src="<?php echo get_template_directory_uri(); ?>/images/top_company_logo.png" alt="THE・STANDARD">
  <div class="catch">「これからの時代のスタンダード」を仕立てる<br>マッチングプロデュースカンパニー</div>
  <p>「これからのスタンダードをつくる」「私たちのマッチングが時代のスタンダードに！」<br>	をミッションに、先取りした「コンテンツと施設」「ソフトとハード」「企業と企業」などを<br>	最適にマッチングし、新たな市場とホスピタリティーを創造する<br>	マッチングプロデュースカンパニーです。<br></p>
  <p>www.t-standard.jp<br>東京都渋谷区代官山町20-23 TENOHA代官山</p>
  <table>
    <tbody>
      <tr>
        <td>代表取締役</td>
        <td>吉田宗平</td>
      </tr>
      <tr>
        <td>取　締　役</td>
        <td>萩野幸治　町田智昭</td>
      </tr>
      <tr>
        <td>資　本　金</td>
        <td>９９９万円</td>
      </tr>
      <tr>
        <td>創　業　日</td>
        <td>2017年1月10日</td>
      </tr>
    </tbody>
  </table>
</section><!-- #company -->


<div id="contact-form" class="anchor"></div>
<section id="contact">
  <h2>CONTACT</h2>
  <div class="setsumei">
    弊社へご依頼、お問い合わせは以下のフォームからお願い致します。
  </div>

  <?php echo do_shortcode('[contact-form-7 id="90" title="お問い合わせ"]'); ?>

</section><!-- #contact -->

</div><!-- #container -->

<?php get_footer(); ?>
