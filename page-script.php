<?php

/*
$post_value = array(
    'post_author' => 1,// 投稿者のID。
    'post_title' => 'テストタイトル',// 投稿のタイトル。
    'post_content' => 'テスト本文', // 投稿の本文。
//    'post_category' => array(1,5), // カテゴリーID(配列)。
//    'tags_input' => array('タグ1′,'タグ2′), // タグの名前(配列)。
    'post_status' => 'publish' // 公開ステータス。
);
wp_insert_post($post_value);
*/

  $args = array(
    'post_type' => array('post','music'),
    'posts_per_page' => -1
  );
  $query = new WP_Query($args);
  if( $query->have_posts() ) {
    while( $query->have_posts() ) {
      $query->the_post();

      $my_post = array(
        'ID' => $post->ID,
        'post_title' => $post->post_title."あ",
      );
      wp_update_post($my_post);

      update_post_meta($post->ID, 'yesterday', $post->today);
      update_post_meta($post->ID, 'today', '0');



    }
  }
  wp_reset_postdata();



?>
