<?php
class GamesController extends AppController {

	var $name = 'Games';
	var $helpers = array('Html', 'Form' , 'Ajax', 'Javascript');
        var $components = array('Acl');

	function index() {
		$this->Game->recursive = 0;
		$this->set('games', $this->Game->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Game.');
			$this->redirect('/games/index');
		}
		$this->set('game', $this->Game->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Game->save($this->data)) {
				$this->Session->setFlash('The Game has been saved');
				$this->redirect('/games/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Game');
				$this->redirect('/games/index');
			}
			$this->data = $this->Game->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Game->save($this->data)) {
				$this->Session->setFlash('The Game has been saved');
				$this->redirect('/games/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Game');
			$this->redirect('/games/index');
		}
		if ($this->Game->del($id)) {
			$this->Session->setFlash('The Game deleted: id '.$id.'');
			$this->redirect('/games/index');
		}
	}


	function admin_index() {
		$this->Game->recursive = 0;
		$this->set('games', $this->Game->findAll());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Game.');
			$this->redirect('/admin/games/index');
		}
		$this->set('game', $this->Game->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Game->save($this->data)) {
				$this->Session->setFlash('The Game has been saved');
				$this->redirect('/admin/games/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Game');
				$this->redirect('/admin/games/index');
			}
			$this->data = $this->Game->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Game->save($this->data)) {
				$this->Session->setFlash('The Game has been saved');
				$this->redirect('/admin/games/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Game');
			$this->redirect('/admin/games/index');
		}
		if ($this->Game->del($id)) {
			$this->Session->setFlash('The Game deleted: id '.$id.'');
			$this->redirect('/admin/games/index');
		}
	}

}
?>