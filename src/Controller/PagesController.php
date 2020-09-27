<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(...$path)
    {

        $this->viewBuilder()->setLayout('index');
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index(){
        $this->viewBuilder()->setLayout('index');
        $this->set(compact('content'));
    }

    public function result(){
        $this->loadModel('PesanKesehatan');
        $this->viewBuilder()->setLayout('index');
        $session = $this->request->session();
        // dd($session);
        // dd($session->read('annul_income'));
        if (!empty($session->read('annul_income'))) {
            $data = $session->read('annul_income');
            $pesan = $this->PesanKesehatan->find('all')->where(['id'=> $data->status])->first();
            $this->set(compact('pesan'));
            // dd($variable);
            # code...
        }else{

            $this->redirect('/');
        }
        
    }
     public function add()
    {
        $this->loadModel('Screenings');
        $screening = $this->Screenings->newEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $data['birthdate']= date('Y-m-d', strtotime($data['birthdate']));
            // dd($data);
            if(!empty($this->Auth->user())){
                $data['created_by'] = $this->Auth->user('id');
            }
            $screening = $this->Screenings->patchEntity($screening, $data);
            // dd($screening);
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
}
