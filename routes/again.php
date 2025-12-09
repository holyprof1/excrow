<?php get_header(); ?>
<section class="hero">
  <?php
  $hero = new WP_Query(['posts_per_page'=>1]);
  if($hero->have_posts()){
    while($hero->have_posts()){ $hero->the_post(); ?>
      <article class="hero-card">
        <?php the_post_thumbnail('large'); ?>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
      </article>
  <?php }} wp_reset_postdata(); ?>
</section>

<section class="grid-latest">
  <?php $q = new WP_Query(['posts_per_page'=>8,'offset'=>1]); 
  if($q->have_posts()){ echo '<div class="grid">'; 
    while($q->have_posts()){ $q->the_post(); get_template_part('template-parts/content','card'); }
    echo '</div>';
  } wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>
