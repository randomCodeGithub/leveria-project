<?php if (!defined('ABSPATH')) exit; ?>

<?php get_template_part('template-parts/head'); ?>

<header class="site-header">
    <div class="container">
        <div class="flex justify-content-between align-items-center">
            <?php if ($header_logo = get_field('header_logo', 'option')) : ?>
                <a href="<?php echo home_url() ?>" class="header-logo">
                    <?php
                    if ($header_logo['default']) {
                        pdg_img($header_logo['default'], 'full', array(
                            'class' => array('w-100 default'),
                            'crop' => false,
                            'svg_mode' => 2
                        ));
                    }
                    if ($header_logo['smaller']) {
                        pdg_img($header_logo['smaller'], 'full', array(
                            'class' => array('w-100 smaller'),
                            'crop' => false,
                            'svg_mode' => 2
                        ));
                    }
                    ?>
                </a>
            <?php endif ?>

            <div class="nav-main-wrap flex align-items-center">
                <div class="nav-main-inner flex align-items-center">
                    <nav class="nav-main responsive-menu">
                        <?php pdg_nav('header', 'flex align-items-center'); ?>
                    </nav>
                    <?php pdg_language_switcher('dropdown'); ?>
                    <div class="menu-btn d-lg-none js-menu">
                        <span class="toggler"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="site-content">