<?php
/**
 * Polaris RDS Child Theme functions and definitions
 *
 * @package polarischild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function theme_enqueue_styles() {
    // Determine whether to use minified files.
    $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

    // Define the child theme directories.
    $child_theme_dir = get_stylesheet_directory();
    $child_theme_uri = get_stylesheet_directory_uri();

    // Set file paths.
    $css_file = "/css/child-theme{$suffix}.css";
    $js_file  = "/js/child-theme{$suffix}.js";

    // Enqueue the child theme stylesheet with file modification time as the version.
    wp_enqueue_style('rds-child-styles', $child_theme_uri . $css_file, array( 'rds-parent' ), filemtime( $child_theme_dir . $css_file ));

	// Enqueue Google Fonts
	wp_enqueue_style('rds-child-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Archivo:ital,wght@0,400&display=swap', array(), null);

    // Enqueue jQuery (if not already enqueued).
    wp_enqueue_script( 'jquery' );

    // Enqueue the child theme script with file modification time as the version.
    wp_enqueue_script('rds-child-scripts', $child_theme_uri . $js_file, array(), filemtime( $child_theme_dir . $js_file ));

    // Enqueue comment reply script when needed.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'polaris-rds-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );
/**
 * enqueue rds font awesomw style for showing fontss.
 */

// First check for ryno-rds-icons
$ryno_rds_icons = 'https://cdn.icomoon.io/198172/ryno-rds-icons/style.css?h9gb2q';
if ($ryno_rds_icons) {
	$filepath = true;
	$urlpath = $ryno_rds_icons;
} else {
	// Fallback to local font-awesome files
	$child_theme_path = get_stylesheet_directory() . '/img/font-awesome/style.css';
	$parent_theme_path = get_template_directory() . '/img/font-awesome/style.css';
	
	if (file_exists($child_theme_path)) {
		$filepath = $child_theme_path;
		$urlpath = get_stylesheet_directory_uri() . '/img/font-awesome/style.css';
	} elseif (file_exists($parent_theme_path)) {
		$filepath = $parent_theme_path;
		$urlpath = get_template_directory_uri() . '/img/font-awesome/style.css';
	} else {
		$filepath = false;
	}
}
 if ($filepath) {
	 add_action('wp_enqueue_scripts', 'rds_font_awesome_style');
	 function rds_font_awesome_style() {
		 global $urlpath; // Make $urlpath available inside the function
		 wp_register_style('rds-font-awesome', $urlpath, false);
		 wp_enqueue_style('rds-font-awesome');
	 }
 }

  // Add custom shortcode to override parent theme shortcode

function remove_parent_theme_shortcode() {
    // Remove the existing shortcode
    remove_shortcode("custom_back_to_link");

    // Add a new custom function for the shortcode
    function custom_child_back_to_link_shortcode() {
        $archive_url = get_permalink(get_option("page_for_posts"));

        $link_html = '<a name="Back to Blog" href="' . esc_url($archive_url) . '" class="no_hover_underline d-inline-flex align-items-center back_to_blog link_text_btn">';
        $link_html .= '<i class="align-middle icon-chevron-left2 position-relative"></i>';
        $link_html .= '<span class="d-inline-block align-middle">Back to Blog</span>'; // Modified text to differentiate
        $link_html .= '</a>';

        return $link_html;
    }

    // Register the new shortcode
    add_shortcode("custom_back_to_link", "custom_child_back_to_link_shortcode");
}

// Hook to `init` to ensure the parent shortcode is removed before adding the new one
add_action("init", "remove_parent_theme_shortcode");



