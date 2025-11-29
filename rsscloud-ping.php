<?php

/**
 * Plugin Name: RSSCloud External Ping
 * Plugin URI:  https://github.com/scotthansonde/rsscloud-ping
 * Description: Adds <cloud> to RSS2 and pings an external rssCloud server on post publish/update.
 * Version:     1.0.0
 * Author:      Scott Hanson
 * Author URI:  https://wordland.shanson.de
 * Tested up to: 6.6
 * Requires PHP: 7.2
 * License:     GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

const RSSCLOUD_DOMAIN = 'rpc.rsscloud.io';
const RSSCLOUD_PORT   = 5337;
const RSSCLOUD_PLEASE = '/pleaseNotify';
const RSSCLOUD_PING   = 'https://rpc.rsscloud.io/ping';

// 1) Inject <cloud> element into the RSS2 feed for discovery.
add_action('rss2_head', function () {
	echo sprintf(
		"<cloud domain=\"%s\" port=\"%d\" path=\"%s\" registerProcedure=\"\" protocol=\"http-post\" />\n",
		esc_attr(RSSCLOUD_DOMAIN),
		RSSCLOUD_PORT,
		esc_attr(RSSCLOUD_PLEASE)
	);
});

// 2) Ping the rssCloud server whenever a post is published or updated.
add_action('transition_post_status', function ($new_status, $old_status, $post) {
	// Only ping on publishes and updates to public posts.
	if ($new_status === 'publish') {
		$feed_url = get_feed_link('rss2'); // dynamically get your feed URL
		$response = wp_remote_post(RSSCLOUD_PING, [
			'timeout' => 5,
			'headers' => ['Accept' => 'application/json'],
			'body'    => ['url' => $feed_url],
		]);

		// Optional: log failures
		if (is_wp_error($response) || wp_remote_retrieve_response_code($response) >= 400) {
			error_log('rssCloud ping failed: ' . (is_wp_error($response)
				? $response->get_error_message()
				: wp_remote_retrieve_body($response)));
		}
	}
}, 10, 3);
