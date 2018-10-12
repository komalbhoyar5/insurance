<?php
App::uses('AppController', 'Controller');
/**
 * DocumentChecklists Controller
 *
 * @property DocumentChecklist $DocumentChecklist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DocumentChecklistsController extends AppController {

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
		$this->DocumentChecklist->recursive = 0;
		$doc_check = $this->DocumentChecklist->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('documentChecklists', $doc_check);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DocumentChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		$options = array('conditions' => array('DocumentChecklist.' . $this->DocumentChecklist->primaryKey => $id));
		$this->set('documentChecklist', $this->DocumentChecklist->find('first', $options));
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
			$this->request->data['DocumentChecklist']['created_by'] = $user_id;
			$this->request->data['DocumentChecklist']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['DocumentChecklist']['company_id'] = $user['User']['company_id'];

			$this->DocumentChecklist->create();
			if ($this->DocumentChecklist->save($this->request->data)) {
				$this->Session->setFlash('The document checklist has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The document checklist could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->DocumentChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['DocumentChecklist']['id'] = $id;
			$this->request->data['DocumentChecklist']['updated_by'] = $user_id;
			$this->request->data['DocumentChecklist']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->DocumentChecklist->save($this->request->data)) {
				$this->Session->setFlash('The document checklist has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The document checklist could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('DocumentChecklist.' . $this->DocumentChecklist->primaryKey => $id));
			$this->request->data = $this->DocumentChecklist->find('first', $options);
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
		$this->DocumentChecklist->id = $id;
		if (!$this->DocumentChecklist->exists()) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		// $this->request->allowMethod('post', 'delete');
		$docarray = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->DocumentChecklist->save($docarray)){
			$this->Session->setFlash('The document checklist has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The document checklist could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
