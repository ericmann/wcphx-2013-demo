<?php
/**
 * Widget for displaying the a random post in the sidebar.
 *
 * @extends WP_Widget
 */
class WCPHX_Demo_Widget extends WP_Widget {
	/**
	 * Actual widget process
	 */
	public function __construct() {
		parent::__construct(
			'wcphx_demo',
			__( 'WCPHX Demo Widget', 'wcphx2013_translate' ),
			__( 'Display a post at random in the sidebar.', 'wcphx2013_translate' )
		);
	}

	/**
	 * Generate the widget options form.
	 *
	 * @param array $instance
	 *
	 * @return void
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Some default title', 'wcphx2013_translate' );
		}
		?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
	        <?php _e( 'Title:', 'wcphx2013_translate' ); ?>
        </label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'title' ); ?>"
               name="<?php echo $this->get_field_name( 'title' ); ?>"
               type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
		<?php
	}

	/**
	 * Update the stored widget instance.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array Sanitized values for storage in the database.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Output the widget itself
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		$demo = new WCPHX_Demo();
		$post = $demo->get_post_of_the_day();

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'];
			echo $title;
			echo $args['after_title'];
		}

		echo '<h5>' . apply_filters( 'the_title', $post->post_title ) . '</h5>';
		echo '<div class="post_of_the_day">' . apply_filter( 'get_the_excerpt', apply_filters( 'the_excerpt', $post->post_excerpt ) ) . '</div>';

		echo $args['after_widget'];
	}
}
