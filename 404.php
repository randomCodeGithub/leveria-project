<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>
<section class="c-404 w-100">
    <div class="container text-center">
        <h1 class="c-404__title">404</h1>

        <p class="c-404__sub-title large"><?php _e('Lapa netika atrasta!', 'pandago'); ?></p>

        <p class="c-404__message"><?php _e('Radusies kāda tehniska kļūda, vai arī šī lapa vairs nav pieejama.', 'pandago'); ?></p>

        <div class="c-404__btn-wrap">
            <a class="btn" href="<?php echo esc_url(home_url()); ?>"><?php _e('Uz sākumlapu', 'pandago'); ?></span></a>
        </div>
        <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
    </div>

    <div class="object d-none d-lg-block"></div>
</section>


<?php get_footer(); ?>