<?php
App::uses('AppController', 'Controller');
/**
 * Collectionmodes Controller
 *
 * @property Collectionmode $Collectionmode
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CollectionmodesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
	}
	public function isAuthorized($user) {
		parent::isAuthorized($user);
		return true;
	}
/**
 * Components
 *
 * @var array
 */
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "backend_template";
		$this->Collectionmode->recursive = 0;
		$collection = $this->Collectionmode->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('collectionmodes', $collection);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "backend_template";
		if (!$this->Collectionmode->exists($id)) {
			throw new NotFoundException(__('Invalid collectionmode'));
		}
		$options = array('conditions' => array('Collectionmode.' . $this->Collectionmode->primaryKey => $id));
		$this->set('collectionmode', $this->Collectionmode->find('first', $options));
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

		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$this->Collectionmode->create();
			$this->request->data['Collectionmode']['created_by'] = $user_id;
			$this->request->data['Collectionmode']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Collectionmode']['company_id'] = $user['User']['company_id'];

			if ($this->Collectionmode->save($this->request->data)) {
				$this->Session->setFlash('The collection mode has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The collection mode could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Collectionmode->exists($id)) {
			throw new NotFoundException(__('Invalid collectionmode'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Collectionmode']['id'] = $id;
			$this->request->data['Collectionmode']['updated_by'] = $user_id;
			$this->request->data['Collectionmode']['updated_date'] = date('Y-m-d H:i:s');
			
			if ($this->Collectionmode->save($this->request->data)) {
				$this->Session->setFlash('The collectionmode has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The collectionmode could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Collectionmode.' . $this->Collectionmode->primaryKey => $id));
			$this->request->data = $this->Collectionmode->find('first', $options);
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
		$this->Collectionmode->id = $id;
		if (!$this->Collectionmode->exists()) {
			throw new NotFoundException(__('Invalid collectionmode'));
		}
		// $this->request->allowMethod('post', 'delete');
		$collection = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Collectionmode->save($collection)) {
			$this->Session->setFlash('The collectionmode has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The collectionmode could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
