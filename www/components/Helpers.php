<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.11.2018
 * Time: 21:53
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\VarDumper;

class Helpers extends Component{

	// HealthClass(preferred,standard etc.) -> Health(P,RP etc.)
	static function HealthClass2Health($HealthClass){
		switch($HealthClass){
			case "Preferred Plus";
				return "PP";
				break;

			case "Preferred";
				return "P";
				break;

			case "Standard";
				return "RP";
				break;

			case "Rated";
				return "R";
				break;
		}

	}

	// HealthClass (preferred,standard) -> vamdb RateClass(preferred, standard)
	static function HealthClass2RateClass($HealthClass){
		switch($HealthClass){
			case "Preferred Plus";
				return "Preferred Plus";
				break;
			case "Preferred";
				return "Preferred";
				break;
			case "Standard";
				return "Standard";
				break;
			case "Rated";
				return "Rated";
				break;
		}
	}

	static function rateCalc($ft, $in, $weight, $Health_rate){
		$height = ((12 * $ft) + $in);
		$err    = 1;
		foreach($Health_rate as $key => $rate_info){
			if($height == $key){
				$err     = 0;
				$counter = count($rate_info);
				if($weight < $rate_info[0][1] or $weight >= $rate_info[$counter - 1][2]){
					return "Please enter correct weigth";
					break;
				}else{
					for($i = 0; $i < $counter; $i++){
						if($weight >= $rate_info[$i][1] and $weight < $rate_info[$i][2]){
							return $rate_info[$i][0];
							break;
						}
					}
				}
			}
		}

		if($err == 1){
			return "Please enter correct height";
		}
	}

	public static function get_svg_inline($filename){
		$filename = Yii::getAlias('@app/web/img/'.$filename);
		return file_get_contents($filename);
	}

	public function getImage($params){
		if($params['from_cdn']){
			$params['src'] = ltrim($params['src'], '/');
			$params['src'] = Yii::$app->params['cdnUrl'].DIRECTORY_SEPARATOR.$params['src'];
		}
		if($params['lazyload']){
			$params['data-src'] = $params['src'];
			unset($params['src']);
			if(!isset($params['class'])){
				$params['class'] = '';
			}
			$params['class'] .= ' lazy';
		}

		return '<img '.implode(' ', array_map(function($k, $v){return $k.'="'.$v.'"';}, array_keys($params), array_values($params))).' />';
	}
	
	/**
	 * Separate HTML elements and comments from the text.
	 *
	 * @since 4.2.4
	 *
	 * @param string $input The text which has to be formatted.
	 * @return string[] Array of the formatted text.
	 */
	public static function yii_html_split( $input ) {
		return preg_split( self::get_html_split_regex(), $input, -1, PREG_SPLIT_DELIM_CAPTURE );
	}
	
	/**
	 * Retrieve the regular expression for an HTML element.
	 *
	 * @since 4.4.0
	 *
	 * @return string The regular expression
	 */
	public static function get_html_split_regex() {
		static $regex;
		
		if ( ! isset( $regex ) ) {
			// phpcs:disable Squiz.Strings.ConcatenationSpacing.PaddingFound -- don't remove regex indentation
			$comments =
				'!'             // Start of comment, after the <.
				. '(?:'         // Unroll the loop: Consume everything until --> is found.
				.     '-(?!->)' // Dash not followed by end of comment.
				.     '[^\-]*+' // Consume non-dashes.
				. ')*+'         // Loop possessively.
				. '(?:-->)?';   // End of comment. If not found, match all input.
			
			$cdata =
				'!\[CDATA\['    // Start of comment, after the <.
				. '[^\]]*+'     // Consume non-].
				. '(?:'         // Unroll the loop: Consume everything until ]]> is found.
				.     '](?!]>)' // One ] not followed by end of comment.
				.     '[^\]]*+' // Consume non-].
				. ')*+'         // Loop possessively.
				. '(?:]]>)?';   // End of comment. If not found, match all input.
			
			$escaped =
				'(?='             // Is the element escaped?
				.    '!--'
				. '|'
				.    '!\[CDATA\['
				. ')'
				. '(?(?=!-)'      // If yes, which type?
				.     $comments
				. '|'
				.     $cdata
				. ')';
			
			$regex =
				'/('                // Capture the entire match.
				.     '<'           // Find start of element.
				.     '(?'          // Conditional expression follows.
				.         $escaped  // Find end of escaped element.
				.     '|'           // ...else...
				.         '[^>]*>?' // Find end of normal element.
				.     ')'
				. ')/';
			// phpcs:enable
		}
		
		return $regex;
	}
	
	/**
	 * Retrieve a list of protocols to allow in HTML attributes.
	 *
	 * @since 3.3.0
	 * @since 4.3.0 Added 'webcal' to the protocols array.
	 * @since 4.7.0 Added 'urn' to the protocols array.
	 * @since 5.3.0 Added 'sms' to the protocols array.
	 *
	 * @see wp_kses()
	 * @see esc_url()
	 *
	 * @return string[] Array of allowed protocols. Defaults to an array containing 'http', 'https',
	 *                  'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet',
	 *                  'mms', 'rtsp', 'sms', 'svn', 'tel', 'fax', 'xmpp', 'webcal', and 'urn'.
	 *                  This covers all common link protocols, except for 'javascript' which should not
	 *                  be allowed for untrusted users.
	 */
	public static function yii_allowed_protocols() {
		static $protocols = array();
		
		if ( empty( $protocols ) ) {
			$protocols = array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'mms', 'rtsp', 'sms', 'svn', 'tel', 'fax', 'xmpp', 'webcal', 'urn' );
		}
		
		
		return $protocols;
	}
	
}
