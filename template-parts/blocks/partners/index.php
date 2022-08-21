<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>
<section class="partners">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($title = get_field('title')) : ?>
                    <h3 class="text-center"><?php echo $title ?></h3>
                <?php endif;
                if ($text = get_field('text')) : ?>
                    <p class="text-center"><?php echo $text ?></p>
                <?php endif; ?>
                <?php if (have_rows('partners', 'option')) : ?>
                    <div>
                        <div class="partners-slider">
                            <?php while (have_rows('partners', 'option')) : the_row();
                                $image = get_sub_field('image');
                                $url = get_sub_field('url');
                            ?>
                                <div class="partners-slide">
                                    <a href="<?php echo $url ?>">
                                        <?php pdg_img($image); ?>
                                    </a>
                                </div>
                            <?php endwhile ?>
                        </div>
                        <div class="slider-controls d-flex align-items-center justify-content-center h-w-100">
                            <button type="button" class="slide-prev ic ic--arrow-left"></button>
                            <div class="custom-slide-dots"></div>
                            <button type="button" class="slide-next ic ic--arrow-right"></button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="object"></div>
</section>