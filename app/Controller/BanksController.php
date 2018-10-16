<?php
App::uses('AppController', 'Controller');
/**
 * Banks Controller
 *
 * @property Bank $Bank
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BanksController extends AppController {

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
		$this->Bank->recursive = 0;
		$banks = $this->Bank->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($banks);
		// exit();
		$this->set('banks', $banks);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bank->exists($id)) {
			throw new NotFoundException(__('Invalid bank'));
		}
		$options = array('conditions' => array('Bank.' . $this->Bank->primaryKey => $id));
		$this->set('bank', $this->Bank->find('first', $options));
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
			$this->request->data['Bank']['created_by'] = $user_id;
			$this->request->data['Bank']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Bank']['company_id'] = $user['User']['company_id'];

			$this->Bank->create();
			if ($this->Bank->save($this->request->data)) {
				$this->Session->setFlash('The Bank details has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The Banks details could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
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
		if (!$this->Bank->exists($id)) {
			throw new NotFoundException(__('Invalid Bank'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Bank']['id'] = $id;
			$this->request->data['Bank']['updated_by'] = $user_id;
			$this->request->data['Bank']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Bank->save($this->request->data)) {
				$this->Session->setFlash('The Bank cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Bank cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Bank.' . $this->Bank->primaryKey => $id));
			$this->request->data = $this->Bank->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$user_id = $this->Auth->user('id');

		$this->Bank->id = $id;
		if (!$this->Bank->exists()) {
			throw new NotFoundException(__('Invalid Bank'));
		}
		// $this->request->allowMethod('post', 'delete');
		$bank = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Bank->save($bank)) {
			$this->Session->setFlash(__('The Bank has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Bank could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
