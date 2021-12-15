<?php
namespace Creative_Agencyelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Creative_Agency elementor instagram gallery section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Instagram_Gallery extends Widget_Base {

	public function get_name() {
		return 'creative-agency-instagram';
	}

	public function get_title() {
		return __( 'Instagram Gallery', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-instagram-post';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'instagram_section',
            [
                'label' => __( 'Instagram Gallery Settings', 'creativeagency-companion' ),
            ]
        );
        
		$this->add_control(
            'gallery', [
                'label' => __( 'Create New', 'creativeagency-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ img_title }}}',
                'fields' => [
                    [
                        'name' => 'img_title',
                        'label' => __( 'Counter Title', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Amazing Products', 'creativeagency-companion' ),
                    ],
                    [
                        'name' => 'target_url',
                        'label' => __( 'Target URL', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Upload Image', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                ],
                'default'   => [
                    [
                        'img_title'     => __( 'Image 1', 'creativeagency-companion' ),
                    ],
                    [
                        'img_title'     => __( 'Image 2', 'creativeagency-companion' ),
                    ],
                    [
                        'img_title'     => __( 'Image 3', 'creativeagency-companion' ),
                    ],
                    [
                        'img_title'     => __( 'Image 4', 'creativeagency-companion' ),
                    ],
                    [
                        'img_title'     => __( 'Image 5', 'creativeagency-companion' ),
                    ],
                ]
            ]
		);
        $this->add_control(
			'btn_text',
			[
                'label'     => __( 'Big Button Text', 'creativeagency-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Visit Our Work', 'creativeagency-companion' )
			]
        );
        $this->add_control(
			'btn_url',
			[
                'label'     => __( 'Big Button URL', 'creativeagency-companion' ),
                'type'      => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ]
			]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Instagram Gallery Style', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sect_bg', [
                'label'     => __( 'Button Bg Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .Visit_Work' => 'background: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'btn_title', [
                'label'     => __( 'Button Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .Visit_Work a' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $gallery = !empty( $settings['gallery'] ) ? $settings['gallery'] : '';
        $btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
        $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        ?>

        <!-- instragram_area_start -->
        <div class="instragram_area">
            <?php 
            if( is_array( $gallery ) && count( $gallery ) > 0 ) {
                foreach( $gallery as $item ) {
                    $img_title  = ( !empty( $item['img_title'] ) ) ? $item['img_title'] : '';
                    $img        = !empty( $item['img']['id'] ) ? wp_get_attachment_image( $item['img']['id'], 'creativeagency_instagram_thumb_380x400', '', array('alt' => $img_title ) ) : '';
                    $target_url  = ( !empty( $item['target_url']['url'] ) ) ? $item['target_url']['url'] : '';
                    ?>
                    <div class="single_instagram">
                        <?php
                            if ( $img ) { 
                                echo wp_kses_post($img);
                            }
                            if ( $target_url ) { 
                                echo '
                                <div class="ovrelay">
                                    <a href="'.esc_url($target_url).'">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                                ';
                            }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <?php
        if( $btn_text ) {
            ?>
            <div class="Visit_Work text-center">
                <a href="<?php echo esc_url( $btn_url )?>" class="Visit_link"><?php echo esc_html( $btn_text )?></a>
            </div>
            <?php
        }

    }
	
}
