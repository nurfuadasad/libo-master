<?php
/*
 * Theme Taxonomy Options
 * @package Libo
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( class_exists('CSF') ){

	$allowed_html = libo_master()->kses_allowed_html(array('mark'));

	$prefix = 'libo';
	/*-------------------------------------
		Service Category Options
	-------------------------------------*/
	CSF::createTaxonomyOptions( $prefix .'_service_category', array(
		'taxonomy'  => 'service-cat',
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	) );

	// Create a section
	CSF::createSection( $prefix .'_service_category', array(
		'fields' => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','libo'),
				'default' => 'flaticon-businessman'
			),
		)
	) );
    /*-------------------------------------
        Case Study Category Options
    -------------------------------------*/
    CSF::createTaxonomyOptions( $prefix .'_case_study_category', array(
        'taxonomy'  => 'case-study-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_case_study_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','libo'),
                'default' => 'flaticon-statistics'
            ),
        )
    ) );
    /*-------------------------------------
     Portfolio Category Options
  -------------------------------------*/
    CSF::createTaxonomyOptions( $prefix .'_portfolio_category', array(
        'taxonomy'  => 'portfolio-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_portfolio_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','libo'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );


}//endif