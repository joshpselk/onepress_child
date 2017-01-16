<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//adds options page to site
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function add_process_image() {
	$image = get_field( 'cap_process', 'options' );

	if( !empty( $image ) ) { ?>
		<div class='process_image'>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<div>
	<?php }
}
add_action( 'onepress_before_section_features', 'add_process_image' )
?>