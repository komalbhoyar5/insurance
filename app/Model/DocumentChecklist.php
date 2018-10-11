<?php
App::uses('AppModel', 'Model');
/**
 * DocumentChecklist Model
 *
 */
class DocumentChecklist extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'document_checklist';

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
		print_r($this->data[$this->alias]);
		exit();
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'DocumentChecklist.id',
		            'DocumentChecklist.title'
		                    ),
		                    'conditions' => array(
		                        'DocumentChecklist.title' => $this->data[$this->alias]['title'],
		                        'DocumentChecklist.id !=' => $this->data[$this->alias]['id']
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'DocumentChecklist.id',
		            'DocumentChecklist.title'
		                    ),
		                    'conditions' => array(
		                        'DocumentChecklist.title' => $this->data[$this->alias]['title']
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
