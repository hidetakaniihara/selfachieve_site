<?php
/**
 * selfachieve テーマ functions.php
 */

// テーマサポート設定
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

// CSS / JS の読み込み
function selfachieve_enqueue_assets() {
    $ver = '1.0.2';
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap',
        [],
        null
    );
    // メインCSS
    wp_enqueue_style(
        'selfachieve-style',
        get_template_directory_uri() . '/assets/style.css',
        [ 'google-fonts' ],
        $ver
    );
    // Swiper CSS
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11'
    );
    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11',
        true
    );
    // メインJS
    wp_enqueue_script(
        'selfachieve-common',
        get_template_directory_uri() . '/assets/common.js',
        [],
        $ver,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'selfachieve_enqueue_assets' );

// 著作権年の動的出力
function selfachieve_copyright_year() {
    return date( 'Y' );
}

// ============================================================
// カスタム投稿タイプ登録
// ============================================================
function selfachieve_register_post_types() {

    // お知らせ
    register_post_type( 'news', [
        'labels' => [
            'name'          => 'お知らせ',
            'singular_name' => 'お知らせ',
            'add_new_item'  => '新しいお知らせを追加',
            'edit_item'     => 'お知らせを編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'news' ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-megaphone',
    ] );

    // コラム
    register_post_type( 'column', [
        'labels' => [
            'name'          => 'コラム',
            'singular_name' => 'コラム',
            'add_new_item'  => '新しいコラムを追加',
            'edit_item'     => 'コラムを編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [
            'slug'       => 'column/%column_cat%',
            'with_front' => false,
        ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-edit',
    ] );

    // お客さまの声
    register_post_type( 'voice', [
        'labels' => [
            'name'          => 'お客さまの声',
            'singular_name' => 'お客さまの声',
            'add_new_item'  => '新しいお客さまの声を追加',
            'edit_item'     => 'お客さまの声を編集',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'voice-post' ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-format-quote',
    ] );

    // 実績
    register_post_type( 'works', [
        'labels' => [
            'name'          => '実績',
            'singular_name' => '実績',
            'add_new_item'  => '新しい実績を追加',
            'edit_item'     => '実績を編集',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'works', 'with_front' => false ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-portfolio',
    ] );
}
add_action( 'init', 'selfachieve_register_post_types' );

// ============================================================
// カスタムタクソノミー登録
// ============================================================
function selfachieve_register_taxonomies() {

    // コラム カテゴリ
    register_taxonomy( 'column_cat', 'column', [
        'labels' => [
            'name'          => 'コラムカテゴリ',
            'singular_name' => 'コラムカテゴリ',
            'add_new_item'  => '新しいカテゴリを追加',
        ],
        'hierarchical'  => true,
        'public'        => true,
        'rewrite'       => [
            'slug'       => 'column',
            'with_front' => false,
        ],
        'show_in_rest'  => true,
    ] );

    // お客さまの声 サービスタグ
    register_taxonomy( 'voice_service', 'voice', [
        'labels' => [
            'name'          => 'サービスタグ',
            'singular_name' => 'サービスタグ',
            'add_new_item'  => '新しいタグを追加',
        ],
        'hierarchical'  => false,
        'public'        => true,
        'rewrite'       => [ 'slug' => 'voice-service' ],
        'show_in_rest'  => true,
    ] );

    // 実績 カテゴリ
    register_taxonomy( 'works_cat', 'works', [
        'labels' => [
            'name'          => '実績カテゴリ',
            'singular_name' => '実績カテゴリ',
            'add_new_item'  => '新しいカテゴリを追加',
        ],
        'hierarchical'  => true,
        'public'        => true,
        'rewrite'       => [ 'slug' => 'works-cat' ],
        'show_in_rest'  => true,
    ] );
}
add_action( 'init', 'selfachieve_register_taxonomies' );

// ============================================================
// コラムパーマリンク: %column_cat% を実際のカテゴリスラッグに置換
// ============================================================
function selfachieve_column_permalink( $post_link, $post ) {
    if ( 'column' !== $post->post_type ) {
        return $post_link;
    }
    $terms = get_the_terms( $post->ID, 'column_cat' );
    if ( $terms && ! is_wp_error( $terms ) ) {
        // 親カテゴリを優先する（階層がある場合に備えてルートを使用）
        $root_term = null;
        foreach ( $terms as $term ) {
            if ( 0 === $term->parent ) {
                $root_term = $term;
                break;
            }
        }
        $cat_slug = $root_term ? $root_term->slug : $terms[0]->slug;
    } else {
        $cat_slug = 'uncategorized';
    }
    return str_replace( '%column_cat%', $cat_slug, $post_link );
}
add_filter( 'post_type_link', 'selfachieve_column_permalink', 10, 2 );

// ============================================================
// メタボックス登録
// ============================================================
function selfachieve_add_meta_boxes() {

    // ---- お知らせ ----
    add_meta_box(
        'news_meta',
        'お知らせ情報',
        'selfachieve_news_meta_cb',
        'news',
        'side',
        'high'
    );

    // ---- コラム ----
    add_meta_box(
        'column_meta',
        'コラム情報',
        'selfachieve_column_meta_cb',
        'column',
        'side',
        'high'
    );

    // ---- お客さまの声 ----
    add_meta_box(
        'voice_meta',
        'お客さまの声 詳細情報',
        'selfachieve_voice_meta_cb',
        'voice',
        'normal',
        'high'
    );

    // ---- 実績 ----
    add_meta_box(
        'works_meta',
        '実績 詳細情報',
        'selfachieve_works_meta_cb',
        'works',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'selfachieve_add_meta_boxes' );

// ---- お知らせ メタボックス描画 ----
function selfachieve_news_meta_cb( $post ) {
    wp_nonce_field( 'selfachieve_news_meta', 'selfachieve_news_nonce' );
    $cat = get_post_meta( $post->ID, '_news_category', true );
    ?>
    <p>
        <label style="font-weight:bold;">カテゴリ</label><br>
        <input type="text" name="news_category" value="<?php echo esc_attr( $cat ); ?>" style="width:100%;" placeholder="例：お知らせ、プレスリリース">
    </p>
    <?php
}

// ---- コラム メタボックス描画 ----
function selfachieve_column_meta_cb( $post ) {
    wp_nonce_field( 'selfachieve_column_meta', 'selfachieve_column_nonce' );
    $reading_time = get_post_meta( $post->ID, '_column_reading_time', true );
    $updated      = get_post_meta( $post->ID, '_column_updated', true );
    $author_name  = get_post_meta( $post->ID, '_column_author_name', true );
    $author_title = get_post_meta( $post->ID, '_column_author_title', true );
    $author_bio   = get_post_meta( $post->ID, '_column_author_bio', true );
    $author_photo = get_post_meta( $post->ID, '_column_author_photo', true );
    ?>
    <p>
        <label style="font-weight:bold;">読了時間（分）</label><br>
        <input type="number" name="column_reading_time" value="<?php echo esc_attr( $reading_time ); ?>" style="width:100%;" placeholder="例：5">
    </p>
    <p>
        <label style="font-weight:bold;">更新日（任意・YYYY-MM-DD）</label><br>
        <input type="text" name="column_updated" value="<?php echo esc_attr( $updated ); ?>" style="width:100%;" placeholder="例：2026-05-01">
    </p>
    <p>
        <label style="font-weight:bold;">著者名</label><br>
        <input type="text" name="column_author_name" value="<?php echo esc_attr( $author_name ); ?>" style="width:100%;" placeholder="例：新原 秀崇">
    </p>
    <p>
        <label style="font-weight:bold;">著者肩書き</label><br>
        <input type="text" name="column_author_title" value="<?php echo esc_attr( $author_title ); ?>" style="width:100%;" placeholder="例：セルフアチーブ / WEBマーケター">
    </p>
    <p>
        <label style="font-weight:bold;">著者プロフィール</label><br>
        <textarea name="column_author_bio" style="width:100%;height:80px;" placeholder="例：神戸・兵庫を中心に100社以上のSEO対策を支援。"><?php echo esc_textarea( $author_bio ); ?></textarea>
    </p>
    <p>
        <label style="font-weight:bold;">著者写真URL（任意）</label><br>
        <input type="url" name="column_author_photo" value="<?php echo esc_attr( $author_photo ); ?>" style="width:100%;" placeholder="https://example.com/photo.jpg">
    </p>
    <?php
}

// ---- お客さまの声 メタボックス描画 ----
function selfachieve_voice_meta_cb( $post ) {
    wp_nonce_field( 'selfachieve_voice_meta', 'selfachieve_voice_nonce' );
    $company     = get_post_meta( $post->ID, '_voice_company',     true );
    $industry    = get_post_meta( $post->ID, '_voice_industry',    true );
    $service_tag = get_post_meta( $post->ID, '_voice_service_tag', true );
    $hover_quote = get_post_meta( $post->ID, '_voice_hover_quote', true );
    $site_url    = get_post_meta( $post->ID, '_voice_site_url',    true );
    $number      = get_post_meta( $post->ID, '_voice_number',      true );
    $filter_cat  = get_post_meta( $post->ID, '_voice_filter_cat',  true );
    ?>
    <table style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:6px 0;font-weight:bold;width:130px;">No.（表示番号）</td>
            <td><input type="number" name="voice_number" value="<?php echo esc_attr( $number ); ?>" style="width:100%;" placeholder="例：18"></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">会社名</td>
            <td><input type="text" name="voice_company" value="<?php echo esc_attr( $company ); ?>" style="width:100%;" placeholder="例：岩澤法理事務所 様"></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">業種</td>
            <td><input type="text" name="voice_industry" value="<?php echo esc_attr( $industry ); ?>" style="width:100%;" placeholder="例：法律事務所"></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">依頼サービス</td>
            <td><input type="text" name="voice_service_tag" value="<?php echo esc_attr( $service_tag ); ?>" style="width:100%;" placeholder="例：SEO対策"></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">フィルターカテゴリ<br><small>（スペース区切り）</small></td>
            <td><input type="text" name="voice_filter_cat" value="<?php echo esc_attr( $filter_cat ); ?>" style="width:100%;" placeholder="例：seo listing"></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">ホバー時コメント</td>
            <td><textarea name="voice_hover_quote" style="width:100%;height:60px;" placeholder="例：「業界の特殊性を理解してくれるパートナーに出会えました。」"><?php echo esc_textarea( $hover_quote ); ?></textarea></td>
        </tr>
        <tr>
            <td style="padding:6px 0;font-weight:bold;">サイトURL</td>
            <td><input type="url" name="voice_site_url" value="<?php echo esc_attr( $site_url ); ?>" style="width:100%;" placeholder="https://example.com/"></td>
        </tr>
    </table>
    <p style="margin-top:12px;color:#666;font-size:12px;">
        ※ アイキャッチ画像（カード・詳細共通）は右側の「アイキャッチ画像」から設定してください。<br>
        ※ インタビュー本文は本文エディタに入力してください。
    </p>
    <?php
}

// ---- 実績 メタボックス描画 ----
function selfachieve_works_meta_cb( $post ) {
    wp_nonce_field( 'selfachieve_works_meta', 'selfachieve_works_nonce' );
    $number       = get_post_meta( $post->ID, '_works_number',       true );
    $category     = get_post_meta( $post->ID, '_works_category',     true );
    $client       = get_post_meta( $post->ID, '_works_client',       true );
    $location     = get_post_meta( $post->ID, '_works_location',     true );
    $industry     = get_post_meta( $post->ID, '_works_industry',     true );
    $service      = get_post_meta( $post->ID, '_works_service',      true );
    $site_url     = get_post_meta( $post->ID, '_works_site_url',     true );
    $pc_img_url   = get_post_meta( $post->ID, '_works_pc_img_url',   true );
    $sp_img_url   = get_post_meta( $post->ID, '_works_sp_img_url',   true );
    // 実績数値（最大3件）
    $r1_num   = get_post_meta( $post->ID, '_works_result1_num',   true );
    $r1_unit  = get_post_meta( $post->ID, '_works_result1_unit',  true );
    $r1_pre   = get_post_meta( $post->ID, '_works_result1_pre',   true );
    $r1_title = get_post_meta( $post->ID, '_works_result1_title', true );
    $r1_desc  = get_post_meta( $post->ID, '_works_result1_desc',  true );
    $r2_num   = get_post_meta( $post->ID, '_works_result2_num',   true );
    $r2_unit  = get_post_meta( $post->ID, '_works_result2_unit',  true );
    $r2_pre   = get_post_meta( $post->ID, '_works_result2_pre',   true );
    $r2_title = get_post_meta( $post->ID, '_works_result2_title', true );
    $r2_desc  = get_post_meta( $post->ID, '_works_result2_desc',  true );
    $r3_num   = get_post_meta( $post->ID, '_works_result3_num',   true );
    $r3_unit  = get_post_meta( $post->ID, '_works_result3_unit',  true );
    $r3_pre   = get_post_meta( $post->ID, '_works_result3_pre',   true );
    $r3_title = get_post_meta( $post->ID, '_works_result3_title', true );
    $r3_desc  = get_post_meta( $post->ID, '_works_result3_desc',  true );
    // ポイント（最大3件）
    $p1_head = get_post_meta( $post->ID, '_works_point1_head', true );
    $p1_body = get_post_meta( $post->ID, '_works_point1_body', true );
    $p2_head = get_post_meta( $post->ID, '_works_point2_head', true );
    $p2_body = get_post_meta( $post->ID, '_works_point2_body', true );
    $p3_head = get_post_meta( $post->ID, '_works_point3_head', true );
    $p3_body = get_post_meta( $post->ID, '_works_point3_body', true );
    ?>
    <h4 style="border-bottom:2px solid #eee;padding-bottom:6px;">基本情報</h4>
    <table style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:5px 0;font-weight:bold;width:130px;">No.（表示番号）</td>
            <td><input type="number" name="works_number" value="<?php echo esc_attr( $number ); ?>" style="width:100%;" placeholder="例：1"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">カテゴリ</td>
            <td><input type="text" name="works_category" value="<?php echo esc_attr( $category ); ?>" style="width:100%;" placeholder="例：ホームページ制作"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">クライアント名</td>
            <td><input type="text" name="works_client" value="<?php echo esc_attr( $client ); ?>" style="width:100%;" placeholder="例：さんプラザコンタクトレンズ"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">所在地</td>
            <td><input type="text" name="works_location" value="<?php echo esc_attr( $location ); ?>" style="width:100%;" placeholder="例：兵庫県神戸市"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">業種</td>
            <td><input type="text" name="works_industry" value="<?php echo esc_attr( $industry ); ?>" style="width:100%;" placeholder="例：コンタクトレンズ販売"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">実施施策</td>
            <td><input type="text" name="works_service" value="<?php echo esc_attr( $service ); ?>" style="width:100%;" placeholder="例：ホームページ制作 / SEO対策"></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">サイトURL</td>
            <td><input type="url" name="works_site_url" value="<?php echo esc_attr( $site_url ); ?>" style="width:100%;" placeholder="https://example.com/"></td>
        </tr>
    </table>

    <h4 style="border-bottom:2px solid #eee;padding-bottom:6px;margin-top:16px;">モックアップ画像URL</h4>
    <p style="font-size:12px;color:#666;">メディアライブラリからURLをコピーして貼り付けてください。</p>
    <table style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:5px 0;font-weight:bold;width:130px;">PC画像URL</td>
            <td><input type="url" name="works_pc_img_url" value="<?php echo esc_attr( $pc_img_url ); ?>" style="width:100%;" placeholder="https://..."></td>
        </tr>
        <tr>
            <td style="padding:5px 0;font-weight:bold;">SP画像URL</td>
            <td><input type="url" name="works_sp_img_url" value="<?php echo esc_attr( $sp_img_url ); ?>" style="width:100%;" placeholder="https://..."></td>
        </tr>
    </table>

    <h4 style="border-bottom:2px solid #eee;padding-bottom:6px;margin-top:16px;">数字でわかる実績（最大3件）</h4>
    <?php
    $results = [
        1 => [ 'num' => $r1_num, 'unit' => $r1_unit, 'pre' => $r1_pre, 'title' => $r1_title, 'desc' => $r1_desc ],
        2 => [ 'num' => $r2_num, 'unit' => $r2_unit, 'pre' => $r2_pre, 'title' => $r2_title, 'desc' => $r2_desc ],
        3 => [ 'num' => $r3_num, 'unit' => $r3_unit, 'pre' => $r3_pre, 'title' => $r3_title, 'desc' => $r3_desc ],
    ];
    foreach ( $results as $i => $r ) : ?>
    <div style="background:#f9f9f9;padding:10px;margin-bottom:10px;border-radius:4px;">
        <strong>実績<?php echo $i; ?></strong>
        <table style="width:100%;border-collapse:collapse;margin-top:6px;">
            <tr>
                <td style="padding:4px 0;width:100px;">前置き文字</td>
                <td><input type="text" name="works_result<?php echo $i; ?>_pre" value="<?php echo esc_attr( $r['pre'] ); ?>" style="width:100%;" placeholder="例：Top"></td>
            </tr>
            <tr>
                <td style="padding:4px 0;">数値</td>
                <td><input type="text" name="works_result<?php echo $i; ?>_num" value="<?php echo esc_attr( $r['num'] ); ?>" style="width:100%;" placeholder="例：3"></td>
            </tr>
            <tr>
                <td style="padding:4px 0;">単位</td>
                <td><input type="text" name="works_result<?php echo $i; ?>_unit" value="<?php echo esc_attr( $r['unit'] ); ?>" style="width:100%;" placeholder="例：倍、%、秒"></td>
            </tr>
            <tr>
                <td style="padding:4px 0;">見出し</td>
                <td><input type="text" name="works_result<?php echo $i; ?>_title" value="<?php echo esc_attr( $r['title'] ); ?>" style="width:100%;" placeholder="例：月間問い合わせ数"></td>
            </tr>
            <tr>
                <td style="padding:4px 0;">説明文</td>
                <td><textarea name="works_result<?php echo $i; ?>_desc" style="width:100%;height:50px;" placeholder="例：制作前比で大幅増加"><?php echo esc_textarea( $r['desc'] ); ?></textarea></td>
            </tr>
        </table>
    </div>
    <?php endforeach; ?>

    <h4 style="border-bottom:2px solid #eee;padding-bottom:6px;margin-top:16px;">制作ポイント（最大3件）</h4>
    <?php
    $points = [
        1 => [ 'head' => $p1_head, 'body' => $p1_body ],
        2 => [ 'head' => $p2_head, 'body' => $p2_body ],
        3 => [ 'head' => $p3_head, 'body' => $p3_body ],
    ];
    foreach ( $points as $i => $p ) : ?>
    <div style="background:#f9f9f9;padding:10px;margin-bottom:10px;border-radius:4px;">
        <strong>POINT <?php echo $i; ?></strong>
        <table style="width:100%;border-collapse:collapse;margin-top:6px;">
            <tr>
                <td style="padding:4px 0;width:60px;">見出し</td>
                <td><input type="text" name="works_point<?php echo $i; ?>_head" value="<?php echo esc_attr( $p['head'] ); ?>" style="width:100%;" placeholder="例：コンセプトを軸にしたデザイン設計"></td>
            </tr>
            <tr>
                <td style="padding:4px 0;">本文</td>
                <td><textarea name="works_point<?php echo $i; ?>_body" style="width:100%;height:70px;" placeholder="説明文を入力"><?php echo esc_textarea( $p['body'] ); ?></textarea></td>
            </tr>
        </table>
    </div>
    <?php endforeach; ?>
    <p style="color:#666;font-size:12px;">※ アイキャッチ画像は右側の「アイキャッチ画像」から設定してください。</p>
    <?php
}

// ============================================================
// メタボックス保存処理
// ============================================================
function selfachieve_save_meta_boxes( $post_id ) {

    // 自動保存・権限チェック
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // ---- お知らせ ----
    if ( isset( $_POST['selfachieve_news_nonce'] ) &&
         wp_verify_nonce( $_POST['selfachieve_news_nonce'], 'selfachieve_news_meta' ) ) {
        update_post_meta( $post_id, '_news_category', sanitize_text_field( $_POST['news_category'] ?? '' ) );
    }

    // ---- コラム ----
    if ( isset( $_POST['selfachieve_column_nonce'] ) &&
         wp_verify_nonce( $_POST['selfachieve_column_nonce'], 'selfachieve_column_meta' ) ) {
        update_post_meta( $post_id, '_column_reading_time', absint( $_POST['column_reading_time'] ?? 0 ) );
        update_post_meta( $post_id, '_column_updated',      sanitize_text_field( $_POST['column_updated'] ?? '' ) );
        update_post_meta( $post_id, '_column_author_name',  sanitize_text_field( $_POST['column_author_name'] ?? '' ) );
        update_post_meta( $post_id, '_column_author_title', sanitize_text_field( $_POST['column_author_title'] ?? '' ) );
        update_post_meta( $post_id, '_column_author_bio',   sanitize_textarea_field( $_POST['column_author_bio'] ?? '' ) );
        update_post_meta( $post_id, '_column_author_photo', esc_url_raw( $_POST['column_author_photo'] ?? '' ) );
    }

    // ---- お客さまの声 ----
    if ( isset( $_POST['selfachieve_voice_nonce'] ) &&
         wp_verify_nonce( $_POST['selfachieve_voice_nonce'], 'selfachieve_voice_meta' ) ) {
        update_post_meta( $post_id, '_voice_number',      absint( $_POST['voice_number'] ?? 0 ) );
        update_post_meta( $post_id, '_voice_company',     sanitize_text_field( $_POST['voice_company'] ?? '' ) );
        update_post_meta( $post_id, '_voice_industry',    sanitize_text_field( $_POST['voice_industry'] ?? '' ) );
        update_post_meta( $post_id, '_voice_service_tag', sanitize_text_field( $_POST['voice_service_tag'] ?? '' ) );
        update_post_meta( $post_id, '_voice_filter_cat',  sanitize_text_field( $_POST['voice_filter_cat'] ?? '' ) );
        update_post_meta( $post_id, '_voice_hover_quote', sanitize_textarea_field( $_POST['voice_hover_quote'] ?? '' ) );
        update_post_meta( $post_id, '_voice_site_url',    esc_url_raw( $_POST['voice_site_url'] ?? '' ) );
    }

    // ---- 実績 ----
    if ( isset( $_POST['selfachieve_works_nonce'] ) &&
         wp_verify_nonce( $_POST['selfachieve_works_nonce'], 'selfachieve_works_meta' ) ) {
        update_post_meta( $post_id, '_works_number',     absint( $_POST['works_number'] ?? 0 ) );
        update_post_meta( $post_id, '_works_category',   sanitize_text_field( $_POST['works_category'] ?? '' ) );
        update_post_meta( $post_id, '_works_client',     sanitize_text_field( $_POST['works_client'] ?? '' ) );
        update_post_meta( $post_id, '_works_location',   sanitize_text_field( $_POST['works_location'] ?? '' ) );
        update_post_meta( $post_id, '_works_industry',   sanitize_text_field( $_POST['works_industry'] ?? '' ) );
        update_post_meta( $post_id, '_works_service',    sanitize_text_field( $_POST['works_service'] ?? '' ) );
        update_post_meta( $post_id, '_works_site_url',   esc_url_raw( $_POST['works_site_url'] ?? '' ) );
        update_post_meta( $post_id, '_works_pc_img_url', esc_url_raw( $_POST['works_pc_img_url'] ?? '' ) );
        update_post_meta( $post_id, '_works_sp_img_url', esc_url_raw( $_POST['works_sp_img_url'] ?? '' ) );
        // 実績数値
        for ( $i = 1; $i <= 3; $i++ ) {
            update_post_meta( $post_id, "_works_result{$i}_num",   sanitize_text_field( $_POST["works_result{$i}_num"]   ?? '' ) );
            update_post_meta( $post_id, "_works_result{$i}_unit",  sanitize_text_field( $_POST["works_result{$i}_unit"]  ?? '' ) );
            update_post_meta( $post_id, "_works_result{$i}_pre",   sanitize_text_field( $_POST["works_result{$i}_pre"]   ?? '' ) );
            update_post_meta( $post_id, "_works_result{$i}_title", sanitize_text_field( $_POST["works_result{$i}_title"] ?? '' ) );
            update_post_meta( $post_id, "_works_result{$i}_desc",  sanitize_textarea_field( $_POST["works_result{$i}_desc"] ?? '' ) );
        }
        // ポイント
        for ( $i = 1; $i <= 3; $i++ ) {
            update_post_meta( $post_id, "_works_point{$i}_head", sanitize_text_field( $_POST["works_point{$i}_head"] ?? '' ) );
            update_post_meta( $post_id, "_works_point{$i}_body", sanitize_textarea_field( $_POST["works_point{$i}_body"] ?? '' ) );
        }
    }
}
add_action( 'save_post', 'selfachieve_save_meta_boxes' );

// ============================================================
// body_class フィルター
// ============================================================
function selfachieve_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'page-top';
    } elseif ( is_page() ) {
        $slug = get_post_field( 'post_name', get_the_ID() );
        if ( $slug ) {
            $classes[] = 'page-' . $slug;
        }
    } elseif ( is_singular( 'news' ) ) {
        $classes[] = 'page-news-single';
    } elseif ( is_post_type_archive( 'news' ) ) {
        $classes[] = 'page-news';
    } elseif ( is_singular( 'column' ) ) {
        $classes[] = 'page-column-single';
    } elseif ( is_post_type_archive( 'column' ) ) {
        $classes[] = 'page-columns';
    } elseif ( is_singular( 'voice' ) ) {
        $classes[] = 'page-voice-single';
    } elseif ( is_post_type_archive( 'voice' ) ) {
        $classes[] = 'page-voice';
    } elseif ( is_singular( 'works' ) ) {
        $classes[] = 'page-works-single';
    } elseif ( is_post_type_archive( 'works' ) ) {
        $classes[] = 'page-works';
    }
    return $classes;
}
add_filter( 'body_class', 'selfachieve_body_classes' );

// nginx環境でAuthorizationヘッダーをWordPressに転送する
if ( ! isset( $_SERVER['HTTP_AUTHORIZATION'] ) ) {
    if ( isset( $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ) ) {
        $_SERVER['HTTP_AUTHORIZATION'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    }
}


// 構造化データ（JSON-LD）
require_once get_template_directory() . '/inc/schema.php';


// ============================================================
// OGP og:image フォールバック（アイキャッチ未設定時にデフォルト画像を使用）
// ============================================================
function selfachieve_ogp_image_fallback() {
    // AIOSEOが出力するog:imageを上書きしないよう、アイキャッチがない場合のみ出力
    if ( is_singular() ) {
        $post_id = get_the_ID();
        $has_thumbnail = has_post_thumbnail( $post_id );
        // アイキャッチなし かつ AIOSEOが設定したog:imageもない場合にフォールバック出力
        if ( ! $has_thumbnail ) {
            $default_ogp = get_template_directory_uri() . '/assets/ogp-default.jpg';
            echo '<meta property="og:image" content="' . esc_url( $default_ogp ) . '">' . "\n";
            echo '<meta property="og:image:width" content="1200">' . "\n";
            echo '<meta property="og:image:height" content="630">' . "\n";
        }
    } elseif ( is_front_page() || is_home() || is_archive() || is_search() ) {
        $default_ogp = get_template_directory_uri() . '/assets/ogp-default.jpg';
        echo '<meta property="og:image" content="' . esc_url( $default_ogp ) . '">' . "\n";
        echo '<meta property="og:image:width" content="1200">' . "\n";
        echo '<meta property="og:image:height" content="630">' . "\n";
    }
}
add_action( 'wp_head', 'selfachieve_ogp_image_fallback', 99 );

// ============================================================
// コンテンツ内 img タグへの width/height 自動付与
// ============================================================
function selfachieve_add_image_dimensions( $content ) {
    if ( ! $content ) {
        return $content;
    }
    // width/height が未設定の img タグを検索
    $content = preg_replace_callback(
        '/<img([^>]+)>/i',
        function( $matches ) {
            $tag = $matches[1];
            // すでに width または height が設定されている場合はスキップ
            if ( preg_match( '/\bwidth\s*=/i', $tag ) || preg_match( '/\bheight\s*=/i', $tag ) ) {
                return '<img' . $tag . '>';
            }
            // src を取得
            if ( ! preg_match( '/\bsrc\s*=\s*["\']([^"\']+)["\']/', $tag, $src_match ) ) {
                return '<img' . $tag . '>';
            }
            $src = $src_match[1];
            // アップロードディレクトリ内の画像のみ対象
            $upload_dir = wp_upload_dir();
            $base_url   = $upload_dir['baseurl'];
            if ( strpos( $src, $base_url ) === false ) {
                return '<img' . $tag . '>';
            }
            // ローカルパスに変換してサイズ取得
            $local_path = str_replace( $base_url, $upload_dir['basedir'], $src );
            if ( ! file_exists( $local_path ) ) {
                return '<img' . $tag . '>';
            }
            $size = @getimagesize( $local_path );
            if ( ! $size ) {
                return '<img' . $tag . '>';
            }
            return '<img' . $tag . ' width="' . $size[0] . '" height="' . $size[1] . '">';
        },
        $content
    );
    return $content;
}
add_filter( 'the_content', 'selfachieve_add_image_dimensions', 10 );


// ============================================================
// スクリプトへの defer 属性付与（レンダリングブロック解消）
// ============================================================
function selfachieve_add_defer_to_scripts( $tag, $handle, $src ) {
    // defer を付与するスクリプトハンドル一覧
    $defer_handles = [
        'swiper-js',
        'selfachieve-common',
        'contact-form-7',
        'wp-hooks',
    ];
    if ( in_array( $handle, $defer_handles, true ) ) {
        // すでに defer が付いている場合は二重付与しない
        if ( false === strpos( $tag, ' defer' ) ) {
            $tag = str_replace( ' src=', ' defer src=', $tag );
        }
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'selfachieve_add_defer_to_scripts', 10, 3 );

// ============================================================
// Contact Form 7 設定
// ============================================================

/**
 * CF7のデフォルトCSSを無効化（テーマCSSで管理するため）
 */
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * CF7送信成功時にサンクスページへリダイレクト
 * CF7 6.x系では on_sent_ok が廃止されたため、
 * wpcf7mailsentイベント（JavaScript）で対応する
 */
add_action( 'wp_footer', function() {
    if ( ! function_exists( 'wpcf7' ) ) return;
    $thanks_url = home_url( '/thanks/' );
    ?>
    <script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        window.location.href = '<?php echo esc_js( $thanks_url ); ?>';
    }, false );
    </script>
    <?php
} );

/**
 * CF7のチェックボックスをラベル付きで出力するためのクラス調整
 * form-check-item クラスをCF7のチェックボックスラベルに付与
 */
add_filter( 'wpcf7_form_elements', function( $html ) {
    // CF7が出力するチェックボックスのlabelにform-check-itemクラスを追加
    $html = preg_replace(
        '/<label class="wpcf7-list-item-label">/',
        '<label class="wpcf7-list-item-label form-check-item">',
        $html
    );
    return $html;
} );

// ============================================================
// Google Analytics 4 (GA4) タグ
// ============================================================
function selfachieve_ga4_tag() {
    if ( is_admin() ) return;
    ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E5W4CKGE19"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-E5W4CKGE19');
</script>
    <?php
}
add_action( 'wp_head', 'selfachieve_ga4_tag', 1 );
