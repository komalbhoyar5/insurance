<?php
App::uses('AppController', 'Controller');
/**
 * Relationships Controller
 *
 * @property Relationship $Relationship
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelationshipsController extends AppController {

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
		$this->Relationship->recursive = 0;
			$relationships = $this->Relationship->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($relationships);
		// exit();
		$this->set('relationships', $relationships);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
		$this->set('relationship', $this->Relationship->find('first', $options));
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
			$this->request->data['Relationship']['created_by'] = $user_id;
			$this->request->data['Relationship']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Relationship']['company_id'] = $user['User']['company_id'];

			$this->Relationship->create();
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash('The relationship has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The relationship could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid Relationship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Relationship']['id'] = $id;
			$this->request->data['Relationship']['updated_by'] = $user_id;
			$this->request->data['Relationship']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash('The relationship cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The relationship cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
			$this->request->data = $this->Relationship->find('first', $options);
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

		$this->Relationship->id = $id;
		if (!$this->Relationship->exists()) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		// $this->request->allowMethod('post', 'delete');
		$relationship = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Relationship->save($relationship)) {
			$this->Session->setFlash(__('The relationship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The relationship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
