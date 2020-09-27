<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 *
 * @method \App\Model\Entity\content[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContentsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if($this->Auth->user('role_id') == 2) {
            
            $this->Auth->allow();
        }elseif($this->Auth->user('role_id') == 1){
            
            $this->Auth->allow(['add']);
        }
       
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $record = $this->Contents->find('all');
        // dd($record->all());
        $this->set(compact('record'));
    }

    /**
     * View method
     *
     * @param string|null $id content id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => [],
        ]);

        $this->set('content', $content);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            // dd($data);
            if(!empty($this->Auth->user())){
                $data['created_by'] = $this->Auth->user('id');
            }
            $content = $this->Contents->patchEntity($content, $data);
            if(!$this->request->is('ajax')){
                if ($this->Contents->save($content)) {
                        $this->Flash->success(__('The content has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    
                }
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }else{
                if ($this->Contents->save($content)) {
                    $code = 200;
                    $message = __('Data berhasil disimpan.');
                    $status = 'success';
                    $data = $content;
                    $session = $this->request->session();
                    $session->write('annul_income',$content);//Write

                    // dd()
                } else {
                    $code = 99;
                    $message = __('Data gagal disimpan. Silahkan, coba lagi.');
                    $status = 'error';
                    $data = null;
                }

                $this->set('code', $code);
                $this->set('message', $message);
                $this->set('data', $data);
                $this->set('_serialize', ['code', 'message','data']);
            }
        }
        $this->set(compact('content'));
    }

    /**
     * Edit method
     *
     * @param string|null $id content id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { 
            $data =  $this->request->getData();
            if(!empty($this->Auth->user())){
                $data['modified_by'] = $this->Auth->user('id');
            }
            $content = $this->Contents->patchEntity($content,$data);
            // if(empty($content->photo)){
            //     unset($content->photo);
            // }
            // dd($content);
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        if(!empty($content->birthdate)){
            $content->birthdate = $content->birthdate->format('d-m-Y');
        }
        $this->set(compact('content'));
    }

    /**
     * Delete method
     *
     * @param string|null $id content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
