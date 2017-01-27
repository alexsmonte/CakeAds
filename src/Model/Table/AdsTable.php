<?php
namespace CakeAds\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Filesystem\File;

/**
 * Ads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $Statistics
 *
 * @method \CakeAds\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \CakeAds\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \CakeAds\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Ad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAds\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Ad findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('ckad_ads');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'img' => [
                'fields' => [
                    'dir' => 'path'
                ],
                'path' =>  Configure::read('App.webroot').'{DS}'.Configure::read('App.imageBaseUrl').Configure::read('CakeAds.path'),
                'keepFilesOnDelete' => Configure::read('CakeAds.keepFilesOnDelete'),
                'nameCallback' =>  function(array $data, array $settings) {list( $dirname, $basename, $extension, $filename ) = array_values( pathinfo($data["name"]) ); $file   =   preg_replace("[^a-zA-Z0-9_]", "", strtr($filename, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC-")); return $file.'.'.$extension; }
            ]

        ]);


        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'CakeAds.Categories'
        ]);
        $this->hasMany('Statistics', [
            'foreignKey' => 'ad_id',
            'className' => 'CakeAds.Statistics'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('img');

        $validator
            ->allowEmpty('text');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->integer('clicks')
            ->allowEmpty('clicks');

        $validator
            ->integer('views')
            ->allowEmpty('views');

        $validator
            ->dateTime('start_date')
            ->allowEmpty('start_date');

        $validator
            ->dateTime('end_date')
            ->allowEmpty('end_date');

        return $validator;
    }

    public function sumView($id)
    {
        $ad =   $this->get($id);

        $data["views"]  =   $ad->views+1;

        $adEntity = $this->patchEntity($ad, $data);

        return $this->save($adEntity);
    }

    public function generateAds()
    {

        $ads    =   $this->find("all", ['contain' => ['Categories'], 'conditions' => ['Ads.active' => 1, "SYSDATE() BETWEEN start_date AND end_date"]])->toArray();

        $adsFile    =   [];

        foreach($ads as $ad){

            $banner =   ['id' => $ad->id, 'url' => $ad->url, 'img' => str_replace(Configure::read('App.webroot').'/'.Configure::read('App.imageBaseUrl'), "",$ad->path).$ad->img, 'start' => strtotime($ad->start_date), 'end' => strtotime($ad->end_date)];

            if(!empty($ad->category))
                $adsFile[$ad->category["slug"]][]   =   $banner;
            else
                $adsFile["general"][]  =   $banner;
        }

        $adsFile    =   "<?php return ".var_export($adsFile,true).";";

        $this->saveFile($adsFile);
    }

    public function saveFile($adsFile)
    {
        $file = new File(Configure::read('CakeAds.file'), false, 0777);
        $file->open("w+");
        $file->write($adsFile);
        return $file->close();
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }

    public function afterDelete(Event $event, Entity $entity, \ArrayObject $options)
    {
        $this->generateAds();
    }

    public function afterSave(Event $event, Entity $entity, \ArrayObject $options)
    {
        $this->generateAds();
    }
}
