<?php if (!defined('ABSPATH')) exit;

function pdgc_acf_blocks()
{
    pdg_add_acf_block('Hero', true, true);
    pdg_add_acf_block('Partners', true, true, function () {
        wp_enqueue_style('pdg-slick');
        wp_enqueue_script('pdg-slick');
    });
    pdg_add_acf_block('Banner');
    pdg_add_acf_block('Projects', true);
    pdg_add_acf_block('Contacts', true);
    pdg_add_acf_block('Requisites', true);
    pdg_add_acf_block('Team', true);
    pdg_add_acf_block('Text and image', true);
    pdg_add_acf_block('Text and image multiple', true);
    pdg_add_acf_block('Text and image single', true);
}
add_action('acf/init', 'pdgc_acf_blocks');
