<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $uses = array('User', 'Game');
	var $helpers = array('Html', 'Form' , 'Ajax', 'Javascript');
	var $components = array('Acl');

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->User->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User.');
			$this->redirect('/users/index');
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect('/users/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for User');
				$this->redirect('/users/index');
			}
			$this->data = $this->User->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect('/users/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect('/users/index');
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash('The User deleted: id '.$id.'');
			$this->redirect('/users/index');
		}
	}


	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->User->findAll());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User.');
			$this->redirect('/admin/users/index');
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect('/admin/users/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for User');
				$this->redirect('/admin/users/index');
			}
			$this->data = $this->User->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect('/admin/users/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect('/admin/users/index');
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash('The User deleted: id '.$id.'');
			$this->redirect('/admin/users/index');
		}
	}
        function login(){
		//– code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
		// debug($this->data);
		if (array_key_exists('author', $this->params['url'])) {
			/*
				Setting the data array autofills the login form when the author goes to the generated link.
				Currently, this method of following the link and just clicking "Login" will not work if the
				password is not set the same as the username upon creation. This is because it is not possible
				to unhash a password. The 'password' field in the generated URL is the hashed version,
				and using the hashed version in the login form then clicking Login will doubly-hash it, resulting
				in the incorrect password. A way around this is to not autofill the password field in the form
				below, and to tell the author what his/her password is, making him/her type it in manually.
			*/
			$this->data['User']['username'] = $this->params['url']['username'];
			$this->data['User']['password'] = $this->params['url']['username'];
			if ($this->Auth->user()) {
				// echo "hello";
				if (!empty($this->data)) {
					$cookie = array();
					$cookie['username'] = $this->data['User']['username'];
					$cookie['password'] = $this->data['User']['password'];
					$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
				}
				$this->redirect(array('controller' => 'studies', 'action' => 'overview', $this->params['url']['study_id']));
			} else  {echo "no";}
		} else {
			if ($this->Auth->user()) {
				$user = $this->User->find('first', array('conditions' => array('User.username' => $this->data['User']['username'])));
				$user['User']['last_login'] = date('Y-m-d H:i:s');
				$this->User->id = $user['User']['id'];
				$this->data['User']['last_login'] = date('Y-m-d H:i:s');
				$this->User->save($this->data);
				if (!empty($this->data)) {
					if ($this->data['User']['remember_me']) {
						$cookie = array();
						$cookie['username'] = $this->data['User']['username'];
						$cookie['password'] = $this->data['User']['password'];
						$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
						unset($this->data['User']['remember_me']);

					}
					$user = $this->User->find('first', array('conditions' => array('User.password' => $this->data['User']['password'])));
				}

				if ($user['User']['study_id'] != 0) {
					$this->redirect(array('controller' => 'studies', 'action' => 'overview', $user['User']['study_id']));
				} else {
					$this->redirect($this->Auth->redirect());
				}
			}
				
			if (empty($this->data)) {
				$cookie = $this->Cookie->read('Auth.User');
				// debug($cookie);
				if (!is_null($cookie)) {
					if ($this->Auth->login($cookie)) {
						// Clear auth message, just in case we use it.
						$this->Session->del('Message.auth');
						$this->redirect($this->Auth->redirect());
					} else { // Delete invalid Cookie
						$this->Cookie->del('Auth.User');
					}
				}
			}
		}
	}

	function logout() {
		$this->Cookie->del('Auth.User');
		$this->Session->setFlash('You have logged out.');
		$this->redirect($this->Auth->logout());
	}

	function register() {
		if (!empty($this->data)) {
			if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
				$this->User->create();
				$this->User->save($this->data);
				$this->Session->setFlash('You have successfully registered.');
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash('Your passwords do not match.');
				$this->redirect(array('action' => 'register'));
			}
		}
	}


}
?>