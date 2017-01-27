<?php
namespace CakeAds\Controller;

use CakeAds\Controller\AppController;
use Cake\Core\Configure;

/**
 * Ads Controller
 *
 * @property \CakeAds\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $ads = $this->paginate($this->Ads);


        $title  =   "My ads";
        $adType =   Configure::read('CakeAds.type');
        $this->set(compact('ads', 'adType','title'));
        $this->set('_serialize', ['ads']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['Categories', 'Statistics']
        ]);

        $title  =   "Details";
        $adType =   Configure::read('CakeAds.type');
        $this->set(compact('ad', 'adType','title'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {

            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index', 'plugin' => 'CakeAds']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }

        $title  =   "Details";
        $adType =   Configure::read('CakeAds.type');
        $categories = $this->Ads->Categories->find('list');
        $this->set(compact('ad', 'categories','adType','title'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index', 'plugin' => 'CakeAds']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }

        $title  =   "Details";
        $adType =   Configure::read('CakeAds.type');
        $categories = $this->Ads->Categories->find('list');
        $this->set(compact('ad', 'categories', 'adType','title'));
        $this->set('_serialize', ['ad']);
    }

    public function l()
    {
        $ad_key =   $this->request->query("k");
        $queryAds   =   $this->Ads->find("all",['conditions' => ['ad_key'=> $ad_key]]);
        $data   =   $queryAds->first();

        $this->Ads->sumClick($data->id);

        return $this->redirect($this->request->query("r"));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('The ad has been deleted.'));
        } else {
            $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', 'plugin' => 'CakeAds']);
    }
}
