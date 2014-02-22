<?php
/**
 * @package Frontend
 */

if ( !defined( 'LP_VERSION' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

class LP_Frontend extends LP_Base {

	public function __construct() {
	}

	/* Prints all of the licences for the current post
	 * @param str $sep  The separator between each licence
	 * @param str $glue The separator between the label and the list of licences
	 * @return Nothing
	 */
	static function the_licences( $sep, $glue ) {
		// display the licences, if any
		$licences = get_the_terms( get_the_id(), 'licence' );
		if( $licences ) {
			// collate all the terms
			$number = 0;
			$imploded_licences = '';
			foreach( $licences as $licence ) {
				$imploded_licences .= ( $number ? $glue : '' )
					. LP_Frontend::generate_licence_link( $licence );
				$number++;
			}
			// get label and print
			// Translators: The term 'licencing' in English does not require plural; do as works best for your language
			$label = _n( 'Licencing', 'Licencing', $number, 'licence-picker' );
			echo( "<li><label class=\"meta-label\">$label$sep</label>$imploded_licences</li>\n" );
		}
	}
	
	/* Returns the HTML for a link to the specified licence
	 * @param obj $licence The licence data
	 * @return str         The HTML
	 */
	static function generate_licence_link( $licence ) {
		// obtain long name and URL from description
		// long name is all text until the last space;
		// URL is what comes after the last space
		$space_pos = mb_strrpos( $licence->description, ' ' );
		if( $space_pos === false ) {
			$long_name = '';
			$url = $licence->description;
		}
		else {
			$long_name = mb_substr( $licence->description, 0, $space_pos );
			$url = mb_substr( $licence->description, $space_pos + 1 );
		}
		// compose the link if we have a URL, with title if we have a long name
		// if the licence is about this page, add a rel="license"
		$title = $long_name ? " a title=\"$long_name\"" : '';
		$rel = is_single() ? ' rel="license"' : '';
		$a_open = $url ? "<a$rel$title href=\"$url\">" : '';
		$a_close = $url ? '</a>' : '';
		return $a_open . $licence->name . $a_close;
	}
	
}

global $lp_front;
$lp_front = new LP_Frontend;