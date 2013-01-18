<?php
/**
 * Core functionality for the WCPHX Demo Plugin
 */
class WCPHX_Demo {
	/**
	 * Grab a post from the database at random.
	 *
	 * @uses get_posts()
	 * @uses wp_cache_get()
	 * @uses wp_cache_set()
	 *
	 * @return object
	 */
	public function get_post_of_the_day() {
		// Attempt to fetch the post of the day from a transient.
		$post = get_transient( 'wcphx2013_post_of_the_day' );

		if ( false === $post ) {
			$args = array(
				'numberposts' => 1,      // Select only one post
				'order_by'    => 'rand', // Select the post at random
				'post_type'   => 'post'  // Only request regular posts
			);

			$posts = get_posts( $args );

			// Return the first post in the array
			$post = $posts[0];

			// Store the result in a transient for 24 hours so that we don't keep querying
			set_transient( 'wcphx2013_post_of_the_day', $post, 60 * 60 * 24 );
		}

		return $post;
	}
}
