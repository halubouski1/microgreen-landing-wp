<?php get_header( 'black' ); ?>

<main class="container" style="max-width: 820px; margin: 0 auto; padding: 200px 20px 140px; color: #151515;">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <p>Nothing found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
