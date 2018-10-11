<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Group extends AppModel {
	// public $actsAs = array('Acl' => array('type' => 'requester'));

    // public function parentNode() {
    //     return null;
    // }
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Role name Cannot be Empty',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This role is already exists'
			)
		)
	);
	

	public function beforeSave($options = array()) {
		
	}
}
