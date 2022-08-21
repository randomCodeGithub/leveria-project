<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<section class="text-and-image-single">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <?php if ($image = get_field('image')) : ?>
                    <div class="image-wrapper">
                        <div class="image-inner">
                            <?php
                            pdg_img($image, array(392, 612), array(
                                'crop' => false,
                            )); ?>
                            <div class="overlay"></div>
                            <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <?php
                $text_content = get_field('text_content');
                if ($text_content['quote']) : ?>
                    <div class="quote-block">
                        <?php if ($text_content['title']) : ?>
                            <h3><?php echo $text_content['title'] ?></h3>
                        <?php endif ?>
                        <?php if ($text_content['text']) : ?>
                            <?php echo $text_content['text'] ?>
                        <?php endif ?>
                        <?php if ($text_content['quote_author']) : ?>
                            <span class="author"><?php echo $text_content['quote_author'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="quote"></div>
                    <?php
                    $link = $text_content['link'];
                    if ($link && $link['url'] && $link['title']) : ?>
                        <a class="btn" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                    <?php endif; ?>
                <?php else : ?>
                    <?php while (have_rows('text_content')) : the_row(); ?>
                        <?php while (have_rows('text_blocks')) : the_row();
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                        ?>
                            <div class="text-block">
                                <h3><?php echo $title ?></h3>
                                <p><?php echo $text ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>