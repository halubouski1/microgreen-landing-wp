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

/**
 * Иконка-«искорка» для строк блока контактов футера.
 *
 * @return string
 */
function microgreen_contact_icon() {
	return '<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.27678 0.641842C9.30639 0.542319 9.39812 0.473633 9.50216 0.473633C9.60621 0.473633 9.69794 0.542319 9.72754 0.641842C9.72754 0.641842 10.14 2.02454 10.5822 3.5076C11.2867 5.87037 13.1349 7.71863 15.4977 8.42314C16.9808 8.86526 18.3635 9.27777 18.3635 9.27777C18.463 9.30737 18.5317 9.3991 18.5317 9.50315C18.5317 9.60719 18.463 9.69892 18.3635 9.72852C18.3635 9.72852 16.9808 10.141 15.4977 10.5832C13.1349 11.2877 11.2867 13.1359 10.5822 15.4987C10.14 16.9817 9.72754 18.3644 9.72754 18.3644C9.69794 18.464 9.60621 18.5327 9.50216 18.5327C9.39812 18.5327 9.30639 18.464 9.27678 18.3644C9.27678 18.3644 8.86428 16.9817 8.42216 15.4987C7.71765 13.1359 5.86938 11.2877 3.50661 10.5832C2.02357 10.141 0.640866 9.72852 0.640866 9.72852C0.541336 9.69892 0.472656 9.60719 0.472656 9.50315C0.472656 9.3991 0.541336 9.30737 0.640866 9.27777C0.640866 9.27777 2.02357 8.86526 3.50661 8.42314C5.86938 7.71863 7.71765 5.87037 8.42216 3.5076C8.86428 2.02454 9.27678 0.641842 9.27678 0.641842Z" fill="#BFBFBF"/></svg>';
}

/**
 * Репитер «Contatti» (правый блок футера): этикетка + значение + необязательная ссылка.
 */
function microgreen_register_contacts_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	acf_add_local_field_group(
		array(
			'key'      => 'group_footer_contacts',
			'title'    => __( 'Contatti (footer)', 'custom-theme' ),
			'fields'   => array(
				array(
					'key'          => 'field_footer_contacts',
					'label'        => __( 'Righe contatti', 'custom-theme' ),
					'name'         => 'footer_contacts',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => __( 'Aggiungi riga', 'custom-theme' ),
					'instructions' => __( 'Blocco in basso a destra. Link opzionale (vuoto = solo testo). Se vuoto — restano Negozio + Contattare di default.', 'custom-theme' ),
					'sub_fields'   => array(
						array(
							'key'   => 'field_contact_label',
							'label' => __( 'Etichetta', 'custom-theme' ),
							'name'  => 'label',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_contact_value',
							'label' => __( 'Valore', 'custom-theme' ),
							'name'  => 'value',
							'type'  => 'text',
						),
						array(
							'key'          => 'field_contact_url',
							'label'        => __( 'Link (opzionale)', 'custom-theme' ),
							'name'         => 'url',
							'type'         => 'text',
							'instructions' => __( 'Es. tel:+39…, mailto:…, https://… Vuoto = solo testo.', 'custom-theme' ),
						),
					),
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
add_action( 'acf/init', 'microgreen_register_contacts_fields' );
