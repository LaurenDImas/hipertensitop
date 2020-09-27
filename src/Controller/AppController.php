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

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    
    //...
    // public $helpers = [
    //     'DataTables' => [
    //         'className' => 'DataTables.DataTables'
    //     ]
    // ];
    
    public function initialize()
    {
        // parent::initialize();
 
        // $this->loadComponent('DataTables.DataTables');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Utilities');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Dashboard',
                'action' => 'index'
            ],
            // 'logoutRedirect' => [
            //     'controller' => 'Users',
            //     'action' => 'login',

            //     '_name' => 'home'
            // ],
            'unauthorizedRedirect' => [
                'controller' => 'Errors',
                'action' => 'unauthorized',
            ],
            'authError' => 'You are not authorized to access that location.',
            'flash' => [
                'element' => 'error'
            ]
        ]);
         if($this->Auth->user()){
            $this->loadModel('Users');
            $userData = $this->Auth->user();
            if(empty($userData)){
                $userData = [];
                $userId = "";
                $this->userData = [];
                $this->userId = "";
            }
            
            $this->set(compact('userData'));
        }
    }

    public function beforeFilter(Event $event)
    {

        $this->loadModel('Contents');
        $content = $this->Contents->find('all',[
                    'order' => [
                        'Contents.id' => 'DESC'
                    ]
                ])->where(['status'=> 1])->first();
        $this->set(compact('content'));
        // $this->Auth->allow(['add']);
    }


    //...
}
