<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<section class="contacts">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <?php if ($title = get_field('title')) : ?>
                    <h1><?php echo $title ?></h1>
                <?php endif;
                $contacts = get_field("contacts", "option"); ?>
                <p class="large">
                    <strong><?php _e('Mēs atrodamies:', 'leveria'); ?></strong>
                </p>
                <ul class="contacts">
                    <?php if ($contacts['address']) : ?>
                        <li><i class="ic ic--place"></i><?php echo $contacts['address'] ?></li>
                    <?php endif; ?>
                </ul>
                <p class="large">
                    <strong><?php _e('Sazinies ar mums:', 'leveria'); ?></strong>
                </p>
                <ul class="contacts">
                    <?php if ($contacts['phone']) : ?>
                        <li><i class="ic ic--phone"></i>
                            <a href="tel:<?php echo $contacts['phone'] ?>"><?php echo $contacts['phone'] ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($contacts['email']) : ?>
                        <li><i class="ic ic--email"></i>
                            <a href="mailto:<?php echo $contacts['email'] ?>"><?php echo $contacts['email'] ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="map">
                    <?php if ($map_shortcode = get_field('map_shortcode')) {
                        echo $map_shortcode;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>