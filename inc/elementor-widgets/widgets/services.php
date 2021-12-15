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
 * Creative_Agency elementor service section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Services extends Widget_Base {

	public function get_name() {
		return 'creativeagency-services';
	}

	public function get_title() {
		return __( 'Services', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'creativeagency-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We’re a full-service UX design <br> agency, We build digital products <br> and brands'
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Services', 'creativeagency-companion' )
            ]
        );

        $this->add_control(
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'creativeagencyservices', [
                'label' => __( 'Create New', 'creativeagency-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ service_title }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'service_title',
                        'label' => __( 'Service Title', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'UX Research', 'creativeagency-companion' ),
                    ],
                    [
                        'name' => 'service_text',
                        'label' => __( 'Service Text', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god', 'creativeagency-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'UX Research', 'creativeagency-companion' ),
                        'service_text'   => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god', 'creativeagency-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'UI Design', 'creativeagency-companion' ),
                        'service_text'   => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god', 'creativeagency-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Development', 'creativeagency-companion' ),
                        'service_text'   => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god', 'creativeagency-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? wp_kses_post( nl2br( $settings['sec_title'] ) ) : '';
    $sub_title = !empty( $settings['sub_title'] ) ? esc_html( $settings['sub_title'] ) : '';
    $creativeagencyservices = !empty( $settings['creativeagencyservices'] ) ? $settings['creativeagencyservices'] : '';
    $dynamic_class = is_front_page() ? 'service_area black_bg' : 'service2_area';
    ?>
    
    <!-- "service_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
        <?php 
            if ( $sub_title ) { 
                echo "<h1 class='opacity_text d-none d-lg-block'>{$sub_title}</h1>";
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title white-color">
                        <?php 
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $creativeagencyservices ) && count( $creativeagencyservices ) > 0 ) {
                    foreach( $creativeagencyservices as $service ) {
                        $service_title = ( !empty( $service['service_title'] ) ) ? esc_html( $service['service_title'] ) : '';
                        $service_img   = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'creativeagency_services_icon_90x90', '', array( 'alt' => $service_title.' image' ) ) : '';
                        $service_text  = ( !empty( $service['service_text'] ) ) ? esc_html( $service['service_text'] ) : '';
                        ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single_service text-center">
                                <?php 
                                    if ( $service_img ) { 
                                        echo '<div class="icon">';
                                            echo $service_img;
                                        echo '</div>';
                                    }
                                    if ( $service_title ) { 
                                        echo '<h3>'.$service_title.'</h3>';
                                    }
                                    if ( $service_text ) { 
                                        echo '<p>'.esc_html( $service_text ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- "service_area_end -->
    <?php
    }
}