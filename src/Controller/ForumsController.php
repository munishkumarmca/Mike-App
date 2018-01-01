<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Forums Controller
 *
 * @property \App\Model\Table\ForumsTable $Forums
 *
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $forums = $this->paginate($this->Forums);

        $this->set(compact('forums'));
    }

    /**
     * View method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => ['Users', 'Comments']
        ]);

        $this->set('forum', $forum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forum = $this->Forums->newEntity();
        if ($this->request->is('post')) {
            $forum = $this->Forums->patchEntity($forum, $this->request->getData());
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum could not be saved. Please, try again.'));
        }
        $users = $this->Forums->Users->find('list', ['limit' => 200]);
        $this->set(compact('forum', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forum = $this->Forums->patchEntity($forum, $this->request->getData());
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum could not be saved. Please, try again.'));
        }
        $users = $this->Forums->Users->find('list', ['limit' => 200]);
        $this->set(compact('forum', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);
        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('The forum has been deleted.'));
        } else {
            $this->Flash->error(__('The forum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
