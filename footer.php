<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package electro
 */
?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'electro_before_footer' ); ?>

	<footer id="colophon" class="site-footer">
			
		<?php
		/**
		 * @hooked electro_footer_widgets - 10
		 * @hooked electro_credit - 20
		 */
		do_action( 'electro_footer' ); ?>

	</footer><!-- #colophon -->

	<?php do_action( 'electro_after_footer' ); ?>

</div><!-- #page -->

<script>

        jQuery(".dropdown:nth-child(2) .dropdown-menu").append("<li><a rel='nofollow' href='http://merkall.com/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Fmerkall.com&amp;_wpnonce=a5c2d37ee0'>Log out</a></li>");

</script>
<?php wp_footer(); ?>

</body>
</html>