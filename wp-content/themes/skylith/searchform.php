<?php
/**
 * The theme searchform
 *
 * @package skylith
 */

?>
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-search-form">
    <input class="form-control required" name="s" placeholder="<?php echo esc_attr__( 'Search...', 'skylith' ); ?>">
    <button><span class="pe-7s-search"></span></button>
</form>
