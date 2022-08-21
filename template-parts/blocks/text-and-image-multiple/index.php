<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<?php if (have_rows('items')) :
    $i = 1;
    $offset_bottom = get_field('offset_bottom') ?: false;
?>
    <section class="text-and-image-multiple <?php if ($offset_bottom) echo 'offset-bottom' ?>">
        <?php while (have_rows('items')) : the_row();
            $image_group = get_sub_field('image_group');
            $image = $image_group['image'];
            $image_height = $image_group['image_height'] ?: 'image-h-normal';
            $text_content = get_sub_field('text_content');
            $tag = $text_content['tag'];
            $title = $text_content['title'];
            $text = $text_content['text'];
            $link = $text_content['link'];
        ?>
            <div class="item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 image-col">
                            <?php if ($image) : ?>
                                <div class="image-wrapper">
                                    <picture>
                                        <source media="(max-width: 1099.98px)" srcset="<?php echo pdg_get_image_src($image, array(360, 380)) ?>">
                                        <?php pdg_img($image, array(555, 900), array(
                                            'crop' => true,
                                            'class' => array('item-image', 'w-100')
                                        ));
                                        ?>
                                    </picture>
                                    <div class="overlay"></div>
                                    <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-wrapper">
                                <?php if ($tag) : ?>
                                    <div class="tag"><?php echo $tag ?></div>
                                <?php endif; ?>
                                <?php if ($title) : ?>
                                    <h3 class="title"><?php echo $title ?></h3>
                                <?php endif; ?>
                                <?php if ($text) : ?>
                                    <div class="text editor"><?php echo $text ?></div>
                                <?php endif; ?>
                                <?php
                                if ($link && $link['url'] && $link['title']) : ?>
                                    <a class="btn" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($i == 1) :  ?>
                    <div class="object d-none d-lg-block"></div>
                <?php endif;  ?>
            </div>
        <?php $i++;
        endwhile; ?>
    </section>
<?php endif; ?>