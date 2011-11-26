<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example Consumer
 *
 * @package    OAuth2 Example Provider
 * @category   Controller
 * @author     Managed I.T.
 * @copyright  (c) 2011 Managed I.T.
 */
class Controller_Welcome extends Controller {
	
	public function action_index()
	{
		$consumer = OAuth2_Consumer::factory('example');

		$request = Request::factory('http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/users');

		$response = $consumer->execute($request);

		$this->response->body(json_decode($response->body()));
	}

}