<?php
App::uses('AppModel', 'Model');
/**
 * CoverType Model
 *
 */
class CoverType extends AppModel {

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
				'message' => 'Title can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('checkUniquetitle'),
				'required' => 'create',
				'message' => 'This title already exists'
			)
		),
		'desc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description cannot be empty',
				//'allowEmpty' => false,
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
		                        'CoverType.id',
		            'CoverType.title'
		                    ),
		                    'conditions' => array(
		                        'CoverType.title' => $this->data[$this->alias]['title'],
		                        'CoverType.id !=' => $this->data[$this->alias]['id'],
		                        'CoverType.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'CoverType.id',
		            'CoverType.title'
		                    ),
		                    'conditions' => array(
		                        'CoverType.title' => $this->data[$this->alias]['title'],
		                        'CoverType.deleted_status' => "No"
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
