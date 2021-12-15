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
 * Creative_Agency elementor counter section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Counters extends Widget_Base {

	public function get_name() {
		return 'creativeagency-counters';
	}

	public function get_title() {
		return __( 'counters', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-counter-circle';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  counter content ------------------------------
		$this->start_controls_section(
			'counter_content',
			[
				'label' => __( 'counter content', 'creativeagency-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Quick Fact', 'creativeagency-companion' )
            ]
        );

        $this->add_control(
            'counter_inner_settings_seperator',
            [
                'label' => esc_html__( 'counter Items', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'counters', [
                'label' => __( 'Create New', 'creativeagency-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ counter_title }}}',
                'fields' => [
                    [
                        'name' => 'counter_title',
                        'label' => __( 'Counter Title', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Amazing Products', 'creativeagency-companion' ),
                    ],
                    [
                        'name' => 'counter_value',
                        'label' => __( 'Counter Value', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '220', 'creativeagency-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'counter_title'     => __( 'Amazing Products', 'creativeagency-companion' ),
                        'counter_value'     => __( '220', 'creativeagency-companion' ),
                    ],
                    [
                        'counter_title'     => __( 'Happy Clients', 'creativeagency-companion' ),
                        'counter_value'     => __( '7930', 'creativeagency-companion' ),
                    ],
                    [
                        'counter_title'     => __( 'Daily Support', 'creativeagency-companion' ),
                        'counter_value'     => __( '67', 'creativeagency-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'shade_txt_col', [
                'label' => __( 'Shade Text Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .opacity_text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'indivisual_styles_seperator',
            [
                'label' => esc_html__( 'Indivisual Item Styles', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'first_count_val_col', [
                'label' => __( 'First Counter Value Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .single_counter h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_count_val_col', [
                'label' => __( 'Second Counter Value Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .single_counter h3.blue' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'third_count_val_col', [
                'label' => __( 'Third Counter Value Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .single_counter h3.orange' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $counters  = !empty( $settings['counters'] ) ? $settings['counters'] : '';
    $classes  = ['counter', 'counter blue', 'counter orange'];
    ?>
    
    <!-- counter_area_start -->
    <div class="counter_area">
        <?php 
            if ( $sec_title ) { 
                echo '<h3 class="opacity_text d-none d-lg-block">'.esc_html( $sec_title ).'</h3>';
            }
        ?>
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $counters ) && count( $counters ) > 0 ) {
                    $i = 0;
                    foreach( $counters as $member ) {
                        $counter_title = ( !empty( $member['counter_title'] ) ) ? $member['counter_title'] : '';
                        $counter_value = ( !empty( $member['counter_value'] ) ) ? $member['counter_value'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_counter text-center">
                                <?php 
                                    if ( $counter_value ) { 
                                        echo '<h3 class="'.esc_attr($classes[$i]).'">'.esc_html( $counter_value).'</h3>';
                                    }
                                    if ( $counter_title ) { 
                                        echo '<span>'.esc_html( $counter_title ).'</span>';
                                    }
                                    
                                    $i++;
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
    <!-- counter_area_end -->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // counter 
            $('.counter').counterUp({
                delay: 10,
                time: 10000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}