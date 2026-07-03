<?php
/**
 * Gravity Forms: форма секции freshness («Porta il futuro…»).
 * Форму создаём кодом (GFAPI) и стилизуем сами под макет, поэтому дефолтный
 * CSS Gravity Forms отключаем.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Отключаем стандартные стили GF — единственную форму стилизуем вручную 1:1.
add_filter( 'gform_disable_css', '__return_true' );

// Отключаем авто-скролл к форме после AJAX-отправки (прыжок страницы) — для всех форм.
add_filter( 'gform_confirmation_anchor', '__return_false' );

/**
 * SVG-стрелка из макета (кнопка отправки). $stroke — цвет обводки.
 *
 * @param string $stroke Цвет обводки.
 * @return string
 */
function microgreen_arrow_svg( $stroke ) {
	return '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="' . esc_attr( $stroke ) . '" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="' . esc_attr( $stroke ) . '" stroke-linecap="round" stroke-linejoin="round"/></svg>';
}

/**
 * Кнопка отправки как в макете (для обеих наших форм по css-классу).
 *
 * @param string $button HTML кнопки по умолчанию.
 * @param array  $form   Массив формы.
 * @return string
 */
function microgreen_gf_submit_button( $button, $form ) {
	$css  = isset( $form['cssClass'] ) ? $form['cssClass'] : '';
	$text = ! empty( $form['button']['text'] ) ? $form['button']['text'] : 'Invia';
	$id   = absint( $form['id'] );

	if ( false !== strpos( $css, 'order__gform' ) ) {
		return '<button type="submit" id="gform_submit_button_' . $id . '" class="order-popup__submit" onclick="gform.submission.handleButtonClick(this)">'
			. esc_html( $text ) . ' ' . microgreen_arrow_svg( 'white' ) . '</button>';
	}

	if ( false !== strpos( $css, 'freshness__gform' ) ) {
		return '<button type="submit" id="gform_submit_button_' . $id . '" class="btn-primary freshness__submit" onclick="gform.submission.handleButtonClick(this)">'
			. esc_html( $text ) . ' ' . microgreen_arrow_svg( '#0D4003' ) . '</button>';
	}

	return $button;
}
add_filter( 'gform_submit_button', 'microgreen_gf_submit_button', 10, 2 );

/**
 * Создаёт форму freshness, если её ещё нет. ID сохраняем в опции.
 *
 * @return int ID формы или 0.
 */
function microgreen_ensure_freshness_form() {
	if ( ! class_exists( 'GFAPI' ) ) {
		return 0;
	}

	$existing = (int) get_option( 'microgreen_freshness_form_id' );
	if ( $existing && GFAPI::form_id_exists( $existing ) ) {
		return $existing;
	}

	$form = array(
		'title'          => 'Freshness Contact',
		'labelPlacement'  => 'hidden_label',
		'cssClass'       => 'freshness__gform',
		'button'         => array(
			'type' => 'text',
			'text' => 'Invia dati',
		),
		'fields'         => array(
			array(
				'id'          => 1,
				'type'        => 'email',
				'label'       => 'Email',
				'placeholder' => 'Email',
				'isRequired'  => true,
				'cssClass'    => 'ff-email',
			),
			array(
				'id'          => 2,
				'type'        => 'text',
				'label'       => 'Nome',
				'placeholder' => 'Nome',
				'isRequired'  => false,
				'cssClass'    => 'ff-nome',
			),
			array(
				'id'          => 3,
				'type'        => 'text',
				'label'       => 'La tua domanda',
				'placeholder' => 'La tua domanda',
				'isRequired'  => false,
				'cssClass'    => 'ff-domanda',
			),
		),
	);

	$result = GFAPI::add_form( $form );
	if ( is_wp_error( $result ) ) {
		return 0;
	}

	update_option( 'microgreen_freshness_form_id', (int) $result );
	return (int) $result;
}
add_action( 'after_switch_theme', 'microgreen_ensure_freshness_form' );

/**
 * ============================================================================
 * Order popup form (вторая форма) — данные + список товаров из CPT со счётчиком
 * ============================================================================
 */

/**
 * HTML списка товаров (из CPT prodotto) со степперами — точно как в макете.
 * Инпуты количества НЕ являются полями GF: их значения собирает JS в скрытое
 * поле «Ordine» перед отправкой.
 *
 * @return string
 */
function microgreen_order_products_html() {
	$query = new WP_Query(
		array(
			'post_type'      => 'prodotto',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'date'       => 'ASC',
			),
		)
	);

	$html = '<span class="order-popup__sublabel">Il tuo ordine:</span><div class="order-popup__items">';

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$name = get_the_title();
			$html .= '<div class="order-popup__item"><span class="order-popup__item-name">' . esc_html( $name ) . '</span>'
				. '<div class="order-popup__stepper">'
				. '<button type="button" class="order-popup__step" data-dir="-1">&minus;</button>'
				. '<input class="order-popup__qty" type="text" inputmode="numeric" pattern="[0-9]*" value="0" name="mg_order_qty[' . esc_attr( get_the_ID() ) . ']" aria-label="' . esc_attr( 'Quantità ' . $name ) . '">'
				. '<button type="button" class="order-popup__step" data-dir="1">+</button>'
				. '</div></div>';
		}
		wp_reset_postdata();
	}

	$html .= '</div>';
	return $html;
}

/**
 * Подставляем актуальный список товаров в HTML-поле формы заказа при рендере.
 *
 * @param array $form Массив формы.
 * @return array
 */
