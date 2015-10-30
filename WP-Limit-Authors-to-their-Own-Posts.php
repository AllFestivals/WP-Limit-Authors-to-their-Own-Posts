<?php
/**
* Plugin Name: WP Limit Authors to their Own Posts
* Plugin URI: https://github.com/AllFestivals/WP-Limit-Authors-to-their-Own-Posts
* Description: Limit authors to their own posts.
* Version: 1.0.0
* Author: marek
* License: GPL2
*/

function posts_for_current_author($query) {

	global $pagenow;

	if ('edit.php' != $pagenow || !$query->is_admin) {
		return $query;
	}

	if(!current_user_can('edit_others_posts')) {
		global $user_ID;
		$query->set('author', $user_ID);
	}

	return $query;
}

	add_filter('pre_get_posts', 'posts_for_current_author');

