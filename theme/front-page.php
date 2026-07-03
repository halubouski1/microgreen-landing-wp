<?php get_header(); ?>
<?php $uri = get_template_directory_uri(); ?>

  <section class="hero" id="hero">
    <video class="hero__video" autoplay muted loop playsinline>
      <source src="<?php echo $uri; ?>/assets/vid/hero-bg.mp4" type="video/mp4">
    </video>
    <div class="hero__overlay"></div>

    <div class="hero__inner">

      <div class="hero__content">
        <div class="hero__left">
          <span class="hero__subtitle">Piccoli nelle dimensioni, giganti nei nutrienti.</span>
          <h1 class="hero__title">Microgreen Piccoli Giganti di Civitanova Marche</h1>
          <div class="hero__btns">
            <a href="#products" class="btn-primary hero__btn-primary">
              Scopri i Nostri Microgreen
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
            <a href="#" class="btn-secondary hero__btn-secondary js-order-trigger">
              Ordina Ora
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </div>

        <div class="hero__learn">
          <a href="#innovation" class="learn-wrapper">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.0005 30.6C19.5253 30.6 21.9468 29.597 23.7321 27.8117C25.5175 26.0263 26.5205 23.6049 26.5205 21.08V12.92C26.5205 10.3952 25.5175 7.97371 23.7321 6.18837C21.9468 4.40302 19.5253 3.40002 17.0005 3.40002C14.4756 3.40002 12.0542 4.40302 10.2688 6.18837C8.48347 7.97371 7.48047 10.3952 7.48047 12.92V21.08C7.48047 23.6049 8.48347 26.0263 10.2688 27.8117C12.0542 29.597 14.4756 30.6 17.0005 30.6ZM8.84047 12.92C8.84047 10.7559 9.70018 8.68033 11.2305 7.15003C12.7608 5.61974 14.8363 4.76002 17.0005 4.76002C19.1646 4.76002 21.2402 5.61974 22.7705 7.15003C24.3008 8.68033 25.1605 10.7559 25.1605 12.92V21.08C25.1605 23.2442 24.3008 25.3197 22.7705 26.85C21.2402 28.3803 19.1646 29.24 17.0005 29.24C14.8363 29.24 12.7608 28.3803 11.2305 26.85C9.70018 25.3197 8.84047 23.2442 8.84047 21.08V12.92Z" fill="white"/>
              <path d="M16.3204 16.66H16.3816L16.5176 16.8028C16.5808 16.8665 16.656 16.9171 16.7389 16.9516C16.8218 16.9861 16.9107 17.0039 17.0004 17.0039C17.0902 17.0039 17.1791 16.9861 17.2619 16.9516C17.3448 16.9171 17.42 16.8665 17.4832 16.8028L17.6192 16.66H17.6804V16.5988L21.5632 12.7228L20.5976 11.7572L17.6804 14.6812V7.47998H16.3204V14.6812L13.4032 11.7572L12.4376 12.7228L16.3204 16.5988V16.66Z" fill="white"/>
            </svg>
          </a>
          <span class="hero__learn-text">Learn More</span>
        </div>
      </div>

    </div>
  </section>

  <section class="innovation" data-aos="fade-up" data-aos-duration="900" id="innovation">
    <div class="innovation__left">
      <div class="innovation__label">
        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.3366 7.44146C11.7372 7.80578 11.0489 7.99739 10.3475 7.99512C9.75994 7.99048 9.17901 7.8703 8.63781 7.64143C8.2207 8.23029 7.99747 8.9345 7.99917 9.65613V11.499C7.99932 11.5675 7.98538 11.6353 7.95821 11.6983C7.93104 11.7612 7.89123 11.8178 7.84124 11.8647C7.79125 11.9116 7.73216 11.9477 7.66763 11.9708C7.6031 11.9939 7.53452 12.0034 7.46614 11.9989C7.33764 11.9877 7.21812 11.9284 7.13155 11.8328C7.04498 11.7371 6.99775 11.6123 6.99934 11.4834V10.706L4.58599 8.29258C4.22724 8.42642 3.84783 8.49643 3.46493 8.49942C2.9378 8.50079 2.42054 8.35655 1.97018 8.08261C0.608535 7.25523 -0.124468 5.35114 0.0173836 2.98712C0.0245258 2.86482 0.076328 2.74939 0.162955 2.66276C0.249583 2.57613 0.365004 2.52433 0.487305 2.51719C2.85128 2.37784 4.75534 3.10835 5.5802 4.47002C5.90428 5.00375 6.04576 5.62848 5.98326 6.24976C5.97937 6.29789 5.96163 6.34387 5.93217 6.38214C5.9027 6.4204 5.86279 6.44931 5.81725 6.46538C5.77171 6.48144 5.72249 6.48396 5.67554 6.47265C5.62859 6.46133 5.58593 6.43666 5.55271 6.40161L4.35291 5.14555C4.25839 5.05575 4.13254 5.00643 4.00218 5.0081C3.87182 5.00977 3.74727 5.0623 3.65508 5.15448C3.5629 5.24667 3.51037 5.37122 3.5087 5.50158C3.50703 5.63194 3.55635 5.7578 3.64615 5.85232L7.01309 9.30493C7.01684 9.25618 7.02121 9.20744 7.02621 9.15932C7.13553 8.23243 7.54453 7.36659 8.19101 6.69344L11.3524 3.35269C11.4462 3.25897 11.4989 3.13182 11.499 2.99921C11.499 2.86661 11.4464 2.73941 11.3527 2.64561C11.2589 2.5518 11.1318 2.49907 10.9992 2.49901C10.8666 2.49895 10.7394 2.55157 10.6456 2.6453L7.58362 5.88356C7.55297 5.91603 7.51418 5.93969 7.47129 5.95209C7.4284 5.96449 7.38297 5.96518 7.33973 5.95408C7.29648 5.94298 7.257 5.9205 7.22538 5.88898C7.19376 5.85746 7.17116 5.81804 7.15994 5.77483C6.86374 4.68249 6.99434 3.59515 7.55987 2.66154C8.67593 0.819318 11.273 -0.166786 14.5075 0.023186C14.6298 0.0303284 14.7452 0.0821317 14.8318 0.168761C14.9184 0.25539 14.9702 0.370813 14.9774 0.493116C15.1648 3.72826 14.1788 6.32537 12.3366 7.44146Z" fill="#86946D"/>
        </svg>
        <span>Piccoli Giganti</span>
      </div>
      <h2 class="innovation__title">L'Innovazione Verde nel Cuore di Civitanova</h2>
      <p class="innovation__text">Benvenuti nel mondo di Piccoli Giganti, la realtà agricola urbana nata a Civitanova Marche che unisce innovazione, sostenibilità e benessere. Coltiviamo i nostri microgreen in un ambiente indoor tecnologicamente avanzato e controllato, senza l'uso di pesticidi o sostanze chimiche.</p>
      <img src="<?php echo $uri; ?>/assets/img/innovation-left.png" class="innovation__plant" alt="">
      <p class="innovation__footer">Il risultato? Un superfood freschissimo a chilometro zero, raccolto e consegnato a poche ore dal taglio per garantirti il massimo della qualità.</p>
    </div>
    <div class="innovation__right">
      <img src="<?php echo $uri; ?>/assets/img/innovation-right.jpg" class="innovation__photo" alt="">
    </div>
  </section>

  <section class="qualities" data-aos="fade-up" data-aos-duration="900">
    <div class="qualities__cards">
      <div class="qualities__card">
        <span class="qualities__num">01</span>
        <img src="<?php echo $uri; ?>/assets/img/innovation-card-1.png" class="qualities__img" alt="Sapore Straordinario">
        <span class="qualities__name">Sapore Straordinario</span>
      </div>
      <div class="qualities__card">
        <span class="qualities__num">02</span>
        <img src="<?php echo $uri; ?>/assets/img/innovation-card-2.png" class="qualities__img" alt="Giganti Nutrienti">
        <span class="qualities__name">Giganti Nutrienti</span>
      </div>
      <div class="qualities__card">
        <span class="qualities__num">03</span>
        <img src="<?php echo $uri; ?>/assets/img/innovation-card-3.png" class="qualities__img" alt="Innovazione e Purezza">
        <span class="qualities__name">Innovazione e Purezza</span>
      </div>
      <div class="qualities__card">
        <span class="qualities__num">04</span>
        <img src="<?php echo $uri; ?>/assets/img/innovation-card-4.png" class="qualities__img" alt="Freschezza a KM 0">
        <span class="qualities__name">Freschezza a KM 0</span>
      </div>
    </div>
  </section>

  <section class="products" data-aos="fade-up" data-aos-duration="900" id="products">
    <div class="products__header">
      <div class="products__label">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.31667 15C3.9537 15 3.63611 14.8933 3.36389 14.6798C3.09167 14.4663 2.91018 14.19 2.81944 13.851L1.94444 10.4793H12.0556L11.1806 13.851C11.0898 14.19 10.9083 14.4663 10.6361 14.6798C10.3639 14.8933 10.0463 15 9.68333 15H4.31667ZM7 4.45165C7 3.32147 7.39537 2.34198 8.18611 1.51319C8.97685 0.684387 9.96204 0.182085 11.1417 0.00627876C11.2065 -0.0062788 11.2648 5.33298e-08 11.3167 0.0251152C11.3685 0.0502303 11.4204 0.0816242 11.4722 0.119297C11.5241 0.15697 11.5598 0.203935 11.5796 0.260193C11.5993 0.31645 11.6024 0.376224 11.5889 0.439514C11.4463 1.43156 11.0284 2.29477 10.3351 3.02913C9.64185 3.7635 8.78941 4.21256 7.77778 4.37631V5.95856H13.2222C13.4426 5.95856 13.6274 6.03089 13.7768 6.17556C13.9261 6.32022 14.0005 6.49904 14 6.71201V8.21892C14 8.63332 13.8478 8.9882 13.5434 9.28355C13.2391 9.5789 12.8727 9.72633 12.4444 9.72583H1.55556C1.12778 9.72583 0.761704 9.5784 0.457333 9.28355C0.152963 8.9887 0.000518518 8.63382 0 8.21892V6.71201C0 6.49854 0.0746667 6.31972 0.224 6.17556C0.373333 6.03139 0.557926 5.95906 0.777778 5.95856H6.22222V4.37631C5.21111 4.21306 4.35892 3.76425 3.66567 3.02989C2.97241 2.29552 2.55422 1.43206 2.41111 0.439514C2.39815 0.376727 2.40152 0.317204 2.42122 0.260946C2.44093 0.204688 2.47644 0.157472 2.52778 0.119297C2.57911 0.0811219 2.63096 0.049728 2.68333 0.0251152C2.7357 0.000502356 2.79404 -0.00577649 2.85833 0.00627876C4.03796 0.182085 5.02315 0.684387 5.81389 1.51319C6.60463 2.34198 7 3.32147 7 4.45165Z" fill="#6E8D65"/>
        </svg>
        <span>Directory</span>
      </div>
      <h2 class="products__title">Un arcobaleno di sapori. Scegli i tuoi preferiti</h2>
    </div>

    <div class="products__grid">
        <?php
        $microgreen_products = new WP_Query(
            array(
                'post_type'      => 'prodotto',
                'posts_per_page' => -1,
                'orderby'        => array(
                    'menu_order' => 'ASC',
                    'date'       => 'ASC',
                ),
            )
        );
        if ( $microgreen_products->have_posts() ) :
            while ( $microgreen_products->have_posts() ) :
                $microgreen_products->the_post();
                get_template_part( 'template-parts/product-card' );
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <div class="products__pagination">
      <div class="products__pagination-arrows">
        <button class="products__btn-prev" aria-label="Pagina precedente">
          <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform:scaleX(-1)">
            <path d="M0 6.21364L10.2975 6.21364L6.56071 9.99092L7.55898 11L13 5.5L7.55898 0L6.56071 1.00908L10.2975 4.78636L0 4.78636V6.21364Z" fill="#6E8D65"/>
          </svg>
        </button>
        <button class="products__btn-next" aria-label="Pagina successiva">
          <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 6.21364L10.2975 6.21364L6.56071 9.99092L7.55898 11L13 5.5L7.55898 0L6.56071 1.00908L10.2975 4.78636L0 4.78636V6.21364Z" fill="white"/>
          </svg>
        </button>
      </div>
      <div class="products__pagination-nums"></div>
    </div>
  </section>

  <section class="perchi" data-aos="fade-up" data-aos-duration="900" id="perchi">
    <div class="perchi__grid">

      <div class="perchi-card">
        <img src="<?php echo $uri; ?>/assets/img/card-1.jpg" class="perchi-card__bg" alt="">
        <div class="perchi-card__overlay"></div>
        <div class="perchi-card__header">
          <div class="perchi-card__header-left">
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
          </div>
          <div class="perchi-card__header-right">
            <span class="perchi-card__num">001</span>
            <svg width="52" height="12" viewBox="0 0 52 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="9.62612" height="11.431" fill="white" />
              <rect x="10.8301" width="9.02449" height="11.431" fill="white" />
              <rect x="21.0566" width="9.62612" height="11.431" fill="white" />
              <rect x="31.8867" width="9.02449" height="11.431" fill="white" />
              <rect x="42.1133" width="9.62612" height="11.431" fill="white" fill-opacity="0.25" />
            </svg>
          </div>
        </div>
        <div class="perchi-card__footer">
          <h3 class="perchi-card__title">Ristoranti e Chef Gourmet</h3>
          <span class="perchi-card__subtitle">L'Ingrediente Segreto per Piatti Indimenticabili</span>
        </div>
      </div>

      <div class="perchi-card">
        <img src="<?php echo $uri; ?>/assets/img/card-2.jpg" class="perchi-card__bg" alt="">
        <div class="perchi-card__overlay"></div>
        <div class="perchi-card__header">
          <div class="perchi-card__header-left">
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
          </div>
          <div class="perchi-card__header-right">
            <span class="perchi-card__num">002</span>
              <svg width="52" height="12" viewBox="0 0 52 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="9.62612" height="11.431" rx="2.87446" fill="white" />
                <rect x="10.8301" width="9.02449" height="11.431" rx="2.87446" fill="white" />
                <rect x="21.0566" width="9.62612" height="11.431" rx="2.87446" fill="white" />
                <rect x="31.8867" width="9.02449" height="11.431" rx="2.87446" fill="white" fill-opacity="0.25" />
                <rect x="42.1133" width="9.62612" height="11.431" rx="2.87446" fill="white" fill-opacity="0.25" />
              </svg>
          </div>
        </div>
        <div class="perchi-card__footer">
          <h3 class="perchi-card__title">Bio Shop e Negozi Specializzati</h3>
          <span class="perchi-card__subtitle">Non è solo un contorno, è il cuore della tua dieta e salute.</span>
        </div>
      </div>

      <div class="perchi-card">
        <img src="<?php echo $uri; ?>/assets/img/card-3.jpg" class="perchi-card__bg" alt="">
        <div class="perchi-card__overlay"></div>
        <div class="perchi-card__header">
          <div class="perchi-card__header-left">
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
          </div>
          <div class="perchi-card__header-right">
            <span class="perchi-card__num">003</span>
            <svg width="52" height="12" viewBox="0 0 52 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="9.62612" height="11.431" rx="2.87446" fill="white" />
              <rect x="10.8301" width="9.02449" height="11.431" rx="2.87446" fill="white" />
              <rect x="21.0566" width="9.62612" height="11.431" rx="2.87446" fill="white" />
              <rect x="31.8867" width="9.02449" height="11.431" rx="2.87446" fill="white" />
              <rect x="42.1133" width="9.62612" height="11.431" rx="2.87446" fill="white" fill-opacity="0.25" />
            </svg>
          </div>
        </div>
        <div class="perchi-card__footer">
          <h3 class="perchi-card__title">Palestre e Centri Benessere</h3>
          <span class="perchi-card__subtitle">Il Boost Naturale per Sportivi e Salutisti</span>
        </div>
      </div>

    </div>
  </section>

  <!-- Wellness -->
  <section class="wellness" data-aos="fade-up" data-aos-duration="900" id="wellness">
    <video class="wellness__video" autoplay muted loop playsinline>
      <source src="<?php echo $uri; ?>/assets/vid/wellness.mp4" type="video/mp4">
    </video>
    <div class="wellness__top">
      <div class="wellness__badge">
        <span class="wellness__badge-num">40</span>
          <p class="wellness__badge-text">fino a 40 volte più vitamine e antiossidanti</p>
      </div>
      <p class="wellness__desc">Aggiungili a insalate, smoothie, toast o piatti caldi - un gesto semplice che porta vitalità pura nel tuo corpo, ogni giorno.</p>
    </div>
    <div class="wellness__bottom">
      <h2 class="wellness__title">Mangia Sano, Mangia Vivo. Scopri la Cultura del Benessere.</h2>
      <a href="#" class="btn-primary wellness__btn js-order-trigger">
        Ordina qui
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </a>
    </div>
  </section>

  <!-- Payment / Delivery -->
  <section class="payment" data-aos="fade-up" data-aos-duration="900" id="payment">

    <div class="payment__left">

      <div class="payment__left-top">
        <h2 class="payment__title">Dalla conferma dell'ordine all'erogazione del servizio entro 24 ore. Pagamento alla consegna.</h2>
        <p class="payment__subtitle">Servizio rapido per Civitanova Marche e zone limitrofe. Consegna gratuita al superamento di una soglia minima di 4 confezioni.</p>
      </div>

      <div class="payment__left-bottom">
        <div class="payment__tags">
          <span class="payment__tag">Sempre fresco</span>
          <span class="payment__tag">Consegna 24h</span>
        </div>
        <p class="payment__bottom-desc">I nostri microgreen vengono tagliati solo al momento dell'ordine e consegnati entro 24 ore dal raccolto — così arrivi a tavola la massima freschezza e il massimo valore nutritivo.</p>
      </div>

    </div>

    <div class="payment__right">
      <div class="payment__card">
        <span class="payment__badge">24 Ore</span>
        <h3 class="payment__card-title">24 Ore</h3>
        <p class="payment__card-text">Provali subito. Coltivazione km zero. Consegna entro 24h.</p>
        <div class="payment__card-logo">
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
        </div>
      </div>
    </div>

  </section>

  <!-- Freshness / Contact -->
  <section class="freshness" data-aos="fade-up" data-aos-duration="900" id="contatti">

    <div class="freshness__top">
      <p class="freshness__desc">Siamo a Civitanova Marche, pronti a farti scoprire il lato gigante della natura.<br>Contattaci via Whatsapp/Telegram per ottenere una BOX di vari assaggi gratuiti per scoprire i nostri prodotti.</p>
      <div class="freshness__actions">
        <a href="<?php echo esc_url( microgreen_opt( 'header_whatsapp', 'https://wa.me/393884013999' ) ); ?>" class="btn-secondary freshness__btn" target="_blank" rel="noopener noreferrer">
          Scrivici su WhatsApp
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
        <a href="#" class="btn-secondary freshness__btn js-order-trigger">
          Ordina Ora con Consegna Gratuita
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
    </div>

    <div class="freshness__bottom">
      <h2 class="freshness__title">Porta il futuro della freschezza sulla tua tavola</h2>
      <?php $mg_freshness_form = (int) get_option( 'microgreen_freshness_form_id' ); ?>
      <?php if ( $mg_freshness_form && function_exists( 'gravity_form' ) ) : ?>
      <?php gravity_form( $mg_freshness_form, false, false, false, null, true ); ?>
      <?php else : ?>
      <form class="freshness__form">
        <div class="freshness__inputs">
          <div class="freshness__form-row">
            <input type="email" class="freshness__input" placeholder="Email">
            <input type="text" class="freshness__input" placeholder="Nome">
          </div>
          <input type="text" class="freshness__input" placeholder="La tua domanda">
        </div>
        <button type="submit" class="btn-primary freshness__submit">
          Invia dati
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="#0D4003" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </form>
      <?php endif; ?>
    </div>

    <div class="freshness__logo">
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
    </div>

  </section>

  <!-- Mobile CTA -->
  <section class="mobile-cta" data-aos="fade-up" data-aos-duration="900">
    <p class="mobile-cta__text">Siamo a Civitanova Marche, pronti a farti scoprire il lato gigante della natura. Contattaci via Whatsapp/Telegram per ottenere una BOX di vari assaggi gratuiti per scoprire i nostri prodotti.</p>
    <div class="mobile-cta__btns">
      <a href="<?php echo esc_url( microgreen_opt( 'header_whatsapp', 'https://wa.me/393884013999' ) ); ?>" class="mobile-cta__btn" target="_blank" rel="noopener noreferrer">
        <span>Scrivici su WhatsApp</span>
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
      <a href="#" class="mobile-cta__btn js-order-trigger">
        <span>Ordina Ora con Consegna Gratuita</span>
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1667 0.5V5.16667C11.1667 5.87391 10.8857 6.55219 10.3856 7.05229C9.88552 7.55238 9.20724 7.83333 8.5 7.83333H0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.83333 4.5L0.5 7.83333L3.83333 11.1667" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
    </div>
  </section>

  <!-- Footer -->
<?php get_footer(); ?>
