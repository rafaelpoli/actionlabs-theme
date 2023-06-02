<?php 

function actionlabs_files(){
    wp_enqueue_style('actionlab_styles', get_theme_file_uri('/assets/style.css'));
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}
add_action('wp_enqueue_scripts', 'actionlabs_files');

function actionlabs_features() {
    register_nav_menu( 'headerMenuLocation', 'Meu Menu');
    add_theme_support( 'title-tag' );
}
add_action('after_setup_theme', 'actionlabs_features');

// Adiciona suporte a logos personalizadas
function theme_custom_logo_setup() {
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'theme_custom_logo_setup');

function adicionar_item_menu() {
    $menu_name = 'headerMenuLocation';
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations[$menu_name];

    // Verifica se o item de menu já existe
    $existing_menu_items = wp_get_nav_menu_items($menu_id);
    foreach ($existing_menu_items as $existing_menu_item) {
        if ($existing_menu_item->title === 'Sobre Nós') {
            // O item de menu já existe, não é necessário adicionar novamente
            return;
        }
    }

    $new_menu_item_data = array(
        'menu-item-title' => 'Sobre Nós',
        'menu-item-url' => home_url() . 'sobre-nos',
        'menu-item-status' => 'publish',
    );

    // Adiciona o novo item ao menu
    wp_update_nav_menu_item($menu_id, 0, $new_menu_item_data);
}

// Verifica se o item de menu já existe antes de adicioná-lo
$menu_exists = wp_get_nav_menu_object('headerMenuLocation');
if ($menu_exists) {
    add_action('admin_init', 'adicionar_item_menu');
}

// Habilita a opção de imagem destacada para posts
function enable_featured_image_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'enable_featured_image_support');




