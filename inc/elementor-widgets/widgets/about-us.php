<?php
namespace Creative_Agencyelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Creative_Agency elementor about us section widget.
 *
 * @since 1.0
 */
class Creative_Agency_About_Us extends Widget_Base {

	public function get_name() {
		return 'creativeagency-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'section_img',
            [
                'label' => esc_html__( 'Section Image', 'creativeagency-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'right_section_separator',
            [
                'label' => esc_html__( 'Right Section', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'seperator' => 'after',
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'We Help you to Build your Product and Brand For Big or Small', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'About Text', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god. moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness.', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Anchor Text', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Visit Our Profile', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Anchor URL', 'creativeagency-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'sec_col', [
				'label' => __( 'Section Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .build_product .section_title h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'txt_col', [
				'label' => __( 'Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .build_product .product_right p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'anc_txt_col', [
				'label' => __( 'Anchor Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .build_product .product_right .underline_text' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'anc_txt_border_col', [
				'label' => __( 'Anchor Text Border Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .build_product .product_right .underline_text:before' => 'background: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

    }

	protected function render() {
    $settings       = $this->get_settings();    
    $about_img      = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'creativeagency_about_thumb_585x750', '', array( 'alt' => 'about image' ) ) : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $about_text     = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
    $btn_text       = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $dynamic_class  = is_front_page() ? 'about_area' : 'about_area';
    ?>

    <!-- build_product_start -->
    <div class="build_product">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="build_img">
                        <?php 
                            if ( $about_img ) { 
                                echo $about_img;
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-md-6">
                    <div class="product_right">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<div class="section_title">';
                                    echo '<h1>'.$sec_title.'</h1>';
                                echo '</div>';
                            }
                            if ( $about_text ) { 
                                echo '<p>'.wp_kses_post($about_text).'</p>';
                            }
                            if ( $btn_text ) { 
                                echo '<a href="'.esc_url($btn_url).'" class="underline_text">'.esc_html($btn_text).'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- build_product_end -->
    <?php
    }
}