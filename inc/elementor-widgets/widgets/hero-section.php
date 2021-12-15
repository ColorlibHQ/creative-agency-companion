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
 * Creative_Agency elementor hero section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Hero extends Widget_Base {

	public function get_name() {
		return 'creativeagency-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'creativeagency-companion' ),
			]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'We are <span>Design and Development</span> <br>Agency based on California',
            ]
        );
        $this->add_control(
            'anchor_text',
            [
                'label' => esc_html__( 'Anchor Text', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Browse Our Products', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'anchor_url',
            [
                'label' => esc_html__( 'Anchor URL', 'creativeagency-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->add_control(
            'circle_imgs_section_separator',
            [
                'label' => esc_html__( 'Circle Images Section', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'circle_img1',
            [
                'label' => esc_html__( 'Circle Image 1', 'creativeagency-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'circle_img2',
            [
                'label' => esc_html__( 'Circle Image 2', 'creativeagency-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'creativeagency-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .agency_heading .agency_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anchor_txt_col', [
				'label' => __( 'Anchor Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .agency_heading .agency_text .underline_text' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'anchor_border_col', [
				'label' => __( 'Anchor Border Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .agency_heading .agency_text .underline_text:before' => 'background: {{VALUE}};',
				],
			]
        );

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings    = $this->get_settings();  
    $sec_title   = !empty( $settings['sec_title'] ) ? wp_kses_post( nl2br( $settings['sec_title'] )) : ''; 
    $anchor_text = !empty( $settings['anchor_text'] ) ? esc_html( $settings['anchor_text'] ) : ''; 
    $anchor_url  = !empty( $settings['anchor_url']['url'] ) ? esc_url( $settings['anchor_url']['url'] ) : ''; 
    $circle_img1 = !empty( $settings['circle_img1']['id'] ) ? wp_get_attachment_image( $settings['circle_img1']['id'], 'creativeagency_circle_64x64', '', array('alt' => 'circle 1 image' ) ) : '';
    $circle_img2 = !empty( $settings['circle_img2']['id'] ) ? wp_get_attachment_image( $settings['circle_img2']['id'], 'creativeagency_circle_107x107', '', array('alt' => 'circle 2 image' ) ) : ''; 
    ?>

    <!-- agency_heading_start -->
    <div class="agency_heading">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="agency_text">
                        <?php
                            if ( $sec_title ) { 
                                echo '<h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>';
                            }
                            if ( $anchor_text ) { 
                                echo "<a href='{$anchor_url}' target='_blank' class='underline_text'>{$anchor_text}</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated_shape">
            <div class="anim_1">
                <?php
                    if ( $circle_img1 ) { 
                        echo $circle_img1;
                    }
                ?>
            </div>
            <div class="anim_2">
                <?php
                    if ( $circle_img2 ) { 
                        echo $circle_img2;
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- agency_heading_end -->
    <?php

    }
}