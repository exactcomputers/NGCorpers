<?php

/**
 * MySQL Date Format
 */
function mysql2date( $format, $date, $translate = true ) {
	if ( empty( $date ) ) {
		return false;
	}

	if ( 'G' == $format ) {
		return strtotime( $date . ' +0000' );
	}

	$i = strtotime( $date );

	if ( 'U' == $format ) {
		return $i;
	}

	if ( $translate ) {
		return date_i18n( $format, $i );
	} else {
		return date( $format, $i );
	}
}

/**
 * Get an excerpt
 *
 * @param string $content The content to be transformed
 * @param int    $length  The number of words
 * @param string $more    The text to be displayed at the end, if shortened
 * @return string
 */
function get_excerpt( $content, $length = 40, $more = '...' ) {
	$excerpt = strip_tags( trim( $content ) );
	$words = str_word_count( $excerpt, 2 );
	if ( count( $words ) > $length ) {
		$words = array_slice( $words, 0, $length, true );
		end( $words );
		$position = key( $words ) + strlen( current( $words ) );
		$excerpt = substr( $excerpt, 0, $position ) . $more;
	}
	return $excerpt;
}

/**
 * Count in millions and thousands
 * 
 * @param string $num
 * @return string $count
 */
function numCount( $num ) {
	$len = strlen((string) $num);
	return ( $len == 4 || $len > 6 ) ? $num . "k+" : $num;
}

/**
 * Build an acronym for a user
 *
 * @param string $str
 * @return string $acronym
 */
function get_acronym($str) {
    $words = explode(" ", $str);
    $acronym = "";

    foreach ($words as $word) {
        if (!empty($word)) $acronym .= $word[0];
    }

    return strtolower($acronym);
}

function showLike($arr) {
	$fill = $id = "";

	if ( isset($_SESSION['currentUser']) && isset($arr) ) {
		['_id' => $userId] = $_SESSION['currentUser'] ?? ["_id" => ""];
		["_id" => $id, 'likes' => $likes] = $arr;
	
		foreach ($likes as $like) {
			if ( $like['user'] === $userId ) $fill = "fill";
		}
	}

	return '<svg class="like-btn '.$fill.'" data-pid="'.$id.'"><use xlink:href="#icon-like"></use></svg>';
}

/**
 * Category Select Options
 * 
 * @return array Options
 */
function categoryOption() {
	["categories" => $categories] = httpRequest("category", []);
	return $categories;
}

/**
 * merge arrays
 * @param array $arrays
 * @return array single merged array
 */
function mergeArrays($arrays) {
    $mergedArray = array();
    foreach ($arrays as $subArray) {
        $mergedArray = array_merge($mergedArray, $subArray);
    }
    return array_unique($mergedArray);
}

/**
 * Create slug convert to lower case and trim
 *
 * @param string $str
 * @return string|bool slug|false on empty $str
 */
function create_slug( $str ) {
    // remove space before and after string
    $str = $str ? trim($str) : false;
    // change to lower case and replace space with hyphen
    $slug = str_replace(' ', '-', strtolower($str));
    // replace space in between string to '-' to make slug
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($str));
	// 
    return $slug;
}

/**
 * Generates a unique alphanumeric code of 5 length
 *
 * @param int $length length to generate.
 * @param null $now time.
 * @return string.
 */
