<?php
// app/Model/Category.php
class RegularExpression extends AppModel {


    public $validate = array(
        'before_value' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => '同一の文字は登録できません。',
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'This field is required.',
            ),
        ),
        'after_value' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'This field is required.',
            ),
        ),
    );
}