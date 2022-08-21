<?php if (!defined('ABSPATH')) exit; ?>

</div>

<footer class="site-footer">
    <!-- Footer content goes here -->
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <?php if ($footer_logo = get_field('footer_logo', 'option')) : ?>
                    <div class="footer-logo">
                        <?php pdg_img($footer_logo, 'full', array(
                            'class' => array('w-100'),
                            'crop' => false,
                            'svg_mode' => 2
                        )); ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-lg-4">
                <?php $contacts = get_field("contacts", "option");
                if ($contacts) : ?>
                    <ul class="contacts">
                        <?php if ($contacts['address']) : ?>
                            <li><i class="ic ic--place"></i><?php echo $contacts['address'] ?></li>
                        <?php endif; ?>
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
                <?php endif ?>
            </div>
            <div class="col-lg-6">
                <nav class="footer-nav">
                    <?php pdg_nav('footer', 'flex align-items-center justify-content-lg-end'); ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php $privacyPolicyLink = get_privacy_policy_url(); ?>
                    <?php if (!empty($privacyPolicyLink)) : ?>
                        <a class="text-decor-none d-none d-lg-block" href="<?php echo $privacyPolicyLink ?>"><?php _e('Privātuma politika', 'leveria'); ?></a>
                    <?php endif ?>
                </div>
                <div class="col-lg-4">
                    <?php get_template_part('template-parts/copyright'); ?>
                </div>
                <div class="col-lg-4 d-flex justify-content-between d-lg-block">
                    <?php if (!empty($privacyPolicyLink)) : ?>
                        <a class="text-decor-none d-block d-lg-none privacy-link-mobile" href="<?php echo $privacyPolicyLink ?>"><?php _e('Privātuma politika', 'leveria'); ?></a>
                    <?php endif ?>
                    <?php get_template_part('template-parts/developer'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php get_template_part('template-parts/foot'); ?>