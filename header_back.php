<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<?php if( $post->post_type == "space_post" && get_post_meta(get_the_ID(),'display_roles',true) >= 2 ): ?>
<meta name="robots" content="noindex,nofollow">
<?php endif; ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/sta_16.ico" sizes="16x16">
<link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/sta_32.ico" sizes="32x32">

<?php $members_page = array('login','register','lostpassword','your-profile'); ?>

<?php if(is_page()): ?>
  <?php $slug = get_page($post->ID)->post_name; ?>
  <?php if( locate_template('css/pages/'.$slug.'.css') != "" ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/<?php echo $slug; ?>.css">
  <?php endif; ?>

  <?php if(is_page( $members_page )): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/members.css">
  <?php endif; ?>

<?php elseif(is_single()): ?>
  <?php
    $slug = $post->post_type;
    $slug = ($slug == "post") ? "column_post" : $slug;
  ?>
  <?php if( locate_template('css/pages/'.$slug.'.css') != "" ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/<?php echo $slug; ?>.css">
  <?php endif; ?>

<?php endif; ?>

<?php if(is_author() || is_category()): ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/column.css">
<?php endif; ?>


<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>

<?php if( get_post_meta(get_the_ID(),'free_css',true) ) echo "<style>\n".get_post_meta(get_the_ID(),'free_css',true)."\n</style>";  ?>

<style>
  html {margin-top: 0 !important;}
</style>


</head>
<body class="<?php echo my_body_class(); ?>">


  <header id="header">
  	<div class="inner clearfix">
  		<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/h_logo.png" width="161" alt="いいネタ検索マッチングサイト THE・MATCH"></a></h1>

      <div id="social-icon-sp">
        <a href="https://www.facebook.com/thestandard0110/" target="_blank" class="mr05 ml05"><img src="<?php bloginfo('template_url'); ?>/images/icon_fb.png" width="25" height="25" alt="" class="roll"></a>
        <a href="https://twitter.com/THESTANDARD10" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icon_tw.png" width="25" height="25" alt="" class="roll"></a>
      </div><!-- #social-icon -->

  		<div id="navi">
  			<nav id="gnav">
  				<ul>
  					<li id="nav01"><a href="<?php echo home_url(); ?>/#company-profile"><span>COMPANY</span></a></li>
  					<li id="nav02"><a href="<?php echo home_url(); ?>/project/"><span>PROJECT</span></a></li>
  					<li id="nav03"><a href="<?php echo home_url(); ?>/column/"><span>COLUMN</span></a></li>
  					<li id="nav04"><a href="<?php echo home_url(); ?>/space/"><span>SPACE</span></a></li>
  					<li id="nav05"><a href="<?php echo home_url(); ?>/contents/"><span>CONTENTS</span></a></li>
  					<li id="nav06"><a href="<?php echo home_url(); ?>/#contact-form"><span>CONTANCT</span></a></li>
  				</ul>
  			</nav>

        <div id="social-icon">
          <a href="https://www.facebook.com/thestandard0110/" target="_blank" class="mr10"><img src="<?php bloginfo('template_url'); ?>/images/icon_fb.png" width="25" height="25" alt="" class="roll"></a>
          <a href="https://twitter.com/THESTANDARD10" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icon_tw.png" width="25" height="25" alt="" class="roll"></a>
        </div><!-- #social-icon -->

  			<ul id="h_button">

        <?php if( is_user_logged_in() ): ?>
          <li class="login logout"><a href="<?php echo home_url(); ?>/logout"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_logout.png" alt="Logout"><img src="<?php echo get_template_directory_uri(); ?>/images/sp_icon_login.png" alt="Login" class="sp"></a></li>
        <?php else: ?>
  				<li class="login"><a href="<?php echo home_url(); ?>/login"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_login.png" alt="Login"><img src="<?php echo get_template_directory_uri(); ?>/images/sp_icon_login.png" alt="Login" class="sp"></a></li>
  				<li class="new"><a href="<?php echo home_url(); ?>/register"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_new.png" alt="New"><img src="<?php echo get_template_directory_uri(); ?>/images/sp_icon_new.png" alt="New" class="sp"></a></li>
        <?php endif; ?>

  			</ul>
  		</div>
  	</div>

  	<div id="sp_naviopen">
  		<span></span>
  		<span></span>
  		<span></span>
  	</div>
  </header><!-- /header -->


<?php if( is_home() ): ?>
  <div id="mainvisual_new">
  	<div id="slide">

      <div>
  			<a href="<?php bloginfo('url'); ?>/about/">
  				<img src="<?php echo get_template_directory_uri(); ?>/images/main001.jpg" alt="" class="sp-hide">
  				<img src="<?php echo get_template_directory_uri(); ?>/images/main001.jpg" alt="" class="pc-hide">
  				<div class="read_text">
  					<div class="category">
  						<div>ABOUT</div>
  					</div>
  					<div class="text">
  						THE MATCH のサービス概要についてはこちら
              <img src="<?php echo get_template_directory_uri(); ?>/images/slide_more.png" alt="MORE" class="more">
  					</div>
  				</div>
  			</a>
  		</div>

      <?php
  		  $args = array(
  				'post_type' => array('project_post','post','space_post','contents_post'),
  				'posts_per_page' => 5,
          'meta_key' => 'top_visual',
          'meta_value' => 1
  			);
  		  $query = new WP_Query($args);
  		  while($query->have_posts()): $query->the_post();
  		?>

      <div>
  			<a href="<?php the_permalink(); ?>">
<!--  				<img src="<?php echo get_template_directory_uri(); ?>/images/slide_layer.png" alt="" class="layer"> -->

          <?php
            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
            $pc_img = wp_get_attachment_image_src( $thumbnail_id , 'main_visual_pc' );
            $sp_img = wp_get_attachment_image_src( $thumbnail_id , 'main_visual_sp' );
          ?>
          <?php if( $pc_img ): ?>
            <img src="<?php echo $pc_img[0]; ?>" alt="" class="sp-hide">
            <img src="<?php echo $sp_img[0]; ?>" alt="" class="pc-hide">
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/top_slide01.jpg" alt="" class="sp-hide">
    				<img src="<?php echo get_template_directory_uri(); ?>/images/sp_top_slide01.jpg" alt="" class="pc-hide">
          <?php endif; ?>


  				<div class="read_text">
  					<div class="category">
  						<div>
  						  <?php
                  switch($post->post_type) {
                    case "project_post":
                      echo "PROJECT";
                      break;
                    case "post":
                      echo "COLUMN";
                      break;
                    case "space_post":
                      echo "SPACE";
                      break;
                    case "contents_post":
                      echo "CONTENTS";
                      break;
                  }
                ?>
  						</div>
  					</div>
  					<div class="text">
  						<?php the_title(); ?>
  						<img src="<?php echo get_template_directory_uri(); ?>/images/slide_more.png" alt="MORE" class="more">
  					</div>
  				</div>
  			</a>
  		</div>


  		<?php
  			$i++;
  		  endwhile;
  		  wp_reset_postdata();
  		?>



  	</div>
  </div><!-- #mainvisual -->
<?php elseif( is_page() && !is_page( $members_page ) ): ?>

  <div id="mainvisual">
  	<div id="catch" class="clearfix">
  		<h1><?php the_title(); ?></h1>
  		<p><?php echo $post->page_catch; ?></p>
  	</div>
  </div><!-- #mainvisual -->

<?php elseif( is_single() ): ?>

  <?php

    switch( get_post_type_object(get_post_type())->name ) {
      case "project_post":
        $tmp = get_page_by_path("project");
        $parent_id = $tmp->ID;
        break;

      case "space_post":
        $tmp = get_page_by_path("space");
        $parent_id = $tmp->ID;
        break;

      case "post":
        $tmp = get_page_by_path("column");
        $parent_id = $tmp->ID;
        break;

      case "contents_post":
        $tmp = get_page_by_path("contents");
        $parent_id = $tmp->ID;
        break;

      default:
        $parent_id = 0;
        break;
    }

  ?>
  <div id="mainvisual">
  	<div id="catch" class="clearfix">
  		<h1><?php echo get_the_title($parent_id); ?></h1>
  		<p><?php echo get_post_meta($parent_id,'page_catch',true); ?></p>
  	</div>
  </div><!-- #mainvisual -->

<?php elseif( is_author() || is_category() ): ?>
  <?php
    $tmp = get_page_by_path("column");
    $parent_id = $tmp->ID;
  ?>
  <div id="mainvisual">
  	<div id="catch" class="clearfix">
  		<h1><?php echo get_the_title($parent_id); ?></h1>
  		<p><?php echo get_post_meta($parent_id,'page_catch',true); ?></p>
  	</div>
  </div><!-- #mainvisual -->

<?php endif; ?>

<?php if(is_page('column') || is_singular( 'post' ) || is_author() || is_category()  ): ?>
<div id="sp_menuopen" class="pc-hide">
  MENU&nbsp;&nbsp;
</div><!-- #sp_menuopen -->
<?php endif; ?>


  <div id="container" <?php if( is_home() ) echo 'class="top"' ?>>
