# RSSCloud External Ping for WordPress

RSSCloud External Ping is a lightweight WordPress plugin that
automatically pings an external **rssCloud** server every time your site
publishes or updates a post. This allows real-time feed consumers to
receive update notifications without requiring your WordPress site to
run its own rssCloud server.

The plugin also adds a `<cloud>` element to your RSS2 feed so
rssCloud-aware clients can automatically discover your update endpoint.

## Features

-   Automatically notifies an external rssCloud server on post
    publish/update
-   Adds proper `<cloud>` discovery metadata to your RSS2 feed
-   Uses your site's canonical feed URL automatically --- no
    configuration required
-   Zero overhead: no custom tables, no settings pages, no cron jobs
-   Fully compatible with caching plugins and standard RSS feeds

## Installation

1.  Download or clone this repository.

2.  Copy the file `rsscloud-external-ping.php` into:

        wp-content/mu-plugins/

    (Using **mu-plugins** ensures the plugin always stays active and
    loads early.)

    Alternatively, you may place it in:

        wp-content/plugins/

    and activate it from **Plugins → Installed Plugins**.

3.  No additional configuration is required.

## Optional Configuration

Edit the constants inside the plugin file:

    const RSSCLOUD_DOMAIN = 'rpc.rsscloud.io';
    const RSSCLOUD_PORT   = 5337;
    const RSSCLOUD_PLEASE = '/pleaseNotify';
    const RSSCLOUD_PING   = 'http://rpc.rsscloud.io:5337/ping';

## Support

Open issues on GitHub:
https://github.com/yourusername/rsscloud-external-ping/issues

### Supported

-   Bug reports
-   Compatibility issues
-   Minor improvements

### Not Supported

-   Custom rssCloud server setup
-   General RSS troubleshooting
-   Custom feed structures

## License

MIT License.
