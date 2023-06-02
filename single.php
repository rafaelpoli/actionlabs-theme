<?php
/*
Template Name: Single Post
*/

get_header();
?>

<section class="banner-post">
      
</section>

<section class="single-post">
    <div class="dados-post">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();

                // Verifica se o post possui imagem destacada
                if (has_post_thumbnail()) {
                    // Obtém a imagem destacada do post
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    // Exibe a imagem destacada
                    echo "<div class='div-imagem-destacada' style='background-image: url({$thumbnail_url})'></div>";
                }
                ?>
                <div class="single-categoria">
                    <span class="categoria"><?=  the_category(', ') ?></span>
                </div>
                <div class="meta-data">
                    <div class="calendar">
                        <i class="fa fa-calendar"></i>
                        <?= the_date('j \d\e F \d\e Y') ?>
                    </div>
                    <div class="tag">
                        <i class="fa fa-tag"></i>
                        <?= the_tags() ?>
                    </div>
                </div>
                <div class="titulo-single-post">
                    <?= the_title() ?>
                </div>
                <div class="meta-data">
                    Autor: <?= get_the_author_meta('display_name') ?>
                </div>
                <div class="single-post-content">
                    <?= the_content() ?>
                </div>
    <?php   }
        }?>
    </div>
</section>


<?php
   get_footer();
?>

<?php
get_footer();
?>


