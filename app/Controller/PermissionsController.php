<?php
App::uses('AppController', 'Controller');
/**
 * Permissions Controller
 *
 * @property Permission $Permission
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PermissionsController extends AppController {

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
		$this->layout = "backend_template";
		$permission = $this->createPermissiontreeView();
		$this->set('permissions', $permission);
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
		if (!$this->Permission->exists($id)) {
			throw new NotFoundException(__('Invalid permission'));
		}
		$options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
		$this->set('permission', $this->Permission->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			// print_r($this->request->data);
			// exit();
			$this->Permission->create();
			if ($this->request->data['Permission']['parent_id'] == NULL) {
				$this->request->data['Permission']['parent_id'] = 0;
			}
			if ($this->Permission->save($this->request->data)) {
				$this->Session->setFlash('The role permission has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The role permission could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$groups = $this->Permission->Group->find('list');
		$this->set(compact('groups'));
		$parents = $this->createPermissiondropdownList();
		$this->set('parents', $parents);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "backend_template";
		if (!$this->Permission->exists($id)) {
			throw new NotFoundException(__('Invalid permission'));
		}
		if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Permission']['id'] = $id;
			if ($this->request->data['Permission']['parent_id'] == NULL) {
				$this->request->data['Permission']['parent_id'] = 0;
			}
			if ($this->Permission->save($this->request->data)) {
				$this->Session->setFlash('The role permission has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The role permission could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
			$this->request->data = $this->Permission->find('first', $options);
		}
		$groups = $this->Permission->Group->find('list');
		$this->set(compact('groups'));
		$parents = $this->createPermissiondropdownList();
		$this->set('parents', $parents);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Permission->id = $id;
		if (!$this->Permission->exists()) {
			throw new NotFoundException(__('Invalid permission'));
		}
		// $this->request->allowMethod(	'post', 'delete');
		if ($this->Permission->delete()) {
			$this->Session->setFlash('The role permission has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The role permission could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}

	function fetchModuleTree() {
		$this->Permission->recursive = -1;
		$allChildren = $this->Permission->find('all');
		$cat = $this->buildTree($allChildren);
		echo "<pre>";
		print_r($cat);
		exit();
		return $cat;
	}

	function buildTree($items) {
    	$childs = array();

	    foreach($items as &$item) $childs[$item['Permission']['parent_id']][] = &$item;
	    unset($item);

	    foreach($items as &$item) if (isset($childs[$item['Permission']['id']]))
	            $item['childs'] = $childs[$item['Permission']['id']];
	    if (!empty($childs[0])) {
	    	return $childs[0];
	    }else{
	    	return $childs;
	    }
	}

	function createPermissiondropdownList($parent = 0, $spacing = '', $user_tree_array = '') {

	  if (!is_array($user_tree_array))
	    $user_tree_array = array();

	  $sql = "SELECT * FROM permissions  WHERE parent_id = $parent ORDER BY id ASC";
	  $data = $this->Permission->query($sql);
	  if (count($data) > 0) {
	    foreach ($data as $cat) {
	      $user_tree_array[$cat['permissions']['id']] = " ".$spacing ." ". $cat['permissions']['page_name'];
	      $user_tree_array = $this->createPermissiondropdownList($cat['permissions']['id'], $spacing . ' -- ', $user_tree_array);
	    }
	  }
	  return $user_tree_array;
	}

	function createPermissiontreeView($parent = 0, $spacing = '', $user_tree_array = '') {
	  if (!is_array($user_tree_array))
	    $user_tree_array = array();
		$data = $this->Permission->find('all', array('conditions'=>array('Permission.parent_id'=>$parent),

														'order' => 'Permission.id ASC'

												));
	  if (count($data) > 0) {
	    foreach ($data as $cat) {
	    	$cat['Permission']['page_name'] = " ".$spacing ." ". $cat['Permission']['page_name'];
	      $user_tree_array[] = $cat;
	      $user_tree_array = $this->createPermissiontreeView($cat['Permission']['id'], $spacing . ' -- ', $user_tree_array);
	    }
	  }
	  return $user_tree_array;
	}
}
