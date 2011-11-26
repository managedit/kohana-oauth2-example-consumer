<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example
 *
 * @package    OAuth2 Example Provider
 * @category   Controller
 * @author     Managed I.T.
 * @copyright  (c) 2011 Managed I.T.
 */
class Controller extends Kohana_Controller
{
	/**
	 * This makes use of a proposed Kohana 3.3 feature to wrap the
	 * action method execution in an "execute()" method for easy
	 * DRY try/catch.
	 */
	public function execute($action)
	{
		try
		{
			parent::execute($action);
		}
		catch (OAuth2_Exception_InvalidToken $e)
		{
			$this->request->redirect('session/login');
		}
	}

}