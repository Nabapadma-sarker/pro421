<?php
/**
 * Electro Products shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( class_exists( 'WC_Shortcode_Products' ) ) {
	/**
	 * Products shortcode class.
	 */
	class Electro_Shortcode_Products extends WC_Shortcode_Products {

		/**
		 * Set sale products query args.
		 *
		 * @since 3.2.0
		 * @param array $query_args Query args.
		 */
		protected function set_sale_products_query_args( &$query_args ) {
			$post_in = array_merge( array( 0 ), wc_get_product_ids_on_sale() );

			if ( ! empty( $query_args['post__in'] ) ) {
				$post_in_default = is_array( $query_args['post__in'] ) ? $query_args['post__in'] : array_map( 'trim', explode( ',', $query_args['post__in'] ) );
				$post_in = array_intersect( $post_in_default, $post_in );
			}

			$query_args['post__in'] = $post_in;
		}

		/**
		 * Get products.
		 *
		 * @since  1.4.7
		 * @return WP_Query
		 */
		public function get_products() {
			return parent::get_products();
		}
	}
}