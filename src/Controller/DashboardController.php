<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class DashboardController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // $this->Auth->allow(['index']);
    }

    public function index()
    {
        $this->loadModel('PesanKesehatan');
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $save = [];
            foreach ($data['kode'] as $key => $value) {

                $register  = $this->PesanKesehatan->find('all',[
                    'conditions'=>[
                       'PesanKesehatan.kode' => $data['kode'][$key]
                    ],
                ])->first();
                if(!empty($register)){
                    $pesan = $this->PesanKesehatan->get($register->id);
                }else{
                    // echo'1'
                    $pesan = $this->PesanKesehatan->newEntity();
                }
                $save['kondisi']    = $data['kondisi'][$key];
                $save['cop']        = $data['cop'][$key];
                $save['pesan']      = $data['pesan'][$key];
                $pesan = $this->PesanKesehatan->patchEntity($pesan,$save);
                // dd($pesan);
                $this->PesanKesehatan->save($pesan);
            }
            return $this->redirect(['action' => 'index']);   

        }
    	$screening = $this->PesanKesehatan->find('all');
        $this->set(compact('screening'));
    }

}