<?php
App::uses('AppController', 'Controller');
/**
 * Schemes Controller
 *
 * @property Scheme $Scheme
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SchemesController extends AppController {

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
		$this->Scheme->recursive = 0;
		$this->set('schemes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Scheme->exists($id)) {
			throw new NotFoundException(__('Invalid scheme'));
		}
		$options = array('conditions' => array('Scheme.' . $this->Scheme->primaryKey => $id));
		$this->set('scheme', $this->Scheme->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Scheme->create();
			if ($this->Scheme->save($this->request->data)) {
				$this->Session->setFlash(__('The scheme has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scheme could not be saved. Please, try again.'));
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
		if (!$this->Scheme->exists($id)) {
			throw new NotFoundException(__('Invalid scheme'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Scheme']['id'] = $id;
			if ($this->Scheme->save($this->request->data)) {
				$this->Session->setFlash(__('The scheme has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scheme could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Scheme.' . $this->Scheme->primaryKey => $id));
			$this->request->data = $this->Scheme->find('first', $options);
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
		$this->Scheme->id = $id;
		if (!$this->Scheme->exists()) {
			throw new NotFoundException(__('Invalid scheme'));
		}
		if ($this->Scheme->delete()) {
			$this->Session->setFlash(__('The scheme has been deleted.'));
		} else {
			$this->Session->setFlash(__('The scheme could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
