<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>
<?php $top_offset = get_field('top_offset') ?: 'padding-top-normal' ?>
<section class="hero <?php echo $top_offset ?>">
    <?php if ($image = get_field("image")) : ?>
        <picture>
            <?php if ($image['mobile']) : ?>
                <source media="(max-width: 1099.98px)" srcset="<?php echo pdg_get_image_src($image['mobile']) ?>">
            <?php endif ?>
            <?php pdg_img($image['desktop'], array(1366, 768)); ?>
        </picture>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if ($title = get_field('title')) : ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>
                <div class="text-wrapper">
                    <?php if ($text = get_field('text')) : ?>
                        <p><?php echo $text; ?></p>
                    <?php endif; ?>
                    <?php
                    $link = get_field('link');
                    if ($link && $link['url'] && $link['title']) : ?>
                        <a class="btn" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php if ($item_count != 1) : ?>
            <?php if (have_rows('items')) : ?>
                <div class="row items">
                    <?php while (have_rows('items')) : the_row();
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $icon = get_sub_field('icon') ?: 'ic--cetrinieks';
                    ?>
                        <div class="col-lg">
                            <div class="item-block <?php if (get_field('item_text_hide')) echo 'item-text-hidden'; ?>
">
                                <i class="ic <?php echo $icon ?>"></i>
                                <?php if ($title) : ?>
                                    <h4><?php echo $title ?></h4>
                                <?php endif; ?>
                                <?php if ($text) : ?>
                                    <p><?php echo $text ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endif ?>
    </div>
    <?php
    $item_count = get_field('item_count');
    if ($item_count == 1) :
        $item = get_field('item');
        if ($item['title'] || $item['text']) : ?>
            <div class="single-item">
                <i class="ic <?php echo $item['icon'] ?>"></i>
                <div class="single-item__title">
                    <?php echo $item['title'] ?>
                </div>
                <div class="single-item__text">
                    <?php echo $item['text'] ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="overlay-3"></div>
    <div class="overlay-4"></div>
</section>