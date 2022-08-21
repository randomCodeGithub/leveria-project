<!--
Template Name: Privātuma Politika 
-->
<?php get_header(); ?>
<?php if (!get_field('hide_page_title')) : ?>
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
<?php endif; ?>
<section class="privacy">
    <div class="container">
        <div class="col-12">
            
            <?php the_content() ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>