<?php
/**
 * Created by PhpStorm.
 * User: bimi
 * Date: 2015/12/11
 * Time: 1:18
 */
App::uses('AppController', 'Controller');

class HomeController extends AppController
{

    public $uses = [
        'Customer'
    ];

    /*
     * ダッシュボード
     */
    public function index()
    {

    }
}
