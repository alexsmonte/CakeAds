<?php
namespace CakeAds\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statistics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ads
 *
 * @method \CakeAds\Model\Entity\Statistic get($primaryKey, $options = [])
 * @method \CakeAds\Model\Entity\Statistic newEntity($data = null, array $options = [])
 * @method \CakeAds\Model\Entity\Statistic[] newEntities(array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Statistic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAds\Model\Entity\Statistic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Statistic[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Statistic findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatisticsTable extends Table
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

        $this->table('ckad_statistics');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ads', [
            'foreignKey' => 'ad_id',
            'joinType' => 'INNER',
            'className' => 'CakeAds.Ads'
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
            ->allowEmpty('ip_address');

        return $validator;
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
        $rules->add($rules->existsIn(['ad_id'], 'Ads'));

        return $rules;
    }
}
