<?php
App::uses('AppController', 'Controller');
/**
 * Collectioncycles Controller
 *
 * @property Collectioncycle $Collectioncycle
 * @property PaginatorComponent $Paginator
 * @property nComponent $n
 * @property SessionComponent $Session
 */
class CollectioncyclesController extends AppController {
	public $user = array();
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "backend_template";
		$this->Collectioncycle->recursive = 0;
		$collection = $this->Collectioncycle->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('collectioncycles', $collection);
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
		if (!$this->Collectioncycle->exists($id)) {
			throw new NotFoundException(__('Invalid collectioncycle'));
		}
		$options = array('conditions' => array('Collectioncycle.' . $this->Collectioncycle->primaryKey => $id));
		$this->set('collectioncycle', $this->Collectioncycle->find('first', $options));
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
			
			$this->Collectioncycle->create();
			$this->request->data['Collectioncycle']['created_by'] = $user_id;
			$this->request->data['Collectioncycle']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Collectioncycle']['company_id'] = $user['User']['company_id'];
			if ($this->Collectioncycle->save($this->request->data)) {
				// $continue = array(
			 //        'text' => "Collection cycle saved successfully! Do you want to add another collection cycle?",
			 //        'ok' => 'collectioncycle/add',
			 //        'cancel' => 'collectioncycle'
			 //    );

			 //    $this->set('continue', $continue);
				$this->Session->setFlash('The collection cycle has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The collection cycle could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Collectioncycle->exists($id)) {
			throw new NotFoundException(__('Invalid collectioncycle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Collectioncycle']['id'] = $id;
			$this->request->data['Collectioncycle']['updated_by'] = $user_id;
			$this->request->data['Collectioncycle']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Collectioncycle->save($this->request->data)) {
				$this->Session->setFlash('The collection cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The collection cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Collectioncycle.' . $this->Collectioncycle->primaryKey => $id));
			$this->request->data = $this->Collectioncycle->find('first', $options);
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
		// $this->Collectioncycle->id = $id;
		if (!$this->Collectioncycle->exists($id)) {
			throw new NotFoundException(__('Invalid collectioncycle'));
		}
		// $this->request->allowMethod('post', 'delete');
		// if ($this->Collectioncycle->delete()) {
		$collection = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->Collectioncycle->save($collection)){
			$this->Session->setFlash('The collection cycle has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The collection cycle could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
