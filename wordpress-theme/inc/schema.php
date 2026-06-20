<?php
/**
 * 構造化データ（JSON-LD）出力
 * v3 最終版（2026-06-20 更新）
 * 
 * 実装方針:
 * - 旧ドメイン（htmlacheive.com）を完全に排除し、selfachieve.jp に統一
 * - Person（代表者）スキーマを追加し、E-E-A-TとAI検索対策を強化
 * - 全サービスページに FAQPage を追加
 * - 固定ページ・サービスページ: ページスラッグで判定して固定JSON-LDを出力
 * - コラム詳細 (single-column): 投稿データから動的に Article スキーマを生成
 * - お客様の声詳細 (single-voice): BreadcrumbList のみ動的生成
 * - 実績詳細 (single-works): BreadcrumbList のみ動的生成
 * - ニュース詳細 (single-news): BreadcrumbList のみ動的生成
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
    $base = 'https://selfachieve.jp';
    $org_id = 'https://selfachieve.jp/#organization';
    $site_id = 'https://selfachieve.jp/#website';
    $founder_id = 'https://selfachieve.jp/#founder';
    $today = '2026-06-20';

    // 共通エンティティ
    $founder = [
        '@type'         => 'Person',
        '@id'           => $founder_id,
        'name'          => '新原 秀崇',
        'alternateName' => 'Hidetaka Niihara',
        'jobTitle'      => '代表取締役',
        'worksFor'      => [ '@id' => $org_id ],
        'url'           => $base . '/company/',
        'knowsAbout'    => [ 'SEO対策', 'Webマーケティング', 'MEO対策', 'リスティング広告', 'ディスプレイ広告', 'SNS運用', 'AI活用支援', 'AI検索最適化', 'ホームページ制作', 'WEB戦略設計' ],
        'sameAs'        => [ 'https://www.instagram.com/selfachieve_kobe/', 'https://note.com/selfachieve' ]
    ];

    $organization = [
        '@type'         => [ 'Organization', 'LocalBusiness' ],
        '@id'           => $org_id,
        'name'          => '株式会社セルフアチーブ',
        'alternateName' => 'selfachieve',
        'url'           => $base . '/',
        'logo'          => [
            '@type'  => 'ImageObject',
            'url'    => $base . '/wp-content/uploads/2026/05/logo_color.png',
            'width'  => 200,
            'height' => 60,
        ],
        'description'   => '神戸の中小企業・店舗に特化したWEBマーケティング会社。SEO対策・リスティング広告・MEO対策・ホームページ制作・AI活用支援で集客と業務効率化を支援。',
        'foundingDate'  => '2011',
        'founder'       => [ '@id' => $founder_id ],
        'employee'      => [ '@id' => $founder_id ],
        'address'       => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '東灘区向洋町6-9',
            'addressLocality' => '神戸市',
            'addressRegion'   => '兵庫県',
            'postalCode'      => '658-0032',
            'addressCountry'  => 'JP',
        ],
        'telephone'     => '+81-78-806-8338',
        'email'         => 'info@selfachieve.jp',
        'openingHoursSpecification' => [
            '@type'      => 'OpeningHoursSpecification',
            'dayOfWeek'  => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ],
            'opens'      => '09:00',
            'closes'     => '19:00',
        ],
        'areaServed'    => [
            [ '@type' => 'City', 'name' => '神戸市' ],
            [ '@type' => 'City', 'name' => '姫路市' ],
            [ '@type' => 'City', 'name' => '加古川市' ],
            [ '@type' => 'City', 'name' => '明石市' ],
            [ '@type' => 'City', 'name' => '芦屋市' ],
            [ '@type' => 'City', 'name' => '西宮市' ],
            [ '@type' => 'City', 'name' => '尼崎市' ],
            [ '@type' => 'State', 'name' => '兵庫県' ],
            [ '@type' => 'State', 'name' => '大阪府' ],
            [ '@type' => 'State', 'name' => '京都府' ]
        ],
        'knowsAbout'    => [ 'Webマーケティング', 'SEO対策', 'MEO対策', 'リスティング広告', 'SNS運用', 'ホームページ制作', '集客支援', 'Web集客', 'AI活用支援', 'LLM対策', 'SGE対策', 'AI検索最適化' ],
        'sameAs'        => [ 'https://www.instagram.com/selfachieve_kobe/', 'https://note.com/selfachieve' ]
    ];

    $website = [
        '@type'           => 'WebSite',
        '@id'             => $site_id,
        'url'             => $base . '/',
        'name'            => 'セルフアチーブ | 神戸のWEBマーケティング会社',
        'publisher'       => [ '@id' => $org_id ],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => [
                '@type'       => 'EntryPoint',
                'urlTemplate' => $base . '/?s={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];

    // ─────────────────────────────────────────
    // トップページ
    // ─────────────────────────────────────────
    if ( is_home() || is_front_page() ) {
        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                $founder,
                $organization,
                $website,
                [
                    '@type'         => 'WebPage',
                    '@id'           => $base . '/#webpage',
                    'url'           => $base . '/',
                    'name'          => '神戸のWEBマーケティング・集客支援会社 | セルフアチーブ',
                    'description'   => '神戸の中小企業に特化したWEBマーケティング会社。SEO対策・リスティング広告・ホームページ制作で集客を支援。累計200社以上・14年の実績。初回相談無料。',
                    'isPartOf'      => [ '@id' => $site_id ],
                    'about'         => [ '@id' => $org_id ],
                    'breadcrumb'    => [ '@id' => $base . '/#breadcrumb' ],
                    'inLanguage'    => 'ja',
                    'datePublished' => '2011-01-01',
                    'dateModified'  => $today,
                ],
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => $base . '/#breadcrumb',
                    'itemListElement' => [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ]
                    ]
                ],
                [
                    '@type'      => 'FAQPage',
                    '@id'        => $base . '/#faq',
                    'mainEntity' => [
                        [ '@type' => 'Question', 'name' => 'Webマーケティングの代行・外注・委託の違いは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '実質的には同じ意味で使われることが多いです。「代行」は業務を代わりに行うこと、「外注」は業務を外部に発注すること、「委託」は業務を信頼して任せることを指します。いずれの形式でも、セルフアチーブでは対応しています。' ] ],
                        [ '@type' => 'Question', 'name' => '神戸以外の企業でも依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、対応可能です。姫路・加古川・明石・芦屋・西宮など兵庫県内はもちろん、大阪・京都など近隣府県やオンラインでの対応により全国対応も可能です。' ] ],
                        [ '@type' => 'Question', 'name' => '初回相談は無料ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、初回相談は完全無料です。「何から始めればいいかわからない」「予算が少ない」「まず話だけ聞きたい」、どの段階でもお気軽にご連絡ください。' ] ],
                        [ '@type' => 'Question', 'name' => '小規模な店舗・個人事業主でも対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、対応しています。小規模な店舗・整骨院・美容室・飲食店など、地域密着型ビジネスの集客支援に多くの実績があります。まずは現状をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => '成果が出るまでの期間はどれくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '施策の種類や業種により異なりますが、SEOは数ヶ月、リスティング広告は開始後数週間で効果が見え始めることが多いです。まずは無料診断で現状を確認し、最適な施策を提案します。' ] ]
                    ]
                ]
            ]
        ];
    }

    // ─────────────────────────────────────────
    // 固定ページ・サービスページ
    // ─────────────────────────────────────────
    if ( is_page() ) {
        global $post;
        $slug = $post->post_name;
        $url = get_permalink();
        
        // サービスページ共通ヘルパー関数
        $make_service = function($name, $desc, $service_type, $breadcrumbs, $faqs) use ($founder, $organization, $website, $url, $today) {
            $graph = [
                $founder,
                $organization,
                $website,
                [
                    '@type'       => 'Service',
                    '@id'         => $url . '#service',
                    'name'        => $name,
                    'description' => $desc,
                    'provider'    => [ '@id' => $organization['@id'] ],
                    'areaServed'  => $organization['areaServed'],
                    'serviceType' => $service_type
                ],
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => $url . '#breadcrumb',
                    'itemListElement' => $breadcrumbs
                ],
                [
                    '@type'         => 'WebPage',
                    '@id'           => $url . '#webpage',
                    'url'           => $url,
                    'name'          => $name,
                    'description'   => $desc,
                    'isPartOf'      => [ '@id' => $website['@id'] ],
                    'breadcrumb'    => [ '@id' => $url . '#breadcrumb' ],
                    'inLanguage'    => 'ja',
                    'datePublished' => $today,
                    'dateModified'  => $today
                ]
            ];
            if (!empty($faqs)) {
                $graph[] = [
                    '@type'      => 'FAQPage',
                    '@id'        => $url . '#faq',
                    'mainEntity' => $faqs
                ];
            }
            return [ '@context' => 'https://schema.org', '@graph' => $graph ];
        };

        // 一般ページ共通ヘルパー関数
        $make_page = function($page_type, $name, $desc, $breadcrumbs, $extra = []) use ($website, $url, $today) {
            $graph = [
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => $url . '#breadcrumb',
                    'itemListElement' => $breadcrumbs
                ],
                [
                    '@type'         => $page_type,
                    '@id'           => $url . '#webpage',
                    'url'           => $url,
                    'name'          => $name,
                    'description'   => $desc,
                    'isPartOf'      => [ '@id' => $website['@id'] ],
                    'breadcrumb'    => [ '@id' => $url . '#breadcrumb' ],
                    'inLanguage'    => 'ja',
                    'dateModified'  => $today
                ]
            ];
            if (!empty($extra)) {
                $graph = array_merge($graph, $extra);
            }
            return [ '@context' => 'https://schema.org', '@graph' => $graph ];
        };

        // スラッグごとの分岐
        switch ( $slug ) {
            case 'seo':
                return $make_service(
                    'SEO対策 代行・コンサルティング | 神戸・兵庫の中小企業向けSEO支援 | セルフアチーブ',
                    '自社サイトで月平均40件以上の問い合わせを実現してるSEO施策を、そのまま御社サイトへご提供。SEO対策の代行・コンサルティング・外注に対応。神戸・兵庫の中小企業に特化。初回15分無料相談。',
                    'SEOコンサルティング',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SEO対策', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'SEO対策の費用はどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '施策の内容・対象キーワード数・競合状況によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'SEO対策の効果が出るまでどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '一般的に3〜6ヶ月で効果が見え始めることが多いです。ただし、業種・競合状況・現在のサイト状態によって異なります。' ] ],
                        [ '@type' => 'Question', 'name' => '自社でSEO対策をしているが成果が出ない。何が問題ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'よくある原因として、①キーワード選定の誤り、②コンテンツの質・量不足、③内部リンク設計の問題、④被リンクの不足、⑤技術的SEOの問題などが挙げられます。無料相談でサイトを拝見し、原因を特定します。' ] ],
                        [ '@type' => 'Question', 'name' => '神戸でSEO対策を依頼できる会社を探しています。', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、セルフアチーブは神戸・兵庫の中小企業に特化したSEO対策会社です。自社サイトで月平均40件以上の問い合わせを実現した実績をそのまま御社に提供します。' ] ],
                        [ '@type' => 'Question', 'name' => 'SEO対策とリスティング広告、どちらを先にやるべきですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '即効性が必要な場合はリスティング広告、長期的な集客基盤を作りたい場合はSEO対策が向いています。予算と目標に応じて最適な組み合わせをご提案します。' ] ]
                    ]
                );

            case 'meo':
                return $make_service(
                    'MEO対策 代行・コンサルティング | 神戸・兵庫の中小企業向けMEO支援 | セルフアチーブ',
                    'Googleマップ上位表示・MEO対策の代行・コンサルティング。店舗集客・来店促進に特化したMEO施策を神戸・兵庫の中小企業・店舗に提供。',
                    'MEO対策・Googleビジネスプロフィール最適化',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'MEO対策', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'MEO対策とは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'MEO（Map Engine Optimization）対策とは、Googleマップでの検索結果において自社店舗を上位表示させるための施策です。「地域名＋業種」で検索した際にGoogleマップに表示される「ローカルパック」への掲載を目指します。' ] ],
                        [ '@type' => 'Question', 'name' => 'MEO対策の効果が出るまでどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '一般的に1〜3ヶ月で効果が見え始めることが多いです。ただし、競合状況・現在のGoogleビジネスプロフィールの状態・対策キーワードによって異なります。' ] ],
                        [ '@type' => 'Question', 'name' => 'Googleビジネスプロフィールは自分で登録しているが、MEO対策は必要ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '登録だけでは不十分です。MEO対策では、情報の最適化・写真の充実・口コミ管理・投稿の継続・カテゴリ設定など、上位表示に必要な多くの施策を継続的に行う必要があります。' ] ],
                        [ '@type' => 'Question', 'name' => 'MEO対策の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '対応範囲や店舗数によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => '口コミを増やす方法はありますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、口コミ獲得の仕組みづくりも支援しています。お客様に自然と口コミを書いていただける導線設計や、スタッフへの依頼方法のレクチャーなども行っています。' ] ]
                    ]
                );

            case 'listing':
                return $make_service(
                    'リスティング広告 運用代行 | 神戸・兵庫の中小企業向けGoogle・Yahoo!広告 | セルフアチーブ',
                    '即日配信・即効果測定。Google広告・リスティング広告の代行・運用・コンサルティングに対応。手数料20%の明朗会計。神戸・兵庫の中小企業に特化。初回15分無料相談。',
                    'リスティング広告運用代行',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'リスティング広告', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'リスティング広告の費用はどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '広告費と代行手数料が必要です。弊社の代行手数料は広告費の20%（最低月額2万円）です。広告費は業種・競合状況・目標によって異なりますが、月3〜10万円から始める方が多いです。' ] ],
                        [ '@type' => 'Question', 'name' => 'リスティング広告はすぐに効果が出ますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、SEOと異なり広告配信開始後すぐに検索結果に表示されます。ただし、最適化には1〜2ヶ月のデータ蓄積が必要です。' ] ],
                        [ '@type' => 'Question', 'name' => 'Google広告とYahoo!広告、どちらがいいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '業種・ターゲット層・予算によって異なります。一般的にGoogle広告はシェアが高く、Yahoo!広告は中高年層に強い傾向があります。弊社では両方の運用に対応し、最適な配分をご提案します。' ] ],
                        [ '@type' => 'Question', 'name' => '自社でリスティング広告を運用しているが成果が出ない。何が問題ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'よくある原因として、①キーワード選定の問題、②広告文の訴求力不足、③ランディングページとの不一致、④入札戦略の誤り、⑤コンバージョン計測の未設定などが挙げられます。無料相談でアカウントを拝見し、原因を特定します。' ] ],
                        [ '@type' => 'Question', 'name' => '最低契約期間はありますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '3ヶ月からのご契約をお願いしています。リスティング広告は最適化に一定の期間が必要なため、短期間では成果を正確に評価できないためです。' ] ]
                    ]
                );

            case 'display':
                return $make_service(
                    'ディスプレイ広告 運用代行 | 神戸・兵庫の中小企業向けバナー広告支援 | セルフアチーブ',
                    'まだ検索していない潜在層に届ける。Google広告・ディスプレイ広告の代行・運用・バナー制作に対応。手数料20%の明朗会計。神戸・兵庫の中小企業に特化。初回15分無料相談。',
                    'ディスプレイ広告運用代行',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'ディスプレイ広告', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'ディスプレイ広告とリスティング広告の違いは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'リスティング広告は検索した人に表示される「検索広告」です。ディスプレイ広告はWebサイトやアプリの広告枠に表示される「バナー広告」で、まだ検索していない潜在顧客にアプローチできます。' ] ],
                        [ '@type' => 'Question', 'name' => 'ディスプレイ広告のバナー制作も対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、バナー制作から広告運用まで一貫して対応しています。' ] ],
                        [ '@type' => 'Question', 'name' => 'ディスプレイ広告の費用はどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '広告費と代行手数料が必要です。弊社の代行手数料は広告費の20%（最低月額2万円）です。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'リターゲティング広告も対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、一度サイトを訪問したユーザーに再アプローチするリターゲティング（リマーケティング）広告にも対応しています。' ] ]
                    ]
                );

            case 'sns':
                return $make_service(
                    'SNSマーケティング・運用代行 | 神戸・兵庫の中小企業向けSNS集客 | セルフアチーブ',
                    'Instagram・TikTok・X・YouTube・LINE・noteの運用代行・広告代行に対応。フォロワーを顧客に変えるSNSマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。初回15分無料相談。',
                    'SNSマーケティング',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'SNS運用代行の費用はどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'SNSの種類・投稿頻度・コンテンツ制作の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'どのSNSから始めるべきですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '業種・ターゲット層・目的によって最適なSNSは異なります。飲食・美容・アパレルはInstagram、若年層向けはTikTok、BtoBはX（旧Twitter）やnoteが有効なケースが多いです。無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'SNS運用代行を依頼するメリットは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '①専門知識を持つプロが運用するため質が高い、②社内リソースを本業に集中できる、③アルゴリズムの変化に迅速に対応できる、④データ分析に基づいた改善が継続的に行われる、などのメリットがあります。' ] ]
                    ]
                );

            case 'instagram':
                return $make_service(
                    'Instagram運用代行・広告代行 | 神戸・兵庫の中小企業向けInstagramマーケティング | セルフアチーブ',
                    'Instagram運用代行・広告代行に対応。フォロワーを顧客に変えるInstagramマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。',
                    'Instagram運用代行・Instagram広告',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'Instagram運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'Instagram運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '投稿頻度・コンテンツ制作の有無・広告運用の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'フォロワーが少なくても依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、0からのアカウント立ち上げにも対応しています。フォロワー数より「質の高いフォロワー」を増やすことを重視しています。' ] ],
                        [ '@type' => 'Question', 'name' => 'Instagram広告とオーガニック運用の違いは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'オーガニック運用は継続的な投稿でフォロワーを育て、長期的な信頼を構築します。Instagram広告は広告費を使って即効性のある集客を行います。目的に応じて組み合わせることが最も効果的です。' ] ],
                        [ '@type' => 'Question', 'name' => '写真・動画の撮影も依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、コンテンツ制作（写真・動画・リール）も対応しています。ご要望に応じてプランをご提案します。' ] ]
                    ]
                );

            case 'tiktok':
                return $make_service(
                    'TikTok運用代行・広告代行 | 神戸・兵庫の中小企業向けTikTokマーケティング | セルフアチーブ',
                    'TikTok運用代行・広告代行に対応。フォロワーを顧客に変えるTikTokマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。',
                    'TikTok運用代行・TikTok広告',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'TikTok運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'TikTok運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '投稿頻度・動画制作の有無・広告運用の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'TikTokは若い世代向けですか？中高年向けのビジネスでも効果がありますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'TikTokは10〜30代が中心ですが、近年は中高年層のユーザーも増加しています。また、若年層向けの採用活動や認知拡大には非常に効果的です。ターゲット層に合わせた活用方法をご提案します。' ] ],
                        [ '@type' => 'Question', 'name' => '動画の撮影・編集も対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、動画の企画・撮影・編集まで一貫して対応しています。' ] ]
                    ]
                );

            case 'x':
                return $make_service(
                    'X（旧Twitter）運用代行・広告代行 | 神戸・兵庫の中小企業向けXマーケティング | セルフアチーブ',
                    'X（旧Twitter）運用代行・広告代行に対応。フォロワーを顧客に変えるXマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。',
                    'X運用代行・X広告',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'X（旧Twitter）運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'X（旧Twitter）運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '投稿頻度・コンテンツ制作の有無・広告運用の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'X（旧Twitter）は企業アカウントに向いていますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、特にBtoB企業・メディア・IT企業・飲食店などに向いています。リアルタイム性が高く、情報拡散力が強いのが特徴です。' ] ],
                        [ '@type' => 'Question', 'name' => '炎上リスクが心配です。', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '投稿前の確認フローを設けることで炎上リスクを最小化します。また、万が一の際の対応方針もあらかじめ策定しておくことをお勧めします。' ] ]
                    ]
                );

            case 'youtube':
                return $make_service(
                    'YouTube運用代行・動画制作 | 神戸・兵庫の中小企業向けYouTubeマーケティング | セルフアチーブ',
                    'YouTube運用代行・動画制作に対応。視聴者を顧客に変えるYouTubeマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。企画から撮影・編集・分析まで一貫支援。初回15分無料相談。',
                    'YouTube運用代行・動画制作',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'YouTube運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'YouTube運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '動画制作の頻度・クオリティ・広告運用の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'チャンネル登録者が少なくても依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、0からのチャンネル立ち上げにも対応しています。' ] ],
                        [ '@type' => 'Question', 'name' => 'YouTube SEO（検索対策）も対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、タイトル・説明文・タグの最適化など、YouTube内での検索上位表示対策にも対応しています。' ] ]
                    ]
                );

            case 'line':
                return $make_service(
                    'LINE運用代行・構築 | 神戸・兵庫の中小企業向けLINEマーケティング | セルフアチーブ',
                    'LINE公式アカウントの構築・運用代行に対応。友だちを顧客に変えるLINEマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント構築から配信・分析まで一貫支援。初回15分無料相談。',
                    'LINE公式アカウント運用代行',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'LINE運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'LINE公式アカウントとLINEビジネスコネクトの違いは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'LINE公式アカウントは中小企業向けの標準的なビジネスアカウントです。友だち登録したユーザーへのメッセージ配信・クーポン・予約機能などが利用できます。' ] ],
                        [ '@type' => 'Question', 'name' => 'LINE運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '配信頻度・コンテンツ制作の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'LINE友だちを増やすにはどうすればいいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '店頭でのQRコード設置・SNSでの告知・ウェブサイトへの導線設置・友だち追加特典の設定など、複数の施策を組み合わせることが効果的です。' ] ],
                        [ '@type' => 'Question', 'name' => 'LINE広告も対応していますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、LINE広告（LINE Ads）の運用代行にも対応しています。友だち獲得広告・ウェブサイトへの誘導広告など、目的に応じた広告形式をご提案します。' ] ]
                    ]
                );

            case 'note':
                return $make_service(
                    'note運用代行・記事制作 | 神戸・兵庫の中小企業向けnoteマーケティング | セルフアチーブ',
                    'note運用代行・記事制作に対応。読まれるほど選ばれるnoteマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。記事企画から執筆・公開・分析まで一貫支援。初回15分無料相談。',
                    'note運用代行・記事制作',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'SNSマーケティング', 'item' => $base . '/sns/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => 'note運用代行', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'note運用代行の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '記事制作の頻度・文字数・SEO対策の有無によって異なります。まずは無料相談でご状況をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => 'noteはSEOにも効果がありますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、noteはGoogleからの評価が高く、適切なキーワードで記事を書くことで検索流入を獲得できます。自社サイトのSEOと組み合わせることでより大きな効果が期待できます。' ] ],
                        [ '@type' => 'Question', 'name' => '記事のテーマや方向性はどのように決めますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'ヒアリングをもとに、ターゲット層・競合分析・キーワード調査を行い、最適なコンテンツ戦略を立案します。' ] ]
                    ]
                );

            case 'ai-seo':
                return $make_service(
                    'AI検索対策（LLM・SGE対策） | 神戸・兵庫の中小企業向け次世代SEO | セルフアチーブ',
                    'ChatGPTやGoogle SGEなどのAI検索エンジンで自社を推薦させる次世代のSEO対策（LLM対策）。AI時代に選ばれる企業になるための戦略立案と実行を支援。',
                    'AI検索最適化・LLM対策',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'AI検索対策', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'AI検索対策（LLM対策）とは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'ChatGPTやGoogle Gemini、Perplexityなどのいわゆる「AI検索エンジン」で、ユーザーが質問した際に自社が推薦・引用されるようにするための最適化施策です。従来のSEOとは異なるアプローチが必要です。' ] ],
                        [ '@type' => 'Question', 'name' => '従来のSEOとAI検索対策は何が違いますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '従来のSEOは検索結果ページでの順位を上げることが目的ですが、AI検索対策はAIが回答を生成する際に自社の情報を参照・引用させることが目的です。E-E-A-T（経験・専門性・権威性・信頼性）の強化、構造化データの整備、信頼できる情報源としての認知が重要です。' ] ],
                        [ '@type' => 'Question', 'name' => 'AI検索対策の効果が出るまでどのくらいかかりますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'AIモデルの学習サイクルや検索エンジンのアルゴリズムによって異なりますが、一般的に3〜6ヶ月を目安にしています。' ] ]
                    ]
                );

            case 'ai-automation':
                return $make_service(
                    'AI活用支援（DX/AX） | 神戸・兵庫の中小企業向け業務効率化 | セルフアチーブ',
                    'ChatGPTや生成AIを活用した社内業務の効率化・自動化支援。高額なシステム開発ではなく、既存AIツールを組み合わせた現実的で低コストなDX/AXを実現。',
                    'AI導入コンサルティング・業務効率化',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'AI業務効率化・導入支援', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'AI活用支援（DX/AX）とは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'ChatGPTや生成AIを活用して、社内の業務プロセスを効率化・自動化する支援サービスです。高額なシステム開発ではなく、既存のAIツールを組み合わせた現実的で低コストなDX/AXを実現します。' ] ],
                        [ '@type' => 'Question', 'name' => 'AIに詳しくなくても導入できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、AIの知識がない方でも導入できるよう、現状分析から導入後のサポートまで一貫して支援します。' ] ],
                        [ '@type' => 'Question', 'name' => 'どのような業務に活用できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '文書作成・メール対応・データ分析・顧客対応・コンテンツ制作・社内マニュアル作成など、幅広い業務に活用できます。まずは無料相談でご状況をお聞かせください。' ] ]
                    ]
                );

            case 'strategy':
                return $make_service(
                    'WEB戦略設計・コンサルティング | 神戸・兵庫の中小企業向けWEB集客 | セルフアチーブ',
                    'WEB集客の全体戦略設計・コンサルティング。現状分析から目標設定、最適な施策の選定まで、成果を出すためのロードマップを作成。神戸・兵庫の中小企業に特化。',
                    'WEBコンサルティング',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'WEB戦略設計', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'WEB戦略設計とは何ですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '現状のWEB集客の課題を分析し、目標達成に向けた最適な施策の組み合わせ（SEO・広告・SNS・サイト改善など）を設計するサービスです。' ] ],
                        [ '@type' => 'Question', 'name' => 'どのような企業に向いていますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => '「何から始めればいいかわからない」「施策がバラバラで成果が出ない」「WEB集客の全体像を整理したい」という企業に特に向いています。' ] ],
                        [ '@type' => 'Question', 'name' => '戦略設計だけ依頼することはできますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、戦略設計のみのご依頼も承っています。その後の実行支援もご希望に応じて対応可能です。' ] ]
                    ]
                );

            case 'webdesign':
                return $make_service(
                    'サイト制作・分析改善 | 神戸・兵庫の中小企業向けホームページ制作 | セルフアチーブ',
                    '集客に強いホームページ制作・LP制作・サイト改善。デザインだけでなく、SEOやコンバージョンを意識した設計で成果を出すサイトを構築。神戸・兵庫の中小企業に特化。',
                    'ホームページ制作・Webデザイン',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'サイト制作・分析改善', 'item' => $url ]
                    ],
                    [
                        [ '@type' => 'Question', 'name' => 'ホームページ制作の費用はどのくらいですか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'ページ数・デザインの複雑さ・機能要件によって異なります。まずは無料相談でご要望をお聞かせください。' ] ],
                        [ '@type' => 'Question', 'name' => '既存サイトの改善も依頼できますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、既存サイトのデザイン改善・コンバージョン改善・SEO改善にも対応しています。' ] ],
                        [ '@type' => 'Question', 'name' => 'WordPressで制作してもらえますか？', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'はい、WordPressでの制作に対応しています。納品後もご自身で更新できるよう、操作方法のレクチャーも行います。' ] ]
                    ]
                );

            case 'company':
                return $make_page(
                    'AboutPage',
                    '会社情報 | 株式会社セルフアチーブ',
                    '株式会社セルフアチーブの会社情報。代表取締役・新原秀崇が率いる神戸の中小企業・店舗に特化したWEBマーケティング会社。SEO対策・リスティング広告・ホームページ制作で集客を支援。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => '会社情報', 'item' => $url ]
                    ],
                    [ $founder, $organization ]
                );

            case 'contact':
                return $make_page(
                    'ContactPage',
                    'お問い合わせ | セルフアチーブ',
                    '株式会社セルフアチーブへのお問い合わせはこちら。WEBマーケティング・集客に関するご相談、お見積りなどお気軽にご連絡ください。初回相談無料。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'お問い合わせ', 'item' => $url ]
                    ]
                );

            case 'thanks':
                return [
                    '@context' => 'https://schema.org',
                    '@graph'   => [
                        [
                            '@type'       => 'WebPage',
                            '@id'         => $url . '#webpage',
                            'url'         => $url,
                            'name'        => '送信完了 | セルフアチーブ',
                            'description' => 'お問い合わせありがとうございます。内容を確認次第、担当者よりご連絡いたします。',
                            'isPartOf'    => [ '@id' => $website['@id'] ],
                            'inLanguage'  => 'ja'
                        ]
                    ]
                ];

            case 'privacy':
                return $make_page(
                    'WebPage',
                    'プライバシーポリシー | セルフアチーブ',
                    '株式会社セルフアチーブのプライバシーポリシー（個人情報保護方針）について。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'プライバシーポリシー', 'item' => $url ]
                    ]
                );

            case 'news':
                return $make_page(
                    'CollectionPage',
                    'お知らせ一覧 | セルフアチーブ',
                    '株式会社セルフアチーブからのお知らせ・最新情報一覧です。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'お知らせ', 'item' => $url ]
                    ]
                );

            case 'column':
                return $make_page(
                    'CollectionPage',
                    'コラム一覧 | セルフアチーブ',
                    'WEBマーケティング・SEO対策・SNS運用など、集客に役立つノウハウや最新情報を発信するコラム一覧です。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'コラム', 'item' => $url ]
                    ]
                );

            case 'voice':
                return $make_page(
                    'CollectionPage',
                    'お客さまの声一覧 | セルフアチーブ',
                    'セルフアチーブのWEBマーケティング支援をご利用いただいたお客様の声・評判・口コミ一覧です。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'お客さまの声', 'item' => $url ]
                    ]
                );

            case 'works':
                return $make_page(
                    'CollectionPage',
                    '制作実績一覧 | セルフアチーブ',
                    'セルフアチーブのホームページ制作・LP制作・WEBマーケティング支援の実績一覧です。',
                    [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => '制作実績', 'item' => $url ]
                    ]
                );
        }
    }

    // ─────────────────────────────────────────
    // コラム詳細 (single-column)
    // ─────────────────────────────────────────
    if ( is_singular( 'column' ) ) {
        global $post;
        $url = get_permalink();
        $title = get_the_title();
        $desc = wp_trim_words( strip_shortcodes( wp_strip_all_tags( $post->post_content ) ), 120, '...' );
        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( $post->ID, 'full' ) : $base . '/wp-content/uploads/2026/05/default_ogp.png';
        $pub_date = get_the_time( 'c' );
        $mod_date = get_the_modified_time( 'c' );

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => $url . '#breadcrumb',
                    'itemListElement' => [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'コラム', 'item' => $base . '/column/' ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => $url ]
                    ]
                ],
                [
                    '@type'         => 'Article',
                    '@id'           => $url . '#article',
                    'url'           => $url,
                    'headline'      => $title,
                    'description'   => $desc,
                    'image'         => [ '@type' => 'ImageObject', 'url' => $thumb_url ],
                    'datePublished' => $pub_date,
                    'dateModified'  => $mod_date,
                    'author'        => [ '@id' => $founder_id ],
                    'publisher'     => [ '@id' => $org_id ],
                    'mainEntityOfPage' => [ '@type' => 'WebPage', '@id' => $url ]
                ]
            ]
        ];
    }

    // ─────────────────────────────────────────
    // その他の詳細ページ (BreadcrumbListのみ)
    // ─────────────────────────────────────────
    if ( is_singular( 'voice' ) || is_singular( 'works' ) || is_singular( 'news' ) ) {
        $url = get_permalink();
        $title = get_the_title();
        $post_type = get_post_type();
        
        $parent_name = '';
        $parent_url = '';
        if ( $post_type === 'voice' ) {
            $parent_name = 'お客さまの声';
            $parent_url = $base . '/voice/';
        } elseif ( $post_type === 'works' ) {
            $parent_name = '制作実績';
            $parent_url = $base . '/works/';
        } elseif ( $post_type === 'news' ) {
            $parent_name = 'お知らせ';
            $parent_url = $base . '/news/';
        }

        return [
            '@context' => 'https://schema.org',
            '@graph'   => [
                [
                    '@type'           => 'BreadcrumbList',
                    '@id'             => $url . '#breadcrumb',
                    'itemListElement' => [
                        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => $base . '/' ],
                        [ '@type' => 'ListItem', 'position' => 2, 'name' => $parent_name, 'item' => $parent_url ],
                        [ '@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => $url ]
                    ]
                ]
            ]
        ];
    }

    return [];
}
