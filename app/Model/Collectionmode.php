<?php
App::uses('AppModel', 'Model');
/**
 * Collectionmode Model
 *
 */
class Collectionmode extends AppModel {

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
				//'message' => 'Your custom message here',
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
	);
	
	function checkUniquetitle($data) {
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Collectionmode.id',
		            'Collectionmode.title'
		                    ),
		                    'conditions' => array(
		                        'Collectionmode.title' => $this->data[$this->alias]['title'],
		                        'Collectionmode.id !=' => $this->data[$this->alias]['id'],
		                        'Collectionmode.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Collectionmode.id',
		            'Collectionmode.title'
		                    ),
		                    'conditions' => array(
		                        'Collectionmode.title' => $this->data[$this->alias]['title'],
		                        'Collectionmode.deleted_status' => "No"
		                    )
		                )
	        	);
		}
	    if(!empty($isUnique)){
	    	return false;
	    }else{
	        return true; //If there is no match in DB allow anyone to change
	    }
    }}