function generate_code($length = 5, $now = null) {
	// define possible characters
	$possible = str_shuffle("123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
	// start with a blank word
	$code = "";
	$possiblecodelen = strlen($possible);
	// pick a random character from the possible ones
	$code  .= substr($possible, mt_rand(0, $possiblecodelen-1), $length);
	return $code;
} // end function generate_code($length = 8)

/**
 * Properly strip all HTML tags including script and style
 *
 * This differs from strip_tags() because it removes the contents of
 * the `<script>` and `<style>` tags. E.g. `strip_tags( '<script>something</script>' )`
 * will return 'something'
 * @return string The processed string.
 */
function strip_all_tags($string, $remove_breaks = false) {
	$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
	$string = strip_tags($string);

	if ( $remove_breaks )
		$string = preg_replace('/[\r\n\t ]+/', ' ', $string);

	return trim( $string );
}

/**
 * Sanitizes a string.
 *
 * @param string $string 
 * @return string 
 */
function sanitize_string( $string ) {
	// currency symbols
	$options = array(
		'$' => 'USD', '₦' => 'NGN', '€' => 'EUR', '£'=>'GBP', 'pуб'=>'RUB'
	);
	$string = str_replace(array_keys($options), $options, $string);
	$string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	// 
	return $string;
}

/**
 * Converts a number of special characters into their HTML entities.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * @param string $string The text which is to be encoded.
 * @return string The encoded text with HTML entities.
 */
function specialchars( $string ) {
	if ( 0 === strlen( $string ) ) return '';
	// Don't bother if there are no specialchars - saves some processing
	if ( ! preg_match( '/[&<>"\']/', $string ) ) return $string;
	$string = htmlentities( $string );
	$string = htmlspecialchars( $string );
	// 
	return $string;
}

/**
 * Converts a number of HTML entities into their special characters.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * @param string $string The text which is to be decoded.
 * @return string The decoded text without HTML entities.
 */
function specialchars_decode( $string ) {
	$string = (string) $string;

	if ( 0 === strlen( $string ) ) {
		return '';
	}

	// Don't bother if there are no entities - saves a lot of processing
	if ( strpos( $string, '&' ) === false ) {
		return $string;
	}

	$string = html_entity_decode($string);

	// Replace characters
	return htmlspecialchars_decode($string);
}

/**
 * Navigates through an array and encodes the values to be used in a URL.
 *
 *
 *
 * @param array|string $value The array or string to be encoded.
 * @return array|string $value The encoded array (or string from the callback).
 */
function urlencode_deep($value) {
	$value = is_array($value) ? array_map('urlencode_deep', $value) : urlencode($value);
	return $value;
}

/**
 * Navigates through an array and raw encodes the values to be used in a URL.
 *
 *
 * @param array|string $value The array or string to be encoded.
 * @return array|string $value The encoded array (or string from the callback).
 */
function rawurlencode_deep( $value ) {
	return is_array( $value ) ? array_map( 'rawurlencode_deep', $value ) : rawurlencode( $value );
}

/**
 * Create a web friendly URL slug from a string.
 * 
 * Although supported, transliteration is discouraged because
 *     1) most web browsers support UTF-8 characters in URLs
 *     2) transliteration causes a loss of information
 * @param string $str
 * @param array $options
 * @return string
 */
function createSlug($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	
	// Merge options
	$options = array_merge($defaults, $options);
	
	$char_map = array(

		// Currency symbols
		'$' => 'Dollar', '₦' => 'Naira',

		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
		'ß' => 'ss', 
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
		'ÿ' => 'y',

		// Latin symbols
		'©' => '(c)',

		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',

		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
		'Ž' => 'Z', 
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z', 

		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
		'Ż' => 'Z', 
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',

		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	
	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);
	
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function timeAgo( $date ){
	$timestamp = strtotime( $date );
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60", "60", "24", "30", "12", "10");

	$currentTime = time();
	if( $currentTime >= $timestamp ){
		$diff = time() - $timestamp;
		for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
			$diff = $diff / $length[$i];
		}
		$diff = round($diff);
		return $diff." ".$strTime[$i]."(s) ago ";
	}
}

function toStringTime($dateTime) {
    $currentTime = new DateTime();
    $dateTimeObj = new DateTime($dateTime);

    // Time difference in seconds
    $timeDifference = ($currentTime->getTimestamp()) - ($dateTimeObj->getTimestamp());

    // Convert time difference to seconds, minutes, hours, and days
    $seconds = floor($timeDifference);
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $days = floor($hours / 24);

    switch (true) {
        case $days > 0:
            return "{$days}d";
        case $hours > 0:
            return "{$hours}h";
        case $minutes > 0:
            return "{$minutes}m";
        default:
            return "{$seconds}s";
    }
}

function time_elapsed($datetime, $full = false) {

	// date_default_timezone_set('UTC');

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'yr',
        'm' => 'mth',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ' : 'just now';
}

function get_display_name( $fullname ) 
{
	if ( strpos($fullname, ' ') ) {
		$result = explode(" ", $fullname);
		return $result[0];
	} else {
		return $fullname;
	}
}

/**
 * Get URI method
 * @return string 
 */
function query_uri($string) {
	if (isset($_GET[$string])) return $_GET[$string];
}

/**
 * Parse URL String
 * @return array array of strings
 */
function query_str($string) {
	// echo urlencode($string);
	parse_str(parse_url($string, PHP_URL_QUERY), $params);
	return $params;
}

/**
 * build php file
 * @return string string extension
 */
function buildFile($string) {
    return $string . ".php";
}

/**
 * build path
 * @return string path build
 */
function buildPath($path, $string) {
    return $path . "/" . $string;
}

/**
 * build complete path
 * @return string complete path build
 */
function path($dir, $file) {
	return buildPath($dir, buildFile($file));
}

function loadFile( $dir, $type ) 
{
	$type = preg_replace( '|[^a-z0-9-]+|', '', strtolower($type) );
	return $dir . "/{$type}.php";
}

/**
 * Strip dashes
 * @return string
 */
function stripDashes($string) {
    return str_replace('-', ' ', $string);
}

/**
 * Convert val to Object
 * @return object json object for PHP
 */
function convertToObject( $val ) {
	return json_decode(json_encode($val), false);
}

/**
 * Process and upload Image
 * 
 * @param string $file
 * @param string $dir
 * @return array $results
 */
function uploadImage( $file, $type, $uploadPath ){
	$randomize = md5(rand(0,time()));
	// 
	$image_arr = explode(".", $_FILES[$file]["name"]);
	// extension
	$extension = end($image_arr);
	// Allow certain file formats
	$allowedFileType = array('jpg', 'png', 'jpeg', 'gif');
	// get file extension in lower case
	$imageType = strtolower( pathinfo($_FILES[$file]["name"], PATHINFO_EXTENSION) );
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES[$file]["tmp_name"]);
	// check if its an image
	if(!$check) throw new Exception("Sorry, your upload is not an image.", 1);
	// Check file size if not greater than 500kb
	if ($_FILES[$file]["size"] >= 500000) throw new Exception("Invalid Image Size! Size must be less than 500kb", 1);

	// check file format
	if( !in_array($imageType, $allowedFileType) ) throw new Exception("Invalid Image Format! Only JPG, JPEG, PNG AND GIF pictures are allowed", 1);
	
	// rename uploaded file
	if ( $type === 'avatar' ) {
		$newImage = "avatar-$randomize.$extension";
		// concat dir + filename =  destination
		$destination = $uploadPath . "users/" . $newImage;
	}else {
		$newImage = "$type-$randomize.$extension";
		// concat dir + filename =  destination
		$destination = $uploadPath . $type."s/" . $newImage;
	}
	
	if(	!move_uploaded_file($_FILES[$file]["tmp_name"], $destination) ){
		throw new Exception("Error uploading $type...", 1);
	}

	return $newImage;
}

