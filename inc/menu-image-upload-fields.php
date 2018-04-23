<?php






require_once(ABSPATH . 'wp-admin/includes/nav-menu.php');

if ( ! class_exists( 'Menu_Item_Custom_Fields' ) ) :
	class Menu_Item_Custom_Fields {
		public static function load() {
			add_filter( 'wp_edit_nav_menu_walker', array( __CLASS__, '_filter_walker' ), 99 );
		}

		public static function _filter_walker( $walker ) {
			$walker = 'Menu_Item_Custom_Fields_Walker';
			return $walker;
		}
	}
	add_action( 'wp_loaded', array( 'Menu_Item_Custom_Fields', 'load' ), 9 );
endif; 



class Menu_Item_Custom_Fields_Walker extends Walker_Nav_Menu_Edit {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$item_output = '';

		parent::start_el( $item_output, $item, $depth, $args, $id );

		$output .= preg_replace(
			// NOTE: Check this regex from time to time!
			'/(?=<(fieldset|p)[^>]+class="[^"]*field-move)/',
			$this->get_fields( $item, $depth, $args ),
			$item_output
		);
	}

	function get_fields( $item, $depth, $args = array(), $id = 0 ) {
		ob_start();

		do_action( 'wp_nav_menu_item_custom_fields', $item->ID, $item, $depth, $args, $id );

		return ob_get_clean();
	}
}








class Menu_Item_Custom_Fields_Example {

	protected static $fields = array();

	public static function init() {
		add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
		wp_enqueue_script('menu-image-upload-fields', get_stylesheet_directory_uri() . '/js/menu-image-upload-fields.js', array('jquery'));


		self::$fields = array(
			'field-01' => __( 'Custom Field #1', 'hlm-sports' ),
		);
	}


	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

		foreach ( self::$fields as $_key => $label ) {
			$key = sprintf( 'menu-item-%s', $_key );

			// Sanitize
			if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
				// Do some checks here...
				$value = $_POST[ $key ][ $menu_item_db_id ];
			} else {
				$value = null;
			}

			// Update
			if ( ! is_null( $value ) ) {
				update_post_meta( $menu_item_db_id, $key, $value );
			} else {
				delete_post_meta( $menu_item_db_id, $key );
			}
		}
	}




	public static function _fields( $id, $item, $depth, $args ) {	



foreach ( self::$fields as $_key => $label ) :
			$key   = sprintf( 'menu-item-%s', $_key );
			$id    = sprintf( 'edit-%s-%s', $key, $item->ID );
			$name  = sprintf( '%s[%s]', $key, $item->ID );
			$value = get_post_meta( $item->ID, $key, true );

			?>

				<div class="image-part">
					<span>Menu Icon:</span>
					<?php printf(
						'<input type="hidden" id="%1$s" class="widefat image_save %1$s" name="%3$s" value="%4$s" />',
						esc_attr( $id ),
						esc_html( $label ),
						esc_attr( $name ),
						esc_attr( $value )
					) ?>
					<img class="image-preview" src="<?php echo esc_attr( $value );?>" width="40" />
					<input type= "button" class="button add_image_button" name="add_image_button" value="Image" />
				</div>


				<?php 
endforeach;

	}



	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
}
Menu_Item_Custom_Fields_Example::init();









?>