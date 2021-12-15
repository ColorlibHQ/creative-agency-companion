<?php
namespace Creative_Agencyelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Creative_Agency elementor brands section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Brands extends Widget_Base {

	public function get_name() {
		return 'creativeagency-brands';
	}

	public function get_title() {
		return __( 'Brands', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-favorite';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Brand content ------------------------------
		$this->start_controls_section(
			'brand_content',
			[
				'label' => __( 'Brands content', 'creativeagency-companion' ),
			]
        );
        $this->add_control(
            'brand_inner_settings_seperator',
            [
                'label' => esc_html__( 'Brand Items', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'creativeagencybrands', [
                'label' => __( 'Create New', 'creativeagency-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ brand_title }}}',
                'fields' => [
                    [
                        'name' => 'brand_img',
                        'label' => __( 'Brand Image', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'brand_title',
                        'label' => __( 'Brand Title', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Item 1', 'creativeagency-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Item 1', 'creativeagency-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End brand content

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 

    $settings = $this->get_settings();
    $creativeagencybrands = !empty( $settings['creativeagencybrands'] ) ? $settings['creativeagencybrands'] : '';
    $dynamic_class = is_front_page() ? 'brand_area black_bg' : 'brand_area minus_padding';
    ?>

    <!-- brand_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand_active owl-carousel">
                    <?php 
                    if( is_array( $creativeagencybrands ) && count( $creativeagencybrands ) > 0 ) {
                        foreach( $creativeagencybrands as $brand ) {
                            $brand_title = ( !empty( $brand['brand_title'] ) ) ? esc_html( $brand['brand_title'] ) : '';
                            $brand_img   = !empty( $brand['brand_img']['id'] ) ? wp_get_attachment_image( $brand['brand_img']['id'], 'creativeagency_client_logo_100x70', '', array( 'alt' => $brand_title.' image' ) ) : '';
                            ?>
                            <div class="single_brand">
                                <?php echo $brand_img?>
                            </div>
                            <?php 
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand_area_end-->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // brand_active
            $('.brand_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:2,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:3,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:4,
                    nav:false
                },
                1200:{
                    items:5,
                    nav:false
                },
                1500:{
                    items:6
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}