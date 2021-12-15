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
 * Creative_Agency elementor video section section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Video_Section extends Widget_Base {

	public function get_name() {
		return 'creativeagency-video-section';
	}

	public function get_title() {
		return __( 'Video Section', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Video Section ------------------------------
        $this->start_controls_section(
            'video_section_content',
            [
                'label' => __( 'Video Section', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'video_thumb',
            [
                'label' => esc_html__( 'Section BG Image', 'creativeagency-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'creativeagency-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=E_-lMZDi7Uw'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End video_section

        //------------------------------ Style title ------------------------------
        
        // Video Section Styles
        $this->start_controls_section(
            'vid_sec_style', [
                'label' => __( 'Video Section Styles', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'cir_bg_col', [
				'label' => __( 'Play Circle Bg Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_area .video_banner a' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $video_thumb    = !empty( $settings['video_thumb']['url'] ) ?  $settings['video_thumb']['url'] : '';
    $video_url      = !empty( $settings['video_url']['url'] ) ?  $settings['video_url']['url'] : '';
    ?>
     
    <!-- video_area_start -->
    <div class="video_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="video_banner" <?php echo creativeagency_inline_bg_img( esc_url( $video_thumb ) ); ?>>
                        <a class="popup-video" href="<?php echo esc_url( $video_url )?>">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video_area_end -->
    <?php

    }
}
