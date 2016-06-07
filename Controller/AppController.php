<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
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

    public $components = array(
        'Session',
        //'Security',
        'RequestHandler',
        'DebugKit.Toolbar' => array(
            'panels' => array(
                'DebugKitPlus.Configure',
                'DebugKitPlus.RequestPlus'
            )
        ),

        'Auth' => array(
            'loginAction' => array(
                'controller' => 'customers',
                'action' => 'login'
            ),
            'loginRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            ),
            'authError' => 'ログインが必要です',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Customer',
                    'fields' => array('username' => 'email'),
                    'scope' => array(
                        'Customer.is_active' => 1,
                    ),
                    'contain' => false,
                )
            ),
            'allowedActions' => array(
                'display'
            )
        ),
        'Paginator' => array(
            'paramType' => 'querystring'
        ),
    );

    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );
    public $uses = array('RegularExpression');
    public function beforeFilter() {

/*
        if (AuthComponent::user('id')) {
            $menuCompany = ClassRegistry::init('Company')->first(AuthComponent::user('company_id'));
            $menuCategories = ClassRegistry::init('Category')->find('list', [
                'conditions' => [
                    'company_id' => AuthComponent::user('company_id')
                ],
                'order' => [
                    'lft' => 'ASC',
                ]
            ]);
            $this->set(compact('menuCompany', 'menuCategories'));
        }
*/

    }



    protected function _email($options = array(), $config = 'default') {
        $default = array(
            'layout' => 'default',
            'template' => 'default',
            'viewVars' => array(),
            'emailFormat' => 'text',
            'subject' => 'お知らせ',
            'bcc' => null,
        );
        $options += $default;

        config('email');
        $email = new CakeEmail($config);
        $email->config($options);

        return $email->send();
    }

    /**
     * admin権限のあるユーザかどうかをチェックする
     * 権限がなければhomeにredirect
     */
    protected function _checkAdmin()
    {
        if (AuthComponent::user('role') !== 'admin') {
            $this->_setFlash('権限がありません。');
            $this->redirect([
                'controller' => 'home',
                'action' => 'index',
            ]);
        }
    }
    protected function _setFlash($message = 'error', $class = 'danger') {
        $this->Session->setFlash(__($message), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-'.$class
        ));
    }

}