//add_action('elementor/element/rds-hero-widget/hero/after_section_end', function($element, $args) {
add_action( 'elementor/element/after_section_end', 'inject_custom_control', 10, 3 );

	function inject_custom_control( $element, $section_id, $args ) {

	if ( 'rds-hero-widget' === $element->get_name() && 'hero' === $section_id ) {

    //if ($element->get_name() === 'rds-hero-widget') {
		
        // Start a new section for your custom control
         $element->start_controls_section(
            'custom_child_section',
            [
                'label' => __('Expert Box', 'your-text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Or TAB_STYLE / TAB_ADVANCED
            ]
        ); 

        $element->add_control('expert_leftlabel', 
            [
                'label' => __('Expert title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('expert_rightlabel', 
            [
                'label' => __('Expert title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
		$element->add_control('expert_icon',
		 	[
		 		'label' => esc_html__( 'Expert Icon', "polaris-rds" ),
		 		'type' => \Elementor\Controls_Manager::MEDIA,
		 		'default' => [
		 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		 		],
		 	]
		 );
		// End the section
        $element->add_control('expert_title', 
            [
                'label' => __('Expert title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('expert_subtitle', 
            [
                'label' => __('Expert Sub title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('expert_footer', 
            [
                'label' => __('Expert Footer', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        

        $element->end_controls_section();

	}
	
	 if ( 'rds-financing-cta-widget' === $element->get_name() && 'rds_financing_cta' === $section_id ) {
		 $element->start_controls_section(
            'custom_child_section',
            [
                'label' => __('CTA Box', 'rds_financing_cta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Or TAB_STYLE / TAB_ADVANCED
            ]
        ); 
		 $element->add_control('cta_title', 
            [
                'label' => __('CTA title', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('cta_content', 
            [
                'label' => __('CTA Content', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                //'default' => __('', 'your-text-domain'),
             ]
        );
		$element->end_controls_section();
	}
	if ('rds-global-financing-widget'=== $element->get_name() && 'rds_global_financing_widget' === $section_id) {
		 $element->start_controls_section(
            'heading_section',
            [
                'label' => __('Box Title', 'rds_financing_cta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Or TAB_STYLE / TAB_ADVANCED
            ]
        ); 
		 $element->add_control('box_title', 
            [
                'label' => __('CTA title', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('box_content', 
            [
                'label' => __('Box Content', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                //'default' => __('', 'your-text-domain'),
             ]
        );
		$element->end_controls_section();
		
		 $element->start_controls_section(
            'custom_child_section',
            [
                'label' => __('CTA Box', 'rds_financing_cta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Or TAB_STYLE / TAB_ADVANCED
            ]
        ); 
		 $element->add_control('cta_title', 
            [
                'label' => __('CTA title', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                //'default' => __('', 'your-text-domain'),
             ]
        );
        $element->add_control('cta_content', 
            [
                'label' => __('CTA Content', 'rds_financing_cta'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                //'default' => __('', 'your-text-domain'),
             ]
        );
		$element->end_controls_section();
	}
	
	if ( 'rds-affiliation-widget' === $element->get_name() && 'affiliation_section' === $section_id ) {
		 $element->start_controls_section(
            'custom_child_section',
            [
                'label' => __('Affiliation Content', 'affiliation_section'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Or TAB_STYLE / TAB_ADVANCED
            ]
        ); 
		 $element->add_control('affiliation_title', 
            [
                'label' => __('Affiliation title', 'affiliation_section'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Guarantees', 'your-text-domain'),
             ]
        );
        $element->add_control('affiliation_content', 
            [
                'label' => __('Affiliation Content', 'affiliation_section'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                //'default' => __('', 'your-text-domain'),
             ]
        );
		$element->end_controls_section();
	}

}

if ( did_action( 'elementor/loaded' ) ) {
    require_once get_stylesheet_directory() . '/inc/elementor-widgets/widget-control-injection.php';
}

function modify_bc_galleries_args( $args, $post_type ) {
    if ( 'bc_galleries' === $post_type ) {
        $args['rewrite']['slug'] = 'gallery';
        $args['rewrite']['with_front'] = false;
        $args['has_archive'] = true;
    }
	if ( 'job' === $post_type ) { // Change 'job' to whatever the plugin's CPT is called
        if ( isset( $args['rewrite'] ) ) {
            $args['rewrite']['with_front'] = false; // removes /blog/ if blog is front base
        }
    }
    return $args;
}
add_filter( 'register_post_type_args', 'modify_bc_galleries_args', 10, 2 );

// Method 1: Simple inline script (recommended for small scripts)
function add_console_log_footer_script() {
    ?>
    <script>
        console.log('Have a great day');
    </script>
    <?php
}
add_action('wp_footer', 'add_console_log_footer_script');