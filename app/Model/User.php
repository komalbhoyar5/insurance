<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $displayField = 'email';
 	public $actsAs = array('Containable');

	public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id'
        )
    );
	// public $actsAs = array('Acl' => array('type' => 'requester'));

	public $validate = array(
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name can not be Empty',
			),
			'isUnique' => array(
				'rule' => array('checkUniquecode'),
				'message' => 'This code already exists'
			)
		),
		'f_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name can not be Empty',
			)
		),
		'l_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Last name can not be Empty',
			)
		),
		'mobile_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Mobile number can not be Empty',
			),
			'validatep' => array(
		        'rule'      => array('validate_mobile'),
		        'message'   => 'Invalid mobile number'
		    )
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Email ID can not be Empty',
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter a Valid Email ID',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This email id Already Exists'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password can not be Empty',
			),
			'length' => array(
		        'rule'      => array('between', 8, 40),
		        'message'   => 'Your password must contain more than 8 character.'
		    ),
		    'validatep' => array(
		        'rule'      => array('validate_respasswords'),
		        'message'   => 'Your password must have 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.'
		    )
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password can not be Empty',
	
			),
			'length' => array(
		        'rule'      => array('between', 8, 40),
		        'message'   => 'Your password must contain more than 8 character.'
		    ),
		    'compare'    => array(
		        'rule'      => array('compare_pass'),
		        'message' => 'The passwords you entered do not match.'
		    )
		)
	);
	
	public function compare_pass() {
		if ($this->data[$this->alias]['password'] != $user['confirm_password']) {
	    	return false;
	    }else{
	    	return true;
	    }
	}

	public function validate_respasswords() {
		return preg_match('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $this->data[$this->alias]['password']);
	}

	public function validate_mobile(){
	    return preg_match('/^[0-9]{10}+$/', $this->data[$this->alias]['mobile_no']);
	}

	public function validatePassword($user){
		// echo "string";($this->data[$this->alias]['password']);
		if ($user['password'] == "") {
			return "Password can not be empty";
		}
		elseif ( $user['confirm_password'] == "") {
			return "Confirm password can not be empty";
		}
		else if ($user['password'] != $user['confirm_password']) {
	    	return "The passwords you entered do not match.";
	    }
	    elseif (strlen($user['password']) < 8) {
	    	return "Your password must contain more than 8 character.";
	    }
		else if(!preg_match('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $user['password'])){
	    	return "Your password must have 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
	    }
	    else{
	    	return "true";
	    }
	}
	/* Check For API Login access*/
	public function login_Api_Rest($data = NULL){
		if($data == NULL)
			return false;
		 
		if((!$data->email) || (!$data->password))
			return false;
		
		$email	= $data->email; 
		$password	= AuthComponent::password($data->password);
		$this->recursive = -1;
		$result = $this->find('first', 
									array("conditions" => array(
															"email LIKE "	=> trim($email), 
															"password LIKE "=> trim($password)
														)
										)
								);
		
		return $result;  
	}

	function checkUniquecode($data) {
		if (isset($this->data[$this->alias]['id'])) {
		    $isUnique = $this->find(
		                'first',
		                array(
		                    'fields' => array(
		                        'User.id',
		            'User.code'
		                    ),
		                    'conditions' => array(
		                        'User.code' => $this->data[$this->alias]['code'],
		                        'User.id !=' => $this->data[$this->alias]['id']
		                    )
		                )
		        );
		}else{
			$isUnique = $this->find(
	                'first',
	                array(
	                    'fields' => array(
	                        'User.id',
		            'User.code'
		                    ),
		                    'conditions' => array(
		                        'User.code' => $this->data[$this->alias]['code']
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
    
	public function beforeSave($options = array()) {
		if(isset($this->data['User']['password'])) {
			$pwhash = new SimplePasswordHasher();
			$this->data['User']['password'] = $pwhash->hash(
				$this->data['User']['password']
			);
			return true;
		}
		return true;
	}
}
