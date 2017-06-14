<?php get_header(); ?>


<section id="pickup">
  <h2>PICKUP</h2>
  <div class="inner clearfix">
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup01.jpg" alt="">
      </div>
      <div class="text">
        <span>SPACE</span>施設
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup02.jpg" alt="">
      </div>
      <div class="text">
        <span>CONTENTS</span>コンテンツ
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/pickup03.jpg" alt="">
      </div>
      <div class="text">
        <span>CONTACT</span>お問い合わせ
      </div>
    </a><!-- .box -->
  </div><!-- .inner -->
</section><!-- #pickup -->


<section id="column">
  <h2>COLUMN</h2>
  <div class="inner clearfix">
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/column01.jpg" alt="">
      </div>
      <div class="text">
        <span class="date">2017.02.12</span>
        <span class="category">イベント</span>
        <div class="title">
          人間がバルーンのような巨大な透明記事のタイトルが入ります。
        </div>
        <div class="editor">
          <div class="photo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/pages/column/editor.png" alt="">
          </div>
          NAME....
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/column02.jpg" alt="">
      </div>
      <div class="text">
        <span class="date">2017.02.12</span>
        <span class="category">イベント</span>
        <div class="title">
          人間がバルーンのような巨大な透明記事のタイトルが入ります。
        </div>
        <div class="editor">
          <div class="photo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/pages/column/editor.png" alt="">
          </div>
          NAME....
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/column03.jpg" alt="">
      </div>
      <div class="text">
        <span class="date">2017.02.12</span>
        <span class="category">イベント</span>
        <div class="title">
          人間がバルーンのような巨大な透明記事のタイトルが入ります。
        </div>
        <div class="editor">
          <div class="photo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/pages/column/editor.png" alt="">
          </div>
          NAME....
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/column04.jpg" alt="">
      </div>
      <div class="text">
        <span class="date">2017.02.12</span>
        <span class="category">イベント</span>
        <div class="title">
          人間がバルーンのような巨大な透明記事のタイトルが入ります。
        </div>
        <div class="editor">
          <div class="photo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/pages/column/editor.png" alt="">
          </div>
          NAME....
        </div>
      </div>
    </a><!-- .box -->
  </div><!-- .inner -->
  <div class="button"><a href="#" class="hover">BACK NUMBER</a></div>
</section><!-- #column -->


<section id="space">
  <h2>SPACE</h2>
  <div class="inner clearfix">
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/space01.jpg" alt="">
      </div>
      <div class="text">
        <div class="title">
          SHIBUYA CAST
        </div>
        <div class="place">
          東京都
        </div>
        <div class="read">
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/space02.jpg" alt="">
      </div>
      <div class="text">
        <div class="title">
          SHIBUYA CAST
        </div>
        <div class="place">
          東京都
        </div>
        <div class="read">
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/space03.jpg" alt="">
      </div>
      <div class="text">
        <div class="title">
          SHIBUYA CAST
        </div>
        <div class="place">
          東京都
        </div>
        <div class="read">
          テキストテキストテキストテキストテキストテキストテキスト
        </div>
      </div>
    </a><!-- .box -->
    <a href="#" class="box">
      <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/images/space04.jpg" alt="">
      </div>
      <div class="text">
        <div class="title">
          SHIBUYA CAST
        </div>
        <div class="place">
          東京都
        </div>
        <div class="read">
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </div>
      </div>
    </a><!-- .box -->
  </div><!-- .inner -->
  <div class="button"><a href="#" class="hover">MORE</a></div>
</section><!-- #space -->


<section id="contents">
  <h2>CONTENTS</h2>
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
        <div class="title"><?php the_title(); ?></div>
        <div class="read"><?php echo mb_substr( get_post_meta(get_the_ID(), 'short_lead_text', true), 0, 45, "utf-8" ); ?>...</div>
      </div>
      <div class="c_name">株式会社 THE STANDARD</div>
    </a><!-- .box -->
    <?php
      endwhile;
      wp_reset_postdata();
    ?>

  </div><!-- .inner -->
  <div class="button"><a href="<?php echo home_url(); ?>/contents/" class="hover">MORE</a></div>
</section><!-- #contents -->

<div id="project">
  <h2>PROJECT</h2>
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
              <?php echo get_post_meta( get_the_ID(),'lead_text',true); ?>
            </div><!-- .left -->
          </div>
          <div class="photo">
            <?php
            $thumbnail_id = get_post_thumbnail_id();
            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'project_large_photo' );
            ?>
            <img src="<?php echo $eye_img[0]; ?>" alt="">
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


<section id="company">
  <h2>COMPANY</h2>
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


<section id="contact">
  <h2>CONTACT</h2>

  <form action="index_submit" method="get" accept-charset="utf-8">
    <label>お名前<br><input type="text" name="" value=""></label>
    <label>メールアドレス<br><input type="text" name="" value=""></label>
    <label>電話番号<br><input type="text" name="" value=""></label>
    <label>お問い合わせ内容<br><textarea></textarea></label>

    <input type="submit" name="" value="送信">
  </form>
</section><!-- #contact -->

<? /*
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

*/ ?>

<?php get_footer(); ?>
