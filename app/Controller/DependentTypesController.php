<?php
App::uses('AppController', 'Controller');
/**
 * DependentTypes Controller
 *
 * @property DependentType $DependentType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DependentTypesController extends AppController {

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
		$this->DependentType->recursive = 0;
		$dependentTypes = $this->DependentType->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('dependentTypes', $dependentTypes);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DependentType->exists($id)) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		$options = array('conditions' => array('DependentType.' . $this->DependentType->primaryKey => $id));
		$this->set('dependentType', $this->DependentType->find('first', $options));
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
			$this->request->data['DependentType']['created_by'] = $user_id;
			$this->request->data['DependentType']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['DependentType']['company_id'] = $user['User']['company_id'];

			$this->DependentType->create();
			if ($this->DependentType->save($this->request->data)) {
				$this->Session->setFlash('The dependant type has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The dependant type could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->DependentType->exists($id)) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['DependentType']['id'] = $id;
			$this->request->data['DependentType']['updated_by'] = $user_id;
			$this->request->data['DependentType']['updated_date'] = date('Y-m-d H:i:s');

			if ($this->DependentType->save($this->request->data)) {
				$this->Session->setFlash('The dependant type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The dependant type could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('DependentType.' . $this->DependentType->primaryKey => $id));
			$this->request->data = $this->DependentType->find('first', $options);
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
		$this->DependentType->id = $id;
		if (!$this->DependentType->exists()) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		$depend = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->DependentType->save($depend)){
			$this->Session->setFlash('The dependant type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The dependant type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
