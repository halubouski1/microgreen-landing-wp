<?php
/**
 * Кастомные Walker'ы и fallback-функции навигации.
 *
 * Воспроизводят исходную статическую вёрстку 1:1 (без <ul>/<li>).
 * Все меню одноуровневые, поэтому start_lvl/end_lvl/end_el пустые.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ссылки основного меню (шапка + мобильное меню). Используются в fallback,
 * когда меню ещё не создано/не назначено в админке.
 *
 * @return array<int, array{0:string,1:string}> Пары [url, label].
 */
function microgreen_primary_links() {
	return array(
		array( '#hero', 'Principale' ),
		array( '#innovation', 'Chi siamo' ),
		array( '#products', 'Tutti i prodotti' ),
		array( '#perchi', 'Tipologie di Clienti' ),
		array( '#wellness', 'Per privati' ),
		array( '#payment', 'Spedizione e pagamento' ),
		array( '#contatti', 'Contatti' ),
	);
}

/**
 * Ссылки меню подвала.
 *
 * @return array<int, array{0:string,1:string}> Пары [url, label].
 */
function microgreen_footer_links() {
	return array(
		array( '#hero', 'Home' ),
		array( '#innovation', 'Chi siamo' ),
		array( '#products', 'Directory' ),
		array( '#payment', 'Spedizione e Pagamento' ),
		array( '#contatti', 'Contatti' ),
	);
}

/**
 * SVG-точка — разделитель между пунктами меню в шапке.
 *
 * @return string
 */
function microgreen_nav_sep() {
	return '<svg class="nav-sep" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="2" fill="white"/></svg>';
}

/**
 * Шапка: плоские <a class="nav-link"> c SVG-точками между пунктами.
 */
class Microgreen_Header_Walker extends Walker_Nav_Menu {

	private $index = 0;

	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		if ( $this->index > 0 ) {
			$output .= microgreen_nav_sep();
		}
		$this->index++;
		$output .= '<a href="' . esc_url( $data_object->url ) . '" class="nav-link">' . esc_html( $data_object->title ) . '</a>';
	}
}

/**
 * Мобильное меню: <div class="mob-menu__item"><a class="mob-menu__link">…</a></div>.
 */
class Microgreen_Mob_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$output .= '<div class="mob-menu__item"><a href="' . esc_url( $data_object->url ) . '" class="mob-menu__link">' . esc_html( $data_object->title ) . '</a></div>';
	}
}

/**
 * Подвал: плоские <a> с заданным классом ссылки (footer__nav-link /
 * footer__mobile-nav-link).
 */
class Microgreen_Footer_Walker extends Walker_Nav_Menu {

	private $link_class;

	public function __construct( $link_class = 'footer__nav-link' ) {
		$this->link_class = $link_class;
	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$output .= '<a href="' . esc_url( $data_object->url ) . '" class="' . esc_attr( $this->link_class ) . '">' . esc_html( $data_object->title ) . '</a>';
	}
}

/**
 * Fallback шапки — исходные ссылки, пока меню «primary» не назначено.
 *
 * @param array $args Аргументы wp_nav_menu (приведены к массиву).
 */
function microgreen_header_nav_fallback( $args = array() ) {
	$html = '';
	foreach ( microgreen_primary_links() as $i => $link ) {
		if ( $i > 0 ) {
			$html .= microgreen_nav_sep();
		}
		$html .= '<a href="' . esc_url( $link[0] ) . '" class="nav-link">' . esc_html( $link[1] ) . '</a>';
	}
	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- уже экранировано выше.
}

/**
 * Fallback мобильного меню — исходные ссылки, пока меню «primary» не назначено.
 *
 * @param array $args Аргументы wp_nav_menu (приведены к массиву).
 */
function microgreen_mob_nav_fallback( $args = array() ) {
	$html = '';
	foreach ( microgreen_primary_links() as $link ) {
		$html .= '<div class="mob-menu__item"><a href="' . esc_url( $link[0] ) . '" class="mob-menu__link">' . esc_html( $link[1] ) . '</a></div>';
	}
	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- уже экранировано выше.
}

/**
 * Fallback подвала — исходные ссылки, пока меню «footer» не назначено.
 * Класс ссылки берётся из аргумента link_class, переданного в wp_nav_menu().
 *
 * @param array $args Аргументы wp_nav_menu (приведены к массиву).
 */
function microgreen_footer_nav_fallback( $args = array() ) {
	$link_class = isset( $args['link_class'] ) ? $args['link_class'] : 'footer__nav-link';
	$html       = '';
	foreach ( microgreen_footer_links() as $link ) {
		$html .= '<a href="' . esc_url( $link[0] ) . '" class="' . esc_attr( $link_class ) . '">' . esc_html( $link[1] ) . '</a>';
	}
	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- уже экранировано выше.
}
