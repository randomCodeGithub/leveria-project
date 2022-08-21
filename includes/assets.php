<?php if (!defined('ABSPATH')) exit;

function pdgc_add_assets()
{

    // Main theme assets.
    wp_enqueue_style('pdgc-main', PDGC_ASSETS . '/css/main.css', array(), PDGC_VER);
    wp_enqueue_script('pdgc-main', PDGC_ASSETS . '/main.js', array('jquery'), PDGC_VER, true);

    // Late loaded assets.
    wp_enqueue_style('pdgc-late', PDGC_ASSETS . '/vendor/theme/late.css', array(), PDGC_VER);
    wp_enqueue_script('pdgc-late', PDGC_ASSETS . '/vendor/theme/late.js', array(), PDGC_VER, true);

    if (is_single()) {
        wp_enqueue_script('pdg-flexslider');
        wp_enqueue_style('pdg-flexslider');
        wp_enqueue_script('pdg-fancybox');
        wp_enqueue_style('pdg-fancybox');
        wp_enqueue_style('single-project', PDGC_ASSETS . '/vendor/theme/single-project.css', array(), PDGC_VER);
        wp_enqueue_script('single-project', PDGC_ASSETS . '/vendor/theme/single-project.js', array(), PDGC_VER, true);
    }

    if (is_404()) {
        wp_enqueue_style('additional-404', PDGC_ASSETS . '/vendor/theme/404.css', array(), PDGC_VER);
    }

    if (is_privacy_policy()) {
        wp_enqueue_style('pdgc-privacy', PDGC_ASSETS . '/vendor/theme/privacy.css', array(), PDGC_VER);
    }

    wp_enqueue_script('async-recaptcha', PDGC_ASSETS . '/vendor/theme/async_recaptcha.js', array(), PDGC_VER, true);
}
add_action('wp_enqueue_scripts', 'pdgc_add_assets', 20);

function deregister_cf7_script()
{
    wp_deregister_script('google-recaptcha');
}
add_action('wp_print_scripts', 'deregister_cf7_script', 100);
