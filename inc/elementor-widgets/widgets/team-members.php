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
 * Creative_Agency elementor team member section widget.
 *
 * @since 1.0
 */
class Creative_Agency_Team_Members extends Widget_Base {

	public function get_name() {
		return 'creativeagency-team-members';
	}

	public function get_title() {
		return __( 'Team Members', 'creativeagency-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'creativeagency-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_member_content',
			[
				'label' => __( 'Team Member content', 'creativeagency-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Team Members', 'creativeagency-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'creativeagency-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Meet Our Experts', 'creativeagency-companion' )
            ]
        );

        $this->add_control(
            'team_member_inner_settings_seperator',
            [
                'label' => esc_html__( 'Team Member Items', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'team_members', [
                'label' => __( 'Create New', 'creativeagency-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Lallu Mia', 'creativeagency-companion' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Design Expert', 'creativeagency-companion' ),
                    ],
                    [
                        'name' => 'social_info_separator',
                        'label' => __( 'Social Links', 'creativeagency-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook Profile URL', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter Profile URL', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram Profile URL', 'creativeagency-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Lallu Mia', 'creativeagency-companion' ),
                        'member_designation'     => __( 'Design Expert', 'creativeagency-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Kobra King', 'creativeagency-companion' ),
                        'member_designation'     => __( 'Builder Expert', 'creativeagency-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Zamboo Ali', 'creativeagency-companion' ),
                        'member_designation'     => __( '3d Archtect', 'creativeagency-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
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
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Member Styles', 'creativeagency-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'creativeagency-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $team_members = !empty( $settings['team_members'] ) ? $settings['team_members'] : '';
    ?>
    
    <!-- dream_service_start -->
    <div class="team_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-95">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<span class="sub_heading">'.$sub_title.'</span>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $team_members ) && count( $team_members ) > 0 ) {
                    foreach( $team_members as $member ) {
                        $member_img         = !empty( $member['member_img']['url'] ) ? $member['member_img']['url'] : '';
                        $member_name        = ( !empty( $member['member_name'] ) ) ? $member['member_name'] : '';
                        $member_designation = ( !empty( $member['member_designation'] ) ) ? $member['member_designation'] : '';
                        $fb_url             = ( !empty( $member['fb_url']['url'] ) ) ? $member['fb_url']['url'] : '';
                        $tw_url             = ( !empty( $member['tw_url']['url'] ) ) ? $member['tw_url']['url'] : '';
                        $ins_url            = ( !empty( $member['ins_url']['url'] ) ) ? $member['ins_url']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_team text-center">
                                <div class="thumb" <?php echo creativeagency_inline_bg_img( esc_url( $member_img ) ); ?>>
                                    <div class="author_links">
                                        <ul>
                                            <li><a href="<?php echo esc_url( $fb_url )?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php echo esc_url( $tw_url )?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo esc_url( $ins_url )?>"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3><?php echo esc_html( $member_name )?></h3>
                                <p><?php echo esc_html( $member_designation )?></p>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- dream_service_end -->
    <?php
    }
}