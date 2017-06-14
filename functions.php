<?php

/*
 * @package WordPress
 * @subpackage Default-2014
 * @since 2014
 */

/* 使いたいスクリプトをincludeで読み込んで利用。
===================================================== */
include_once('func/head-cleaner.php');
include_once('func/inner-category-length.php');
add_theme_support( 'post-thumbnails' );

add_image_size( 'main_visual_pc', 927,340,true); // PC メインビジュアル用
add_image_size( 'main_visual_sp', 640,340,true); // SP メインビジュアル用

add_image_size( 'top_list_thumbnail', 252,134,true); // トップページ（）一覧用
add_image_size( 'top_list_thumbnail_L', 252,175,true); // トップページ（コラム）一覧用

add_image_size( 'space_list_photo', 337,264,true); // スペース 一覧用
add_image_size( 'space_first_mainphoto', 1048,455,true ); // メイン画像1枚目
add_image_size( 'space_second_mainphoto', 510,340,true ); // メイン画像2枚目
add_image_size( 'space_venue_photo', 510,400,true ); // 会場写真
add_image_size( 'other_space_list', 229,180,true ); // その他会場
add_image_size( 'space_free_photo', 468,355,true ); // スペース詳細説明横写真

add_image_size( 'project_large_photo', 1048,455,true ); // プロジェクト 大画像
add_image_size( 'project_small_photo', 483,251,true ); // プロジェクト 小画像

add_image_size( 'column_list_photo', 417,296,true ); // COLUMN
add_image_size( 'column_detail_photo', 742,461,true ); // COLUMN 詳細
add_image_size( 'column_editor_photo', 100,100,true ); // COLUMN 投稿者画像

add_image_size( 'contents_holder_option_image', 468,291,true ); // コンテンツ用画像
add_image_size( 'contents_company_logo', 300,300,false ); // コンテンツ 協賛会社ロゴ

add_image_size( 'works_thumbnail', 342,220,false ); // ワークスの画像


// 権限名の変更
function change_role_name() {
	global $wp_roles;
	if(!isset($wp_roles))
	$wp_roles = new WP_Roles();

	// 購読者
	$wp_roles -> roles ['subscriber']['name'] = 'ライト';
	$wp_roles -> role_names ['subscriber'] = 'ライト';

  // 寄稿者
	$wp_roles -> roles ['contributor']['name'] = 'プレミアム';
	$wp_roles -> role_names ['contributor'] = 'プレミアム';

  // 投稿者
	$wp_roles -> roles ['author']['name'] = 'スタッフ';
	$wp_roles -> role_names ['author'] = 'スタッフ';
}
add_action ( 'init', 'change_role_name' );

// 編集者を削除
remove_role('editor');

// ユーザー権限の各情報の格納
function current_user_role() {
  $role = new stdClass;
  if( current_user_can('administrator') ) { //管理者
    $role->no = 10;
    $role->name = "管理者";
  } elseif( current_user_can('author') ) { //スタッフ
    $role->no = 4;
    $role->name = "スタッフ";
  } elseif( current_user_can('contributor') ) { //プレミアム
    $role->no = 3;
    $role->name = "プレミアム";
  } elseif( current_user_can('subscriber') ) { //ライト
    $role->no = 2;
    $role->name = "ライト";
  } else { //オープン
    $role->no = 1;
    $role->name = "オープン";
  }
  return $role;
}

// 記事のアクセス制限とユーザー権限を比較して判定
function display_role_check() {

  global $post;
  $restrict_no = get_post_meta($post->ID,'display_roles',true);

  $sign = false;
  $role_no = current_user_role()->no;
  if( $restrict_no <= 1 ) { // 記事のアクセス制限がオープンなら
    $sign = true;
  } elseif( $restrict_no <= 2 && $role_no >= 2 ) { // 記事のアクセス制限がライト以上で権限が2以上
    $sign = true;
  } elseif( $restrict_no <= 3 && $role_no >= 3 ) { // 記事のアクセス制限がライト以上で権限が3以上
    $sign = true;
  } elseif( $restrict_no <= 4 && $role_no >= 4 ) { // 記事のアクセス制限がライト以上で権限が4以上
    $sign = true;
  }
  return $sign;
}

function redirect_check() {
  global $post;
  switch($post->display_roles) {
    case 1:
      $a = "オープン記事";
      break;
    case 2:
      $a = "ライト記事";
      break;
    case 3:
      $a = "プレミアム記事";
      break;
    case 4:
      $a = "スタッフ記事";
      break;
    default:
      $a = "未設定";
  }
  return $a;
}

function add_theme_caps(){
	/*
    $role = get_role( 'author' );

    $role->add_cap( 'list_users' );
    $role->add_cap( 'add_users' );
    $role->add_cap( 'promote_users' );
    $role->add_cap( 'edit_users' );
    $role->add_cap( 'create_users' );
    $role->add_cap( 'delete_users' );

		*/
}
add_action( 'admin_init', 'add_theme_caps' );


function space_meta_check($meta) {
	global $post;

	if( $meta == "option" ) {
		$option = post_custom('option');

		$data = array();
		$d = array();
		$html = "";
		$pages = get_posts(
		  array(
		    'post_type' => 'page',
		    'pagename' => 'tstd_option_page'
		  )
		);
		foreach( $pages as $p ) {
		  $data = explode(',',$p->post_content);
		}
		foreach( $data as $value ) {
			$v = explode(':',$value);
			$d[$v[0]] = $v[1];
		}

		foreach($option as $o) {
			$html .= $d[$o]."、";
		}

		$html = rtrim($html,"、");

		return $html;

	} else {
		if( get_post_meta($post->ID,$meta,true) ) return get_post_meta($post->ID,$meta,true);
	}

}

