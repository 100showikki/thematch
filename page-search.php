<?php
  $nonce = $_REQUEST['search_nonce'];
  $query = "
  SELECT DISTINCT a.ID
  FROM $wpdb->posts a
  INNER JOIN $wpdb->postmeta map ON a.ID = map.post_id
  INNER JOIN $wpdb->postmeta area ON a.ID = area.post_id
  INNER JOIN $wpdb->postmeta opt ON a.ID = opt.post_id
  INNER JOIN $wpdb->postmeta word ON a.ID = word.post_id
  WHERE (a.post_status = 'publish' AND a.post_type = 'space_post')";

  if( wp_verify_nonce($nonce, 'search_nonce') ) {

    if( isset($_POST['map_pref']) && $_POST['map_pref'] >= 0 ) {
      $map_pref = $_POST['map_pref'];
      $query .= " AND (map.meta_key = 'map_pref' AND map.meta_value = $map_pref)";
    }

    if( isset($_POST['venue_area_select']) && $_POST['venue_area_select'] >= 0 ) {
      $venue_area_select = $_POST['venue_area_select'];
      $query .= " AND (area.meta_key = 'venue_area_select' AND area.meta_value = $venue_area_select)";
    }

    if( isset($_POST['option']) ) {
      $option = $_POST['option'];
      $o = "'";
      $o .= implode("','",$option);
      $o .= "'";
      $query .= " AND (opt.meta_key = 'option' AND opt.meta_value IN ($o))";
    }

    if( isset($_POST['keyword']) && $_POST['keyword'] != "" ) {
      $keyword = $_POST['keyword'];
      $query .= " AND (
        a.post_title LIKE '%".$keyword."%'
        OR (word.meta_key = 'map_address' AND word.meta_value LIKE '%".$keyword."%')
        OR (word.meta_key = 'lead_text' AND word.meta_value LIKE '%".$keyword."%')
        OR (word.meta_key = 'short_lead_text' AND word.meta_value LIKE '%".$keyword."%')
      )";
    }
  }
//  echo $query;

