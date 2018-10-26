 <?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property occupation $occupation
 * @property occupation $occupation
 */
class Customer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'f_name';
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'customer_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter customer type can not be Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'f_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name can not be Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'l_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Last name can not be Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'c_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Company name can not be Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'c_register_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Company registration can not be Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_of_birth' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Date of birth can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nrc' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Please enter valid NRC / Passport no.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'NRC / Passport number can not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		)
	);

	public function validate_mobile(){
	    return preg_match('/^[0-9]{10}+$/', $this->data[$this->alias]['mobile_no']);
	}

	

}