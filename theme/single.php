<?php get_header( 'black' ); ?>

<main class="container" style="max-width: 820px; margin: 0 auto; padding: 200px 20px 140px; color: #151515;">
  <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1 style="font-size: 48px; line-height: 1.1; margin-bottom: 16px; color: #20271c;">
        <?php the_title(); ?>
      </h1>
      <div style="opacity: 0.6; margin-bottom: 32px;"><?php echo esc_html( get_the_date() ); ?></div>

      <?php if ( has_post_thumbnail() ) : ?>
        <div style="margin-bottom: 32px;">
          <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;' ) ); ?>
        </div>
      <?php endif; ?>

      <div class="entry-content" style="line-height: 1.7;">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