function microgreen_order_inject_products( $form ) {
	if ( empty( $form['cssClass'] ) || false === strpos( $form['cssClass'], 'order__gform' ) ) {
		return $form;
	}
	foreach ( $form['fields'] as $field ) {
		if ( 'html' === $field->type && false !== strpos( (string) $field->cssClass, 'opf-order' ) ) {
			$field->content = microgreen_order_products_html();
		}
	}
	return $form;
}
add_filter( 'gform_pre_render', 'microgreen_order_inject_products' );
add_filter( 'gform_pre_submission_filter', 'microgreen_order_inject_products' );

/**
 * Собираем выбранные количества товаров в поле «Ordine» (input_8) на сервере —
 * надёжно, независимо от JS. В entry попадёт «Название × N pz» построчно.
 *
 * @param array $form Массив формы.
 * @return void
 */
function microgreen_order_capture_quantities( $form ) {
	if ( empty( $form['cssClass'] ) || false === strpos( $form['cssClass'], 'order__gform' ) ) {
		return;
	}

	$qty = ( isset( $_POST['mg_order_qty'] ) && is_array( $_POST['mg_order_qty'] ) ) ? wp_unslash( $_POST['mg_order_qty'] ) : array();

	// Если mg_order_qty не пришёл (новый flow GF шлёт через FormData не всё) —
	// не трогаем input_8: там уже summary, записанный JS перед отправкой.
	if ( empty( $qty ) ) {
		return;
	}

	$lines = array();
	foreach ( $qty as $pid => $n ) {
		$n = (int) $n;
		if ( $n > 0 ) {
			$title = get_the_title( (int) $pid );
			if ( $title ) {
				$lines[] = $title . ' × ' . $n . ' pz';
			}
		}
	}

	$_POST['input_8'] = implode( "\n", $lines );
}
add_action( 'gform_pre_submission', 'microgreen_order_capture_quantities' );

/**
 * Показываем состав заказа в сообщении после отправки (confirmation),
 * чтобы клиент сразу видел выбранные количества. Не перетирает текст —
 * добавляет блок «Il tuo ordine» с содержимым поля Ordine (input_8).
 *
 * @param string|array $confirmation Текущее подтверждение.
 * @param array        $form         Форма.
 * @param array        $entry        Запись.
 * @return string|array
 */
function microgreen_order_confirmation_details( $confirmation, $form, $entry ) {
	if ( empty( $form['cssClass'] ) || false === strpos( $form['cssClass'], 'order__gform' ) ) {
		return $confirmation;
	}
	if ( ! is_string( $confirmation ) ) {
		return $confirmation; // редиректы/страницы не трогаем.
	}

	$order = isset( $entry['8'] ) ? trim( (string) $entry['8'] ) : '';
	if ( '' === $order ) {
		return $confirmation;
	}

	$confirmation .= '<div class="order-confirmation__details"><strong>Il tuo ordine:</strong><br>'
		. nl2br( esc_html( $order ) ) . '</div>';

	return $confirmation;
}
add_filter( 'gform_confirmation', 'microgreen_order_confirmation_details', 10, 3 );

/**
 * Создаёт форму заказа, если её ещё нет. ID сохраняем в опции.
 *
 * @return int
 */
function microgreen_ensure_order_form() {
	if ( ! class_exists( 'GFAPI' ) ) {
		return 0;
	}

	$existing = (int) get_option( 'microgreen_order_form_id' );
	if ( $existing && GFAPI::form_id_exists( $existing ) ) {
		return $existing;
	}

	$form = array(
		'title'          => 'Order',
		'labelPlacement'  => 'hidden_label',
		'cssClass'       => 'order__gform',
		'button'         => array(
			'type' => 'text',
			'text' => 'Invia la tua richiesta',
		),
		'fields'         => array(
			array(
				'id'       => 1,
				'type'     => 'html',
				'label'    => 'I tuoi dati',
				'cssClass' => 'opf-heading',
				'content'  => '<span class="order-popup__sublabel">I tuoi dati:</span>',
			),
			array(
				'id'          => 2,
				'type'        => 'text',
				'label'       => 'Nome',
				'placeholder' => 'Nome',
				'cssClass'    => 'opf-data',
			),
			array(
				'id'          => 3,
				'type'        => 'phone',
				'label'       => 'Telefono',
				'placeholder' => '+393 884 013 999',
				'cssClass'    => 'opf-data',
			),
			array(
				'id'          => 4,
				'type'        => 'email',
				'label'       => 'Email',
				'placeholder' => 'microgree@gmail.com',
				'cssClass'    => 'opf-data',
			),
			array(
				'id'          => 5,
				'type'        => 'text',
				'label'       => 'Azienda',
				'placeholder' => "Nome dell'azienda",
				'cssClass'    => 'opf-data',
			),
			array(
				'id'          => 6,
				'type'        => 'text',
				'label'       => 'Indirizzo',
				'placeholder' => 'Indirizzo',
				'cssClass'    => 'opf-data',
			),
			array(
				'id'       => 7,
				'type'     => 'html',
				'label'    => 'Ordine (lista)',
				'cssClass' => 'opf-order',
				'content'  => '',
			),
			array(
				'id'       => 8,
				'type'     => 'hidden',
				'label'    => 'Ordine',
				'cssClass' => 'opf-order-data',
			),
		),
	);

	$result = GFAPI::add_form( $form );
	if ( is_wp_error( $result ) ) {
		return 0;
	}

	update_option( 'microgreen_order_form_id', (int) $result );
	return (int) $result;
}
add_action( 'after_switch_theme', 'microgreen_ensure_order_form' );
