<?php
App::uses('AppModel', 'Model');
/**
 * Relationship Model
 *
 */
class Relationship extends AppModel {

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
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('checkUniquetitle'),
				'required' => 'create',
				'message' => 'This currency name already exists'
			)
		),
	);
			function checkUniquetitle($data) {
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Relationship.id',
		            'Relationship.title'
		                    ),
		                    'conditions' => array(
		                        'Relationship.title' => $this->data[$this->alias]['title'],
		                        'Relationship.id !=' => $this->data[$this->alias]['id'],
		                        'Relationship.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Relationship.id',
		            'Relationship.title'
		                    ),
		                    'conditions' => array(
		                        'Relationship.title' => $this->data[$this->alias]['title'],
		                        'Relationship.deleted_status' => "No"
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

