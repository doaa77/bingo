<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Components;
?>

<?php do_action( 'octo_before_footer' ); ?>          
<?php do_action( 'octo_footer' ); ?>
<?php do_action( 'octo_after_footer' ); ?>
<?php Components::credits(); ?>
<?php wp_footer(); ?>
</body>
</html>
