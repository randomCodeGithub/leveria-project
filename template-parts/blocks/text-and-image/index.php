<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<?php if (have_rows('items')) :
    $i = 1;
?>
    <section class="text-and-image text-and-image-multiple">
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
                            <?php if ($image) {
                                pdg_img($image, array(855, 684), array(
                                    'crop' => false,
                                    'class' => array('item-image', 'w-100', $image_height)
                                ));
                            } ?>
                            <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
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
                    <div class="object"></div>
                <?php endif;  ?>
            </div>
        <?php $i++;
        endwhile; ?>
    </section>
<?php endif; ?>