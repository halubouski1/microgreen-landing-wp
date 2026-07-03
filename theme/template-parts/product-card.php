<?php
/**
 * Партиал карточки товара (CPT prodotto). Используется в цикле на front-page.
 * Полное название = заголовок записи; tag / описание / цена / картинка — ACF.
 * Пустая картинка подменяется плейсхолдером choose-card.png (как в макете).
 */
$card_img = function_exists( 'get_field' ) ? get_field( 'image' ) : '';
$card_img = $card_img ? $card_img : get_template_directory_uri() . '/assets/img/choose-card.png';
?>
      <div class="product-card">
        <div class="product-card__body">
          <div class="product-card__top"><hr class="product-card__line"><span class="product-card__tag"><?php echo esc_html( get_field( 'tag' ) ); ?></span></div>
          <img src="<?php echo esc_url( $card_img ); ?>" class="product-card__img" alt="<?php the_title_attribute(); ?>">
          <h3 class="product-card__name"><?php the_title(); ?></h3>
          <div class="product-card__info">
            <span class="product-card__desc"><?php echo esc_html( get_field( 'descrizione' ) ); ?></span>
            <div class="product-card__price"><span class="product-card__price-val"><?php echo esc_html( get_field( 'price' ) ); ?></span><span class="product-card__price-unit">/ confezione</span></div>
          </div>
        </div>
        <button class="product-card__btn">Aggiungi<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.6582 5.11578H5.19873L4.04872 3.05445C3.91964 2.82308 3.67545 2.67969 3.4105 2.67969H1.94885C1.54522 2.67969 1.21802 3.00689 1.21802 3.41052C1.21802 3.81414 1.54522 4.14134 1.94885 4.14134H2.98136L4.11628 6.17563L6.73369 11.9669L6.73637 11.9728L6.96691 12.4829L4.33901 15.286C4.15006 15.4876 4.09091 15.7785 4.18614 16.0378C4.28137 16.2971 4.51471 16.4806 4.78919 16.512L7.18449 16.7857C10.1806 17.1281 13.2059 17.1281 16.202 16.7857L18.5973 16.512C18.9983 16.4661 19.2862 16.1039 19.2404 15.7029C19.1946 15.3019 18.8323 15.0139 18.4313 15.0598L16.036 15.3335C13.1502 15.6633 10.2362 15.6633 7.35046 15.3335L6.39987 15.2249L8.32865 13.1675C8.34731 13.1476 8.36464 13.1269 8.38064 13.1056L9.11421 13.2011C10.1422 13.3348 11.1813 13.361 12.2147 13.2793C14.6249 13.0887 16.8587 11.9418 18.4183 10.0943L18.9816 9.42694C19.0005 9.40453 19.018 9.381 19.0341 9.35648L20.084 7.75659C20.8281 6.62258 20.0146 5.11578 18.6582 5.11578Z" fill="white"/><path d="M6.33381 18.0271C5.52656 18.0271 4.87216 18.6815 4.87216 19.4887C4.87216 20.296 5.52656 20.9504 6.33381 20.9504C7.14106 20.9504 7.79547 20.296 7.79547 19.4887C7.79547 18.6815 7.14106 18.0271 6.33381 18.0271Z" fill="white"/><path d="M15.591 19.4887C15.591 18.6815 16.2454 18.0271 17.0526 18.0271C17.8599 18.0271 18.5143 18.6815 18.5143 19.4887C18.5143 20.296 17.8599 20.9504 17.0526 20.9504C16.2454 20.9504 15.591 20.296 15.591 19.4887Z" fill="white"/></svg></button>
      </div>
