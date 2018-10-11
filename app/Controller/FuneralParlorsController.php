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
		$this->set('funeralParlors', $this->Paginator->paginate());
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
		if ($this->request->is('post')) {
			$this->FuneralParlor->create();
			if ($this->FuneralParlor->save($this->request->data)) {
				$this->Session->setFlash('The funeral parlor has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
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
		if (!$this->FuneralParlor->exists($id)) {
			throw new NotFoundException(__('Invalid funeral parlor'));
		}
		if ($this->request->is(array('post', 'put'))) {
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
		$this->FuneralParlor->id = $id;
		if (!$this->FuneralParlor->exists()) {
			throw new NotFoundException(__('Invalid funeral parlor'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->FuneralParlor->delete()) {
			$this->Session->setFlash('The funeral parlor has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The funeral parlor could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
