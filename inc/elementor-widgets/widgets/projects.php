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
		return 'eicon-gallery-grid';
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
            'style_projects_section', [
                'label' => __( 'Style Projects Section', 'creativeagency-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'shade_title_col', [
                'label' => __( 'Shade Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works_area .opacity_text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'project_styles_separator', [
                'label' => __( 'Projects Style', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'border_col', [
                'label' => __( 'Border Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works_area .single_work .work_heading h3::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_btn_col', [
                'label' => __( 'Button Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works_area .single_work .work_thumb .work_hover .work_inner a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_separator', [
                'label' => __( 'Button Style', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'more_btn_col', [
                'label' => __( 'Button Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works_area .more_products .boxed_btn_round' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .works_area .more_products .boxed_btn_round:hover' => 'background: {{VALUE}}; color: #fff !important',
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