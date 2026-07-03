<?php
/**
 * Глобальные настройки сайта (ACF Options): контакты футера + соц-ссылки.
 * Плюс хелперы для чтения этих значений с фолбэком на дефолты из макета.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Страница «Impostazioni sito» в админке (ACF Pro).
 */
function microgreen_register_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => __( 'Impostazioni sito', 'custom-theme' ),
				'menu_title' => __( 'Impostazioni sito', 'custom-theme' ),
				'menu_slug'  => 'site-settings',
				'capability' => 'edit_theme_options',
				'icon_url'   => 'dashicons-admin-generic',
				'position'   => 3,
				'redirect'   => false,
			)
		);
	}
}
add_action( 'acf/init', 'microgreen_register_options_page' );

/**
 * Поля футера/контактов на странице настроек.
 */
function microgreen_register_footer_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_footer_settings',
			'title'    => __( 'Footer / Contatti', 'custom-theme' ),
			'fields'   => array(
				array(
					'key'          => 'field_emails',
					'label'        => __( 'Email', 'custom-theme' ),
					'name'         => 'emails',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => __( 'Aggiungi email', 'custom-theme' ),
					'instructions' => __( 'Etichetta (sopra) + email. Se vuoto, restano le email di default.', 'custom-theme' ),
					'sub_fields'   => array(
						array(
							'key'   => 'field_email_label',
							'label' => __( 'Etichetta (sopra)', 'custom-theme' ),
							'name'  => 'label',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_email_email',
							'label' => __( 'Email', 'custom-theme' ),
							'name'  => 'email',
							'type'  => 'email',
						),
					),
				),
				array(
					'key'          => 'field_social_links',
					'label'        => __( 'Social', 'custom-theme' ),
					'name'         => 'social_links',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => __( 'Aggiungi social', 'custom-theme' ),
					'instructions' => __( 'Icona (SVG/PNG) + link. Se vuoto, restano i social di default.', 'custom-theme' ),
					'sub_fields'   => array(
						array(
							'key'           => 'field_social_icon',
							'label'         => __( 'Icona', 'custom-theme' ),
							'name'          => 'icon',
							'type'          => 'image',
							'return_format' => 'url',
							'library'       => 'all',
							'mime_types'    => 'svg,png,jpg,jpeg,webp',
						),
						array(
							'key'   => 'field_social_url',
							'label' => __( 'Link', 'custom-theme' ),
							'name'  => 'url',
							'type'  => 'url',
						),
						array(
							'key'   => 'field_social_label',
							'label' => __( 'Etichetta (aria-label)', 'custom-theme' ),
							'name'  => 'label',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'           => 'field_site_phone',
					'label'         => __( 'Telefono', 'custom-theme' ),
					'name'          => 'phone',
					'type'          => 'text',
					'default_value' => '+393 884 013 999',
					'instructions'  => __( 'Es. +393 884 013 999', 'custom-theme' ),
				),
				array(
					'key'           => 'field_site_address',
					'label'         => __( 'Indirizzo', 'custom-theme' ),
					'name'          => 'address',
					'type'          => 'text',
					'default_value' => 'Roma, Via prima, casa 2',
				),
				array(
					'key'   => 'field_site_privacy_url',
					'label' => __( 'Privacy Policy — link', 'custom-theme' ),
					'name'  => 'privacy_url',
					'type'  => 'url',
				),
				array(
					'key'           => 'field_site_privacy_label',
					'label'         => __( 'Privacy Policy — testo', 'custom-theme' ),
					'name'          => 'privacy_label',
					'type'          => 'text',
					'default_value' => 'Privacy Policy',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'site-settings',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'microgreen_register_footer_fields' );

/**
 * Секция «Header»: главный логотип (белый) + ссылки на WhatsApp и Telegram.
 * Логотип переиспользуется во всех «белых» местах (header, card, perchi).
 */
function microgreen_register_header_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'        => 'group_header',
			'title'      => __( 'Header', 'custom-theme' ),
			'menu_order' => 0,
			'fields'     => array(
				array(
					'key'           => 'field_mobile_logo',
					'label'         => __( 'Logo menu mobile (verde)', 'custom-theme' ),
					'name'          => 'mobile_logo',
					'type'          => 'image',
					'return_format' => 'url',
					'library'       => 'all',
					'mime_types'    => 'svg,png,webp,jpg,jpeg',
					'instructions'  => __( 'Icona verde usata solo nel menu mobile. Se vuoto, resta l\'icona di default.', 'custom-theme' ),
				),
				array(
					'key'           => 'field_site_logo',
					'label'         => __( 'Logo', 'custom-theme' ),
					'name'          => 'logo',
					'type'          => 'image',
					'return_format' => 'url',
					'library'       => 'all',
					'mime_types'    => 'svg,png,webp,jpg,jpeg',
					'instructions'  => __( 'Logo principale: header, card pagamento, freshness e sezione perchi. Se vuoto, resta il logo di default.', 'custom-theme' ),
				),
				array(
					'key'           => 'field_header_whatsapp',
					'label'         => __( 'Link WhatsApp', 'custom-theme' ),
					'name'          => 'header_whatsapp',
					'type'          => 'url',
					'default_value' => 'https://wa.me/393884013999',
				),
				array(
					'key'           => 'field_header_telegram',
					'label'         => __( 'Link Telegram', 'custom-theme' ),
					'name'          => 'header_telegram',
					'type'          => 'url',
					'default_value' => 'https://t.me/VassiliyPG',
				),
				array(
					'key'           => 'field_support_label',
					'label'         => __( 'Support — etichetta', 'custom-theme' ),
					'name'          => 'support_label',
					'type'          => 'text',
					'default_value' => 'Support.',
					'instructions'  => __( 'Etichetta del gruppo «Support» nel menu mobile.', 'custom-theme' ),
				),
				array(
					'key'          => 'field_support_items',
					'label'        => __( 'Support — voci', 'custom-theme' ),
					'name'         => 'support_items',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => __( 'Aggiungi voce', 'custom-theme' ),
					'instructions' => __( 'Ogni voce: testo + link opzionale. Senza link diventa solo testo.', 'custom-theme' ),
					'sub_fields'   => array(
						array(
							'key'   => 'field_support_text',
							'label' => __( 'Testo', 'custom-theme' ),
							'name'  => 'text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_support_url',
							'label' => __( 'Link (opzionale)', 'custom-theme' ),
							'name'  => 'url',
							'type'  => 'url',
						),
					),
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'site-settings',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'microgreen_register_header_fields' );

/**
 * Значение опции с фолбэком на дефолт из макета.
 *
 * @param string $name    Имя ACF-поля на странице настроек.
 * @param string $default Значение по умолчанию.
 * @return string
 */
function microgreen_opt( $name, $default = '' ) {
	$value = function_exists( 'get_field' ) ? get_field( $name, 'option' ) : null;
	return ( null === $value || '' === $value ) ? $default : $value;
}

/**
 * Собрать tel:-href из телефона (оставить только цифры и +).
 *
 * @param string $phone
 * @return string
 */
function microgreen_tel( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}
