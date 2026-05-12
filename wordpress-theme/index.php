<?php
/**
 * selfachieve_theme - index.php
 *
 * WordPressはこのファイルをフォールバックテンプレートとして使用します。
 * 通常のページ表示はfront-page.php / archive-*.php / single-*.php が担当します。
 */

get_header();
?>

<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
