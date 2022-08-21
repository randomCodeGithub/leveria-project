<div class="col-md-6 col-lg-4">
    <a href="<?php the_permalink() ?>" class="w-100 d-inline-block project-item project-image-wrapper">
        <?php if ($image = get_field('featured_image', get_the_ID())) :
            $src   = pdg_get_image_src($image, array(392, 252));
        ?>
            <div class="project-image" style="background-image: url(<?php echo $src ?>);"></div>
        <?php endif ?>
        <div class="overlay"></div>
        <p class="large">
            <?php the_title() ?>
        </p>
    </a>
</div>