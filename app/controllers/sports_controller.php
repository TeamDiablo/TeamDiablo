<?php
class SportsController extends AppController {

	var $name = 'Sports';
	var $helpers = array('Html', 'Form' , 'Ajax', 'Javascript');
	var $components = array('Acl');

	function index() {
		$this->Sport->recursive = 0;
		$this->set('sports', $this->Sport->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Sport.');
			$this->redirect('/sports/index');
		}
		$this->set('sport', $this->Sport->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Sport->save($this->data)) {
				$this->Session->setFlash('The Sport has been saved');
				$this->redirect('/sports/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Sport');
				$this->redirect('/sports/index');
			}
			$this->data = $this->Sport->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Sport->save($this->data)) {
				$this->Session->setFlash('The Sport has been saved');
				$this->redirect('/sports/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Sport');
			$this->redirect('/sports/index');
		}
		if ($this->Sport->del($id)) {
			$this->Session->setFlash('The Sport deleted: id '.$id.'');
			$this->redirect('/sports/index');
		}
	}


	function admin_index() {
		$this->Sport->recursive = 0;
		$this->set('sports', $this->Sport->findAll());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Sport.');
			$this->redirect('/admin/sports/index');
		}
		$this->set('sport', $this->Sport->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Sport->save($this->data)) {
				$this->Session->setFlash('The Sport has been saved');
				$this->redirect('/admin/sports/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Sport');
				$this->redirect('/admin/sports/index');
			}
			$this->data = $this->Sport->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Sport->save($this->data)) {
				$this->Session->setFlash('The Sport has been saved');
				$this->redirect('/admin/sports/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Sport');
			$this->redirect('/admin/sports/index');
		}
		if ($this->Sport->del($id)) {
			$this->Session->setFlash('The Sport deleted: id '.$id.'');
			$this->redirect('/admin/sports/index');
		}
	}

}
?>