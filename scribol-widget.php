<?php
/*
Plugin Name: Scribol.com
Description: Scribol.com widget
Version: 0.1
Author: Tomasz Tybulewicz
Author URI: mailto:tomasz.tybulewicz@scribol.com
*/

function scribol_widget( $widget_id, $width, $height ) {
	if ( empty( $widget_id ) || empty( $width ) || empty( $height ) ) {
		return;
	}
	echo <<<END_OF_WIDGET
<center><iframe class="scribol" height="$height" width="$width" id="scribol_$widget_id" scrolling="no" frameborder="0"></iframe>
<script>
var Scribol;
if(typeof Scribol=='undefined'){Scribol={};  Scribol.frames=[];Scribol.site='http://scribol.com/';Scribol.is_preview=false;}
Scribol.frames.push('$widget_id');</script>
<script async="async" defer="defer" src="http://scribol.com/txwidget1.2.js"></script></center>
END_OF_WIDGET;
}

class Scribol_Widget extends WP_Widget {
	
	function Scribol_Widget() {
		$widget_ops = array(
			'classname'   => 'Scribol_Widget',
			'description' => 'Displays a Scribol.com widget'
		);
		
		$this->WP_Widget( 'Scribol_Widget', 'Scribol.com widget', $widget_ops );
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'widget_id' => '',
			'width'     => '',
			'height'    => '',
		));
		
		$widget_id = $instance['widget_id'];
		$width     = $instance['width'];
		$height    = $instance['height'];
		?>
		<p><label for="<?php echo $this->get_field_id('widget_id'); ?>">Widget id: <input class="widefat" id="<?php echo $this->get_field_id('widget_id'); ?>" name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" value="<?php echo esc_attr($widget_id); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('width'); ?>">Widget width: <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Widget height: <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>
		<?php
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['widget_id'] = $new_instance['widget_id'];
		$instance['width']     = $new_instance['width'];
		$instance['height']    = $new_instance['height'];
		return $instance;
	}
	
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		
		$widget_id = (int) $instance['widget_id'];
		$width     = (int) $instance['width'];
		$height    = (int) $instance['height'];
		
		if ( empty( $widget_id ) || empty( $width ) || empty( $height ) ) {
			return;
		}
		
		echo $before_widget;
		scribol_widget( $widget_id, $width, $height );
		echo $after_widget;
	}
	
	public static function register() {
		return register_widget( 'Scribol_Widget' );
	}
	
}

add_action( 'widgets_init', array( 'Scribol_Widget', 'register' ) );


