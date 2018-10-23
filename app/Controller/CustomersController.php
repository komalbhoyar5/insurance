<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CustomersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$customers = $this->Customer->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($customers);
		// exit();
		$this->set('customers', $customers);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$continue = array();
		$this->loadmodel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));

		if ($this->request->is('post')) {
			$this->request->data['Customer']['created_by'] = $user_id;
			$this->request->data['Customer']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Customer']['company_id'] = $user['User']['company_id'];

			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash('The Customer details has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The Customers details could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$this->loadmodel('Occupation');
			$occupation_list = $this->Occupation->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
			$this->set('occupation_list',$occupation_list);
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user_id = $this->Auth->user('id');
		$this->layout = "backend_template";
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid Customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Customer']['id'] = $id;
			$this->request->data['Customer']['updated_by'] = $user_id;
			$this->request->data['Customer']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash('The Customer cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Customer cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);

		}
		$this->loadmodel('Occupation');
			$occupation_list = $this->Occupation->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
			$this->set('occupation_list',$occupation_list);
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null){
		$user_id = $this->Auth->user('id');

		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid Customer'));
		}
		// $this->request->allowMethod('post', 'delete');
		$customer = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Customer->save($customer)) {
			$this->Session->setFlash(__('The Customer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}