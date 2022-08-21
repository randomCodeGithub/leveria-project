<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return;
?>
<section class="team">
    <?php if (have_rows('members')) : ?>
        <div class="container">
            <div class="row">
                <?php while (have_rows('members')) : the_row();
                    $image = get_sub_field('image');
                    $text_content = get_sub_field('text_content');
                ?>
                    <div class="col-lg-6">
                        <div class="member">
                            <?php if ($image) : ?>
                                <div class="image-wrapper">
                                    <?php
                                    pdg_img($image, array(360, 360), array(
                                        'class' => array('member-photo'),
                                    ));
                                    ?>
                                    <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
                                </div>
                            <?php endif; ?>
                            <?php if ($text_content['name']) : ?>
                                <h4 class="name"><?php echo $text_content['name'] ?></h4>
                            <?php endif ?>
                            <?php if ($text_content['position']) : ?>
                                <p class="position large"><?php echo $text_content['position'] ?></p>
                            <?php endif;
                            if ($contacts = $text_content["contacts"]) : ?>
                                <ul class="d-lg-flex contacts">
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
                            <?php endif; ?>
                            <?php if ($text_content['description']) : ?>
                                <div class="description"><?php echo $text_content['description'] ?></div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="object"></div>
</section>