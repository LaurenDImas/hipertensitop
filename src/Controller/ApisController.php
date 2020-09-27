<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\I18n\Time;

use Cake\Datasource\ConnectionManager;
use Cake\Database\Expression\QueryExpression;
use Cake\Http\Client;


class ApisController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        if(php_sapi_name() !== 'cli'){
            $this->Auth->allow();
        }
    }

    public function getScreenings()
    {
        $this->loadModel('Screenings');
        if($this->request->is('ajax')){
           
    		$screening = $this->Screenings->find('all')
				->select([
					'normal' => '(COUNT(CASE WHEN status = 1 THEN 1 END))',
					'normal_tinggi' => '(COUNT(CASE WHEN status = 2 THEN 1 END))',
					'grade_1' => '(COUNT(CASE WHEN status = 3 THEN 1 END))',
					'grade_2' => '(COUNT(CASE WHEN status = 4 THEN 1 END))',
				])->first();
				
            $this->set(compact('screening'));
            $this->set('_serialize',['screening']);
        }
    }
}