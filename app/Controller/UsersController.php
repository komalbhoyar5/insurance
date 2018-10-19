<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	// var $components = array('Auth', 'Acl');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','register','forgot_password','reset_password');
	}
	public function isAuthorized($user) {
		parent::isAuthorized($user);
		return true;
	}

	public function index(){
		$this->layout = "backend_template";
		$users = $this->User->find('all');
		$this->set('users',$users);
	}

	public function edit($id) {
		$this->layout = "backend_template";
		$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
		$this->request->data = $user;
		$options = $this->user_group();
		$this->set('options', $options);
	}

	public function login() {
		$this->layout = "login_backend";
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->Session->setFlash('Login successfully!', '', array(), 'Success');
				$this->redirect($this->Auth->redirect());
			}
			else {
				$this->Session->setFlash('Username or Password do not Match', '', array(), 'fail');
			}
		}
	}

	public function register() {
		$this->layout = "login_backend";
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['created_date'] = date('Y-m-d');
			$this->request->data['Group']['modified_date'] = date('Y-m-d');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved.', '', array(), 'success');
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
	}

	public function logout() {
		// if ($this->Auth->user('group_id' == 4)) {
		// 	$this->Auth->logout();
		// 	$this->redirect(array('controller'=>'vendors', 'action' => 'login'));
		// }else{
			$this->redirect($this->Auth->logout());
		// }
	}

	public function role() {
		$this->layout = "backend_template";
		$this->loadModel('Group');
		$groups = $this->Group->find('all');
		$this->set('groups', $groups);
	}
	public function add_role(){
		$this->loadModel('Group');
		$this->layout = "backend_template";

		if ($this->request->is('post')) {
			$this->request->data['Group']['created'] = date('Y-m-d h:i:s a');
			$this->request->data['Group']['modified'] = date('Y-m-d h:i:s a');
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('New role created.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('controller' => 'users','action' => 'add_role'));
				}else{
					return $this->redirect(array('controller' => 'users','action' => 'role'));
				}
			} else {
				$this->Session->setFlash('Role could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		// $this->redirect(array('action'=>'user_type'));
	}

	public function update_role($id){
		$this->loadModel('Group');
		$this->layout = "backend_template";
		$this->request->data['Group']['id'] = $id;
		if ($this->request->is('post')) {
			$this->request->data['Group']['modified'] = date('Y-m-d h:i:s a');
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('Updated successfully.', '', array(), 'success');
				return $this->redirect(array('controller' => 'users','action' => 'role'));
			} else {
				$this->Session->setFlash('Role could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$groups = $this->Group->find('first', array('conditions'=>array('id'=>$id)));
		$this->request->data = $groups;
	}

	public function delete_user_type($id){
		$this->loadModel('Group');
			$this->Group->id = $id;
			if (!$this->Group->exists()) {
				throw new NotFoundException(__('Invalid Group'));
			}
			// $this->request->allowMethod('post', 'delete');

			if ($this->Group->delete()) {
				$this->Session->setFlash('The role has been deleted.', '', array(), 'success');
			} else {
				$this->Session->setFlash('The role could not be deleted. Please, try again.', '', array(), 'fail');
			}
		return $this->redirect(array('controller' => 'users','action' => 'role'));
	}

	public function add(){
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$Component = $this->Components->load('General');
			$random = $Component->generateRandomString();
			$this->request->data['User']['password'] = $random;
			$this->request->data['User']['temp_password'] = $random;
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$options = $this->user_group();
		$this->set('options', $options);
	}

	public function forgot_password() {
		$this->layout = "login_backend";
		if ($this->request->is('post')) {
			$PostData = $this->request->data;
			$this->User->recursive = -1;
			$user = $this->User->find('first',array('conditions'=> array('User.email' => $PostData['User']['email'], 'User.group_id'=>array('1','2'))));
			if($user){
				$Component = $this->Components->load('General');
				$tokenKey = $Component->generateRandomString();
				$this->User->id = $user['User']['id'];
				$this->request->data['User']['temp_password'] = $tokenKey;
				if ($this->User->save($this->request->data)) {
					$Component = $this->Components->load('Email');

					$this->loadModel('Setting');
					$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));

					$return = $Component->sendForgotPasswordMail($user,$tokenKey,$company_details['Setting'], 'users');

					$this->Session->setFlash('The mail has been sent, please check your mail.', '', array(), 'success');
				}else{
					$this->Session->setFlash('This reset email could not send. Please try again.', '', array(), 'fail');
				}
			}else{
				$this->Session->setFlash('This email does not exist in system.', '', array(), 'fail');
			}
		}
	}

	public function reset_password($id, $tokenKey) {
		$this->layout = "login_backend";
		$this->loadModel('User');
		$this->User->recursive = -1;
		$user = $this->User->find('first', array('conditions'=>array('id'=>$id, 'temp_password' => $tokenKey)));
		if (empty($user)) {
			$this->Session->setFlash('Reset password token has been expired.', '', array(), 'fail');
			$this->redirect(array('controller'=>'users', 'action' => 'login'));
		}
		if ($this->request->is('post')) {
				if ($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) {
					$this->request->data['User']['id'] = $user['User']['id'];
					$this->request->data['User']['temp_password'] = "";
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Your password updated successfully', '', array(), 'success');
						$this->redirect(array('controller'=>'users', 'action'=>'login'));
					} else {
						$this->Session->setFlash('The password could not be saved. Please, try again.', '', array(), 'fail');
					}
				}else{
					$this->Session->setFlash('Password do not match.', '', array(), 'fail');
				}
		}
	}
	// ==================================== employee section ========================== //
		public function employee(){
			$this->layout = "backend_template";
			$users = $this->User->find('all', array('conditions' => array('is_employee'=> 'yes')));
			$this->set('users', $users);
		}
		public function add_employee(){
			$this->layout = "backend_template";
			$this->loadModel('Group');
			if ($this->request->is('post')) {
				$this->User->create();
				$this->request->data['User']['created_date'] = date('Y-m-d');
				$this->request->data['Group']['modified_date'] = date('Y-m-d');
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('The employee has been saved.', '', array(), 'success');
					$this->redirect(array('controller'=>'users', 'action'=>'employee'));
				} else {
					$this->Session->setFlash('The employee could not be saved. Please, try again.', '', array(), 'fail');
				}
			}
			$groups = $this->Group->find('list', array('conditions'=> array('is_employee' => 'Yes')));
			$this->set('groups', $groups);
		}
		public function update_employee($id) {
			$this->layout = "backend_template";
			$this->loadModel('Group');
			if ($this->request->is(array('post','put'))) {
				
				if ($this->request->data['User']['password'] == "") {
					unset($this->request->data['User']['password']);
				}
				$this->request->data['User']['id'] = $id;
				$this->request->data['User']['modified_date'] = date('Y-m-d');
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('The employee has been saved.', '', array(), 'success');
					$this->redirect(array('controller'=>'users', 'action'=>'employee'));
				} else {
					$this->Session->setFlash('The employee could not be saved. Please, try again.', '', array(), 'fail');
				}
			}
			$groups = $this->Group->find('list', array('conditions'=> array('is_employee' => 'Yes')));
			$users = $this->User->find('first', array('conditions' => array('User.id'=> $id)));
			$this->request->data = $users;
			$this->set('groups', $groups);
		}

		public function delete_employee($id){
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid User'));
			}

			if ($this->User->delete()) {
				$this->Session->setFlash('The employee data has been deleted.', '', array(), 'success');
			} else {
				$this->Session->setFlash('The employee data could not be deleted. Please, try again.', '', array(), 'fail');
			}
		return $this->redirect(array('controller' => 'users','action' => 'employee'));
		}
	// ==================================== employee section ========================== //

	// ==================================== Profile section =========================== //
		public function my_profile(){
			$this->layout = "backend_template";
			$id = $this->Auth->user('id');
			$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
			$this->set('user', $user);

		}

		public function update_myprofile() {
			$this->layout = "backend_template";
			$id = $this->Auth->user('id');
			if ($this->request->is(array('post','put'))) {
				$this->request->data['User']['id'] = $id;
				$this->request->data['User']['modified_date'] = date('Y-m-d');
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('Your profile has been saved.', '', array(), 'success');
				} else {
					$this->Session->setFlash('Your profile could not be saved. Please, try again.', '', array(), 'fail');
				}
			}
			$user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
			$this->request->data = $user;
			$Component = $this->Components->load('General');
			$return = $Component->GetCountries();
			$this->set('countries', $return);

			$states = array();
			if (isset($this->request->data['User']['country'])) {
				$states = $Component->GetState($this->request->data['User']['country']);
				$this->set('states', $states);
			}
		}
		
		public function change_password() {
			$this->layout = "backend_template";
			$validatePassword = "";
			if ($this->request->is(array('post','put'))) {
				$validatePassword = $this->User->validatePassword($this->request->data['User']);
				if ($validatePassword == "true") {
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Password updated successfully.', '', array(), 'success');
					} else {
						$this->Session->setFlash('Unable to change password, please try again.', '', array(), 'fail');
					}
					$this->set('validatePassword', "");
				}else{
					$this->set('validatePassword', $validatePassword);
					$this->Session->setFlash('Unable to change password, please try again.', '', array(), 'fail');
				}
			}else{
					$this->set('validatePassword', "");
			}
		}
	// ==================================== Profile section =========================== //
	// ==================================== General setting section =========================== //

		public function getstate(){
			if ($this->request->is('ajax')) {
				$country_id = $this->request->data['country_id'];
				$Component = $this->Components->load('General');
				$return = $Component->getstate($country_id);
				echo "<option value=''>Select state</option>";
				foreach ($return as $key => $value) {
					 echo "<option value='".$key."'>".$value."</option>";
				}
			}
			exit();
		}

		public function getcity(){
			if ($this->request->is('ajax')) {
				$state = $this->request->data['state_id'];
				$country_id = $this->request->data['country_id'];
				$Component = $this->Components->load('General');
				$return = $Component->getCity($country_id, $state);
				echo "<option value=''>Select city</option>";
				foreach ($return as $key => $value) {
					 echo "<option value='".$key."'>".$value."</option>";
				}
			}
			exit();
		}

	// ==================================== General setting section =========================== //
}