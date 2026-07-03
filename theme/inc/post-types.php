<?php
/**
 * Кастомный тип записей «Prodotti» (карточки товаров) + сидинг стартовых товаров.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Регистрация CPT prodotto.
 * Заголовок записи = полное название карточки (product-card__name).
 * Остальные поля — через ACF (см. inc/acf-fields.php).
 */
function microgreen_register_prodotto_cpt() {
	register_post_type(
		'prodotto',
		array(
			'labels'       => array(
				'name'               => __( 'Prodotti', 'custom-theme' ),
				'singular_name'      => __( 'Prodotto', 'custom-theme' ),
				'add_new'            => __( 'Aggiungi', 'custom-theme' ),
				'add_new_item'       => __( 'Aggiungi prodotto', 'custom-theme' ),
				'edit_item'          => __( 'Modifica prodotto', 'custom-theme' ),
				'new_item'           => __( 'Nuovo prodotto', 'custom-theme' ),
				'view_item'          => __( 'Vedi prodotto', 'custom-theme' ),
				'search_items'       => __( 'Cerca prodotti', 'custom-theme' ),
				'not_found'          => __( 'Nessun prodotto', 'custom-theme' ),
				'all_items'          => __( 'Tutti i prodotti', 'custom-theme' ),
				'menu_name'          => __( 'Prodotti', 'custom-theme' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'menu_icon'    => 'dashicons-carrot',
			'menu_position' => 5,
			'supports'     => array( 'title', 'page-attributes' ),
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'prodotti' ),
		)
	);
}
add_action( 'init', 'microgreen_register_prodotto_cpt' );

/**
 * Исходные товары из статичного макета. Пары: [tag, полное название].
 * Описание и цена у всех одинаковые (как в макете).
 *
 * @return array<int, array{0:string,1:string}>
 */
function microgreen_default_products() {
	return array(
		array( 'Pisello', 'Pisello' ),
		array( 'Ravanello', 'Ravanello Red Cora' ),
		array( 'Girasole', 'Girasole e Trifoglio' ),
		array( 'Senape', 'Senape' ),
		array( 'Cavolo', 'Cavolo Rosso' ),
		array( 'Basilico', 'Basilico' ),
		array( 'Bietola', 'Bietola' ),
		array( 'Rucola', 'Rucola' ),
		array( 'Girasole', 'Girasole' ),
	);
}

/**
 * Один раз наполняет CPT стартовыми товарами (как в макете), чтобы сетка
 * не была пустой сразу после активации. Флаг в опциях защищает от повторов.
 */
function microgreen_seed_products() {
	if ( get_option( 'microgreen_products_seeded' ) ) {
		return;
	}

	$desc  = 'Dolce e croccante, sapore di pisello fresco. Perfetto per insalate e piatti primaverili.';
	$price = '€ 8';
	$order = 1;

	foreach ( microgreen_default_products() as $p ) {
		$post_id = wp_insert_post(
			array(
				'post_type'   => 'prodotto',
				'post_status' => 'publish',
				'post_title'  => $p[1],
				'menu_order'  => $order++,
			)
		);

		if ( $post_id && ! is_wp_error( $post_id ) && function_exists( 'update_field' ) ) {
			update_field( 'tag', $p[0], $post_id );
			update_field( 'descrizione', $desc, $post_id );
			update_field( 'price', $price, $post_id );
		}
	}

	update_option( 'microgreen_products_seeded', 1 );
}
add_action( 'after_switch_theme', 'microgreen_seed_products' );
