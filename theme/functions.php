<?php
/**
 * Custom Theme — функции темы.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/inc/nav-walkers.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/svg-support.php';
require get_template_directory() . '/inc/site-data.php';
require get_template_directory() . '/inc/gravity-forms.php';

// Убираем админ-бар WordPress на фронте (для всех, включая залогиненных).
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Поддержка возможностей темы и регистрация меню.
 */
function microgreen_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Основное (шапка / моб. меню)', 'custom-theme' ),
			'footer'  => __( 'Подвал', 'custom-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'microgreen_setup' );

/**
 * При активации темы один раз создаёт меню и назначает их на локации,
 * чтобы ссылки сразу были доступны для управления в «Внешний вид → Меню».
 * Идемпотентно: существующие меню и уже назначенные локации не трогает,
 * поэтому ручные правки пользователя не перезатираются.
 */
function microgreen_seed_menus() {
	$locations = get_theme_mod( 'nav_menu_locations' );
	$locations = is_array( $locations ) ? $locations : array();

	if ( empty( $locations['primary'] ) ) {
		$id = microgreen_create_menu( __( 'Основное меню', 'custom-theme' ), microgreen_primary_links() );
		if ( $id ) {
			$locations['primary'] = $id;
		}
	}

	if ( empty( $locations['footer'] ) ) {
		$id = microgreen_create_menu( __( 'Меню подвала', 'custom-theme' ), microgreen_footer_links() );
		if ( $id ) {
			$locations['footer'] = $id;
		}
	}

	set_theme_mod( 'nav_menu_locations', $locations );
}
add_action( 'after_switch_theme', 'microgreen_seed_menus' );

/**
 * Создаёт меню с заданными ссылками (или возвращает id существующего с таким именем).
 *
 * @param string                              $name  Название меню.
 * @param array<int, array{0:string,1:string}> $links Пары [url, label].
 * @return int term_id меню или 0 при ошибке.
 */
function microgreen_create_menu( $name, $links ) {
	$existing = wp_get_nav_menu_object( $name );
	if ( $existing ) {
		return (int) $existing->term_id;
	}

	$menu_id = wp_create_nav_menu( $name );
	if ( is_wp_error( $menu_id ) ) {
		return 0;
	}

	foreach ( $links as $link ) {
		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => $link[1],
				'menu-item-url'    => $link[0],
				'menu-item-status' => 'publish',
			)
		);
	}

	return (int) $menu_id;
}

/**
 * Подключение стилей и скриптов.
 * Порядок стилей и зависимости скриптов задаются через deps.
 */
function microgreen_assets() {
	$uri = get_template_directory_uri();
	$ver = wp_get_theme()->get( 'Version' );

	// Стили: normalize -> aos -> style -> media.
	wp_enqueue_style( 'normalize', $uri . '/css/normalize.css', array(), $ver );
	wp_enqueue_style( 'aos-css', $uri . '/css/aos.css', array(), $ver );
	wp_enqueue_style( 'theme', $uri . '/css/style.css', array( 'normalize', 'aos-css' ), $ver );
	wp_enqueue_style( 'theme-media', $uri . '/css/media.css', array( 'theme' ), $ver );

	// Скрипт в <head> — фикс реального viewport height (как в оригинале).
	wp_enqueue_script( 'fixed-vh', $uri . '/js/fixed-vh.js', array(), $ver, false );

	// Скрипты в футере. main.js зависит от глобалов Lenis и AOS.
	wp_enqueue_script( 'lenis', $uri . '/js/lenis.min.js', array(), $ver, true );
	wp_enqueue_script( 'aos', $uri . '/js/aos.js', array(), $ver, true );
	wp_enqueue_script( 'main', $uri . '/js/main.js', array( 'lenis', 'aos' ), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'microgreen_assets' );
