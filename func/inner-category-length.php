<?php
/* ウィジェットのカテゴリーの投稿数をaタグ内に。
===================================================================== */
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
	$output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
	return $output;
}
?>