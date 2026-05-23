<?php
/**
 * 構造化データ（JSON-LD）出力
 * 静的HTMLサイトの構造化データをWordPressテーマに移管
 *
 * 実装方針:
 * - 固定ページ・サービスページ: ページスラッグで判定して固定JSON-LDを出力
 * - コラム詳細 (single-column): 投稿データから動的に Article スキーマを生成
 * - お客様の声詳細 (single-voice): BreadcrumbList のみ動的生成
 * - 実績詳細 (single-works): BreadcrumbList のみ動的生成
 * - ニュース詳細 (single-news): BreadcrumbList のみ動的生成
 *
 * URLベース: https://htmlacheive.com/wp/
 */

add_action( 'wp_head', 'selfachieve_output_schema', 5 );

function selfachieve_output_schema() {
    $schema = selfachieve_get_schema();
    if ( empty( $schema ) ) return;
    echo "\n" . '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

function selfachieve_get_schema() {
    $base = 'https://htmlacheive.com/wp';
    $org_id = 'https://htmlacheive.com/#organization';
    $site_id = 'https://htmlacheive.com/#website';

    // ─────────────────────────────────────────
    // トップページ
    // ─────────────────────────────────────────
    if ( is_home() || is_front_page() ) {
        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                [
                    '@type'       => [ 'Organization', 'LocalBusiness' ],
                    '@id'         => $org_id,
                    'name'        => '株式会社セルフアチーブ',
                    'alternateName' => 'selfachieve',
                    'url'         => 'https://htmlacheive.com/',
                    'logo'        => [
                        '@type'  => 'ImageObject',
                        'url'    => 'https://htmlacheive.com/assets/logo_color.png',
                        'width'  => 200,
                        'height' => 60,
                    ],
                    'description' => '神戸の中小企業・店舗に特化したWEBマーケティング会社。SEO対策・リスティング広告・MEO対策・ホームページ制作で集客を支援。',
                    'foundingDate' => '2011',
                    'address'     => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => '東灘区向洋町6-9',
                        'addressLocality' => '神戸市',
                        'addressRegion'   => '兵庫県',
                        'postalCode'      => '658-0032',
                        'addressCountry'  => 'JP',
                    ],
                    'telephone'   => '+81-78-806-8338',
                    'openingHoursSpecification' => [
                        '@type'      => 'OpeningHoursSpecification',
                        'dayOfWeek'  => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ],
                        'opens'      => '09:00',
                        'closes'     => '19:00',
                    ],
                    'areaServed'  => [ '神戸市', '姫路市', '加古川市', '明石市', '芦屋市', '西宮市', '尼崎市', '兵庫県', '大阪府', '京都府' ],
                    'knowsAbout'  => [ 'Webマーケティング', 'SEO対策', 'MEO対策', 'リスティング広告', 'SNS運用', 'ホームページ制作', '集客支援', 'Web集客' ],
                ],
                [
                    '@type'           => 'WebSite',
                    '@id'             => $site_id,
                    'url'             => 'https://htmlacheive.com/',
                    'name'            => 'セルフアチーブ | 神戸のWEBマーケティング会社',
                    'publisher'       => [ '@id' => $org_id ],
                    'potentialAction' => [
                        '@type'       => 'SearchAction',
                        'target'      => [
                            '@type'       => 'EntryPoint',
                            'urlTemplate' => 'https://htmlacheive.com/search?q={search_term_string}',
                        ],
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
                [
                    '@type'         => 'WebPage',
                    '@id'           => 'https://htmlacheive.com/#webpage',
                    'url'           => 'https://htmlacheive.com/',
                    'name'          => '神戸のWEBマーケティング・集客支援会社 | セルフアチーブ',
                    'description'   => '神戸の中小企業に特化したWEBマーケティング会社。SEO対策・リスティング広告・ホームページ制作で集客を支援。累計200社以上・14年の実績。初回相談無料。',
                    'isPartOf'      => [ '@id' => $site_id ],
                    'about'         => [ '@id' => $org_id ],
                    'breadcrumb'    => [ '@id' => 'https://htmlacheive.com/#breadcrumb' ],
                    'inLanguage'    => 'ja',
                    'datePublished' => '2011-01-01',
                    'dateModified'  => '2026-03-15',
                ],
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => 'https://htmlacheive.com/#breadcrumb',
                    'itemListElement' => [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => 'https://htmlacheive.com/' ],
                    ],
                ],
                [
                    '@type'      => 'FAQPage',
                    '@id'        => 'https://htmlacheive.com/#faq',
                    'mainEntity' => [
                        [ '@type' => 'Question', 'name' => 'Webマーケティングの代行・外注・委託の違いは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '実質的には同じ意味で使われることが多いです。「代行」は業務を代わりに行うこと、「外注」は業務を外部に発注すること、「委託」は業務を信頼して任せることを指します。いずれの形式でも、セルフアチーブでは対応しています。' ] ],
                        [ '@type' => 'Question', 'name' => '神戸以外の企業でも依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、対応可能です。姫路・加古川・明石・芦屋・西宮など兵庫県内はもちろん、大阪・京都など近隣府県やオンラインでの対応により全国対応も可能です。' ] ],
                        [ '@type' => 'Question', 'name' => '初回相談は無料ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、初回相談は完全無料です。「何から始めればいいかわからない」「予算が少ない」「まず話だけ聞きたい」、どの段階でもお気軽にご連絡ください。' ] ],
                        [ '@type' => 'Question', 'name' => '小規模な店舗・個人事業主でも対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、対応しています。小規模な店舗・整骨院・美容室・飲食店など、地域密着型ビジネスの集客支援に多くの実績があります。まずは現状をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => '成果が出るまでの期間はどれくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '施策の種類や業種により異なりますが、SEOは数ヶ月、リスティング広告は開始後数週間で効果が見え始めることが多いです。まずは無料診断で現状を確認し、最適な施策を提案します。' ] ],
                    ],
                ],
            ],
        ];
    }

    // ─────────────────────────────────────────
    // 固定ページ・サービスページ（スラッグで判定）
    // ─────────────────────────────────────────
    if ( is_page() || is_singular() ) {
        global $post;
        $slug = $post->post_name ?? '';

        // 親ページスラッグも取得（SNSサブページ用）
        $parent_slug = '';
        if ( $post->post_parent ) {
            $parent = get_post( $post->post_parent );
            $parent_slug = $parent ? $parent->post_name : '';
        }

        $full_slug = $parent_slug ? $parent_slug . '/' . $slug : $slug;

        switch ( $full_slug ) {

            // ── SEO対策 ──
            case 'seo':
                return selfachieve_service_schema( $base, $org_id, '/seo/', 'SEO対策 代行・コンサルティング', 'SEO対策', '自社サイトで実証したSEO手法をクライアントに再現。SEO対策の代行・コンサルティング・外注・業務委託に対応。', 'SEOコンサルティング', [
                    [ 'SEO対策の効果が出るまでどのくらいかかりますか？', '一般的に3〜6ヶ月で効果が現れ始め、安定した成果が出るまでには6〜12ヶ月かかることが多いです。ただし、競合状況・サイトの現状・対策キーワードによって大きく異なります。まずは現状分析を行い、現実的な見通しをお伝えします。' ],
                    [ '自社でSEO対策をやっているが効果がない。何が問題ですか？', 'よくある原因として、①キーワード選定のミス（検索ボリュームが少ない・競合が強すぎる）、②コンテンツの質・量の不足、③内部リンク構造の問題、④技術的なSEO（サイト速度・モバイル対応など）の不備、⑤被リンク不足などが挙げられます。無料相談で現状をヒアリングし、原因を特定します。' ],
                    [ 'SEO対策の費用はどのくらいですか？', 'コンサルティング・代行・外注の形態や対応範囲によって異なります。まずは無料相談でご状況をお聞かせください。ビジネスの規模や目標に合わせた最適なプランをご提案します。' ],
                    [ 'コンサルティングと代行の違いは何ですか？', 'コンサルティングは戦略立案・分析・提案が中心で、実施はお客様側で行います。代行はSEO施策の実施まで全て弊社が担当します。外注・業務委託はコンテンツ作成や内部対策など特定業務のみをご依頼いただく形態です。' ],
                    [ '地方の中小企業でもSEO対策の効果はありますか？', 'はい、むしろ地方・地域密着型ビジネスこそSEO対策の効果が出やすい場合があります。地域名＋業種のキーワードは競合が少なく、上位表示を狙いやすいです。神戸・兵庫での豊富な実績を活かして支援します。' ],
                ] );

            // ── MEO対策 ──
            case 'meo':
                return selfachieve_service_schema( $base, $org_id, '/meo/', 'MEO対策 代行・コンサルティング', 'MEO対策', 'Googleマップ上位表示・MEO対策の代行・コンサルティング。店舗集客・来店促進に特化したMEO施策を神戸・兵庫の中小企業・店舗に提供。', 'MEO対策・Googleビジネスプロフィール最適化', [
                    [ 'MEO対策とは何ですか？', 'MEO（Map Engine Optimization）対策とは、Googleマップでの検索結果において自社店舗を上位表示させるための施策です。「地域名＋業種」で検索した際にGoogleマップに表示される「ローカルパック」への掲載を目指します。' ],
                    [ 'MEO対策の効果が出るまでどのくらいかかりますか？', '一般的に1〜3ヶ月で効果が見え始めることが多いです。ただし、競合状況・現在のGoogleビジネスプロフィールの状態・対策キーワードによって異なります。' ],
                    [ 'Googleビジネスプロフィールは自分で登録しているが、MEO対策は必要ですか？', '登録だけでは不十分です。MEO対策では、情報の最適化・写真の充実・口コミ管理・投稿の継続・カテゴリ設定など、上位表示に必要な多くの施策を継続的に行う必要があります。' ],
                    [ 'MEO対策の費用はどのくらいですか？', '対応範囲や店舗数によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ '口コミを増やす方法はありますか？', 'はい、口コミ獲得の仕組みづくりも支援しています。お客様に自然と口コミを書いていただける導線設計や、スタッフへの依頼方法のレクチャーなども行っています。' ],
                ] );

            // ── リスティング広告 ──
            case 'listing':
                return selfachieve_service_schema( $base, $org_id, '/listing/', 'リスティング広告 代行・運用', 'リスティング広告', 'Google広告・Yahoo!広告のリスティング広告代行・運用。手数料20%の明朗会計。神戸・兵庫の中小企業に特化したリスティング広告運用代行。', 'リスティング広告運用代行', [
                    [ 'リスティング広告の費用はどのくらいかかりますか？', '広告費と代行手数料が必要です。弊社の代行手数料は広告費の20%（最低月額2万円）です。広告費は業種・競合状況・目標によって異なりますが、月3〜10万円から始める方が多いです。' ],
                    [ 'リスティング広告はすぐに効果が出ますか？', 'はい、SEOと異なり広告配信開始後すぐに検索結果に表示されます。ただし、最適化には1〜2ヶ月のデータ蓄積が必要です。' ],
                    [ 'Google広告とYahoo!広告、どちらがいいですか？', '業種・ターゲット層・予算によって異なります。一般的にGoogle広告はシェアが高く、Yahoo!広告は中高年層に強い傾向があります。弊社では両方の運用に対応し、最適な配分をご提案します。' ],
                    [ '自社でリスティング広告を運用しているが成果が出ない。何が問題ですか？', 'よくある原因として、①キーワード選定の問題、②広告文の訴求力不足、③ランディングページとの不一致、④入札戦略の誤り、⑤コンバージョン計測の未設定などが挙げられます。無料相談でアカウントを拝見し、原因を特定します。' ],
                    [ '最低契約期間はありますか？', '3ヶ月からのご契約をお願いしています。リスティング広告は最適化に一定の期間が必要なため、短期間では成果を正確に評価できないためです。' ],
                ] );

            // ── ディスプレイ広告 ──
            case 'display':
                return selfachieve_service_schema( $base, $org_id, '/display/', 'ディスプレイ広告 代行・運用', 'ディスプレイ広告', 'Google広告・ディスプレイ広告の代行・運用・バナー制作。潜在層へのリーチと認知獲得に特化。手数料20%の明朗会計。', 'ディスプレイ広告運用代行', [
                    [ 'ディスプレイ広告とリスティング広告の違いは何ですか？', 'リスティング広告は「すでに検索している人」に届ける手法ですが、ディスプレイ広告は「まだ検索していない潜在層」にビジュアルで届ける手法です。認知獲得・ブランディング・リターゲティングに特に有効です。' ],
                    [ 'バナーのデザインはどうすればいいですか？', '弊社でバナー制作も対応しています。クリックされるバナーは「デザインより設計」が重要です。ターゲットの心理・配信面・訴求軸を考慮したバナー設計を行い、複数パターンをA/Bテストします。' ],
                    [ 'リターゲティング広告とは何ですか？', '一度サイトを訪問したユーザーに対して、他のサイトを閲覧中に広告を表示する手法です。購買意欲の高いユーザーに繰り返しアプローチできるため、コンバージョン率の向上に効果的です。' ],
                    [ 'ディスプレイ広告の費用はどのくらいかかりますか？', '広告費と代行手数料が必要です。弊社の代行手数料は広告費の20%（最低月額2万円）です。ディスプレイ広告は比較的低コストで多くのユーザーにリーチできます。' ],
                    [ 'どんな業種に向いていますか？', '認知拡大・ブランディングが重要な業種（飲食・美容・不動産・教育など）や、リターゲティングでの追客が有効な業種（EC・高額商品・BtoBなど）に特に向いています。' ],
                ] );

            // ── SNSマーケティング ──
            case 'sns':
                return selfachieve_service_schema( $base, $org_id, '/sns/', 'SNSマーケティング 運用代行・業務委託', 'SNSマーケティング', 'SNSマーケティングの運用代行・業務委託に対応。Instagram・TikTok・X・YouTube・LINE・noteのアカウント運用からSNS広告まで一貫支援。神戸・兵庫の中小企業に特化。', 'SNSマーケティング・SNS運用代行', [
                    [ 'SNS運用代行とは何ですか？', 'SNS運用代行とは、企業のSNSアカウント（Instagram・X・TikTok・YouTube・LINEなど）の投稿・管理・分析・改善を外部の専門会社が代わりに行うサービスです。' ],
                    [ 'どのSNSから始めればいいですか？', 'ターゲット層・業種・目的によって最適なSNSは異なります。無料相談でご状況をお聞きし、最も効果が期待できるSNSをご提案します。' ],
                    [ 'SNS運用の効果が出るまでどのくらいかかりますか？', '一般的に3〜6ヶ月で効果が見え始めることが多いです。フォロワー数・エンゲージメント・問い合わせ数など、目標指標によって異なります。' ],
                    [ 'SNS広告と運用代行の違いは何ですか？', 'SNS運用代行はオーガニック（自然）投稿を継続して積み上げる施策です。SNS広告は広告費を使って即効性のある集客を行う施策です。目的に応じて組み合わせることが最も効果的です。' ],
                ] );

            // ── SNS/Instagram ──
            case 'sns/instagram':
                return selfachieve_service_schema( $base, $org_id, '/sns/instagram/', 'Instagram運用代行・広告代行', 'Instagram運用代行', 'Instagram運用代行・広告代行に対応。フォロワーを顧客に変えるInstagramマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。', 'Instagram運用代行・Instagram広告', [
                    [ 'Instagram運用代行の費用はどのくらいですか？', '投稿頻度・コンテンツ制作の有無・広告運用の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'フォロワーが少なくても依頼できますか？', 'はい、0からのアカウント立ち上げにも対応しています。フォロワー数より「質の高いフォロワー」を増やすことを重視しています。' ],
                    [ 'Instagram広告とオーガニック運用の違いは何ですか？', 'オーガニック運用は継続的な投稿でフォロワーを育て、長期的な信頼を構築します。Instagram広告は広告費を使って即効性のある集客を行います。目的に応じて組み合わせることが最も効果的です。' ],
                    [ '写真・動画の撮影も依頼できますか？', 'はい、コンテンツ制作（写真・動画・リール）も対応しています。ご要望に応じてプランをご提案します。' ],
                ] );

            // ── SNS/TikTok ──
            case 'sns/tiktok':
                return selfachieve_service_schema( $base, $org_id, '/sns/tiktok/', 'TikTok運用代行・広告代行', 'TikTok運用代行', 'TikTok運用代行・広告代行に対応。フォロワーを顧客に変えるTikTokマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。', 'TikTok運用代行・TikTok広告', [
                    [ 'TikTokは若年層向けではないですか？', 'TikTokのユーザー層は拡大しており、30〜40代のユーザーも増えています。また、若年層をターゲットにしたビジネスには特に有効です。' ],
                    [ 'TikTok運用代行の費用はどのくらいですか？', '投稿頻度・動画制作の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'フォロワーが少なくてもバズる可能性はありますか？', 'はい、TikTokはアルゴリズムの特性上、フォロワーが少なくても良いコンテンツは広く拡散される可能性があります。' ],
                    [ '動画の撮影・編集も依頼できますか？', 'はい、動画制作（撮影・編集）も対応しています。ご要望に応じてプランをご提案します。' ],
                ] );

            // ── SNS/X ──
            case 'sns/x':
                return selfachieve_service_schema( $base, $org_id, '/sns/x/', 'X（旧Twitter）運用代行・X広告', 'X（旧Twitter）運用代行', 'X（旧Twitter）の運用代行・広告運用を神戸から全国へ。毎日の発信が信頼を勝ち取る。中小企業・店舗向けにX運用代行・X広告を一貫支援します。', 'X運用代行・X広告', [
                    [ 'X（旧Twitter）運用代行の費用はどのくらいですか？', '投稿頻度・コンテンツ制作の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'Xは拡散力が高いと聞きますが、本当ですか？', 'はい、Xはリポストやリプライによってコンテンツがバイラルしやすい特性があります。特に時事性の高いコンテンツや共感を呼ぶ投稿は拡散されやすいです。' ],
                    [ 'X広告の効果はどのくらいですか？', 'ターゲティング精度が高く、特定の興味・関心を持つユーザーへのリーチが可能です。認知拡大・フォロワー獲得・サイト誘導など目的に応じた広告形式を選択できます。' ],
                    [ '炎上リスクはどう管理しますか？', '投稿前の内容確認・承認フロー・炎上時の対応マニュアル作成など、リスク管理の仕組みも含めてサポートします。' ],
                ] );

            // ── SNS/YouTube ──
            case 'sns/youtube':
                return selfachieve_service_schema( $base, $org_id, '/sns/youtube/', 'YouTube運用代行・YouTube広告', 'YouTube運用代行', 'YouTube運用代行・YouTube広告に対応。動画で信頼を積み上げ、問い合わせを増やすYouTubeマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'YouTube運用代行・YouTube広告', [
                    [ 'YouTube運用代行の費用はどのくらいですか？', '動画制作の有無・投稿頻度によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'チャンネル登録者が少なくても広告収入は得られますか？', 'YouTube広告収入には一定の条件（登録者1000人・視聴時間4000時間など）が必要です。ただし、弊社のYouTube支援は広告収入ではなく「集客・問い合わせ増加」を目的としています。' ],
                    [ 'YouTube広告と運用代行の違いは何ですか？', 'チャンネル運用代行は動画コンテンツを継続して積み上げ、長期的な信頼・認知を育てる施策です。YouTube広告は広告費を使って即効性のある集客を行う施策です。目的に応じて組み合わせることが最も効果的です。' ],
                    [ '出演者がいない場合でも動画を作れますか？', 'はい、対応しています。テロップ解説動画・スライド動画・ナレーション動画など、出演者なしで制作できる形式も多数あります。ご要望に合わせて最適な形式をご提案します。' ],
                ] );

            // ── SNS/LINE ──
            case 'sns/line':
                return selfachieve_service_schema( $base, $org_id, '/sns/line/', 'LINE構築・運用代行', 'LINE構築・運用代行', 'LINE構築・運用代行に対応。フォロワーを顧客に変えるLINEマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。', 'LINE公式アカウント運用代行', [
                    [ 'LINE公式アカウントとLINEビジネスコネクトの違いは何ですか？', 'LINE公式アカウントは中小企業向けの標準的なビジネスアカウントです。友だち登録したユーザーへのメッセージ配信・クーポン・予約機能などが利用できます。' ],
                    [ 'LINE運用代行の費用はどのくらいですか？', '配信頻度・コンテンツ制作の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'LINE友だちを増やすにはどうすればいいですか？', '店頭でのQRコード設置・SNSでの告知・ウェブサイトへの導線設置・友だち追加特典の設定など、複数の施策を組み合わせることが効果的です。' ],
                    [ 'LINE広告も対応していますか？', 'はい、LINE広告（LINE Ads）の運用代行にも対応しています。友だち獲得広告・ウェブサイトへの誘導広告など、目的に応じた広告形式をご提案します。' ],
                ] );

            // ── SNS/note ──
            case 'sns/note':
                return selfachieve_service_schema( $base, $org_id, '/sns/note/', 'note運用代行・記事制作', 'note運用代行', 'note運用代行・記事制作に対応。読まれるほど選ばれるnoteマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。記事企画から執筆・公開・分析まで一貫支援。', 'note運用代行・コンテンツマーケティング', [
                    [ 'noteとブログの違いは何ですか？', 'noteはSNS的な要素（フォロー・スキ・コメント）を持つコンテンツプラットフォームです。ブログより読者との距離が近く、専門知識・ストーリー・ノウハウを発信するのに適しています。' ],
                    [ 'note運用代行の費用はどのくらいですか？', '記事本数・文字数・リサーチの深さによって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'どんな業種にnoteは向いていますか？', '専門知識・ノウハウを持つ業種（士業・コンサル・医療・教育・クリエイターなど）や、ブランドストーリーを伝えたい企業に特に向いています。' ],
                    [ 'SEO効果はありますか？', 'noteの記事はGoogleに索引され、検索結果に表示されることがあります。特に専門的なキーワードでの上位表示が期待できます。' ],
                ] );

            // ── AI検索対策 ──
            case 'ai-seo':
                return selfachieve_service_schema( $base, $org_id, '/ai-seo/', 'AI検索対策（LLM対策）', 'AI検索対策（LLM対策）', 'ChatGPT・Gemini・Perplexityなどの生成AI検索に自社を表示させるAI検索対策（LLM対策）。神戸・兵庫の中小企業向けに対応。', 'AI検索対策・LLM最適化', [
                    [ 'AI検索対策とは何ですか？', 'ChatGPT・Gemini・Perplexityなどの生成AI（大規模言語モデル）が検索に回答する際に、自社の情報が引用・紹介されやすくするための施策です。従来のSEOとは異なるアプローチが必要です。' ],
                    [ '従来のSEOとどう違いますか？', '従来のSEOはGoogleの検索結果ページ（SERP）での上位表示を目指します。AI検索対策はAIが回答を生成する際の情報源として選ばれることを目指します。両者は補完関係にあります。' ],
                    [ 'AI検索対策の効果が出るまでどのくらいかかりますか？', 'AI検索対策は比較的新しい分野で、効果測定の方法も発展途上です。一般的に3〜6ヶ月での効果確認を目安にしています。' ],
                    [ 'どんな企業に向いていますか？', '専門知識・ノウハウを持つ企業、BtoB企業、高額商品・サービスを提供する企業に特に向いています。AIに「この分野の専門家」として認識されることが重要です。' ],
                ] );

            // ── AI業務自動化 ──
            case 'ai-automation':
                return selfachieve_service_schema( $base, $org_id, '/ai-automation/', 'AI業務自動化・業務効率化支援', 'AI業務自動化', '繰り返し作業・手動集計・属人化など、社内業務のAI自動化・最適化を相談から構築・運用まで一貫支援するサービス。', 'AI業務効率化コンサルティング', [
                    [ '何をAI化すべきか決まっていなくても相談できますか？', 'はい。現状整理と見立てから対応します。まずは業務内容や課題感を伺い、どこにAI活用の余地があるかを整理します。' ],
                    [ '社内に詳しい人がいなくても進められますか？', 'はい。ヒアリングと要件整理から進めるため、AIやシステムに詳しい担当者がいなくても進められます。' ],
                    [ '小さな業務改善からでも依頼できますか？', '可能です。一部業務だけ、小さく始める形にも対応できます。' ],
                    [ 'ツールが決まっていなくても大丈夫ですか？', '大丈夫です。目的や業務に合わせて、どのような形が適しているかを整理します。' ],
                    [ '実装だけでなく運用も見てもらえますか？', 'はい。導入して終わりではなく、運用フォローも含めて対応します。' ],
                    [ 'AI検索対策（LLM対策）とは違うサービスですか？', 'はい、別のサービスです。AI検索対策は「ChatGPTなどのAIに自社を表示させる集客施策」です。AI業務自動化は「社内の繰り返し作業・集計・文書作成などをAIで効率化する業務改善サービス」です。目的・対象が異なります。' ],
                ] );

            // ── WEB戦略設計 ──
            case 'strategy':
                return selfachieve_service_schema( $base, $org_id, '/strategy/', 'WEB戦略設計', 'WEB戦略設計', '現状把握から課題設定・施策設計まで、根拠のある戦略を提供するWEBコンサルティングサービス。', 'WEBコンサルティング', [
                    [ 'WEB戦略設計とは何ですか？', 'GA4・広告データ・競合分析などを用いて現状を数値化し、「なぜ成果が出ていないか」の根本原因を特定した上で、最も効果的な施策の組み合わせを設計するサービスです。' ],
                    [ '費用はどれくらいかかりますか？', '初回相談は完全無料です。戦略設計の費用はビジネスの規模や課題の複雑さによって異なります。まずは無料相談でご状況をお聞かせください。' ],
                    [ 'どんな業種でも対応できますか？', 'はい、医療・法律・教育・美容・飲食・ECなど20業種以上の支援実績があります。業種を問わず、まずは現状をお聞かせください。' ],
                    [ '戦略設計だけの依頼もできますか？', 'はい、戦略設計のみのご依頼も承っています。「自社で実行したい」「現在の代理店に戦略だけ渡したい」など、様々なご要望に対応しています。' ],
                ] );

            // ── ホームページ制作 ──
            case 'website':
                return selfachieve_service_schema( $base, $org_id, '/website/', 'ホームページ制作・WEBサイト制作', 'ホームページ制作', 'WEB戦略設計・企画・SEO・分析改善まで一貫対応のホームページ制作。神戸・兵庫の中小企業に特化。', 'ホームページ制作・WEBサイト制作', [
                    [ 'ホームページ制作の費用はどのくらいかかりますか？', '制作するサイトの規模・機能・デザインの複雑さによって異なります。まずは無料相談にてご要望をお聞きし、最適なプランと費用をご提案します。小規模なコーポレートサイトから大規模なECサイトまで対応可能です。' ],
                    [ '制作期間はどのくらいかかりますか？', '一般的なコーポレートサイトで1〜2ヶ月、LP（ランディングページ）で2〜3週間が目安です。ただし、ページ数・機能・コンテンツの準備状況によって異なります。詳細はヒアリング後にお伝えします。' ],
                    [ 'SEO対策は制作に含まれますか？', 'はい、弊社のホームページ制作にはSEOの基礎設計（タイトル・メタ情報・構造化データ・ページ速度最適化など）が含まれます。さらに本格的なSEO対策をご希望の場合は、SEO対策サービスとの組み合わせをご提案します。' ],
                    [ 'WordPressで制作してもらえますか？', 'はい、WordPressでの制作に対応しています。お客様自身でコンテンツを更新・管理できるよう、使いやすいCMS環境を構築します。更新方法のレクチャーも行います。' ],
                    [ '制作後の保守・運用サポートはありますか？', 'はい、制作後の保守・運用サポートプランをご用意しています。サーバー・ドメイン管理、WordPressのアップデート、コンテンツ更新代行、アクセス解析レポートなどを月額でサポートします。' ],
                    [ '既存サイトのリニューアルにも対応していますか？', 'はい、既存サイトのリニューアルにも対応しています。現状のサイトの課題分析から始め、SEO・デザイン・コンバージョン率の改善を目的としたリニューアル提案を行います。' ],
                ] );

            // ── 会社情報 ──
            case 'company':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        [
                            '@type'         => 'Organization',
                            '@id'           => $org_id,
                            'name'          => '株式会社セルフアチーブ',
                            'alternateName' => 'selfachieve',
                            'url'           => 'https://htmlacheive.com/',
                            'logo'          => [ '@type' => 'ImageObject', 'url' => 'https://htmlacheive.com/assets/logo_color.png', 'width' => 200, 'height' => 60 ],
                            'description'   => '神戸の中小企業・店舗に特化したWEBマーケティング会社。SEO対策・リスティング広告・MEO対策・ホームページ制作で集客を支援。',
                            'address'       => [
                                '@type'           => 'PostalAddress',
                                'streetAddress'   => '向洋町中6-9 神戸ファッションマート 8S-25',
                                'addressLocality' => '神戸市東灘区',
                                'addressRegion'   => '兵庫県',
                                'postalCode'      => '658-0032',
                                'addressCountry'  => 'JP',
                            ],
                            'telephone'     => '+81-78-806-8338',
                            'foundingDate'  => '2011-05-02',
                        ],
                        [
                            '@type'       => 'WebPage',
                            '@id'         => $base . '/company/#webpage',
                            'url'         => $base . '/company/',
                            'name'        => '会社情報 | 神戸のWEBマーケティング会社 セルフアチーブ',
                            'description' => '神戸を拠点とする株式会社セルフアチーブの会社情報ページです。',
                            'isPartOf'    => [ '@id' => $site_id ],
                            'breadcrumb'  => [ '@id' => $base . '/company/#breadcrumb' ],
                            'inLanguage'  => 'ja',
                            'datePublished' => '2026-03-15',
                            'dateModified'  => '2026-03-15',
                        ],
                        selfachieve_breadcrumb( $base . '/company/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ '会社情報', $base . '/company/' ],
                        ] ),
                    ],
                ];

            // ── お問い合わせ ──
            case 'contact':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        [ '@type' => 'Organization', '@id' => $org_id, 'name' => '株式会社セルフアチーブ', 'url' => 'https://htmlacheive.com/' ],
                        [
                            '@type'       => 'WebPage',
                            '@id'         => $base . '/contact/#webpage',
                            'url'         => $base . '/contact/',
                            'name'        => '無料相談・お問い合わせ | セルフアチーブ',
                            'description' => 'セルフアチーブへの無料相談・お問い合わせはこちら。',
                            'isPartOf'    => [ '@id' => $site_id ],
                            'breadcrumb'  => [ '@id' => $base . '/contact/#breadcrumb' ],
                            'inLanguage'  => 'ja',
                            'datePublished' => '2026-03-15',
                            'dateModified'  => '2026-03-15',
                        ],
                        selfachieve_breadcrumb( $base . '/contact/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ '無料相談・お問い合わせ', $base . '/contact/' ],
                        ] ),
                    ],
                ];

            // ── プライバシーポリシー ──
            case 'privacy':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        [ '@type' => 'Organization', '@id' => $org_id, 'name' => '株式会社セルフアチーブ', 'url' => 'https://htmlacheive.com/' ],
                        [
                            '@type'       => 'WebPage',
                            '@id'         => $base . '/privacy/#webpage',
                            'url'         => $base . '/privacy/',
                            'name'        => 'プライバシーポリシー | セルフアチーブ',
                            'description' => '株式会社セルフアチーブのプライバシーポリシーページです。',
                            'isPartOf'    => [ '@id' => $site_id ],
                            'breadcrumb'  => [ '@id' => $base . '/privacy/#breadcrumb' ],
                            'inLanguage'  => 'ja',
                            'datePublished' => '2026-03-15',
                            'dateModified'  => '2026-03-15',
                        ],
                        selfachieve_breadcrumb( $base . '/privacy/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ 'プライバシーポリシー', $base . '/privacy/' ],
                        ] ),
                    ],
                ];

            // ── お知らせ一覧 ──
            case 'news':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        [ '@type' => 'Organization', '@id' => $org_id, 'name' => '株式会社セルフアチーブ', 'url' => 'https://htmlacheive.com/' ],
                        [
                            '@type'      => 'WebPage',
                            '@id'        => $base . '/news/#webpage',
                            'url'        => $base . '/news/',
                            'name'       => 'お知らせ一覧 | セルフアチーブ',
                            'isPartOf'   => [ '@id' => $site_id ],
                            'breadcrumb' => [ '@id' => $base . '/news/#breadcrumb' ],
                            'inLanguage' => 'ja',
                        ],
                        selfachieve_breadcrumb( $base . '/news/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ 'お知らせ', $base . '/news/' ],
                        ] ),
                    ],
                ];

            // ── コラム一覧 ──
            case 'column':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        selfachieve_breadcrumb( $base . '/columns/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ 'コラム', $base . '/columns/' ],
                        ] ),
                    ],
                ];

            // ── お客様の声一覧 ──
            case 'voice':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        selfachieve_breadcrumb( $base . '/voice/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ 'お客さまの声', $base . '/voice/' ],
                        ] ),
                    ],
                ];

            // ── 実績一覧 ──
            case 'works':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        selfachieve_breadcrumb( $base . '/works/', [
                            [ 'ホーム', 'https://htmlacheive.com/' ],
                            [ '制作実績', $base . '/works/' ],
                        ] ),
                    ],
                ];
        }
    }

    // ─────────────────────────────────────────
    // コラム詳細（single-column）: 動的 Article スキーマ
    // ─────────────────────────────────────────
    if ( is_singular( 'column' ) ) {
        global $post;
        $url          = get_permalink();
        $title        = get_the_title();
        $published    = get_the_date( 'Y-m-d' );
        $modified     = get_the_modified_date( 'Y-m-d' );
        $updated      = get_post_meta( $post->ID, '_column_updated', true ) ?: $modified;
        $thumbnail    = get_the_post_thumbnail_url( $post->ID, 'full' ) ?: 'https://htmlacheive.com/assets/ogp.jpg';
        $author_name  = get_post_meta( $post->ID, '_column_author_name', true ) ?: '株式会社セルフアチーブ';

        // パンくずリストのカテゴリ取得
        $terms = get_the_terms( $post->ID, 'column_cat' );
        $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'コラム';
        $cat_slug = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->slug : '';
        $cat_url  = $cat_slug ? $base . '/columns/' . $cat_slug . '/' : $base . '/columns/';

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                [
                    '@type'            => 'Article',
                    '@id'              => $url . '#article',
                    'headline'         => $title,
                    'datePublished'    => $published,
                    'dateModified'     => $updated,
                    'author'           => [ '@type' => 'Person', 'name' => $author_name ],
                    'publisher'        => [ '@id' => $org_id ],
                    'image'            => [ '@type' => 'ImageObject', 'url' => $thumbnail ],
                    'mainEntityOfPage' => [ '@id' => $url . '#webpage' ],
                    'inLanguage'       => 'ja',
                ],
                selfachieve_breadcrumb( $url, [
                    [ 'ホーム', 'https://htmlacheive.com/' ],
                    [ 'コラム', $base . '/columns/' ],
                    [ $cat_name, $cat_url ],
                    [ $title, $url ],
                ] ),
            ],
        ];
    }

    // ─────────────────────────────────────────
    // お客様の声詳細（single-voice）: BreadcrumbList
    // ─────────────────────────────────────────
    if ( is_singular( 'voice' ) ) {
        global $post;
        $url      = get_permalink();
        $title    = get_the_title();
        $company  = get_post_meta( $post->ID, '_voice_company', true ) ?: $title;

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                selfachieve_breadcrumb( $url, [
                    [ 'ホーム', 'https://htmlacheive.com/' ],
                    [ 'お客さまの声', $base . '/voice/' ],
                    [ $company, $url ],
                ] ),
            ],
        ];
    }

    // ─────────────────────────────────────────
    // 実績詳細（single-works）: BreadcrumbList
    // ─────────────────────────────────────────
    if ( is_singular( 'works' ) ) {
        global $post;
        $url    = get_permalink();
        $title  = get_the_title();
        $client = get_post_meta( $post->ID, '_works_client', true ) ?: $title;

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                selfachieve_breadcrumb( $url, [
                    [ 'ホーム', 'https://htmlacheive.com/' ],
                    [ '制作実績', $base . '/works/' ],
                    [ $client, $url ],
                ] ),
            ],
        ];
    }

    // ─────────────────────────────────────────
    // ニュース詳細（single-news）: BreadcrumbList
    // ─────────────────────────────────────────
    if ( is_singular( 'news' ) ) {
        global $post;
        $url   = get_permalink();
        $title = get_the_title();

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                selfachieve_breadcrumb( $url, [
                    [ 'ホーム', 'https://htmlacheive.com/' ],
                    [ 'お知らせ', $base . '/news/' ],
                    [ $title, $url ],
                ] ),
            ],
        ];
    }

    return null;
}

