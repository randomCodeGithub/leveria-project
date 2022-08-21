<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return;
$args = array(
    'post_type'        => 'project',
    'posts_per_page'   => 3,
    'order'   => 'ASC',
);
$projects = new WP_Query($args); ?>

<?php if ($projects->have_posts()) : ?>
    <section class="projects">
        <div class="container">
            <div class="row" data-lm-wrap="projects">
                <?php while ($projects->have_posts()) :
                    $projects->the_post();
                     get_template_part('template-parts/project'); ?>
                <?php endwhile ?>
            </div>
            <div class="text-center">
                <button class="btn js-pdg-load-more" data-lm-id="projects"><?php _e('Skatīt vairāk', 'leveria'); ?></button>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); 
?>

<script>
    var pdg_load_more = {
        'projects': {
            args: '<?php echo json_encode($projects->query_vars); ?>',
            page: <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>,
            max: <?php echo $projects->max_num_pages; ?>,
            lang: '<?php echo ICL_LANGUAGE_CODE; ?>',
            tpl: 'template-parts/project'
        }
    };
</script>