/**
 * Resize image
 *
 * @param string $image_resource_id
 * @param int $width
 * @param int $height
 * @return string $target_layer
 */
function fn_resize($image_resource_id, $width, $height) {
    $target_width = 37;
    $target_height = 37;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
    return $target_layer;
}

/**
 * Displays errors
 *
 * @param array $result
 * @return string $results
 */
function display_errors( $result = array() ) {

	$results = "";
	$json_encode = "";

	if ( isset($result) && is_array($result) ) {
		$response = json_encode($result);
	}

	if ( !empty($response) ) {

		//$response = json_decode( $json_encode );

		if ( !empty($response->errors) ) {
			$results = '<div class="alert alert-soft-danger" role="alert">'.$response->errors.'</div>';
		}

		if ( !empty($response->success) ) {
			$results = '<div class="alert alert-soft-success" role="alert">'.$response->success.'</div>';
		}

		if ( !empty($response->info) ) {
			$results = '<div class="alert alert-soft-info" role="alert">'.$response->info.'</div>';
		}

		if ( !empty($response->warning) ) {
			$results = '<div class="alert alert-soft-warning" role="alert">'.$response->warning.'</div>';
		}

	}

	print $results;
}

/**
 * Get latitude and longitude
 *
 * @param $address
 * @return string $lat, $long
 */
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

    return $lat.','.$long;
}

/**
 * Redirect 
 * @return void 
 */
function redirect_to( $location ) {
	if ( headers_sent() ) ob_clean();
	header("Location: {$location}");
	exit;
}

/**
 * Redirect If user not logged In
 */
function userLoggedIn() {
	if ( !isset($_SESSION['accessToken']) ) {
		redirect_to('login');
	}	
}

/**
 * Http Request Response
 * @param string $url
 * @param array $data optional
 * @return array $response data
 */
function httpRequest($url, $data = []) {
	// init http request
	$req = new HttpRequest($url, "GET", $data, HEADERS);
	$response = $req->get();		

	if( $req->errno ) return false;

	$result = json_decode($response, true);

	if( $req->info !== 200 ) return false;

	$req->close();	
	// check if status is ok
	if( !isset($result['status']) || $result['status'] !== 'success' ) return false;

	return $result['resultdata'];
}

/**
 * Logout Response
 * Remove all session token {{see: login.php}}
 */
function destroy_all_sessions() {
	global $db, $action;

	if ( empty($action) ){
		$action = $_GET['action'];
	}

	$_SESSION['LAST_ACTIVITY'] = time();

	if ( isset($_SESSION['LAST_ACTIVITY']) && ( time() - $_SESSION['LAST_ACTIVITY'] > 1800 )) {

		$db->query("UPDATE users SET user_ip_address = :user_ip_address WHERE ID = :ID", array('user_ip_address' => '', 'ID' => $_SESSION['user']->ID) );

		# last request was more than 30 mins ago
		unset($_SESSION['user']);
		session_destroy();

	} elseif ( $action == 'logout' && isset($_GET['action'] )) {

		$db->query("UPDATE users SET user_ip_address = :user_ip_address WHERE ID = :ID", array('user_ip_address' => '', 'ID' => $_SESSION['user']->ID) );

        /** Unset all $_SESSION variables **/
        $_SESSION = array();

        /**
         * md5 random key generator
         * @var $random_alpha
         */
        $random_alpha = base64_encode(md5(rand()));

        /** Destroy the session cookie **/
        if (isset($_COOKIE[session_name()])){
            setcookie(session_name(), '', time()-20, '/');
        }

        /** Destroy session **/
        session_destroy();

        header("location: " . get_option('siteurl') . "/home/&$random_alpha&loggedout=true" );
        exit(0);
    }
}