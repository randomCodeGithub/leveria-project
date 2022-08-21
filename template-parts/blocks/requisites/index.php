<section class="requisites">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="requisites">
                    <?php if ($title = get_field('title')) : ?>
                        <p class="large">
                            <strong><?php echo $title ?></strong>
                        </p>
                    <?php endif; ?>
                    <?php if ($requisites = get_field('requisites')) : ?>
                        <div class="text"><?php echo $requisites ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <img class="leaves" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/lapinas.svg" alt="">
    </div>
</section>