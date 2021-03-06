<?php
/**
 * Widget Social Links
 *
 * @package The_Minimal
 */

// register The_Minimal_Social_Links widget  
function the_minimal_register_social_links_widget() {
    register_widget( 'The_Minimal_Social_Links' );
}
add_action( 'widgets_init', 'the_minimal_register_social_links_widget' );
 
 /**
 * Adds The_Minimal_Social_Links widget.
 */
class The_Minimal_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'the_minimal_social_links', // Base ID
			__( 'RARA: Social Links', 'the-minimal' ), // Name
			array( 'description' => __( 'A Social Links Widget', 'the-minimal' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Social', 'the-minimal' );		
        $facebook   = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $googleplus = ! empty( $instance['google_plus'] ) ? esc_url( $instance['google_plus'] ) : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;
        $vimeo      = ! empty( $instance['vimeo'] ) ? esc_url( $instance['vimeo'] ) : '' ;
        
        if( $facebook || $twitter || $linkedin || $googleplus || $pinterest || $instagram || $youtube || $vimeo ){ 
        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $facebook ){ ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'the-minimal' ); ?>" ><span class="fa fa-facebook"></span></a></li>
				<?php } if( $twitter ){ ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'the-minimal' ); ?>" ><span class="fa fa-twitter"></span></a></li>
				<?php } if( $instagram ){ ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'the-minimal' ); ?>" ><span class="fa fa-instagram"></span></a></li>
                <?php } if( $googleplus ){ ?>
                <li><a href="<?php echo esc_url( $googleplus ); ?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'the-minimal' ); ?>" ><span class="fa fa-google-plus"></span></a></li>
                <?php } if( $pinterest ){ ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'the-minimal' ); ?>" ><span class="fa fa-pinterest-p"></span></a></li>
                <?php } if( $linkedin ){ ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" title="<?php esc_html_e( 'Linkedin', 'the-minimal' ); ?>" ><span class="fa fa-linkedin"></span></a></li>
                <?php } if( $youtube ){ ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'the-minimal' ); ?>" ><span class="fa fa-youtube"></span></a></li>
                <?php } if( $vimeo ){ ?>
                <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank" title="<?php esc_html_e( 'Vimeo', 'the-minimal' ); ?>" ><span class="fa fa-vimeo"></span></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Social', 'the-minimal' );		
        $facebook   = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $googleplus = ! empty( $instance['google_plus'] ) ? esc_url( $instance['google_plus'] ) : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $vimeo      = ! empty( $instance['vimeo'] ) ? esc_url( $instance['vimeo'] ) : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />            
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php esc_html_e( 'Facebook', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $facebook ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php esc_html_e( 'Twitter', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $twitter ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php esc_html_e( 'Instagram', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $instagram ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php esc_html_e( 'Google Plus', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_url( $googleplus ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php esc_html_e( 'Pinterest', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_url( $pinterest ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php esc_html_e( 'LinkedIn', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php esc_html_e( 'YouTube', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $youtube ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php esc_html_e( 'Vimeo', 'the-minimal' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo esc_url( $vimeo ); ?>" />
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'the-minimal' ); ?></small>
		</p>
        <?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
        $instance['title']      = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : __( 'Social', 'the-minimal' );
        $instance['facebook']   = ! empty( $new_instance['facebook'] ) ? esc_url( $new_instance['facebook'] ) : '';
        $instance['twitter']    = ! empty( $new_instance['twitter'] ) ? esc_url( $new_instance['twitter'] ) : '';
        $instance['linkedin']   = ! empty( $new_instance['linkedin'] ) ? esc_url( $new_instance['linkedin'] ) : '';
        $instance['google_plus']= ! empty( $new_instance['google_plus'] ) ? esc_url( $new_instance['google_plus'] ) : '';
        $instance['instagram']  = ! empty( $new_instance['instagram'] ) ? esc_url( $new_instance['instagram'] ) : '';
        $instance['youtube']    = ! empty( $new_instance['youtube'] ) ? esc_url( $new_instance['youtube'] ) : '';
        $instance['pinterest']  = ! empty( $new_instance['pinterest'] ) ? esc_url( $new_instance['pinterest'] ) : '';
        $instance['vimeo']      = ! empty( $new_instance['vimeo'] ) ? esc_url( $new_instance['vimeo'] ) : '';
        
		return $instance;
	}

} // class The_Minimal_Social_Links 