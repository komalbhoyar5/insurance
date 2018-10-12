<?php
App::uses('AppController', 'Controller');
/**
 * FuneralParlors Controller
 *
 * @property FuneralParlor $FuneralParlor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FuneralParlorsController extends AppController {

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
		$this->FuneralParlor->recursive = 0;
		$funeralParlors = $this->FuneralParlor->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('funeralParlors', $funeralParlors);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FuneralParlor->exists($id)) {
			throw new NotFoundException(__('Invalid funeral parlor'));
		}
		$options = array('conditions' => array('FuneralParlor.' . $this->FuneralParlor->primaryKey => $id));
		$this->set('funeralParlor', $this->FuneralParlor->find('first', $options));
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
			$this->request->data['FuneralParlor']['created_by'] = $user_id;
			$this->request->data['FuneralParlor']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['FuneralParlor']['company_id'] = $user['User']['company_id'];

			$this->FuneralParlor->create();
			if ($this->FuneralParlor->save($this->request->data)) {
				$this->Session->setFlash('The funeral parlor has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The funeral parlor could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->FuneralParlor->exists($id)) {
			throw new NotFoundException(__('Invalid funeral parlor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['FuneralParlor']['id'] = $id;
			$this->request->data['FuneralParlor']['updated_by'] = $user_id;
			$this->request->data['FuneralParlor']['updated_date'] = date('Y-m-d H:i:s');

			if ($this->FuneralParlor->save($this->request->data)) {
				$this->Session->setFlash('The funeral parlor has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The funeral parlor could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('FuneralParlor.' . $this->FuneralParlor->primaryKey => $id));
			$this->request->data = $this->FuneralParlor->find('first', $options);
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
		$this->FuneralParlor->id = $id;
		if (!$this->FuneralParlor->exists()) {
			throw new NotFoundException(__('Invalid funeral parlor'));
		}
		// $this->request->allowMethod('post', 'delete');
		$funeral = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->FuneralParlor->save($funeral)){
			$this->Session->setFlash('The funeral parlor has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The funeral parlor could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
