<?php
App::uses('AppModel', 'Model');

class Customer extends AppModel {

	public $useTable = 'customer';

	public $belongsTo = array(
	);

	public $hasAndBelongsToMany = array(
	);

	public $validate = array(

	);

	/**
	 * 未ログイン時は除外
	 */
	public function beforeFind($queryData)
	{
		if (!AuthComponent::user()) {
			return $queryData;
		}

		if (empty($queryData['conditions'])) {
			$queryData['conditions'] = [];
		}


		return $queryData;
	}

/**
 * Validate Methods
 */
	public function confirmFields($data, $target) {
		if (empty($this->data[$this->name][$target])) {
			return false;
		}
		return current($data) === $this->data[$this->name][$target];
	}

	public function isUniqueEmail($email) {
		return !$this->hasAny(array(
			'email' => $email,
			'is_active' => true,
		));
	}

	// from cakeplus
	// https://github.com/ichikaway/cakeplus/blob/master/models/behaviors/add_validation_rule.php
	public function katakanaOnly($wordvalue){
		$value = array_shift($wordvalue);
		//\xe3\x82\x9b 濁点゛
		//\xe3\x82\x9c 半濁点゜
		return preg_match("/^(\xe3(\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc|\x82\x9b|\x82\x9c))*$/", $value);
	}

/**
 * methods
 */
	public function checkExpire($registerKey) {
		$conditions = array(
			'User.register_key' => $registerKey,
			'User.register_expire >' => date('Y-m-d H:i:s')
		);
		$id = $this->field('id', $conditions);

		return $id;
	}

	public function register($data) {
		$this->data = $data;
		if (!$this->isUniqueEmail($this->data[$this->alias]['email'])) {
			$this->invalidate('email');
			return false;
		}

		$this->data[$this->alias]['id'] = $this->field('id', array(
			'email' => $this->data[$this->alias]['email'],
		));
		$this->data[$this->alias]['register_key'] = String::uuid();
		$this->data[$this->alias]['register_expire'] = date('Y-m-d H:i:s', strtotime('NOW ' . $this->expire));

		return $this->save($this->data);
	}

	public function activate($id) {
		$user = $this->read(array('id', 'email'), $id);
		if (!$user) {
			$this->invalidate('id');
			return false;
		}

		$this->data = array($this->alias => array(
			'id' => $user[$this->alias]['id'],
			'email' => $user[$this->alias]['email'],
			'register_key' => null,
			'register_expire' => null,
			'is_active' => 1,
		));

		return $this->save($this->data);
	}

	public function changeEmail($data) {
		if (!$this->isUniqueEmail($data[$this->alias]['email_new'])) {
			$this->invalidate('email_new', 'すでに取得されています。ちがうメールアドレスを入力してください');
			return false;
		}

		$this->data[$this->alias]['email_new'] = $data[$this->alias]['email_new'];
		$this->data[$this->alias]['register_key'] = String::uuid();
		$this->data[$this->alias]['register_expire'] = date('Y-m-d H:i:s', strtotime('NOW ' . $this->expire));
		$return = $this->save($this->data);

		return $return;
	}

	public function confirmEmail($id) {
		$user = $this->read(array('email_new'), $id);
		if (!$user) {
			$this->invalidate('id');
			return false;
		}
		if (!$user['User']['email_new']) {
			$this->invalidate('email_new');
			return false;
		}

		$this->data = array($this->alias => array(
			'id' => $id,
			'email' => $user[$this->alias]['email_new'],
			'email_new' => null,
			'register_key' => null,
			'register_expire' => null
		));
		$return = $this->save($this->data, false);

		return $return;
	}

	public function forgetPassword($data) {
		$conditions = array(
			'email' => $data[$this->alias]['email'],
		);
		$user = $this->find('first', compact('conditions'));
		if (!$user) {
			$this->invalidate('id');
			return false;
		}

		$this->data = array($this->alias => array(
			'id' => $user[$this->alias]['id'],
			'email' => $user[$this->alias]['email'],
			'register_key' => String::uuid(),
			'register_expire' => date('Y-m-d H:i:s', strtotime('NOW ' . $this->expire)),
		));

		return $this->save($this->data);
	}

	public function changePassword($data) {
		if (empty($data[$this->alias]['id']) && !empty($data[$this->alias]['register_key'])) {
			$data[$this->alias]['id'] = $this->checkExpire($data[$this->alias]['register_key']);
		}
		if (!$data[$this->alias]['id']) {
			$this->invalidate('id');
			return false;
		}

		$this->data = array($this->alias => array(
			'id' => $data[$this->alias]['id'],
			'password' => $data[$this->alias]['password'],
			'register_key' => null,
			'register_expire' => null
		));

		return $this->save($this->data);
	}

	public function getGroupIds($id)
	{
		$groupUsers = ClassRegistry::init('GroupsUser')->find('all', [
			'fields' => ['group_id'],
			'conditions' => [
				'user_id' => $id
			],
		]);
		return Hash::extract($groupUsers, '{n}.GroupsUser.group_id');
	}

}
