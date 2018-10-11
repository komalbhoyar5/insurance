<?php
App::uses('AppModel', 'Model');
/**
 * Permission Model
 *
 * @property Group $Group
 */
class Permission extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'page_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Page name should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'page_action' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Page action should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
		// 'parent_id' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'groups_permissions',
			'foreignKey' => 'permission_id',
			'associationForeignKey' => 'group_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	public $belongsTo = array(
		'Parent' => array(
			'className' => 'Permission',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'dependent' => true,
			'order' => ''
		)
	);
	public $hasMany = array(
        'Child' => array(
            'className' => 'Permission',
            'foreignKey' => 'parent_id'
        )
	);
}
