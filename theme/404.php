<?php get_header( 'black' ); ?>

<main class="container" style="padding: 200px 20px 140px; text-align: center; color: #151515;">
  <h1 style="font-size: 90px; line-height: 1; margin-bottom: 20px; color: #20271c;">404</h1>
  <p style="margin-bottom: 32px;">Sorry, the page you’re looking for can’t be found.</p>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; background: #6E8D65; color: #fff; padding: 14px 28px; border-radius: 5px; text-decoration: none;">Back to home</a>
</main>

<?php get_footer(); ?>