/**
 * BreadcrumbList スキーマを生成するヘルパー
 *
 * @param string $page_url  現在ページのURL（@id用）
 * @param array  $items     [ [name, url], ... ]
 */
function selfachieve_breadcrumb( $page_url, $items ) {
    $list = [];
    foreach ( $items as $i => $item ) {
        $entry = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $item[0],
        ];
        if ( ! empty( $item[1] ) ) {
            $entry['item'] = $item[1];
        }
        $list[] = $entry;
    }
    return [
        '@type'           => 'BreadcrumbList',
        '@id'             => $page_url . '#breadcrumb',
        'itemListElement' => $list,
    ];
}

/**
 * サービスページ用スキーマ（Service + BreadcrumbList + FAQPage）を生成するヘルパー
 *
 * @param string $base         WordPressサイトのベースURL
 * @param string $org_id       Organization の @id
 * @param string $path         ページパス（例: '/seo/'）
 * @param string $service_name サービス名
 * @param string $breadcrumb_label パンくずのラベル
 * @param string $service_desc サービス説明
 * @param string $service_type serviceType
 * @param array  $faqs         [ [question, answer], ... ]
 */
function selfachieve_service_schema( $base, $org_id, $path, $service_name, $breadcrumb_label, $service_desc, $service_type, $faqs ) {
    $url = $base . $path;

    $graph = [
        [
            '@type'       => 'Service',
            '@id'         => $url . '#service',
            'name'        => $service_name,
            'description' => $service_desc,
            'provider'    => [ '@id' => $org_id ],
            'areaServed'  => [ '神戸市', '兵庫県', '大阪府' ],
            'serviceType' => $service_type,
        ],
        selfachieve_breadcrumb( $url, [
            [ 'ホーム', 'https://htmlacheive.com/' ],
            [ $breadcrumb_label, $url ],
        ] ),
    ];

    if ( ! empty( $faqs ) ) {
        $faq_entities = [];
        foreach ( $faqs as $faq ) {
            $faq_entities[] = [
                '@type'          => 'Question',
                'name'           => $faq[0],
                'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $faq[1] ],
            ];
        }
        $graph[] = [
            '@type'      => 'FAQPage',
            '@id'        => $url . '#faq',
            'mainEntity' => $faq_entities,
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    ];
}
