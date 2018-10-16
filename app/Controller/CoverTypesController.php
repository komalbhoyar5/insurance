<?php
App::uses('AppController', 'Controller');
/**
 * CoverTypes Controller
 *
 * @property CoverType $CoverType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoverTypesController extends AppController {

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
		$this->CoverType->recursive = 0;
		$this->set('coverTypes', $this->Paginator->paginate());
		$cover = $this->CoverType->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('coverTypes', $cover);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoverType->exists($id)) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		$options = array('conditions' => array('CoverType.' . $this->CoverType->primaryKey => $id));
		$this->set('coverType', $this->CoverType->find('first', $options));
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
			$this->request->data['CoverType']['created_by'] = $user_id;
			$this->request->data['CoverType']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['CoverType']['company_id'] = $user['User']['company_id'];
			$this->CoverType->create();
			if ($this->CoverType->save($this->request->data)) {
				$this->Session->setFlash('The cover type has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The cover type could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->CoverType->exists($id)) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['CoverType']['id'] = $id;
			$this->request->data['CoverType']['updated_by'] = $user_id;
			$this->request->data['CoverType']['updated_date'] = date('Y-m-d H:i:s');

			if ($this->CoverType->save($this->request->data)) {
				$this->Session->setFlash('The cover type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The cover type could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('CoverType.' . $this->CoverType->primaryKey => $id));
			$this->request->data = $this->CoverType->find('first', $options);
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
		$this->CoverType->id = $id;
		if (!$this->CoverType->exists()) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		// $this->request->allowMethod('post', 'delete');
		$cover = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->CoverType->save($cover)){
			$this->Session->setFlash('The cover type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The cover type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
