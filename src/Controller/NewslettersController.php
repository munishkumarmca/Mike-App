<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\NewslettersTable $Newsletters
 *
 * @method \App\Model\Entity\Newsletter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewslettersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Attachments']
        ];
        $newsletters = $this->paginate($this->Newsletters);

        $this->set(compact('newsletters'));
    }

    /**
     * View method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => ['Users', 'Attachments']
        ]);

        $this->set('newsletter', $newsletter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
        }
        $users = $this->Newsletters->Users->find('list', ['limit' => 200]);
        $attachments = $this->Newsletters->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('newsletter', 'users', 'attachments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
        }
        $users = $this->Newsletters->Users->find('list', ['limit' => 200]);
        $attachments = $this->Newsletters->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('newsletter', 'users', 'attachments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('The newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
