<?php
/* wp_headから必要ないコードを削除
===================================================================== */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
?>