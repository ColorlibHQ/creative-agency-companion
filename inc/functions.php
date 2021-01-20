<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Creative_Agency Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */

// Section Heading
function creativeagency_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'creativeagency_companion_frontend_scripts', 99 );
function creativeagency_companion_frontend_scripts() {

	wp_enqueue_script( 'creativeagency-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'creativeagency-common-js', plugins_url( '../js/common.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_creativeagency_portfolio_ajax', 'creativeagency_portfolio_ajax' );

add_action( 'wp_ajax_nopriv_creativeagency_portfolio_ajax', 'creativeagency_portfolio_ajax' );
function creativeagency_portfolio_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo creativeagency_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}

	// Update the post/page by your arguments
	function creativeagency_update_the_followed_post_page_status( $title = 'Hello world!', $type = 'post', $status = 'draft', $message = false ){

		// Get the post/page by title
		$target_post_id = get_page_by_title( $title, OBJECT, $type);

		// Post/page arguments
		$target_post = array(
			'ID'    => $target_post_id->ID,
			'post_status'   => $type,
		);

		if ( $message == true ) {
			// Update the post/page
			$update_status = wp_update_post( $target_post, true );
		} else {
			// Update the post/page
			$update_status = wp_update_post( $target_post, false );
		}

		return $update_status;
	}


	
// Project - Custom Post Type
function creativeagency_custom_posts() {	
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'creativeagency-companion' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'creativeagency-companion' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'creativeagency-companion' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'creativeagency-companion' ),
		'add_new'            => _x( 'Add New', 'project', 'creativeagency-companion' ),
		'add_new_item'       => __( 'Add New Project', 'creativeagency-companion' ),
		'new_item'           => __( 'New Project', 'creativeagency-companion' ),
		'edit_item'          => __( 'Edit Project', 'creativeagency-companion' ),
		'view_item'          => __( 'View Project', 'creativeagency-companion' ),
		'all_items'          => __( 'All Projects', 'creativeagency-companion' ),
		'search_items'       => __( 'Search Projects', 'creativeagency-companion' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'creativeagency-companion' ),
		'not_found'          => __( 'No projects found.', 'creativeagency-companion' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'creativeagency-companion' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'creativeagency-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'project', $args );

}
add_action( 'init', 'creativeagency_custom_posts' );



/*=========================================================
    Projects Section
========================================================*/
function creativeagency_project_section( $pNumber = 4 ){ 
	$projects = new WP_Query( array(
		'post_type' => 'project',
		'posts_per_page'=> $pNumber,

	) );
	$i = 0;
	if( $projects->have_posts() ) {
		while ( $projects->have_posts() ) {
			$i++;
			$projects->the_post();			
			$project_img = get_the_post_thumbnail( get_the_id(), 'creativeagency_project_thumb_460x470', '', array( 'alt' => get_the_title() ) );
			$dynamic_class = ($i % 2 != 0) ? 'col-xl-5 col-md-6' : 'col-xl-5 offset-xl-2 col-md-6';
			?>
			<div class="<?php echo esc_attr( $dynamic_class )?>">
				<div class="single_work <?php echo esc_attr('item-'.$i)?>">
					<div class="work_thumb">
						<?php 
							if ( $project_img ) {
								echo $project_img;
							}
						?>
						<div class="work_hover">
							<div class="work_inner">
								<a href="<?php the_permalink()?>"><?php _e('View Details', 'creativeagency-companion')?></a>
							</div>
						</div>
					</div>
					<div class="work_heading">
						<h3><?php the_title()?></h3>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

// Recent Project for Single Page
function creativeagency_recent_project(){

	$sec_title    = !empty( creativeagency_opt( 'creativeagency_project_related_projects_sec_title' ) ) ? creativeagency_opt( 'creativeagency_project_related_projects_sec_title' ) : '';
	$pnumber      = !empty( creativeagency_opt( 'creativeagency_project_related_projects_item' ) ) ? creativeagency_opt( 'creativeagency_project_related_projects_item' ) : '';


	$recentProject = new WP_Query( array(
        'post_type' => 'project',
        'posts_per_page'    => $pnumber,

    ) );

	?>
	<!-- related project part start -->
    <section class="related_project padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <h2><?php echo esc_html( $sec_title )?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
				<?php
				if( $recentProject->have_posts() ){
					while ( $recentProject->have_posts() ){
						$recentProject->the_post(); 
						$project_img_id  = creativeagency_meta( 'project_img');
						$project_img_url = wp_get_attachment_image_src( $project_img_id, 'creativeagency_project_img_360x378' );
						?>
						<div class="col-lg-4 col-sm-6 mb-5">
							<div class="single_project_details">
								<a href="<?php echo $project_img_url[0]?>" class="grid-item img_gallery">
									<img src="<?php echo $project_img_url[0]?>" alt="<?php echo the_title()?>">
									<div class="project_hover_text">
										<i class="ti-plus"></i>
									</div>
								</a>
							</div>
						</div>
						<?php
					}
				}?>
			</div>
		</div>
	</section>
<?php
}