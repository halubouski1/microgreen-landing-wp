<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
        <header class="header">
        <div class="header__wrapper">
          <a href="/" class="header__logo">
          <?php if ( $mg_logo = microgreen_opt( 'logo', '' ) ) : ?>
            <img class="site-logo" src="<?php echo esc_url( $mg_logo ); ?>" width="44" height="44" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
          <?php else : ?>
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.0125 17.288L7.14777 5.68402L7.92844 5.00093L10.5548 3.54855L16.3782 13.5575L14.0125 17.288Z" fill="white" />
              <path d="M24.2943 12.1926H19.1989L7.64315 31.9375H19.3809V28.3889H14.7404L24.2943 12.1926Z" fill="white" />
              <path d="M23.4754 25.6592L20.8367 21.2916L18.471 25.0222L22.4745 31.9375H24.8403L36.9419 9.18996L33.9393 5.36838L23.4754 25.6592Z" fill="white" />
              <path d="M9.099 6.51357C12.5526 3.63946 16.9933 1.9108 21.8376 1.9108C32.8429 1.9108 41.7644 10.8323 41.7644 21.8376C41.7644 32.8429 32.8429 41.7644 21.8376 41.7644C10.8323 41.7644 1.91079 32.8429 1.91079 21.8376C1.91079 17.1741 3.51283 12.8847 6.19659 9.48978" stroke="white" stroke-width="3.82158" />
              <path d="M6.03215 6.85501L8.14646 10.1729L7.62601 10.7584L4.35038 9.45724L4.41543 8.67657C4.41543 8.67657 4.70251 8.27202 4.90335 8.02601C5.30504 7.53398 6.03215 6.85501 6.03215 6.85501Z" fill="white" />
            </svg>
          <?php endif; ?>
          </a>

          <nav class="header__nav">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Microgreen_Header_Walker(),
                    'fallback_cb'    => 'microgreen_header_nav_fallback',
                )
            );
            ?>
          </nav>
  
          <div class="header__actions">
            <a href="<?php echo esc_url( microgreen_opt( 'header_telegram', 'https://t.me/VassiliyPG' ) ); ?>" class="btn-tg" aria-label="Telegram" target="_blank" rel="noopener noreferrer">
              <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.974926 5.08765C4.78182 3.41983 7.32035 2.3203 8.5905 1.78907C12.2171 0.272276 12.9706 0.00879313 13.4618 9.27653e-05C13.5698 -0.00182078 13.8114 0.0251002 13.9678 0.152762C14.0999 0.260557 14.1363 0.406173 14.1537 0.508374C14.1711 0.610576 14.1927 0.843394 14.1755 1.02531C13.979 3.10168 13.1286 8.14049 12.696 10.4661C12.513 11.4501 12.1525 11.78 11.8036 11.8123C11.0452 11.8825 10.4694 11.3084 9.73487 10.8242C8.58553 10.0666 7.93623 9.59503 6.82059 8.85576C5.53129 8.0014 6.36709 7.53183 7.10186 6.76443C7.29416 6.56359 10.6355 3.50754 10.7001 3.23031C10.7082 3.19564 10.7157 3.0664 10.6394 2.99815C10.563 2.92991 10.4503 2.95324 10.369 2.97181C10.2537 2.99811 8.41762 4.21844 4.86072 6.63279C4.33955 6.99265 3.8675 7.16799 3.44455 7.1588C2.97829 7.14867 2.08138 6.8937 1.41462 6.67576C0.596813 6.40845 -0.0531626 6.26712 0.00343568 5.81314C0.0329156 5.57667 0.356746 5.33485 0.974926 5.08765Z" fill="#151515"/>
              </svg>
            </a>
            <a href="<?php echo esc_url( microgreen_opt( 'header_whatsapp', 'https://wa.me/393884013999' ) ); ?>" class="btn-wa" target="_blank" rel="noopener noreferrer">What's App</a>
          </div>
        </div>
        
        <button class="burger" aria-label="Apri menu">
          <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="21" height="1" fill="white"/>
            <rect y="4" width="21" height="1" fill="white"/>
            <rect y="8" width="21" height="1" fill="white"/>
          </svg>
        </button>
      </header>
