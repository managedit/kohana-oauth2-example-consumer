<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example Consumer
 *
 * @package    OAuth2 Example Provider
 * @category   Controller
 * @author     Managed I.T.
 * @copyright  (c) 2011 Managed I.T.
 */
class Controller_Session extends Controller {
	
	public function action_login()
	{
		if ($this->request->method() == Request::POST)
		{
			$consumer = OAuth2_Consumer::factory('example');

			try
			{
				$token = $consumer->request_token(array(
					'username' => $this->request->post('username'),
					'password' => $this->request->post('password'),
				));

				$this->request->redirect(''); // Redirect to homepage...
			}
			catch (OAuth2_Exception_InvalidGrant $e)
			{
				echo "Invalid password";
			}
		}

		$this->response->body(View::factory('session/login'));
	}

	public function action_me()
	{
		$user = Auth::instance()->get_user();

		$this->response->body(json_encode($user));
	}
}