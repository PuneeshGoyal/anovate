<?php
/**
 * twconnect library configuration
 */

/*$config = array(
  'consumer_key'       => '99BWtGjD4QqJeSvN1HDzcw',
  'consumer_secret'    => 'ZwCNdx0JODPoV87veVJer5kCsnxnggPBzu0oOqs054',
  'oauth_callback'     => base_url().'home/join_us', // Default callback application path
  'oauth_token' 	   => '1313777684-5WyFbEQVdZ24TyzpxCaA4XjsrRi2ZO6zyADaXrc',	
  'oauth_token_secret' => 'qu1D1Gl2kGknwhjHJfe7ZSL3OJ2C2DX5DV28kkqclXY'
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

/*$config['twitter_consumer_token']	= '99BWtGjD4QqJeSvN1HDzcw';
$config['twitter_consumer_secret']	= 'ZwCNdx0JODPoV87veVJer5kCsnxnggPBzu0oOqs054';
$config['twitter_access_token']	= '1313777684-5WyFbEQVdZ24TyzpxCaA4XjsrRi2ZO6zyADaXrc'; // Optional
$config['twitter_access_secret']	= 'qu1D1Gl2kGknwhjHJfe7ZSL3OJ2C2DX5DV28kkqclXY'; // Optional*/
	/*$config['tweet_consumer_key'] = "99BWtGjD4QqJeSvN1HDzcw";
$config['tweet_consumer_secret'] = "ZwCNdx0JODPoV87veVJer5kCsnxnggPBzu0oOqs054";*/
/* End of file twitter.php */
/* Location: ./application/config/twitter.php */

$config = array(
  'consumer_key' => '99BWtGjD4QqJeSvN1HDzcw',
  'consumer_secret' => 'ZwCNdx0JODPoV87veVJer5kCsnxnggPBzu0oOqs054',
  'oauth_callback' => '/twtest/callback' // Default callback application path
);


?>