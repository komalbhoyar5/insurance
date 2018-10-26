<?php
App::uses('AppModel', 'Model');
/**
 * Plan Model
 *
 */
class Plan extends AppModel {
 public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'plan_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Plan code should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('checkUniqueplan_code'),
				'required' => 'create',
				'message' => 'This plan code already exists'
			)
		),
		'plan_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Plan namw should not be empty.',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cause_of_claim' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Product should not be empty.',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cover_type_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			// 'notEmpty' => array(
			// 	'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
	);


	public $hasMany = array(
		'PlanDependent' => array(
			'className' => 'PlanDependent',
			'foreignKey' => 'plan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			// 'conditions' => array('Address.id'=>'User.category_id')
		),
	);

	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CoverType' => array(
			'className' => 'CoverType',
			'foreignKey' => 'cover_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			// 'conditions' => array('Address.id'=>'User.category_id')
		)
	);

	function checkUniqueplan_code($data) {
		
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Plan.id',
		            'Plan.plan_code'
		                    ),
		                    'conditions' => array(
		                        'Plan.plan_code' => $this->data[$this->alias]['plan_code'],
		                        'Plan.id !=' => $this->data[$this->alias]['id'],
		                        'Plan.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Plan.id',
		            'Plan.plan_code'
		                    ),
		                    'conditions' => array(
		                        'Plan.plan_code' => $this->data[$this->alias]['plan_code'],
		                        'Plan.deleted_status' => "No"
		                    )
		                )
	        	);
		}
	    if(!empty($isUnique)){
	    	return false;
	    }else{
	        return true; //If there is no match in DB allow anyone to change
	    }
    }
}
