<?php
App::uses('AppController', 'Controller');
/**
 * Accueils Controller
 *
 * @property Accueil $Accueil
 * @property PaginatorComponent $Paginator
 */
class AccueilsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');

public function beforeFilter() {   
		
		if($this->is_admin_interface()) {
			$this->Accueil->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		}
		
		parent::beforeFilter();
        // Controller specific beforeFilter       
    }
    
    public function accueil($id=1)
{
		$this->layout="accueil";
		$this->set('professeur', $this->Accueil->Professeur->read(null, $id));

}

	public function display()
{
		$accueil = $this->Accueil->find('first');
		if (empty($accueil)) {
			throw new NotFoundException(__('Accueil Invalide: demander à l\'administrateur de le créer pour vous '));
		}
		$this->layout = 'accueil';
		$this->set(compact('accueil'));
	
}
	public function admin_display()
{
		$accueil = $this->Accueil->find('first');
		if (empty($accueil)) {
			throw new NotFoundException(__('Accueil Invalide: demander à l\'administrateur de le créer pour vous '));
		}
		$this->layout = 'accueil';
		$this->set(compact('accueil'));
	
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		return $this->redirect('/');

		$this->Accueil->recursive = 0;
		$this->set('accueils', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view() {
		
		$accueil = $this->Accueil->find('first');
		if(empty($accueil)) {
			$this->redirect($this->referer());
		}
		
		$id = $accueil['Accueil']['id'];

		if (!$this->Accueil->exists($id)) {
			throw new NotFoundException(__('Invalid accueil'));
		}
		$options = array('conditions' => array('Accueil.' . $this->Accueil->primaryKey => $id));
		$this->set('accueil', $this->Accueil->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		return $this->redirect('/');
		
		if ($this->request->is('post')) {
			$this->Accueil->create();
			if ($this->Accueil->save($this->request->data)) {
				$this->Session->setFlash(__('The accueil has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accueil could not be saved. Please, try again.'), 'flash_error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit() {
		$accueil = $this->Accueil->find('first');
		
		if(empty($accueil)) {
			$accueil = array('title'=>'Titre du site', 'creator'=>$this->Auth->user('id'));
			$this->Accueil->create();
			
			if ($this->Accueil->save($accueil)) {
				$this->Session->setFlash(__('La page d\'accueil a ete creee.'), 'flash_normal');
				$id = $this->Accueil->id;
				//return $this->redirect(array('action' => 'index'));
			} else {
				throw new NotFoundException(__('Accueil Invalide!'));
				$this->Session->setFlash(__('Erreur fatale: La page d\'accueil n\'a pas pu etre creee..'), 'flash_error');
			}

			
		} else {
			$id = $accueil['Accueil']['id'];
		}
		
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Accueil->save($this->request->data)) {
				$this->Session->setFlash(__('The accueil has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accueil could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Accueil.' . $this->Accueil->primaryKey => $id));
			$this->request->data = $this->Accueil->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Accueil->id = $id;
		if (!$this->Accueil->exists()) {
			throw new NotFoundException(__('Invalid accueil'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Accueil->delete()) {
			$this->Session->setFlash(__('The accueil has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The accueil could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
