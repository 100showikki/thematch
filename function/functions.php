<?php

/*
 * @package WordPress
 * @subpackage Default-2014
 * @since 2014
 */

/* 使いたいスクリプトをincludeで読み込んで利用。
===================================================== */
include_once('function/clearhead.php');
include_once('function/subpagecheck.php');
include_once('function/breadcrumb.php');
include_once('function/catlist_inner.php');
add_theme_support( 'post-thumbnails' );

add_image_size( 'single', 240,240,true );
add_image_size( 'double', 490,240,true );
add_image_size( 'portrait', 240,240,true );
add_image_size( 'quad', 490,490,true );

add_image_size( 'detail', 230,600,false );

// wp-ajaxの読込
function add_my_ajaxurl() {
?>
  <script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
  </script>
<?php
}
add_action('wp_footer', 'add_my_ajaxurl', 1);

function pickup_12_post() {
  global $post;

  $args = "post_type=post&posts_per_page=12";
  if(isset($_POST['no'])) {
    $no = $_POST['no'];
    $args .= "&offset=".$no;
  }
  if(isset($_POST['page_type'])) {
    $args .= "&category_name=".$_POST['page_type'];
  }
  $html = "";
  $query = new WP_Query($args);
  if($query->have_posts()):
  $i=1;
  $html = '<div class="content rap"><div class="clearfix">';
  while($query->have_posts()): $query->the_post();

    // タイトル
    $title = get_the_title();

    // リンク
    $link = esc_url( apply_filters( 'the_permalink', get_permalink() ) );

    // カテゴリー
    $cat= get_the_category();
    $cat_slug = str_replace('trenve', 'TrenVe', str_replace('_',' ', $cat[0]->slug) );
    $cat_name = ucwords($cat_slug);

    // 背景写真
    $thumbnail_id = get_post_thumbnail_id();
    if($i == 1 || $i == 3 || $i == 6 || $i == 2 || $i == 4 || $i == 7 || $i == 9 || $i == 12) {
      $size = "single";
    } else if($i == 5) {
      $size = "double";
    } else if($i == 8 || $i == 11) {
      $size = "portrait";
    } else if($i == 10) {
      $size = "quad";
    }
    $eye_img = wp_get_attachment_image_src( $thumbnail_id , $size );

    // 掲載元
    if($post->source) {
      $tmp = explode(',',$post->source);
      $source = "<div class='outside sourceIcn'>".$tmp[0]."</div>";
    } else {
      $source = "<div class='inside sourceIcn'>ORIGINAL ENTRY</div>";
    }

    // View数
    if($post->views) {
      $views_no = "<div class='views_no'>View ".$post->views."</div>";
    } else {
      $views_no = "<div class='views_no'>View 0</div>";
    }

    // box生成
    $cnt = '<div class="box '.$cat[0]->slug.'">'.
           '<a href="'.$link.'">'.
           '<img src="'.$eye_img[0].'">'.
           '<div class="boxTxt"><h3>'.$title.'</h3>'.$source.$views_no.'</div>'.
           '<div class="boxCat">'.$cat_name.'</div>'.
           '</a>'.
           '</div>';

    if($i == 1 || $i == 3 || $i == 6 ) {
      $html .= '<div class="singles">'.$cnt;
    }
    if($i == 2 || $i == 4 || $i == 7 ) {
      $html .= $cnt.'</div>';
    }
    if($i == 5 ) {

      $html .= '<div class="double">'.$cnt.'</div>';
    }
    if($i == 8 || $i == 11 ) {

      $html .= '<div class="portrait">'.$cnt;
    }
    if($i == 9 || $i == 12 ) {
      $html .= $cnt.'</div>';
    }
    if($i == 10 ) {
      $html .= '<div class="full">'.$cnt.'</div>';
    }
  $i++;
  endwhile;
  $html .= '</div></div>';
  wp_reset_postdata();
  else:
    $html = false;
  endif;

  echo $html;
  die();

}
add_action('wp_ajax_pickup_12_post','pickup_12_post'); //ログインユーザー
add_action('wp_ajax_nopriv_pickup_12_post','pickup_12_post'); //未ログインユーザー


function my_related_post($cat, $tag) {
  global $post;
  $args = array(
    'posts_per_page' => 5,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'terms' => $cat,
        'include_children' => true,
        'field' => 'slug',
        'operator' => 'IN'
      ),
      array(
        'taxonomy' => 'post_tag',
        'terms' => $tag,
        'field' => 'term_id',
        'operator' => 'IN'
      ),
      'relation' => 'OR'
    )
  );
  $query = new WP_Query($args);
  if($query->have_posts()):
    $html = "<ul>";
    while($query->have_posts()) {
      $query->the_post();


      // タイトル
      $title = get_the_title();

      // リンク
      $link = esc_url( apply_filters( 'the_permalink', get_permalink() ) );

      // カテゴリー
      $cat= get_the_category();
      $cat_slug = str_replace('trenve', 'TrenVe', str_replace('_',' ', $cat[0]->slug) );
      $cat_name = ucwords($cat_slug);

      // 背景写真
      $thumbnail_id = get_post_thumbnail_id();
      $eye_img = wp_get_attachment_image_src( $thumbnail_id , "single" );

      // 掲載元
      if($post->source) {
        $tmp = explode(',',$post->source);
        $source = "<div class='outside sourceIcn'>".$tmp[0]."</div>";
      } else {
        $source = "<div class='inside sourceIcn'>ORIGINAL ENTRY</div>";
      }

      // View数
      if($post->views) {
        $views_no = "<div class='views_no'>View ".$post->views."</div>";
      } else {
        $views_no = "<div class='views_no'>View 0</div>";
      }

      // box生成
      $cnt = '<div class="relatedBox '.$cat[0]->slug.'">'.
             '<a href="'.$link.'">'.
             '<img src="'.$eye_img[0].'">'.
             '<div class="boxTxt"><h4>'.$title.'</h4>'.$source.$views_no.'</div>'.
             '<div class="boxCat">'.$cat_name.'</div>'.
             '</a>'.
             '</div>';

      $html .= "<li>";
      $html .= $cnt;
      $html .= "</li>";
    }
    $html .= "</ul>";
  else:
    $html = "関連する記事はありません。";
  endif;
  wp_reset_postdata();

  return $html;
}
?>
