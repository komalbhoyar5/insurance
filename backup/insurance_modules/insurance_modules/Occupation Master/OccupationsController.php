<?php
App::uses('AppController', 'Controller');
/**
 * Occupations Controller
 *
 * @property Occupation $Occupation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OccupationsController extends AppController {

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
		$this->Occupation->recursive = 0;
		$this->Occupation->recursive = 0;
			$occupations = $this->Occupation->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($occupations);
		// exit();
		$this->set('occupations', $occupations);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Occupation->exists($id)) {
			throw new NotFoundException(__('Invalid occupation'));
		}
		$options = array('conditions' => array('Occupation.' . $this->Occupation->primaryKey => $id));
		$this->set('occupation', $this->Occupation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add(){
	$continue = array();
		$this->loadmodel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));

		if ($this->request->is('post')) {
			$this->request->data['Occupation']['created_by'] = $user_id;
			$this->request->data['Occupation']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Occupation']['company_id'] = $user['User']['company_id'];

			$this->Occupation->create();
			if ($this->Occupation->save($this->request->data)) {
				$this->Session->setFlash('The occupation has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The occupation could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Occupation->exists($id)) {
			throw new NotFoundException(__('Invalid occupation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Occupation->save($this->request->data)) {
				$this->Session->setFlash(__('The occupation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The occupation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Occupation.' . $this->Occupation->primaryKey => $id));
			$this->request->data = $this->Occupation->find('first', $options);
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

		$this->Occupation->id = $id;
		if (!$this->Occupation->exists()) {
			throw new NotFoundException(__('Invalid occupation'));
		}
		// $this->request->allowMethod('post', 'delete');
		$occupation = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Occupation->save($occupation)) {
			$this->Session->setFlash(__('The occupation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The occupation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}