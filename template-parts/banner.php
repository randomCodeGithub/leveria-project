<?php
$from_theme_option = (get_field('from_theme_option'));
if(is_single()) {
    $from_theme_option = (get_field('from_theme_option') ?: true);
}
$banner = ($from_theme_option) ? get_field('banner', 'option') : get_field('banner');

if ($banner) :
    $banner_image = get_field('banner', 'option')['image'];
    $contact_form = get_field('banner', 'option')['contact_form'];
?>
    <section class="banner" style="background-image: url(<?php echo pdg_get_image_src($banner_image, array(1366, 768)); ?>);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php if ($title = $banner['title']) : ?>
                        <h2><?php echo $title ?></h2>
                    <?php endif; ?>
                    <?php if ($text = $banner['text']) : ?>
                        <p><?php echo $text ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 ta--right">
                    <?php if ($contact_form) : ?>
                        <button class="btn"><?php _e('Pieteikt projektu', 'leveria'); ?></button>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="leaves-wrapper">
            <div class="container <?php if ($banner['text']) echo 'ta--right'; ?>">
                <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
            </div>
        </div>
        <?php if ($contact_form) : ?>
            <div id="apply-the-project" class="popup">
                <div class="form-wrapper text-center">
                    <i class="ic ic--close js-close"></i>
                    <h3><?php _e('Pieteikt projektu', 'leveria'); ?></h3>
                    <div data-pdg-cf7>
                        <?php echo do_shortcode($contact_form) ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </section>
<?php endif; ?>