<?php
/**
 * ACFフィールドの定義
 * ※管理画面で設定するため、ここではPHPによる自動登録の雛形のみ用意
 */

if( function_exists('acf_add_local_field_group') ):

// お客様の声 (voice) フィールドグループ
acf_add_local_field_group(array(
    'key' => 'group_voice_fields',
    'title' => 'お客様の声 詳細情報',
    'fields' => array(
        array(
            'key' => 'field_voice_quote_short',
            'label' => '一覧用抜粋テキスト',
            'name' => 'voice_quote_short',
            'type' => 'text',
            'instructions' => '一覧ページで表示される短い抜粋テキストを入力してください。',
        ),
        array(
            'key' => 'field_voice_q01',
            'label' => '質問01',
            'name' => 'voice_q01',
            'type' => 'text',
        ),
        array(
            'key' => 'field_voice_a01',
            'label' => '回答01',
            'name' => 'voice_a01',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_voice_img_01',
            'label' => '画像01',
            'name' => 'voice_img_01',
            'type' => 'image',
            'return_format' => 'id',
        ),
        // Q02〜Q04も同様に定義（省略）
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'voice',
            ),
        ),
    ),
));

// 制作実績 (our_works) フィールドグループ
acf_add_local_field_group(array(
    'key' => 'group_works_fields',
    'title' => '制作実績 詳細情報',
    'fields' => array(
        array(
            'key' => 'field_works_location',
            'label' => '所在地',
            'name' => 'works_location',
            'type' => 'text',
        ),
        array(
            'key' => 'field_works_measures',
            'label' => '実施施策',
            'name' => 'works_measures',
            'type' => 'text',
        ),
        array(
            'key' => 'field_works_result_text',
            'label' => '一覧用結果テキスト',
            'name' => 'works_result_text',
            'type' => 'text',
        ),
        array(
            'key' => 'field_works_results',
            'label' => '数字でわかる結果',
            'name' => 'works_results',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_works_result_label',
                    'label' => '指標ラベル',
                    'name' => 'label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_works_result_num',
                    'label' => '数値',
                    'name' => 'num',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_works_result_unit',
                    'label' => '単位',
                    'name' => 'unit',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'field_works_points',
            'label' => '制作ポイント',
            'name' => 'works_points',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_works_point_title',
                    'label' => 'ポイント見出し',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_works_point_desc',
                    'label' => 'ポイント説明',
                    'name' => 'desc',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'our_works',
            ),
        ),
    ),
));

endif;
