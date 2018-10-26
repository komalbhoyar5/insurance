<?php
App::uses('AppModel', 'Model');
/**
 * Agent Model
 *
 */
class Agent extends AppModel {
 public $actsAs = array('Containable');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'agent_code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'agent_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Agent code should not be empty.'
			),
			'isUnique' => array(
				'rule' => array('checkUniqueagent_code'),
				'message' => 'This agent_code already exists'
			)
		),
		'f_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'gender' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'agenttype_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'mobile_no' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
			'validatep' => array(
		        'rule'      => array('validate_mobile'),
		        'message'   => 'Invalid mobile number'
		    )
		)

	);

	public $hasMany = array(
		'AgentCommission' => array(
			'className' => 'AgentCommission',
			'foreignKey' => 'agent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			// 'conditions' => array('Address.id'=>'User.Agent_id')
		),
	);

	function checkUniqueagent_code($data) {
		
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'Agent.id',
		            'Agent.agent_code'
		                    ),
		                    'conditions' => array(
		                        'Agent.agent_code' => $this->data[$this->alias]['agent_code'],
		                        'Agent.id !=' => $this->data[$this->alias]['id'],
		                        'Agent.deleted_status' => "No"
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'Agent.id',
		            'Agent.agent_code'
		                    ),
		                    'conditions' => array(
		                        'Agent.agent_code' => $this->data[$this->alias]['agent_code'],
		                        'Agent.deleted_status' => "No"
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

    function createAgentdropdownList($parent = 0, $spacing = '', $user_tree_array = '') {

	  if (!is_array($user_tree_array))
	    $user_tree_array = array();
	  $sql = "SELECT id,f_name, l_name, parent_agent_id FROM agents WHERE parent_agent_id = $parent ORDER BY id ASC";
	  $data = $this->query($sql);
	  if (count($data) > 0) {
	    foreach ($data as $cat) {
	      $user_tree_array[$cat['agents']['id']] = " ".$spacing ." ". $cat['agents']['f_name'] .' '. $cat['agents']['l_name'];
	      $user_tree_array = $this->createAgentdropdownList($cat['agents']['id'], $spacing . ' -- ', $user_tree_array);
	    }
	  }
	  return $user_tree_array;
	}

	public function validate_mobile(){
	    return preg_match('/^[0-9]{10}+$/', $this->data[$this->alias]['mobile_no']);
	}
}
