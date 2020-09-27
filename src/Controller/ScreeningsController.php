<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Screenings Controller
 *
 * @property \App\Model\Table\ScreeningsTable $Screenings
 *
 * @method \App\Model\Entity\Screening[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScreeningsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if(!in_array($this->Auth->user('role_id'), [1,2])){
            // dd($this->Auth->user('role_id'));
            return $this->redirect(['controller'=>'Dashboard', 'action'=>'index']);
        }
        // $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $record = $this->Screenings->find('all');
        // dd($record->all());
        $this->set(compact('record'));
    }

    /**
     * View method
     *
     * @param string|null $id Screening id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $screening = $this->Screenings->get($id, [
            'contain' => [],
        ]);

        $this->set('screening', $screening);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $screening = $this->Screenings->newEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $data['birthdate']= date('Y-m-d', strtotime($data['birthdate']));
            // dd($data);
            if(!empty($this->Auth->user())){
                $data['created_by'] = $this->Auth->user('id');
            }
            $screening = $this->Screenings->patchEntity($screening, $data);
            dd($screening);
            if(!$this->request->is('ajax')){
                if ($this->Screenings->save($screening)) {
                        $this->Flash->success(__('The screening has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    
                }
                $this->Flash->error(__('The screening could not be saved. Please, try again.'));
            }else{
                if ($this->Screenings->save($screening)) {
                    $code = 200;
                    $message = __('Data berhasil disimpan.');
                    $status = 'success';
                    $data = $screening;
                    $session = $this->request->session();
                    $session->write('annul_income',$screening);//Write

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
        $this->set(compact('screening'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Screening id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $screening = $this->Screenings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { 
            $data =  $this->request->getData();
            $data['birthdate']= date('Y-m-d', strtotime($data['birthdate']));
            if(!empty($this->Auth->user())){
                $data['modified_by'] = $this->Auth->user('id');
            }
            $screening = $this->Screenings->patchEntity($screening,$data);
            if ($this->Screenings->save($screening)) {
                $this->Flash->success(__('The screening has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The screening could not be saved. Please, try again.'));
        }
        if(!empty($screening->birthdate)){
            $screening->birthdate = $screening->birthdate->format('d-m-Y');
        }
        $this->set(compact('screening'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Screening id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $screening = $this->Screenings->get($id);
        if ($this->Screenings->delete($screening)) {
            $this->Flash->success(__('The screening has been deleted.'));
        } else {
            $this->Flash->error(__('The screening could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
