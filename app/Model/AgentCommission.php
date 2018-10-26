<?php
App::uses('AppModel', 'Model');
/**
 * AgentCommission Model
 *
 * @property Agent $Agent
 */
class AgentCommission extends AppModel {
	public $useTable = 'agent_commissions';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'effective_from_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'should not be empty',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'effective_to_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'should not be empty',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
			// 'commission_rate' => array(
			// 	// 'notEmpty' => array(
			// 	// 	'rule' => array('notEmpty'),
			// 	// 	//'message' => 'Your custom message here',
			// 	// 	//'allowEmpty' => false,
			// 	// 	//'required' => false,
			// 	// 	//'last' => false, // Stop validation after this rule
			// 	// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// 	// ),
			// 	// 'numeric' => array(
			// 	// 	'rule' => array('numeric'),
			// 	// 	//'message' => 'Your custom message here',
			// 	// 	//'allowEmpty' => false,
			// 	// 	'required' => false,
			// 	// 	//'last' => false, // Stop validation after this rule
			// 	// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// 	// ),
			// ),
			// 'tax_on_commission' => array(
			// 	'notEmpty' => array(
			// 		'rule' => array('notEmpty'),
			// 		//'message' => 'Your custom message here',
			// 		//'allowEmpty' => false,
			// 		//'required' => false,
			// 		//'last' => false, // Stop validation after this rule
			// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// 	),
			// 	'numeric' => array(
			// 		'rule' => array('numeric'),
			// 		//'message' => 'Your custom message here',
			// 		//'allowEmpty' => false,
			// 		//'required' => false,
			// 		//'last' => false, // Stop validation after this rule
			// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// 	),
			// ),
		'commision_from_month' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'should not be empty',
				'required' => true,
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Enter numeric value',
				//'allowEmpty' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'commission_to_month' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'should not be empty',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Enter numeric value',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agent' => array(
			'className' => 'Agent',
			'foreignKey' => 'agent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
