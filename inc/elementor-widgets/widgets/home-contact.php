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
 * Creative_Agency elementor home contact section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Home_Contact extends Widget_Base {

	public function get_name() {
		return 'creativeagency-home-contact-section';
	}

	public function get_title() {
		return __( 'Home Contact', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Home Contact Section content ------------------------------
        $this->start_controls_section(
            'home_contact_content',
            [
                'label' => __( 'Home Contact Section', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'creativeagency-companion' ),
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
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Contact Us', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Send your message', 'creativeagency-companion' ),
            ]
        );
        
        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__( 'Form Shortcode', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Home Contact Section Styles
        $this->start_controls_section(
            'home_contact_sec_style', [
                'label' => __( 'Home Contact Section Styles', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .section_title .sub_heading' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .section_title h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .messege_area .section_title .seperator' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'btn_border_txt_col', [
				'label' => __( 'Button Border & Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hvr_border_bg_col', [
				'label' => __( 'Button Hover Border & Bg Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hvr_txt_col', [
				'label' => __( 'Button Hover Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn:hover' => 'color: {{VALUE}} !important;;',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $left_img       = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'creativeagency_message_img_585x700', '', array('alt' => 'home contact left image' ) ) : '';
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $form_shortcode = !empty( $settings['form_shortcode'] ) ?  $settings['form_shortcode'] : '';
    ?>
    
    <!-- messege_area_start -->
    <div class="messege_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="messege_thumb">
                        <?php
                            if ( $left_img ) { 
                                echo $left_img;
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-md-6">
                    <div class="section_title mb-20">
                        <?php
                            if ( $sub_title ) { 
                                echo '<span class="sub_heading">'.esc_html( $sub_title ).'</span>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                        <div class="seperator"></div>
                    </div>
                    <div class="messege">
                        <?php echo ($form_shortcode ? do_shortcode( $form_shortcode ) : ''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- messege_area_end -->
    <?php

    }
}
