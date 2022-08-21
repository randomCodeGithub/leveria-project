<?php get_header(); ?>
<section class="project">
    <div class="container">
        <div class="row">
            <h2 class="d-block d-lg-none"><?php the_title() ?></h2>
            <div class="col-lg-5">
                <h2 class="d-none d-lg-block"><?php the_title() ?></h2>
                <p class="large uppercase info-name">
                    <?php _e('Klients:', 'leveria'); ?>
                </p>
                <?php if ($klient = get_field('klient')) : ?>
                    <p class="large info-value"><?php echo $klient ?></p>
                <?php endif; ?>
                <p class="large uppercase info-name">
                    <?php _e('Darbības joma:', 'leveria'); ?>
                </p>
                <?php if ($scope = get_field('scope')) : ?>
                    <p class="large info-value"><?php echo $scope ?></p>
                <?php endif; ?>
                <p class="large uppercase info-name">
                    <?php _e('Projekta mērķis:', 'leveria'); ?>
                </p>
                <?php if ($project_objective = get_field('project_objective')) : ?>
                    <p class="large info-value"><?php echo $project_objective ?></p>
                <?php endif; ?>
                <p class="large uppercase info-name">
                    <?php _e('Leveria sniegtie pakalpojumi:', 'leveria'); ?>
                </p>
                <?php if ($provided_services = get_field('provided_services')) : ?>
                    <p class="large info-value"><?php echo $provided_services ?></p>
                <?php endif; ?>
                <?php if ($social_networks = get_field('social_networks')) : ?>
                    <ul class="social-networks d-flex">
                        <?php if ($social_networks['faceboook']) : ?>
                            <li>
                                <a href="<?php echo $social_networks['faceboook'] ?>" target="_blank" class="text-decor-none"><i class="ic ic--facebook"></i></a>
                            </li>
                        <?php endif;
                        if ($social_networks['linkedin']) : ?>
                            <li>
                                <a href="<?php echo $social_networks['linkedin'] ?>" target="_blank" class="text-decor-none"><i class="ic ic--linkedIn"></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
                <div class="back-btn">
                    <i class="ic ic--arrow-left"></i>
                    <a href="javascript:history.back()"><?php _e('Visi projekti', 'leveria'); ?></a>
                </div>
            </div>
            <div class="col-lg-7 slider-col">
                <?php
                $featured_image = get_field('featured_image');
                $images = get_field('images');
                if ($images) : ?>
                    <div id="project-slider" class="flexslider project-slider">
                        <ul class="slides">
                            <?php if ($featured_image) : ?>
                                <li data-fancybox="gallery" data-src="<?php echo pdg_get_image_src($featured_image, array(824, 480),) ?>">
                                    <?php pdg_img($featured_image, array(608, 388)); ?>
                                </li>
                            <?php endif ?>
                            <?php foreach ($images as $image) :
                                $src = pdg_get_image_src($image, array(824, 480),);
                            ?>
                                <li data-fancybox="gallery" data-src="<?php echo $src ?>">
                                    <?php pdg_img($image, array(608, 388)); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div id="project-carousel" class="flexslider project-carousel">
                        <ul class="slides">
                            <?php if ($featured_image) : ?>
                                <li>
                                    <?php pdg_img($featured_image, array(150, 95)); ?>
                                </li>
                            <?php endif ?>
                            <?php foreach ($images as $image) : ?>
                                <li>
                                    <?php pdg_img($image, array(150, 95)); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/banner'); ?>
<?php get_footer(); ?>