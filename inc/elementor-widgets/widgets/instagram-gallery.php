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
		return [ 'photomedia-elements' ];
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
			'inst_id',
			[
                'label'     => __( 'Instagram id', 'creativeagency-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'hasanfardousrubel', 'creativeagency-companion' )
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
                'label' => __( 'Subscription Style', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .cta_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub Title Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .cta_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'form_styles_separator',
            [
                'label'     => __( 'Form Styles', 'creativeagency-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'input_color', [
                'label'     => __( 'Input Field Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .form-control' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'input_bg_color', [
                'label'     => __( 'Input Field BG Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .form-control' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .subs_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'creativeagency-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .subs_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'creativeagency-companion' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .cta_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

        // call load widget script
        $this->load_widget_script();


        $settings = $this->get_settings();
        $inst_id  = !empty( $settings['inst_id'] ) ? $settings['inst_id'] : '';
        $btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
        $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        $inst_item  = 5;
        ?>

    <!-- instragram_area_start -->
    <div class="instragram_area cp-instagram-photos" data-username="<?php echo esc_attr( $inst_id )?>" data-items="<?php echo esc_attr( $inst_item )?>"></div>
    <!-- instragram_area_end -->

    <?php
    if( $btn_text ) {
        ?>
        <div class="Visit_Work text-center">
            <a href="<?php echo esc_url( $btn_url )?>" class="Visit_link"><?php echo esc_html( $btn_text )?></a>
        </div>
        <?php
    }
    ?>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            function cp_instagram_photos() {
                $('.cp-instagram-photos').each(function(){
                    $.instagramFeed({
                        'username': $(this).data('username'),
                        'container': $(this),
                        'display_profile': false,
                        'display_biography': false,
                        'items': $(this).data('items'),
                        'margin': 0
                    });
                    console.log( $(this) );
                });

            }
            cp_instagram_photos();

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
