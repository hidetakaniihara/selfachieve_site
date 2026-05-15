<?php
/**
 * front-page.php - TOPページテンプレート
 * Template Name: トップページ
 */
get_header();

// TOPページのmain content（<body>〜</body>間のheader/footer以外）
// 静的HTMLから移植
?>

<?php
// index.htmlの<body class="page-top">直後〜<footer>直前の内容をここに配置
// 現時点では静的HTMLのコンテンツをそのまま include する
$static_content = get_template_directory() . '/page-content/top.php';
if ( file_exists( $static_content ) ) {
    include $static_content;
}
?>

<?php get_footer(); ?>
