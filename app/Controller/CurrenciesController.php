<?php
App::uses('AppController', 'Controller');
/**
 * Currencies Controller
 *
 * @property Currency $Currency
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CurrenciesController extends AppController {

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
		$this->Currency->recursive = 0;
		$currencies = $this->Currency->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($currencies);
		// exit();
		$this->set('currencies', $currencies);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Currency->exists($id)) {
			throw new NotFoundException(__('Invalid currency'));
		}
		$options = array('conditions' => array('Currency.' . $this->Currency->primaryKey => $id));
		$this->set('currency', $this->Currency->find('first', $options));
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
			$this->request->data['Currency']['created_by'] = $user_id;
			$this->request->data['Currency']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Currency']['company_id'] = $user['User']['company_id'];

			$this->Currency->create();
			if ($this->Currency->save($this->request->data)) {
				$this->Session->setFlash('The currency has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The currency could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Currency->exists($id)) {
			throw new NotFoundException(__('Invalid Currency'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Currency']['id'] = $id;
			$this->request->data['Currency']['updated_by'] = $user_id;
			$this->request->data['Currency']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Currency->save($this->request->data)) {
				$this->Session->setFlash('The currency cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The currency cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Currency.' . $this->Currency->primaryKey => $id));
			$this->request->data = $this->Currency->find('first', $options);
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

		$this->Currency->id = $id;
		if (!$this->Currency->exists()) {
			throw new NotFoundException(__('Invalid currency'));
		}
		// $this->request->allowMethod('post', 'delete');
		$currency = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Currency->save($currency)) {
			$this->Session->setFlash(__('The currency has been deleted.'));
		} else {
			$this->Session->setFlash(__('The currency could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
