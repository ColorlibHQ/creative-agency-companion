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
 * Creative_Agency elementor project section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Projects extends Widget_Base {

	public function get_name() {
		return 'creativeagency-projects';
	}

	public function get_title() {
		return __( 'Projects', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Project content ------------------------------
		$this->start_controls_section(
			'project_content',
			[
				'label' => __( 'Projects content', 'creativeagency-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Works', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Projects', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'More Products', 'creativeagency-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'creativeagency-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->end_controls_section(); // End project content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_type' => 'style_1'
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .lastest_project .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Project Styles', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'proj_loc_col', [
                'label' => __( 'Project Location Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .sub_heading2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_title_col', [
                'label' => __( 'Project Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_txt_col', [
                'label' => __( 'Project Text Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_line_txt_col', [
                'label' => __( 'Button Border & Text Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

		//------------------------------ Services Item Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_type' => 'style_2'
                ],
			]
		);
		$this->add_control(
			'big_titles_color', [
				'label' => __( 'Big Titles Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project_details .project_details_left .single_details h3, .project_details .projects_details_info .details_info h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'texts_color', [
				'label' => __( 'Text Color', 'creativeagency-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project_details .project_details_left .single_details p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

    }
    

	protected function render() {
    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? esc_html( $settings['sec_title'] ) : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? esc_html( $settings['sub_title'] ) : '';
    $btn_text   = !empty( $settings['btn_text'] ) ? esc_html( $settings['btn_text'] ) : '';
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? esc_url( $settings['btn_url']['url'] ) : '';
    ?>

    <!-- works_area_start -->
    <div class="works_area">
        <?php
            if ( $sub_title ) { 
                echo "<h1 class='opacity_text d-none d-lg-block'>{$sub_title}</h1>";
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title">
                        <?php
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php creativeagency_project_section()?>
            </div>

            <?php
                if ( $btn_text ) {
                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="more_products text-center">
                            <a class="boxed_btn_round" href="<?php echo $btn_url?>"><?php echo $btn_text?></a>
                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
        </div>
    </div>
    <!-- works_area_end -->

    <?php
    }
  
}