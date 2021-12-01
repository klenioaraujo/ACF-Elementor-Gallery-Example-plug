<?php
//Galeria 
add_action( 'elementor/dynamic_tags/register_tags', function( $dynamic_tags ) {
    class Custom_Gallery_Tag extends Elementor\Core\DynamicTags\Data_Tag {

      function __construct() {
  
        add_action( 'init', array( $this, 'photos_index' ) );  
        }

        public function get_name() {
            return 'my-custom-gallery';
        }

        public function get_categories() {
            return [ 'gallery' ];
        }

        public function get_group() {
            return [ 'site' ];
        }

        public function get_title() {
            return 'Chiots Galery Show';
        }

        protected function get_value( array $options = []  ) { 
            return photos_chiots(); 
        }

    }

    $dynamic_tags->register_tag( 'Custom_Gallery_Tag' );
} ); 


add_action( 'elementor/dynamic_tags/register_tags', function( $dynamic_tags ) {
    class Custom_Label_Tag extends Elementor\Core\DynamicTags\Data_Tag {

      function __construct() {
  
        add_action( 'init', array( $this, 'photos_index' ) );  
        }

        public function get_name() {
            return 'my-custom-tag';
        }

        public function get_categories() {
            return [ 'text' ];
        }

        public function get_group() {
            return [ 'site' ];
        }

        public function get_title() {
            return 'Custom label';
        }

        protected function get_value( array $options = []  ) {              
            return name_chien();
        }
    }

    $dynamic_tags->register_tag( 'Custom_Label_Tag' );
} ); 



/*

    return [
                'id' => 1,
                'url' => wp_get_attachment_image_src(1, 'full')[0],
            ]; 
        protected function _register_controls() {
            $this->add_control(
                'fields',
                [
                    'label' => __( 'Fields', 'text-domain' ),
                    'type' => 'text',
                ]
            );
        }

        public function render() {
            $fields = $this->get_settings( 'fields' );
            $sum = 0;
            $count = 0;
            $value = 0;

            // Make sure that ACF if installed and activated
            if ( ! function_exists( 'get_field' ) ) {
                echo 0;
                return;
            }

            foreach ( explode( ',', $fields ) as $index => $field_name ) {
                $field = get_field( $field_name );
                if ( (int) $field > 0 ) {
                    $sum += (int) $field;
                    $count++;
                }
            }

            if ( 0 !== $count ) {
                $value = $sum / $count;
            }

            echo $value;
        }
    }
    $dynamic_tags->register_tag( 'Custom_ACF_Avg_Tag' );
} );

*/

