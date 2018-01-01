<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 *
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembershipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $memberships = $this->paginate($this->Memberships);

        $this->set(compact('memberships'));
    }

    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);

        $this->set('membership', $membership);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $this->set(compact('membership'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $this->set(compact('membership'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
