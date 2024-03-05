<?php

/**
 * Package Attrog
 * Author Ir-Tech
 * @since 1.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('libo_Post_Column_Customize')){
	class libo_Post_Column_Customize{
		//$instance variable
		private static $instance;
		
		public function __construct() {
			//service admin add table value hook
			add_filter("manage_edit-service_columns", array($this, "edit_service_columns") );
			add_action('manage_service_posts_custom_column', array($this, 'add_thumbnail_columns'), 10,2);
            //service category icon
            add_filter("manage_edit-service-cat_columns", array($this, "edit_service_cat_columns") );
            add_filter('manage_service-cat_custom_column', array($this, 'add_service_category_columns'), 13, 3);
            //case study admin add table value hook
            add_filter("manage_edit-case-study_columns", array($this, "edit_case_study_columns") );
            add_action('manage_case-study_posts_custom_column', array($this, 'add_case_thumbnail_columns'), 10,2);
            //case study category icon
            add_filter("manage_edit-case-study-cat_columns", array($this, "edit_case_study_cat_columns") );
            add_filter('manage_case-study-cat_custom_column', array($this, 'add_case_study_category_columns'), 13, 3);
            //portfolio admin add table value hook
            add_filter("manage_edit-portfolio_columns", array($this, "edit_portfolio_columns") );
            add_action('manage_portfolio_posts_custom_column', array($this, 'add_portfolio_thumbnail_columns'), 20,4);
            //portfolio category icon
            add_filter("manage_edit-portfolio-cat_columns", array($this, "edit_portfolio_cat_columns") );
            add_filter('manage_portfolio-cat_custom_column', array($this, 'add_portfolio_category_columns'), 23, 4);
		}
		/**
		 * get Instance
		 * @since 1.0.0
		 * */
		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}


		/**
		 * edit service
		 * @since 1.0.0
		 * */
		public function edit_service_columns($columns){

			$order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
			$cat_title = $columns['taxonomy-service-cat'];
			unset($columns);
			$columns['cb'] = '<input type="checkbox" />';
			$columns['title'] = esc_html__('Title','libo-master');
			$columns['thumbnail'] = '<a href="edit.php?post_type=service&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','libo-master').'</a>';
			$columns['taxonomy-service-cat'] = '<a href="edit.php?post_type=service&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
			$columns['icon'] = esc_html__('Icon','libo-master');
			$columns['date'] = esc_html__('Date','libo-master');
			return $columns;
		}

		/**
		 * add thumbnail
		 * @since 1.0.0
		 * */
		public function add_thumbnail_columns($column,$post_id) {
			switch ( $column ) {
				case 'thumbnail' :
					echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
					break;
                case 'icon' :
                    $service_meta_option = get_post_meta($post_id ,'libo_service_options', true);
                    $service_icon = $service_meta_option['service_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($service_icon));
                    break;
				default:
					break;
			}
		}
        /**
         * Service category column customize
         * @since 1.0.0
         * */
        public function edit_service_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','libo-master');
            return $columns;
        }
        /**
         * Service Category column add
         * @since 1.0.0
         * */
        public function add_service_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'libo_service_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * edit case study
         * @since 1.0.0
         * */
        public function edit_case_study_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-case-study-cat'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','libo-master');
            $columns['thumbnail'] = '<a href="edit.php?post_type=case-study&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','libo-master').'</a>';
            $columns['taxonomy-case-study-cat'] = '<a href="edit.php?post_type=case-study&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','libo-master');
            $columns['date'] = esc_html__('Date','libo-master');
            return $columns;
        }

        /**
         * add case thumbnail
         * @since 1.0.0
         * */
        public function add_case_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $case_study_meta_option = get_post_meta($post_id ,'libo_case_study_options', true);
                    $case_study_icon = $case_study_meta_option['case_study_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($case_study_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * case study category column customize
         * @since 1.0.0
         * */
        public function edit_case_study_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','libo-master');
            return $columns;
        }
        /**
         * case study Category column add
         * @since 1.0.0
         * */
        public function add_case_study_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'libo_case_study_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }
        /**
         * edit portfolio
         * @since 1.0.0
         * */
        public function edit_portfolio_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-portfolio-cat'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','libo-master');
            $columns['thumbnail'] = '<a href="edit.php?post_type=portfolio&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','libo-master').'</a>';
            $columns['taxonomy-portfolio-cat'] = '<a href="edit.php?post_type=portfolio&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','libo-master');
            $columns['date'] = esc_html__('Date','libo-master');
            return $columns;
        }
        /**
         * add portfolio thumbnail
         * @since 1.0.0
         * */
        public function add_portfolio_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $portfolio_meta_option = get_post_meta($post_id ,'libo_portfolio_options', true);
                    $portfolio_icon = $portfolio_meta_option['portfolio_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($portfolio_icon));
                    break;
                default:
                    break;
            }
        }
        /**
         * Portfolio category column customize
         * @since 1.0.0
         * */
        public function edit_portfolio_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','libo-master');
            return $columns;
        }
        /**
         * Portfolio Category column add
         * @since 1.0.0
         * */
        public function add_portfolio_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'libo_portfolio_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

	}//end class
	if ( class_exists('libo_Post_Column_Customize')){
		libo_Post_Column_Customize::getInstance();
	}
}