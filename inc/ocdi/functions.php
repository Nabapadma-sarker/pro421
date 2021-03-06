<?php

function electro_ocdi_import_files() {
    return apply_filters( 'electro_ocdi_files_args', array(
        array(
            'import_file_name'             => 'Electro',
            'categories'                   => array( 'Electronics' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/dummy-data/dummy-data.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/dummy-data/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'assets/dummy-data/redux-options.json',
                    'option_name' => 'electro_options',
                ),
            ),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'assets/images/electro-preview.jpg',
            'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'electro' ),
            'preview_url'                  => 'https://demo2.chethemes.com/electro/',
        ),
    ) );
}

function electro_ocdi_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $topbar_left_menu       = get_term_by( 'name', 'Top Bar Left', 'nav_menu' );
    $topbar_right_menu      = get_term_by( 'name', 'Top Bar Right', 'nav_menu' );
    $primary_menu           = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $navbar_primary_menu    = get_term_by( 'name', 'Navbar Primary', 'nav_menu' );
    $secondary_menu         = get_term_by( 'name', 'Secondary Nav', 'nav_menu' );
    $departments_menu       = get_term_by( 'name', 'Vertical Menu', 'nav_menu' );
    $all_departments_menu   = get_term_by( 'name', 'All Departments Menu', 'nav_menu' );
    $blog_menu              = get_term_by( 'name', 'Blog Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'topbar-left'           => $topbar_left_menu->term_id,
            'topbar-right'          => $topbar_right_menu->term_id,
            'primary-nav'           => $primary_menu->term_id,
            'navbar-primary'        => $navbar_primary_menu->term_id,
            'secondary-nav'         => $secondary_menu->term_id,
            'departments-menu'      => $departments_menu->term_id,
            'all-departments-menu'  => $all_departments_menu->term_id,
            'blog-menu'             => $blog_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home-v1' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
