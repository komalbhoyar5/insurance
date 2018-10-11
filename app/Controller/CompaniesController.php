<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CompaniesController extends AppController {

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
		$this->loadModel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));
		
		if ($this->request->is(array('post', 'put'))) {
			if ($user['User']['company_id'] !=0 || $user['User']['company_id'] !="") {
				$this->request->data['Company']['id'] = $user['User']['company_id'];
					$this->request->data['Company']['updated_date'] = date('Y-m-d H:i:s');
				if ($this->Company->save($this->request->data)) {
					$this->Session->setFlash('The company details has been saved.', '', array(), 'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('The company details could not be saved. Please, try again.', '', array(), 'fail');
				}
			}else{
				$this->Company->create();
				if ($this->Company->save($this->request->data)) {
					$this->request->data['Company']['created_by'] = $user_id;
					$this->request->data['Company']['created_date'] = date('Y-m-d H:i:s');
					$company_id = $this->Company->getLastInsertId();
					$update_user = array('id'=> $user_id, 'company_id' => $company_id);
					$this->User->save($update_user);
					$this->Session->setFlash('The company details has been saved.', '', array(), 'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('The company details could not be saved. Please, try again.', '', array(), 'success');
				}
			}
		} else {
			if ($user['User']['company_id'] !=0) {
				$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $user['User']['company_id']));
				$this->request->data = $this->Company->find('first', $options);
			}
		}

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
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
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('The company has been deleted.'));
		} else {
			$this->Session->setFlash(__('The company could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
