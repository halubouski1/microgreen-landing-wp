<?php
/**
 * Поддержка SVG: разрешаем загрузку .svg в медиатеку + базовая санитизация.
 *
 * ВАЖНО: санитизация здесь — best-effort (убирает script/on*-обработчики).
 * Загрузку SVG стоит доверять только доверенным пользователям. Для продакшена
 * рекомендуется плагин safe-svg. Соц-иконки на фронте выводятся как <img>,
 * а <img>-SVG браузер не исполняет как скрипт — доп. защита от XSS.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Разрешить MIME-тип SVG.
 */
function microgreen_allow_svg_mime( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'microgreen_allow_svg_mime' );

/**
 * Починить определение типа/расширения, иначе WP отклоняет .svg.
 */
function microgreen_fix_svg_filetype( $data, $file, $filename, $mimes ) {
	if ( '.svg' === strtolower( substr( $filename, -4 ) ) ) {
		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}
	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'microgreen_fix_svg_filetype', 10, 4 );

/**
 * Базовая санитизация содержимого SVG.
 *
 * @param string $svg Сырое содержимое SVG.
 * @return string Очищенный SVG или '' если это не валидный SVG.
 */
function microgreen_sanitize_svg( $svg ) {
	$svg = preg_replace( '#<script.*?</script>#is', '', $svg );
	$svg = preg_replace( '#<foreignObject.*?</foreignObject>#is', '', $svg );
	$svg = preg_replace( '/\son\w+\s*=\s*"[^"]*"/i', '', $svg );
	$svg = preg_replace( "/\son\w+\s*=\s*'[^']*'/i", '', $svg );
	$svg = preg_replace( '/(?:href|xlink:href)\s*=\s*(["\'])\s*javascript:[^"\']*\1/i', '', $svg );

	if ( false === stripos( $svg, '<svg' ) ) {
		return '';
	}
	return $svg;
}

/**
 * Санитизировать SVG при загрузке.
 */
function microgreen_sanitize_svg_on_upload( $file ) {
	if ( isset( $file['type'] ) && 'image/svg+xml' === $file['type'] && ! empty( $file['tmp_name'] ) ) {
		$raw = file_get_contents( $file['tmp_name'] );
		if ( false !== $raw ) {
			$clean = microgreen_sanitize_svg( $raw );
			if ( '' === $clean ) {
				$file['error'] = __( 'File SVG non valido o non sicuro.', 'custom-theme' );
			} else {
				file_put_contents( $file['tmp_name'], $clean );
			}
		}
	}
	return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'microgreen_sanitize_svg_on_upload' );

/**
 * Показывать превью SVG в списке медиатеки (админка).
 */
function microgreen_svg_admin_thumb_css() {
	echo '<style>.attachment .thumbnail img[src$=".svg"],.media-icon img[src$=".svg"],.attachment-preview .thumbnail img[src$=".svg"]{width:100%;height:auto;}</style>';
}
add_action( 'admin_head', 'microgreen_svg_admin_thumb_css' );
