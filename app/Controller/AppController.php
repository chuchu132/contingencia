<?php
/**
 * Application level 
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $theme = "Cakestrap";
	public $current_user;
	
	public $components = array( 'RequestHandler', 'Paginator' ,'Session',
			'Auth' => array(
					'authenticate' => array(
							'Form' => array(
									'userModel' => 'User',
									'fields' => array(
											'username' => 'username',
											'password' => 'password',
											'passwordHasher' => array(
													'className' => 'Simple',
													'hashType' => 'sha256'
											)
									)
							)
					),
					'loginRedirect' => array('controller' => 'publications', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
					'loginAction' => array('controller' => 'users', 'action' => 'login'),
					'sessionKey' => 'Auth.User'
			),
				
	);
	
	
	public function beforeFilter() {
		$this->response->disableCache();
		$this->Auth->deny();
		$this->Auth->allow('login','logout');
		$this->Auth->authorize = array('Controller');
		$this->current_user = $this->Auth->user();
		$login_info = "";
		if($this->Auth->loggedIn()) {
  			$login_info = "Has iniciado sesión como " . $this->Auth->user('name');
  		} 
		
		$this->set('login_info', $login_info);
	}
	
	public function isAuthorized($user = null){
		if(!$this->Auth->user('id')){
			return false;
		}else {
			return true;
		}
	
	}
	
	
}
