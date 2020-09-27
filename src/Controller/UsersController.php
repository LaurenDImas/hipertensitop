<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if(!empty($this->Auth->user())){
            if(!in_array($this->Auth->user('role_id'), [1])){
                // dd($this->Auth->user('role_id'));
                return $this->redirect(['controller'=>'Dashboard', 'action'=>'index']);
            }
        }else{
            $this->Auth->allow(['logout','login']);
        }
    }

    public function welcome()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function index()
    {
        $record = $this->Users->find('all',['contain'=>'Roles']);
        $this->set(compact('record'));
    }


    public function view($id)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set(compact('user'));
    }

    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['created_by'] = $this->Auth->user('id');  
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $data);
            // dd($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        // dd($this->Auth->user());
        if (empty($this->Auth->user())) {
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                // dd($user);
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }else{
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect('/webadminpjpd');
    }
     public function delete($id = null)
    {
        // dd($id);
        // $this->request->allowMethod([ 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}