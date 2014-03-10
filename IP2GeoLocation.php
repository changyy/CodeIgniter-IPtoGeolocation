<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class IP2GeoLocation {
		
	function __construct($params=NULL)
	{
		echo "__construct";
		$base_dir = dirname( __FILE__ ).'/';
		require_once( $base_dir.'MaxMind-DB-Reader-php/src/MaxMind/Db/Reader.php' );
		require_once( $base_dir.'MaxMind-DB-Reader-php/src/MaxMind/Db/Reader/Decoder.php' );
		require_once( $base_dir.'MaxMind-DB-Reader-php/src/MaxMind/Db/Reader/InvalidDatabaseException.php' );
		require_once( $base_dir.'MaxMind-DB-Reader-php/src/MaxMind/Db/Reader/Metadata.php' );
		require_once( $base_dir.'MaxMind-DB-Reader-php/src/MaxMind/Db/Reader/Util.php' );
		if(empty($params))
			$this->reader = new MaxMind\Db\Reader($base_dir.'db/GeoLite2-City.mmdb');
		else
			$this->reader = new MaxMind\Db\Reader($params['db']);
	}
	function __destruct()
	{
		$this->reader->close();
	}
	public function get($target_ip, $raw = NULL){
		$output = array();
		if( preg_match_all( '([^,]+)', $target_ip, $matches ) )
		{
			foreach( $matches[0] as $ip )
			{
				$out = array();
				$info = $this->reader->get($ip);
				if( isset( $info['city']['names']['en'] ) )
					$out['city'] = $info['city']['names']['en'];
				else
					$out['city'] = null;
				if( isset( $info['country']['iso_code'] ) )
				{
					$out['country'] = $info['country']['iso_code'];
					if( isset($info['country']['names']['en']) )
						$out['country_name'] = $info['country']['names']['en'];
				}
				else
				{
					$out['country'] = null;
					$out['country_name'] = null;
				}
				if( isset( $info['location'] ) )
				{
					$out['latitude'] = $info['location']['latitude'];
					$out['longitude'] = $info['location']['longitude'];
				}
				else
				{
					$out['latitude'] = null ;
					$out['longitude'] = null;
				}
				switch($raw)
				{
					case 'array':
						$out['ip'] = $ip;
						array_push( $output, $out );
						break;
					case 'raw':
						$output[$ip] = $info;
						break;
					default:
						$output[$ip] =$out;
				}
			}
		}
		return $output;
	}
}
