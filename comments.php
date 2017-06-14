<section id="commentBox">

  <!-- コメントがあれば一覧表示 -->
  <?php if( have_comments() ): ?>
    <div id="comment-list">
    <?php foreach ($comments as $comment) : ?>
      <div id="comment-<?php comment_ID() ?>">
        <h5><?php comment_author_link() ?></h5>
        <div class="comment-txt">
          <?php comment_text() ?>
        </div>
        <p><?php comment_type(); ?>　<?php comment_date() ?> @ <?php comment_time() ?>　<?php edit_comment_link(); ?></p>
      </div>
    <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- コメントを受け付けている場合 -->
  <?php if ( comments_open() ) : ?>
  <div id="comment-input">

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">

    <!-- ログインしている場合 -->
    <?php if ( is_user_logged_in() ) : ?>
      <p>現在「<?php echo $user_identity; ?>」としてログイン中です。ログアウトする場合は<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>">こちら</a></p>

    <!-- ログインしていない場合 -->
    <?php else : ?>
      <dl>
        <dt><label for="author">お名前：</label></dt>
        <dd><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"></dd>

        <dt><label for="email">メールアドレス：<span>（表示はされません）</span></label></dt>
        <dd><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>"></dd>

        <dt><label for="url">URL：<span>（名前にリンクされて利用されます）</span></label></dt>
        <dd><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>"></dd>

      </dl>

    <?php endif; ?>

    <!-- 以下共通 -->
    <dl>
      <dt><label for="comment">コメント：</label></dt>
      <dd><textarea name="comment" id="comment"></textarea></dd>
    </dl>

    <input name="submit" type="submit" id="submit" value="送　信">

    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
    <?php do_action('comment_form', $post->ID); ?>

    </form>

  <?php endif; ?>

</section>
<!-- /#comment-box -->
