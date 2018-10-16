<?php
App::uses('AppModel', 'Model');
/**
 * Bank Model
 *
 */
class Bank extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'bank_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'bank_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('checkUniquebank_name'),
				'required' => 'create',
				'message' => 'This bank name already exists.'
			)
		),
		'bank_branch' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sort_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

function checkUniquebank_name($data) {
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Bank.id',
		            'Bank.bank_name'
		                    ),
		                    'conditions' => array(
		                        'Bank.bank_name' => $this->data[$this->alias]['bank_name'],
		                        'Bank.id !=' => $this->data[$this->alias]['id'],
		                        'Bank.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Bank.id',
		            'Bank.bank_name'
		                    ),
		                    'conditions' => array(
		                        'Bank.bank_name' => $this->data[$this->alias]['bank_name'],
		                        'Bank.deleted_status' => "No"
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

