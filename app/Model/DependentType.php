<?php
App::uses('AppModel', 'Model');
/**
 * DependentType Model
 *
 */
class DependentType extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'dependent_type';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Title should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// 'isUnique' => array(
			// 	'rule' => array('checkUniquetitle'),
			// 	'required' => 'create',
			// 	'message' => 'This title already exists'
			// )
		),
		'min_age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter numeric value',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'max_age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter numeric value',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	function checkUniquetitle($data) {
		
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'DependentType.id',
		            'DependentType.title'
		                    ),
		                    'conditions' => array(
		                        'DependentType.title' => $this->data[$this->alias]['title'],
		                        'DependentType.id !=' => $this->data[$this->alias]['id'],
		                        'DependentType.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'DependentType.id',
		            'DependentType.title'
		                    ),
		                    'conditions' => array(
		                        'DependentType.title' => $this->data[$this->alias]['title'],
		                        'DependentType.deleted_status' => "No"
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
