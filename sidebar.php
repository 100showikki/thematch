<div id="sub_column" class="mh">
  <div id="subClose" class="pc-hide"></div>
  <div class="widget_box category">
    <h3>CATEGORY</h3>
    <ul>
      <?php
        $args = array(
          'title_li' => '',
          'show_count' => 1
        );
        wp_list_categories($args);
      ?>
    </ul>
  </div>

  <div class="widget_box member">
    <h3>MEMBER</h3>
    <ul>

      <?php
        $args = array(
          'orderby' => 'url',
          'role__in' => array('author')
        );
        $users = get_users($args);
//        var_dump($users);
      ?>

      <?php foreach( $users as $u ): ?>
        <li><a href="<?php echo home_url(); ?>/author/<?php echo $u->user_login; ?>">
        <div class="editor">
          <div class="photo">
            <img src="<?php echo get_template_directory_uri(); ?>/staff-img/<?php echo $u->user_login; ?>.png" alt="">
          </div>
          <?php echo $u->display_name; ?>
        </div>
      </a></li>
      <?php endforeach; ?>

    </ul>
  </div>
</div>
