<?php
/**
 * Регистрация полей ACF кодом (локальная группа полей) — чтобы поля жили
 * в репозитории, а не только в БД. Требует ACF (Pro стоит и активен).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Поля карточки товара (CPT prodotto).
 * Полное название берётся из заголовка записи (the_title), поэтому здесь
 * только: tag (короткое, сверху), изображение, описание, цена.
 */
function microgreen_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_prodotto',
			'title'    => __( 'Dati prodotto', 'custom-theme' ),
			'fields'   => array(
				array(
					'key'          => 'field_prodotto_tag',
					'label'        => __( 'Tag (sopra la card)', 'custom-theme' ),
					'name'         => 'tag',
					'type'         => 'text',
					'instructions' => __( 'Nome breve mostrato in alto, es. «Pisello».', 'custom-theme' ),
				),
				array(
					'key'           => 'field_prodotto_image',
					'label'         => __( 'Immagine', 'custom-theme' ),
					'name'          => 'image',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
					'mime_types'    => 'jpg,jpeg,png,webp',
				),
				array(
					'key'   => 'field_prodotto_descrizione',
					'label' => __( 'Descrizione', 'custom-theme' ),
					'name'  => 'descrizione',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'          => 'field_prodotto_price',
					'label'        => __( 'Prezzo', 'custom-theme' ),
					'name'         => 'price',
					'type'         => 'text',
					'instructions' => __( 'Es. «€ 8».', 'custom-theme' ),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'prodotto',
					),
				),
			),
			'menu_order' => 0,
			'position'   => 'normal',
			'style'      => 'default',
		)
	);
}
add_action( 'acf/init', 'microgreen_register_acf_fields' );
