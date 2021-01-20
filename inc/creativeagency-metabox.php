<?php
function creativeagency_portfolio_metabox( $meta_boxes ) {

	$creativeagency_prefix = '_creativeagency_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Project Addtional Fields', 'creativeagency-companion' ),
		'post_types'=> array( 'project' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $creativeagency_prefix . 'project_client',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Client', 'creativeagency-companion' ),
				'placeholder' => esc_html__( 'Project Client', 'creativeagency-companion' ),
			),
			array(
				'id'    => $creativeagency_prefix . 'project_service',
				'type'  => 'text',
				'name'  => esc_html__( 'Service Type', 'creativeagency-companion' ),
				'placeholder' => esc_html__( 'Service Type', 'creativeagency-companion' ),
			),
			array(
				'id'    => $creativeagency_prefix . 'project_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Date', 'creativeagency-companion' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $creativeagency_prefix . 'project_live_url',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Live URL', 'creativeagency-companion' ),
				'placeholder' => esc_html__( 'Project Live URL', 'creativeagency-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'creativeagency_portfolio_metabox' );