?>
<?php get_header(); ?>


  <div id="content">

      <article id="article">

        <div style="border:1px solid #ccc;padding:10px;">

          <form action="" method="POST">

            <p>場所<br>
              <select name="map_pref">
                <option value="-1" <?php if($map_pref=="") echo selected; ?>>指定なし</option>
                <option value="0" <?php if($map_pref==="0") echo selected; ?>>北海道</option>
                <option value="1" <?php if($map_pref==1) echo selected; ?>>青森県</option>
                <option value="2" <?php if($map_pref==2) echo selected; ?>>岩手県</option>
                <option value="3" <?php if($map_pref==3) echo selected; ?>>宮城県</option>
                <option value="4" <?php if($map_pref==4) echo selected; ?>>秋田県</option>
                <option value="5" <?php if($map_pref==5) echo selected; ?>>山形県</option>
                <option value="6" <?php if($map_pref==6) echo selected; ?>>福島県</option>
                <option value="7" <?php if($map_pref==7) echo selected; ?>>茨城県</option>
                <option value="8" <?php if($map_pref==8) echo selected; ?>>栃木県</option>
                <option value="9" <?php if($map_pref==9) echo selected; ?>>群馬県</option>
                <option value="10" <?php if($map_pref==10) echo selected; ?>>埼玉県</option>
                <option value="11" <?php if($map_pref==11) echo selected; ?>>千葉県</option>
                <option value="12" <?php if($map_pref==12) echo selected; ?>>東京都</option>
                <option value="13" <?php if($map_pref==13) echo selected; ?>>神奈川県</option>
                <option value="14" <?php if($map_pref==14) echo selected; ?>>新潟県</option>
                <option value="15" <?php if($map_pref==15) echo selected; ?>>富山県</option>
                <option value="16" <?php if($map_pref==16) echo selected; ?>>石川県</option>
                <option value="17" <?php if($map_pref==17) echo selected; ?>>福井県</option>
                <option value="18" <?php if($map_pref==18) echo selected; ?>>山梨県</option>
                <option value="19" <?php if($map_pref==19) echo selected; ?>>長野県</option>
                <option value="20" <?php if($map_pref==20) echo selected; ?>>岐阜県</option>
                <option value="21" <?php if($map_pref==21) echo selected; ?>>静岡県</option>
                <option value="22" <?php if($map_pref==22) echo selected; ?>>愛知県</option>
                <option value="23" <?php if($map_pref==23) echo selected; ?>>三重県</option>
                <option value="24" <?php if($map_pref==24) echo selected; ?>>滋賀県</option>
                <option value="25" <?php if($map_pref==25) echo selected; ?>>京都府</option>
                <option value="26" <?php if($map_pref==26) echo selected; ?>>大阪府</option>
                <option value="27" <?php if($map_pref==27) echo selected; ?>>兵庫県</option>
                <option value="28" <?php if($map_pref==28) echo selected; ?>>奈良県</option>
                <option value="29" <?php if($map_pref==29) echo selected; ?>>和歌山県</option>
                <option value="30" <?php if($map_pref==30) echo selected; ?>>鳥取県</option>
                <option value="31" <?php if($map_pref==31) echo selected; ?>>島根県</option>
                <option value="32" <?php if($map_pref==32) echo selected; ?>>岡山県</option>
                <option value="33" <?php if($map_pref==33) echo selected; ?>>広島県</option>
                <option value="34" <?php if($map_pref==34) echo selected; ?>>山口県</option>
                <option value="35" <?php if($map_pref==35) echo selected; ?>>徳島県</option>
                <option value="36" <?php if($map_pref==36) echo selected; ?>>香川県</option>
                <option value="37" <?php if($map_pref==37) echo selected; ?>>愛媛県</option>
                <option value="38" <?php if($map_pref==38) echo selected; ?>>高知県</option>
                <option value="39" <?php if($map_pref==39) echo selected; ?>>福岡県</option>
                <option value="40" <?php if($map_pref==40) echo selected; ?>>佐賀県</option>
                <option value="41" <?php if($map_pref==41) echo selected; ?>>長崎県</option>
                <option value="42" <?php if($map_pref==42) echo selected; ?>>熊本県</option>
                <option value="43" <?php if($map_pref==43) echo selected; ?>>大分県</option>
                <option value="44" <?php if($map_pref==44) echo selected; ?>>宮崎県</option>
                <option value="45" <?php if($map_pref==45) echo selected; ?>>鹿児島県</option>
                <option value="46" <?php if($map_pref==46) echo selected; ?>>沖縄県</option>
              </select>
            </p>

            <p>会場面積<br>
              <select name="venue_area_select">
                <option value="-1" <?php if($venue_area_select=="") echo selected; ?>>指定なし</option>
                <option value="0" <?php if($venue_area_select=="0") echo selected; ?>>0㎡〜49㎡</option>
                <option value="1" <?php if($venue_area_select=="1") echo selected; ?>>50㎡〜99㎡</option>
                <option value="2" <?php if($venue_area_select=="2") echo selected; ?>>100㎡〜149㎡</option>
                <option value="3" <?php if($venue_area_select=="3") echo selected; ?>>150㎡〜199㎡</option>
                <option value="4" <?php if($venue_area_select=="4") echo selected; ?>>200㎡〜249㎡</option>
                <option value="5" <?php if($venue_area_select=="5") echo selected; ?>>250㎡〜299㎡</option>
                <option value="6" <?php if($venue_area_select=="6") echo selected; ?>>300㎡〜</option>
              </select>
            </p>

            <?php
            $data = array();
            $html = "";
            $i = 0;
            $pages = get_posts(
              array(
                'posts_per_page' => -1,
                'post_type' => 'page',
                'pagename' => 'tstd_option_page'
              )
            );
            foreach( $pages as $p ) {
              $data = explode(',',$p->post_content);
            }
            foreach( $data as $value ) {
              $v = explode(':',$value);

              $checked = ( in_array($v[0], (array)$option) ) ? "checked": "";
              $html .= '<label><input type="checkbox" name="option[]" value="'.$v[0].'" '.$checked.'>'.$v[1].'</label>';
            }
            wp_reset_postdata();
            ?>
            <p>
              施設設備・オプション<br>
              <?php echo $html; ?>
            </p>

            <p>キーワード検索<br><input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="キーワードを入力"></p>

            <input type="hidden" name="search_nonce" value="<?php echo wp_create_nonce('search_nonce'); ?>">
            <p><button type="submit">検索</button></p>
          </form>

        </div>

        <?php
          $data = $wpdb->get_results( $query );
          //var_dump($data);
        ?>

        <?php if( $data ): ?>

          <ul>
          <?php
            foreach( $data as $id ) {
              $wpId[] = $id->ID;
            }
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'space_post',
              'post__in' => $wpId,
              'posts_per_page' => -1,
              'paged' => $paged
            );
            $query = new WP_Query($args);
            while($query->have_posts()): $query->the_post();
          ?>

          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

          <?php endwhile; ?>

          <?php wp_reset_postdata(); ?>
          </ul>

        <?php else: ?>
          <p>検索条件に一致する情報がありません。</p>
        <?php endif; ?>

      </article>

  </div>

<?php get_footer(); ?>
