<?php
/**
 * Created by PhpStorm.
 * User: bimi
 * Date: 2015/12/17
 * Time: 9:33
 */
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
require APP."vendor/goutte/goutte.phar";
use Goutte\Client;
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ToolsController extends AppController {



    public function index(){

        $client = new Client();
        $crawler = $client->request('GET','http://challonge.com/ggxrdp_peercast_2/module');

      //  $plugin_title = $crawler->filter('div.inner_content')->text();
        $title =  $crawler->filter('title')->text();
        //$lists = $crawler->filter('dd')->each(function($node){return $node->text();});
        $lists = $crawler->filter('div.inner_content')->each(function($node){return $node->text();});



    }
    public function player_1(){
        $this->layout = 'ajax';

    }
    public function player_2(){
        $this->layout = 'ajax';
    }
    public function create(){

    }
}