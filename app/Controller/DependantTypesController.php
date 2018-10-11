<?php
App::uses('AppController', 'Controller');
/**
 * DependantTypes Controller
 *
 * @property DependantType $DependantType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DependantTypesController extends AppController {

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
		$this->DependantType->recursive = 0;
		$this->set('dependantTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DependantType->exists($id)) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		$options = array('conditions' => array('DependantType.' . $this->DependantType->primaryKey => $id));
		$this->set('dependantType', $this->DependantType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DependantType->create();
			if ($this->DependantType->save($this->request->data)) {
				$this->Session->setFlash(__('The dependant type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependant type could not be saved. Please, try again.'));
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
		if (!$this->DependantType->exists($id)) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DependantType->save($this->request->data)) {
				$this->Session->setFlash(__('The dependant type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependant type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DependantType.' . $this->DependantType->primaryKey => $id));
			$this->request->data = $this->DependantType->find('first', $options);
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
		$this->DependantType->id = $id;
		if (!$this->DependantType->exists()) {
			throw new NotFoundException(__('Invalid dependant type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DependantType->delete()) {
			$this->Session->setFlash(__('The dependant type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dependant type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
