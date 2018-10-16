<?php
App::uses('AppModel', 'Model');
/**
 * Currency Model
 *
 */
class Currency extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'currency_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('checkUniquecurrency_name'),
				'required' => 'create',
				'message' => 'This currency name already exists'
			)
		),
		'currency_code' => array(
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

		function checkUniquecurrency_name($data) {
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Currency.id',
		            'Currency.currency_name'
		                    ),
		                    'conditions' => array(
		                        'Currency.currency_name' => $this->data[$this->alias]['currency_name'],
		                        'Currency.id !=' => $this->data[$this->alias]['id'],
		                        'Currency.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Currency.id',
		            'Currency.currency_name'
		                    ),
		                    'conditions' => array(
		                        'Currency.currency_name' => $this->data[$this->alias]['currency_name'],
		                        'Currency.deleted_status' => "No"
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
