<?php
/*
Template Name: Front Page
*/

get_header();
?>

<section class="banner-home">
      <h1>Portal do Cliente</h1>
</section>
<section class="card-section">
<?php
  $args = array(
    'post_type' => 'post', 
    'posts_per_page' => 6, 
  );

  $query = new WP_Query($args);

  while ($query->have_posts()) {
    $query->the_post();
    $category = get_the_category();
    $category_name = $category[0]->cat_name;
  ?>
    <div class="card">
      <?php if (has_post_thumbnail()) { ?>
        <a href="<?= the_permalink() ?>"><img src="<?= get_the_post_thumbnail_url() ?>" alt="Imagem do Post"></a>
        <div class="category"><?= $category_name ?></div>
      <?php } ?>
      <div class="content">
        <h2 class="title"><?= the_title() ?></h2>
        <p class="resume"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
        <a href="<?= the_permalink() ?>" class="read-more">Leia Mais</a>
      </div>
    </div>
  <?php } ?>

  <?= wp_reset_postdata() ?>
</section>

<?php
   get_footer();
?>



