<?php
function my_enqueue_assets() {

  // RESS
  wp_enqueue_style(
    'ress',
    'https://unpkg.com/ress/dist/ress.min.css',
    array(),
    null
  );

  // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Crimson+Text:wght@400;600;700&family=Noto+Sans+JP:wght@100..900&family=Philosopher:wght@400;700&family=Source+Sans+3:wght@200..900&display=swap',
    array(),
    null
  );

  // メインCSS
  wp_enqueue_style(
    'main-style',
    get_stylesheet_uri(),
    array('ress', 'google-fonts'),
    null
  );

  // GSAP
  wp_enqueue_script(
    'gsap',
    'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
    array(),
    null,
    true
  );

  // ScrollTrigger
  wp_enqueue_script(
    'scrolltrigger',
    'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
    array('gsap'),
    null,
    true
  );

  // Swiper
  wp_enqueue_script(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  // 自作 JS
  wp_enqueue_script(
    'my-script',
    get_template_directory_uri() . '/js/script.js',
    array('gsap', 'scrolltrigger', 'swiper'),
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'my_enqueue_assets');



/*-----------------------------------
カスタム投稿タイプ「plan」を登録
-------------------------------------*/
function create_plan_post_type() {
    $labels = array(
        'name'               => 'Plans',
        'singular_name'      => 'Plan',
        'menu_name'          => 'Plans',
        'name_admin_bar'     => 'Plan',
        'add_new'            => '新規追加',
        'add_new_item'       => '新規Planを追加',
        'edit_item'          => 'Planを編集',
        'new_item'           => '新規Plan',
        'view_item'          => 'Planを見る',
        'all_items'          => 'すべてのPlans',
        'search_items'       => 'Plansを検索',
        'not_found'          => '見つかりません',
        'not_found_in_trash' => 'ゴミ箱に見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => 'plans', // アーカイブページのスラッグ
        'rewrite'            => array('slug' => 'plans'),
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true, // Gutenberg対応
    );

    register_post_type('plan', $args);
}
add_action('init', 'create_plan_post_type');



/*-----------------------------------
カスタム投稿タイプ「faq」を登録
-------------------------------------*/
function create_faq_post_type() {
    $labels = array(
        'name'               => 'Faqs',
        'singular_name'      => 'Faq',
        'menu_name'          => 'Faqs',
        'name_admin_bar'     => 'Faq',
        'add_new'            => '新規追加',
        'add_new_item'       => '新規Faqを追加',
        'edit_item'          => 'Faqを編集',
        'new_item'           => '新規Faq',
        'view_item'          => 'Faqを見る',
        'all_items'          => 'すべてのFaqs',
        'search_items'       => 'Faqsを検索',
        'not_found'          => '見つかりません',
        'not_found_in_trash' => 'ゴミ箱に見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => 'faqs', // アーカイブページのスラッグ
        'rewrite'            => array('slug' => 'faqs'),
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true, // Gutenberg対応
    );

    register_post_type('faq', $args);
}
add_action('init', 'create_faq_post_type');


/*-----------------------------------
アイキャッチ画像を有効化
-------------------------------------*/
add_theme_support('post-thumbnails');