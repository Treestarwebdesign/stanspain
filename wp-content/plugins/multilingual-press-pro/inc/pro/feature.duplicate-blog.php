<?php # -*- coding: utf-8 -*-
add_action( 'inpsyde_mlp_loaded', 'mlp_feature_duplicate_blog' );

/**
 * @param Inpsyde_Property_List_Interface $data
 * @return void
 */
function mlp_feature_duplicate_blog( Inpsyde_Property_List_Interface $data ) {

	global $wpdb;

	$duplicator = new Mlp_Duplicate_Blogs(
		$data->link_table,
		$wpdb,
		new Mlp_Table_Duplicator( $wpdb )
	);
	$duplicator->setup();
}