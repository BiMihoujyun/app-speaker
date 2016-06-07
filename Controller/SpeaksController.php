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
class SpeaksController extends AppController {



    public function index(){

        //セレクト配列
        $volume_array = array();
        for($i = 50 ; $i <= 200; $i++ ){
            $volume_array[$i] = $i.'%';
        }
        $this->set('volume_array',$volume_array);
        for($i = 1 ; $i <= 1000; $i++ ){
            $thread_number[$i] = $i;
        }
        $this->set('thread_number',$thread_number);
        $speaker_array = ['show'=>'show','haruka'=>'haruka','hikari'=>'hikari','takeru'=>'takeru','santa'=>'santa','bear'=>'bear'];
        $this->set('speaker_array',$speaker_array);
        $emotion_array = ['happiness'=>'happiness','anger'=>'anger','sadness'=>'sadness',''=>'not effect'];
        $this->set('emotion_array',$emotion_array);
        $emotion_level = [1=>'1',2=>'2',3=>'3',4=>'4'];
        $this->set('emotion_level',$emotion_level);
    }
    public function create(){


    }
    public function getThread(){
        Configure::write('debug', 0);

        $this->layout = 'ajax';
        $this->autoRender = false;
        $client = new Client();
        $url = $this->request->data['url'];

        $crawler = $client->request('GET',$url);
        // Get DOM Objects
        $plugin_title = $crawler->filter('h1');
        $title =  $crawler->filter('h1')->text();
        $lists = $crawler->filter('dd')->each(function($node){return $node->text();});
        //$lists = $crawler->filter('dl dt')->text();
        //debug($lists);
        return json_encode(compact('title', 'lists'));


    }
    public function getThreadLastNumber(){
        Configure::write('debug', 0);

        $this->layout = 'ajax';
        $this->autoRender = false;
        $client = new Client();
        //$url = $this->request->data['url'];
        $url = 'http://jbbs.shitaraba.net/bbs/read.cgi/netgame/323/1423217194/';
        $crawler = $client->request('GET',$url);
        // Get DOM Objects
        $plugin_title = $crawler->filter('h1');
        $title =  $crawler->filter('h1')->text();
        $lists = $crawler->filter('dd')->each(function($node){return $node->text();});
        //$lists = $crawler->filter('dl dt')->text();
        return json_encode(array('threadnumber'=>count($lists)));
    }
    public function getSpeaksJson()
    {
        Configure::write('debug', 0);

        $this->layout = 'ajax';
        $this->autoRender = false;
        $client = new Client();
        if(!empty($this->request->data['thread_number'])) {
            $res_num = $this->request->data['thread_number'];
            $thread_value_name = $res_num - 1;
        }else{
            $res_num =1;
            $thread_value_name = 0;
        }
        if(!empty($this->request->data['speaker'])) {
            $speaker = $this->request->data['speaker'];
        }else{
            $speaker = 'haruka';
        }
        if(!empty($this->request->data['emotion'])) {
            $emotion = $this->request->data['emotion'];
            if(!empty($this->request->data['emotion_level'])) {
                $emotion_level = $this->request->data['emotion_level'];
            }else{
                $emotion_level = 2;
            }
        }else{
            $emotion = '';
            $emotion_level = null;
        }

        if(!empty($this->request->data['volume'])) {
            $volume = $this->request->data['volume'];
        }else{
            $volume = '100';
        }
        if(!empty($this->request->data['url'])){
            $url = $this->request->data['url'];
        }else{
            $url = Configure::read('default.url');

        }

        $crawler = $client->request('GET',$url);

        // Get DOM Objects
        $plugin_title = $crawler->filter('h1');
        $lists = $crawler->filter('dd')->each(function ($node) {
            return $node->html();
        });
        //$lists = $crawler->filter('dl dt')->text();
        if (empty($lists[$thread_value_name])) {
            // JQueryのAjaxでerrorとさせるため403を返却する。
            header('HTTP/1.0 403 Forbidden');
            $result = "NG";
            echo(json_encode($result));
            exit;
        }
        htmlspecialchars($lists[$thread_value_name]);
        if(mb_strlen($lists[$thread_value_name])>400){
            $lists[$thread_value_name] = '長文、AAのため省略します';
        }
        $lists[$thread_value_name] = strip_tags($lists[$thread_value_name], '<br>');
        $patterns = [];
        $patterns = array_merge($this->RegularExpression->find('list', array(
            'fields' => array('RegularExpression.before_value')
        )));
        $replacements = [];
        $replacements = array_merge($this->RegularExpression->find('list', array(
            'fields' => array('RegularExpression.after_value')
        )));

        $text =  preg_replace($patterns, $replacements, $lists[$thread_value_name]);
        $text = htmlspecialchars_decode($text);
        $apiKey = Configure::read('app.key');
        $apiPassword = Configure::read('app.password');
        $method = 'POST';
        $path = '/v1/tts';
        $baseURL = 'https://api.voicetext.jp';
        $options = array(
            'text' => 'レス' . $res_num . '、' . $text,
            'speaker' => $speaker,
            'emotion' => $emotion,
            'emotion_level' =>$emotion_level,
            'volume' => $volume
        );

        $options = $options ?: array();

        $request_url = $baseURL . $path;
        $auth_string = sprintf('%s:%s', $apiKey, $apiPassword);

        if ($method === 'GET') {
            $request_url .= '?' . http_build_query($options);
        }

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request_url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_USERPWD, $auth_string);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

            if ($method === 'POST') {
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($options));
            }

            $response = curl_exec($ch);

            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($status_code !== 200) {
                throw new \Exception(sprintf(
                    'HTTP Status Code: %s', $status_code));
            }

            if (curl_errno($ch)) {
                throw new \Exception(sprintf(
                    'cURL Error: No.%s - %s', curl_errno($ch), curl_error($ch)));
            }

            curl_close($ch);
            $res = base64_encode($response);
            $voice_data = 'data:audio/wav;base64,' . $res;
            $res_view = '[res' . $res_num . ']<br>' . $lists[$thread_value_name];
            return json_encode(compact('voice_data', 'res_view'));

        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function viewer($color = null ){
        $this->layout = 'ajax';
        debug($this->request);
        $this->set('color',$color);

    }
    public function regular_expression(){
        if($this->request->is('post')){
            if($this->RegularExpression->save($this->request->data)){
                $this->_setFlash('正規表現を登録しました.', 'success');
            }else{
                $this->_setFlash('登録に失敗しました。');

            }

        }
        //paginate
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('RegularExpression');
        $result = [];
        if (!empty($data)) {
            foreach ($data as $value) {
                if ($value['RegularExpression']['is_active'] == 1) {
                    $status = '<span class="label label-success">' . __('Active') . '</span>';
                } else {
                    $status = '<span class="label label-danger">' . __('Inactive') . '</span>';
                }
                $result[] = [$value['RegularExpression']['id'], htmlspecialchars($value['RegularExpression']['before_value']), htmlspecialchars($value['RegularExpression']['after_value']), $value['RegularExpression']['customer_id'], $status];
            }
        }


        $this->set('data', $result);

    }
}