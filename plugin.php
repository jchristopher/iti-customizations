<?php
/*
Plugin Name: ITI Customizations
Plugin URI: http://irontoiron.com/
Description: <strong>DO NOT DEACTIVATE</strong> — Site customizations
Version: 1.0
Author: Jonathan Christopher
Author URI: http://mondaybynoon.com/

Copyright 2015 Jonathan Christopher

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/>.
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// theme behavior
include_once dirname( __FILE__ ) . '/includes/theme.php';

// utilities
include_once dirname( __FILE__ ) . '/includes/images.php';
include_once dirname( __FILE__ ) . '/includes/shortcodes.php';

// integrations
include_once dirname( __FILE__ ) . '/includes/wpseo.php';
