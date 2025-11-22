=== RSSCloud External Ping ===
Contributors: scotthansonde
Tags: rss, rsscloud, feed, real-time, ping
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.2
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A lightweight plugin that automatically pings an external rssCloud server on every publish or update, and adds <cloud> discovery metadata to your RSS2 feed.

== Description ==

RSSCloud External Ping lets your WordPress site notify an external **rssCloud** server whenever a post is published or updated. This enables real-time feed update notifications without requiring WordPress to run its own rssCloud server.

The plugin also adds a `<cloud>` element to your standard RSS2 feed so rssCloud-aware applications can automatically locate your notification endpoint.

**Features:**

* Automatically pings an external rssCloud server on publish/update
* Adds `<cloud>` discovery metadata to your RSS2 feed
* Automatically detects your canonical feed URL
* No settings, no database tables, no overhead
* Works with caching plugins and default WordPress feeds

This plugin is intentionally minimal and focused—perfect for users who want rssCloud support without running a server.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory,
   **or** place the PHP file in `/wp-content/mu-plugins/` to load it as a must-use plugin.
2. Activate the plugin through the **Plugins** menu in WordPress (if not using mu-plugins).
3. No configuration is required. The plugin:
   * Injects the `<cloud>` element into your RSS2 feed
   * Determines your feed URL automatically
   * Sends pings to `rpc.rsscloud.io:5337` on new or updated posts

If you want to use a different rssCloud server, you may edit the constants inside the plugin file.

== Frequently Asked Questions ==

= Does this plugin run its own rssCloud server? =
No. It only notifies an external rssCloud server. This keeps the plugin lightweight and avoids server-side complexity.

= Which feed URL does it ping? =
The plugin uses `get_feed_link( 'rss2' )` to automatically determine your canonical RSS2 feed URL.

= Can I use a different rssCloud server? =
Yes. Edit the constants near the top of the plugin’s PHP file to customize the domain, port, or ping endpoint.

= Does this support Atom feeds? =
The plugin currently pings your RSS2 feed. Future versions may allow pinging multiple feed formats.

= Will this slow down publishing? =
No. The outgoing ping is lightweight and uses WordPress’s `wp_remote_post()` with a short timeout.

== Screenshots ==

1. No UI — this plugin works silently in the background.

== Changelog ==

= 1.0.0 =
* Initial release
* Sends rssCloud pings on publish/update
* Adds `<cloud>` metadata to RSS2 feeds
* Automatically discovers feed URL

== Upgrade Notice ==

= 1.0.0 =
Initial release.
