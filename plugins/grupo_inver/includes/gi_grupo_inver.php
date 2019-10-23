<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
/*
 * Add my new menu to the Admin Control Panel
 */
add_action( 'init', 'inmuebles_custom_post_type' );
add_filter( 'post_updated_messages', 'inmuebles_mensajes' );


function inmuebles_custom_post_type() {

        $labels = array(
        'name'               => 'Inmuebles',
        'singular_name'      => 'Inmueble',
        'menu_name'          => 'Inmueble',
        'name_admin_bar'     => 'Inmueble',
        'add_new'            => 'Añadir Inmueble',
        'add_new_item'       => 'Añadir nuevo Inmueble',
        'new_item'           => 'Nuevo Inmueble',
        'edit_item'          => 'Editar Inmueble',
        'view_item'          => 'Ver Inmueble',
        'all_items'          => 'Toros los Inmuebles',
        'search_items'       => 'Buscar Inmuebles',
        'parent_item_colon'  => 'Parent Recipes:',
        'not_found'          => 'No hay inmuebles.',
        'not_found_in_trash' => 'No hay Inmueble en la papelera.'
    );
 
    $args = array( 
        'public'      => true, 
        'labels'      => $labels,
        'rewrite'       => array( 'slug' => 'inmuebles' ),
        'has_archive'   => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-admin-home',
        'taxonomies'        => array( 'post_tag', 'category' ),
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' )
    );
        register_post_type('inmuebles',$args);
}

function inmuebles_mensajes( $messages ) {
    $post = get_post();
 
    $messages['recipe'] = array(
        0  => '',
        1  => 'Inmueble actualizado.',
        2  => 'Custom field updated.',
        3  => 'Custom field deleted.',
        4  => 'Inmueble Actualizado.',
        5  => isset( $_GET['revision'] ) ? sprintf( 'Recipe restored to revision from %s',wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => 'Inmueble publicado.',
        7  => 'Inmueble guardado.',
        8  => 'Inmueble enviado.',
        9  => sprintf(
            'Recipe scheduled for: <strong>%1$s</strong>.',
            date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) )
        ),
        10 => 'Recipe draft updated.'
    );
 
    return $messages;
}




