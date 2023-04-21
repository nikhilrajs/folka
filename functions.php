<?php

    add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
	function enqueue_child_theme_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}

	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); return $html;
	}


    // enable menu

	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blogs', 840, 525, array( 'center', 'center' ) );

	function add_file_types_to_uploads($file_types){
		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );
		return $file_types;
		}
		add_filter('upload_mimes', 'add_file_types_to_uploads');

		function wp_reading_time() {

			// GET THE CONTENT OF THE WORDPRESS POST
			$content = get_post_field( 'post_content', get_the_id() );

			// COUNT THE NUMBER OF WORDS
			$word_count = str_word_count( strip_tags( $content ) );

			// COUNT THE NUMBER OF IMAGES
			$image_count = substr_count( $content, '<img' );

			// READING TIME OF TEXTS - 200 WORDS PER MINUTE
			$reading_time = $word_count / 200;

			// READING TIME OF IMAGES - 10 SECONDS PER IMAGE
			$image_time = ( $image_count * 10 ) / 60;

			// ADD READING TIME OF TEXTS AND IMAGES
			$total_time = round( $reading_time + $image_time );

			// DETERMINE IF SINGULAR OR PLURAL
			if ( $total_time == 1 ) { $minute = " min"; }
			else { $minute = " mins"; }

			return $total_time . $minute;

			}



	// widgets
	if ( function_exists('register_sidebar') )

	register_sidebar(array(
		'name' => 'header',
		'id' => 'header',
		'before_widget' => '<div class = "app-l-header__search">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	  )
	);
	register_sidebar(array(
			'name' => 'BookNow',
			'id' => 'BookNow',
			'before_widget' => '<div class = "ch-l-sidebar--widject">',
			'after_widget' => '</div>'
		)
	);

		register_sidebar(array(
			'name' => 'PartneringQuery',
			'id' => 'PartneringQuery',
			'before_widget' => '<div class = "ch-l-sidebar--widject">',
			'after_widget' => '</div>'
		)
	);

	// Our custom post type function
	function create_posttype() {

		register_post_type( 'features',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'How we are doing it' ),
					'singular_name' => __( 'Features' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'features'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-rest-api',
			)
		);

		register_post_type( 'OurPartners',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Our Partners' ),
					'singular_name' => __( 'OurPartners' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'OurPartners'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-rest-api',
			)
		);

		register_post_type( 'folka-products',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'What we deliver' ),
					'singular_name' => __( 'Folka Products' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'folka-products'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-buddicons-groups',
			)
		);

		register_post_type( 'projects',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Projects' ),
					'singular_name' => __( 'Projects' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'projects'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-buddicons-groups',
			)
		);

		register_post_type( 'websites',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Products' ),
					'singular_name' => __( 'Products' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'products'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-buddicons-groups',
				'taxonomies'  => array( 'category' ),
				'supports' => array('title','editor','thumbnail')
			)

		);

		register_post_type( 'team',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Team' ),
					'singular_name' => __( 'Team' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'team'),
				'show_in_rest' => true,
				'menu_icon'  => 'dashicons-buddicons-groups',
			)
		);
	}
	// Hooking up our function to theme setup
	add_action( 'init', 'create_posttype' );



	// Remove p tags from images, scripts, and iframes.
	function remove_some_ptags( $content ) {
		$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
		$content = preg_replace('/<p>\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
		$content = preg_replace('/<p>\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
		return $content;
	}
	add_filter( 'the_content', 'remove_some_ptags' );

	add_filter( 'body_class','halfhalf_body_class' );
	function halfhalf_body_class( $classes ) {
		if (is_single() ) {
			$classes[] = 'app-l-bg--dark';
		}
		if ( is_page_template( 'blog-list.php' ) ) {
			$classes[] = 'app-l-bg--dark';
		}
		if ( is_page_template( 'team.php' ) ) {
			$classes[] = 'app-l-bg--dark';
		}
		if ( is_page_template( 'simple-layout.php' ) ) {
			$classes[] = 'app-l-bg--dark';
		}
		if ( is_search() ) {
			$classes[] = 'app-l-bg--dark';
		}
		if ( is_category() ) {
			$classes[] = 'app-l-bg--dark';
		}
		return $classes;
	}


	// Register header widget area




	wp_enqueue_script('jquery');
	wp_enqueue_script('ajax_blog_scripts', get_template_directory_uri() . '/js/loadmore.js', array(), false, true );
	wp_enqueue_script('ajax_cat_scripts', get_template_directory_uri() . '/js/loadmore-cat.js', array(), false, true );


	wp_localize_script('ajax_blog_scripts', 'postAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_localize_script('ajax_cat_scripts', 'catAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	function bsubash_loadmore_ajax_handler(){
		$type = $_POST['post'];
		$category = isset($_POST['category']) ? $_POST['category']: '';
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
		$args['posts_per_page'] =  $_POST['limit'];
		if($type == 'archive'){
			$args['category_name'] = $category;
		}

		query_posts( $args );
		if( have_posts()) :
			while(have_posts()): the_post(); ?>
				<div class="app-l-blog__list-item" >
					<div class="app-l-blog-item">
						<div class="app-l-blog__img">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail($post->ID) ) {
									$thumb_id = get_post_thumbnail_id();
									$thumb_url = wp_get_attachment_image_src($thumb_id,'post', true);
								?>
									<img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid" />

								<?php } else { ?>
									<img data-src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="img-fluid" />
								<?php } ?>
							</a>
						</div>
						<div class="app-l-blog__data">
							<?php
								$tags = get_tags(array(
									'hide_empty' => false
								));
							?>
							<?php $posttags = get_the_tags(); ?>
							<?php if ( $posttags ) { ?>
								<div class="app-l-blog__tag">
									<?php foreach ($posttags as $tag) { ?>
										<span><?php echo $tag->name ?></span>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="app-l-blog__content">
								<h2>
									<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
								</h2>
								<p>
									<?php echo substr(strip_tags($post->post_content), 0, 200);?>
								</p>
							</div>
							<div class="app-l-blog__user">
								<?php if( get_field('blog_avatar') ): ?>
									<div class="app-l-blog__u-avatar">
										<img data-src="<?php echo the_field('blog_avatar'); ?>" class="img-fluid" alt="<?php echo the_field('author_name'); ?>">
									</div>
								<?php endif; ?>
								<div class="app-l-blog__u-info">
									<?php if( get_field('author_name') ): ?>
										<span class="app-l-blog__u-name"><?php echo the_field('author_name'); ?></span>
									<?php endif; ?>
									<span class="app-l-blog__date"><?php the_time('j F Y') ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata();
			endif;
			die;
		}
		add_action('wp_ajax_loadmore','bsubash_loadmore_ajax_handler');
		add_action('wp_ajax_nopriv_loadmore','bsubash_loadmore_ajax_handler');

		function loadmore_portfolio_posts() {
			$args = json_decode( stripslashes( $_POST['query'] ), true );

			//$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
			// $args['post_status'] = 'publish';
			// $args['post_type'] = 'websites';
			// $count = $_POST["count"];
			// $args['category'] = $_POST["ID"];
    		// $cpt = 1;

			$getcity =  $_POST['id'];

			$args = array ('post_type'=> 'websites', 'paged' => $_POST['page'] + 1, 'cat' => $getcity);

			$portfolio_posts = new WP_Query( $args );

			if( $portfolio_posts->have_posts()) :
				while( $portfolio_posts->have_posts()) : $portfolio_posts->the_post(); ?>

						<div class="app-l-cat__block post-<?php the_ID(); ?>">
							<div class="app-l-cat__hover">
								<div class="app-l-cat__feature-img">
									<a href="<?php the_permalink() ?>">
										<?php if ( has_post_thumbnail($post->ID) ) {
											$thumb_id = get_post_thumbnail_id();
											$thumb_url = wp_get_attachment_image_src($thumb_id,'category', true);
										?>
											<img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid w-100">
										<?php

										} else { ?>

										<img data-src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="img-fluid w-100">

										<?php } ?>
									</a>
								</div>
								<div class="app-l-cat__data">
									<div class="app-l-cat__tp">
									<?php if( get_field('night') ): ?>
									<span class="app-l-cat__sub-text"><?php echo the_field('tagline') ?></span>
									<?php endif; ?>
										<h3 class="h5"><a href="<?php the_permalink() ?>"> <?php echo the_title(); ?></a></h3>
									</div>
									<div class="app-l-cat__bt">
										<div class="app-l-cat__dn">
											<?php if( get_field('day') ): ?>
												<div class="app-l-cat__dns">
													<i class="folka-day"></i>
													<div class="app-l-cat__d-num"><span><?php echo the_field('day') ?></span> days</div>
												</div>
											<?php endif; ?>
											<?php if( get_field('night') ): ?>
												<div class="app-l-cat__dns">
													<i class="folka-night"></i>
													<div class="app-l-cat__d-num"><span><?php echo the_field('night') ?></span> night</div>
												</div>
											<?php endif; ?>
										</div>
										<?php if( get_field('price') ): ?>
											<div class="app-l-cat__price">
												<i class="folka-rupee"></i>
												<span><?php echo the_field('price') ?></span>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<?php echo $catID; ?>
						<?php endwhile; wp_reset_postdata();
					endif;
					die;
		}
		add_action( 'wp_ajax_load_more_posts', 'loadmore_portfolio_posts' );
		add_action( 'wp_ajax_nopriv_load_more_posts', 'loadmore_portfolio_posts' );


	?>
<?php



	// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Input
				if ( ! empty( $options['input_phone'] ) ) {
					$options['input_phone'] = sanitize_text_field( $options['input_phone'] );
				} else {
					unset( $options['input_phone'] ); // Remove from options if empty
				}

				if ( ! empty( $options['input_email'] ) ) {
					$options['input_email'] = sanitize_text_field( $options['input_email'] );
				} else {
					unset( $options['input_email'] ); // Remove from options if empty
				}

				if ( ! empty( $options['input_fb'] ) ) {
					$options['input_fb'] = sanitize_text_field( $options['input_fb'] );
				} else {
					unset( $options['input_fb'] ); // Remove from options if empty
				}

				if ( ! empty( $options['input_insta'] ) ) {
					$options['input_insta'] = sanitize_text_field( $options['input_insta'] );
				} else {
					unset( $options['input_insta'] ); // Remove from options if empty
				}

				if ( ! empty( $options['input_twitter'] ) ) {
					$options['input_twitter'] = sanitize_text_field( $options['input_twitter'] );
				} else {
					unset( $options['input_twitter'] ); // Remove from options if empty
				}

				if ( ! empty( $options['input_linkedIn'] ) ) {
					$options['input_linkedIn'] = sanitize_text_field( $options['input_linkedIn'] );
				} else {
					unset( $options['input_linkedIn'] ); // Remove from options if empty
				}

				// Logo
				if ( ! empty( $options['select_logo'] ) ) {
					$options['select_logo'] = sanitize_text_field( $options['select_logo'] );
				}

				// Meta description
				if ( ! empty( $options['meta_description'] ) ) {
					$options['meta_description'] = sanitize_text_field( $options['meta_description'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">



						<?php // Text input example ?>
						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Phone Number', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_phone' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_phone]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company Email', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_email' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_email]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company Facebook', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_fb' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_fb]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>


						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company Instagram', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_insta' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_insta]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company Twitter', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_twitter' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_twitter]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company LinkedIn', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_linkedIn' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[input_linkedIn]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Company Logo', 'text-domain' ); ?> <span style="font-style:italic; display: block; font-weight: 400;">Please upload SVG files only.</span></th>
							<td>
								<?php $value = self::get_theme_option( 'select_logo' ); ?>
								<input style="width: 100%; max-width: 50%;" type="text" name="theme_options[select_logo]" value="<?php echo esc_attr( $value ); ?>">

							</td>
						</tr>

						<tr valign="middle">
							<th scope="row"><?php esc_html_e( 'Meta Description', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'meta_description' ); ?>
								<textarea style="width: 100%; max-width: 50%; height:80px;" name="theme_options[meta_description]"><?php echo esc_attr( $value ); ?></textarea>
							</td>
						</tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}


//Sitemap


add_action("publish_post", "eg_create_sitemap");
add_action("publish_page", "eg_create_sitemap");
function eg_create_sitemap() {
$postsForSitemap = get_posts(array(
'numberposts' => -1,
'orderby' => 'modified',
'post_type' => array('post','page'),
'order' => 'DESC'
));
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= '<?xml-stylesheet type="text/xsl" href="sitemap-style.xsl"?>';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach($postsForSitemap as $post) {
setup_postdata($post);
$postdate = explode(" ", $post->post_modified);
$sitemap .= '<url>'.
'<loc>'. get_permalink($post->ID) .'</loc>'.
'<priority>1</priority>'.
'<lastmod>'. $postdate[0] .'</lastmod>'.
'<changefreq>daily</changefreq>'.
'</url>';
}
$sitemap .= '</urlset>';
$fp = fopen(ABSPATH . "sitemap.xml", 'w');
fwrite($fp, $sitemap);
fclose($fp);
}


?>