<?php
/*
Plugin Name: NoFeed
Plugin URI: https://wordpress.org/plugins/nofeed)
Description: Disable the Feeds and Feed-URLs (410) in WordPress
Version: 1.0
Author: readData
Author URI: https://readdata.de
License: GPL2
*/

/*
Copyright (C) [year]  [Your Name]

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace NoFeed;

function wp_disable_feeds() {
	status_header(410);
	exit();
}


function nofeed_init() {
  add_action( 'do_feed', '\NoFeed\wp_disable_feeds', 1 );
  add_action( 'do_feed_rdf', '\NoFeed\wp_disable_feeds', 1 );
  add_action( 'do_feed_rss', '\NoFeed\wp_disable_feeds',  1 );
  add_action( 'do_feed_rss2', '\NoFeed\wp_disable_feeds',  1 );
  add_action( 'do_feed_atom', '\NoFeed\wp_disable_feeds', 1 );
  add_action( 'do_feed_rss2_comments', '\NoFeed\wp_disable_feeds', 1 );
  add_action( 'do_feed_atom_comments', '\NoFeed\wp_disable_feeds', 1 );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'feed_links_extra', 3 );
}

add_action( 'init', '\NoFeed\nofeed_init' );