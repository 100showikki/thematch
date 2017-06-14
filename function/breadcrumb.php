<?php

/*
NAME : Breadcrumb
14.03.07 子ページ、孫ページ対応
===================================================== */
function the_crumb() {
  if( is_home() && !is_paged() ) { return; }
  global $post;

  $arrow = "&nbsp;<span>&raquo;</span>&nbsp;";

  $str = '<div id="crumb">';
  $str .= '<a href="'.home_url().'">HOME</a>'.$arrow;

  // POST
  if( is_single() ) {

      $str .= '<a href="'.home_url().'/staffblog/">Staff Blog</a>'.$arrow.$post->post_title;
  }

  // PAGE
  if( is_page() ) {
    if( !is_subpage() ) { // IF CHILD PAGE
      $str .= $post->post_title;
    } else {
      if( is_subpage( $post->post_parent ) ) { // IF GRANDSON PAGE
        $tmp = get_post( $post->post_parent );
        if ( $tmp->post_parent != 0 ) {
          $tmp_url = get_permalink( $tmp->post_parent );
          $tmp_name = get_the_title( $tmp->post_parent );
          $str .= '<a href="'.$tmp_url.'">'.$tmp_name.'</a>'.$arrow;
        }
      }
      $url = get_permalink( $post->post_parent );
      $name = get_the_title( $post->post_parent );
      $str .= '<a href="'.$url.'">'.$name.'</a>'.$arrow;
      $str .= $post->post_title;
    }
  }

  // CATEGORY
  if( is_category() ) {
    $cat = get_the_category();
    $str .= '<a href="'.home_url().'/staffblog/">Staff Blog</a>'.$arrow.$cat[0]->cat_name;
  }

  if( is_author() ) {
    $cat = get_the_category();
    $str .= '<a href="'.home_url().'/staffblog/">Staff Blog</a>'.$arrow.get_the_author()."のBLOG";
  }



  // SEARCH
  if( is_search() ) {
    $str .= "検索結果";
  }

  $str .= '</div>';
  echo $str;
}

?>
