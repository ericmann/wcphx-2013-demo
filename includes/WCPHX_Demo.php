<?php
/**
 * Core functionality for the WCPHX Demo Plugin
 */
class WCPHX_Demo {
	/**
	 * Grab a post from the database at random.
	 *
	 * @uses get_posts()
	 *
	 * @return object
	 */
	public function get_post_of_the_day() {
		$args = array(
			'numberposts' => 1,      // Select only one post
			'order_by'    => 'rand', // Select the post at random
			'post_type'   => 'post'  // Only request regular posts
		);

		$posts = get_posts( $args );

		// Return the first post in the array
		return $posts[0];
	}
}
