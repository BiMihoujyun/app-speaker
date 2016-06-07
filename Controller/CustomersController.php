<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');



/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CustomersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Customer','Category');
	function beforeFilter(){
		$this->Auth->allowedActions = array('add','test');
	}
	/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function login() {
		$this->layout = 'login';

		if ($this->layout !== 'mobile') {
			$this->layout = 'login';
		}
		if ($this->request->is('post')) {

			// set scope
			$this->Auth->authenticate['Form']['scope'] = array(
					'Customer.is_active' => 1,
					'Customer.deleted' => 0,
			);

			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'
				));
			}

		}





	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function index()
	{
		//$this->_checkAdmin();
/*
		$users = $this->User->find('all', [
				'conditions' => [
						'User.company_id' => AuthComponent::user('company_id')
				],
				'order' => [
						'User.last_name_kana' => 'ASC',
						'User.first_name_kana' => 'ASC',
						'User.nickname_kana' => 'ASC',
				]
		]);

		$company = $this->Company->first(AuthComponent::user('company_id'));

		$this->set(compact('users', 'company'));
*/
	}
	public function setting(){

	}
	public function request(){

	}

	public function add()
	{
		//$this->_checkAdmin();
		if ($this->request->is('post') || $this->request->is('put')) {

			// convert password
			$passwordHasher = new SimplePasswordHasher();
			$this->request->data('Customer.password', $passwordHasher->hash($this->request->data('Customer.tmp_password')));

			//$this->request->data('Customer.company_id', AuthComponent::user('company_id'));

			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('aaa'), 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
				));
				$this->redirect('index');
			} else {
				$this->Session->setFlash(__('bbb'), 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-warning'
				));
				debug($this->request->data);
				//$this->redirect('login');
			}
		}
	}
	public function add_categories(){

		if ($this->request->isPost() || $this->request->isPut()) {

			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('カテゴリーを保存しました');
			} else {
				$this->Session->setFlash('入力に間違いがあります');
			}

		} else {




		}

		$categoryList = $this->Category->generateTreeList();
		$this->set(compact('categoryList'));
		$results = $this->Category->find('all');
		$results = $this->Category->formatTreeList($results, array(
				'spacer' => '--'
		));
		$allChildren = $this->Category->children(null,true);

		debug($allChildren);
		$this->Category->recover();

	}
}