function my_body_class() {
	global $post;
	$arr = array();
	if(is_home()) {
		$arr[] = "home";
	} else {
		$arr[] = "child";

		if( is_single() ) {
			$arr[] = "single";
			if( $post->post_type == 'project_post' ) {
				$arr[] = "project";
			} elseif( $post->post_type == 'space_post' ) {
				$arr[] = "space";
			} elseif( $post->post_type == 'post' ) {
				$arr[] = "column";
			} elseif( $post->post_type == 'contents_post' ) {
				$arr[] = "contents";
			} elseif( $post->post_type == 'partner_post' ) {
				$arr[] = "partner";
			}
		} elseif( is_page() ) {
			$arr[] = "page";
			if( is_page('project') ) {
				$arr[] = "project";
			} elseif (is_page('space') ) {
				$arr[] = "space";
			} elseif (is_page('column') ) {
				$arr[] = "column";
			} elseif (is_page('contents') ) {
				$arr[] = "contents";
			} elseif (is_page('partner') ) {
				$arr[] = "partner";
			} elseif (is_page('works') ) {
				$arr[] = "works";
			}
		} elseif( is_author() || is_category() ) {
			$arr[] = "column";
		}
	}

	$html = "";
	foreach($arr as $a) {
		$html .= $a;
		if($a != end($arr)) {
			$html .= " ";
		}
	}

	return $html;

}


function my_template_url() {
	return get_template_directory_uri()."/";
}
add_shortcode('template','my_template_url');


function my_home_url() {
	return home_url()."/";
}
add_shortcode('home','my_home_url');

// 都道府県の出力
function pref_name( $i ) {
	$name = "　";
	switch($i) {
		case ('0'): $name = "北海道"; break;
		case ('1'): $name = "青森県"; break;
		case ('2'): $name = "岩手県"; break;
		case ('3'): $name = "宮城県"; break;
		case ('4'): $name = "秋田県"; break;
		case ('5'): $name = "山形県"; break;
		case ('6'): $name = "福島県"; break;
		case ('7'): $name = "茨城県"; break;
		case ('8'): $name = "栃木県"; break;
		case ('9'): $name = "群馬県"; break;
		case ('10'): $name = "埼玉県"; break;
		case ('11'): $name = "千葉県"; break;
		case ('12'): $name = "東京都"; break;
		case ('13'): $name = "神奈川県"; break;
		case ('14'): $name = "新潟県"; break;
		case ('15'): $name = "富山県"; break;
		case ('16'): $name = "石川県"; break;
		case ('17'): $name = "福井県"; break;
		case ('18'): $name = "山梨県"; break;
		case ('19'): $name = "長野県"; break;
		case ('20'): $name = "岐阜県"; break;
		case ('21'): $name = "静岡県"; break;
		case ('22'): $name = "愛知県"; break;
		case ('23'): $name = "三重県"; break;
		case ('24'): $name = "滋賀県"; break;
		case ('25'): $name = "京都府"; break;
		case ('26'): $name = "大阪府"; break;
		case ('27'): $name = "兵庫県"; break;
		case ('28'): $name = "奈良県"; break;
		case ('29'): $name = "和歌山県"; break;
		case ('30'): $name = "鳥取県"; break;
		case ('31'): $name = "島根県"; break;
		case ('32'): $name = "岡山県"; break;
		case ('33'): $name = "広島県"; break;
		case ('34'): $name = "山口県"; break;
		case ('35'): $name = "徳島県"; break;
		case ('36'): $name = "香川県"; break;
		case ('37'): $name = "愛媛県"; break;
		case ('38'): $name = "高知県"; break;
		case ('39'): $name = "福岡県"; break;
		case ('40'): $name = "佐賀県"; break;
		case ('41'): $name = "長崎県"; break;
		case ('42'): $name = "熊本県"; break;
		case ('43'): $name = "大分県"; break;
		case ('44'): $name = "宮崎県"; break;
		case ('45'): $name = "鹿児島県"; break;
		case ('46'): $name = "沖縄県"; break;
	}
	return $name;
}

function venue_area_name($i) {
	$name = "";
	switch($i) {
		case ('0'): $name = "0㎡〜49㎡"; break;
		case ('1'): $name = "50㎡〜99㎡"; break;
		case ('2'): $name = "100㎡〜149㎡"; break;
		case ('3'): $name = "150㎡〜199㎡"; break;
		case ('4'): $name = "200㎡〜249㎡"; break;
		case ('5'): $name = "250㎡〜299㎡"; break;
		case ('6'): $name = "300㎡〜"; break;
	}
	return $name;
}

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );


function rollup_text( $str, $i=30, $strip=false ) {
	$html = "";

	if( $strip ) {
		$str = strip_tags($str);
	}

	$length = mb_strlen($str);
	if( $length >= $i ) {
		$html .= mb_substr( $str, 0, $i, "utf-8" )."...";
	} else {
		$html .= $str;
	}
	return $html;
}

function role_display_check( $check=0 ) {

	global $post;
	$check = ($check) ? $check : 0;

	$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'space_list_photo' );
	if( $eye_img ) {
		$eyecatch = $eye_img[0];
	} else {
		$eyecatch = get_template_directory_uri()."/images/pages/space/space_sample.jpg";
	}

	if( $check == 0 ) {
		$url = $eyecatch;
	} else {
		if( is_user_logged_in() ) {
			$url = $eyecatch;
		} else {
			$url = get_template_directory_uri()."/images/lock_content.jpg";
		}
	}

	return $url;
}

?>
