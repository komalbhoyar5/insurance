<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'Cookie',
		'Session',
		// 'Acl',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'dashboard',
				'action' => 'index'
			),

			'logoutRedirect' => array(
				'controller' => 'users',
				'action' => 'login'
			),

			'authError' => 'Access Denied',
			
			'authorize' => array('Controller'),
			'loginError' => 'Invalid Username or Password entered, please try again.',
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email')
				)
			)
		)
	);

	public function isAuthorized($user) {
		$group = array();
		$childlist = array();
		$user_group = $user['group_id'];
		if ($this->params['action'] == 'index') {
			$actionUrl = $this->params['controller'];
		}else{
			$actionUrl = $this->params['controller'] .'/'. $this->params['action'];
		}
		$this->set('actionUrl', $actionUrl);
		$this->loadModel('Permission');
		$this->Permission->recursive =2;
		$perm = $this->Permission->find('first', array('conditions' => array('Permission.page_action'=> $actionUrl)));
		// Get childs only which is allowed
			foreach ($perm['Child'] as $childs) {
				// print_r(array_column($childs['Group'], 'id'));
				if (in_array($user_group, array_column($childs['Group'], 'id'))) {
					$childlist[] = $childs;
				}
			}
		$this->set('childs', $childlist);
		// set page title
			if ($perm['Parent']['page_action'] == '#' || $perm['Parent']['page_action'] == "") {
				$pagetitlelink = $this->webroot . $perm['Permission']['page_action'];
				// $parenttitle = $perm['Permission']['page_name'];
			}else{
				$pagetitlelink = $this->webroot . $perm['Parent']['page_action'];
				$parenttitle = $perm['Parent']['page_name'];
				$this->set('parenttitle', $parenttitle);
			}
			$this->set('pagetitlelink', $pagetitlelink);
		// set permission
			if (!empty($perm)) {
				foreach ($perm['Group'] as $groups) {
					$group[] = $groups['id'];
					if ($groups['id'] == $user_group) {
						$this->set('title', $perm['Permission']['page_name']);
					}
				}
			}
			if (in_array($user_group, $group)) {
				return true;
			}else{
				throw new NotFoundException(__('Your do not have permission to access this page.'));
			}
	}

	public function beforeFilter() {
		// get list of sidebar
		$user_group_id = $this->Auth->user('group_id');
		if ($user_group_id !="") {
			$this->loadModel('Permission');
			$this->loadModel('Group');
			$perm = $this->Permission->Query('SELECT Permission.* FROM permissions AS Permission 
											LEFT JOIN groups_permissions as jointable 
											ON (Permission.id = jointable.permission_id)
											LEFT JOIN groups ON (groups.id = jointable.group_id)
											WHERE groups.id = 
											'. $user_group_id .' ORDER BY Permission.id');
			$trees = $this->buildTree($perm);
			// echo "<pre>";
			// print_r($trees);
			// exit();
			$this->set('perm', $trees);
		}

		$this->Auth->allow('login','logout');
	}

	public function user_group(){
		$this->loadModel('Group');
		$group = $this->Group->find('all');
		$options = Set::combine($group, '{n}.Group.id', '{n}.Group.name');
		return $options;
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

}