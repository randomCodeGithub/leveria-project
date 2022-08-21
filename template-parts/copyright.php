<?php if ( ! defined( 'ABSPATH' ) ) exit;
if ( $copyright = get_field( 'copyright', 'option' ) ): ?>
    <p class="copyright text-center"><?php echo str_replace( '[year]', date( 'Y' ), $copyright ); ?></p>
<?php endif; ?>