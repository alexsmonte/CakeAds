<?php
namespace CakeAds\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Cake\Utility\Inflector;
use Cake\ORM\Entity;
use Cake\Event\Event;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentCategories
 * @property \Cake\ORM\Association\HasMany $Ads
 * @property \Cake\ORM\Association\HasMany $ChildCategories
 * @property \Cake\ORM\Association\HasMany $CknCategoriesPosts
 *
 * @method \CakeAds\Model\Entity\Category get($primaryKey, $options = [])
 * @method \CakeAds\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \CakeAds\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAds\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAds\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class CategoriesTable extends Table
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

        $this->table('ckad_categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentCategories', [
            'className' => 'CakeAds.Categories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'category_id',
            'className' => 'CakeAds.Ads'
        ]);
        $this->hasMany('ChildCategories', [
            'className' => 'CakeAds.Categories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('CknCategoriesPosts', [
            'foreignKey' => 'category_id',
            'className' => 'CakeAds.CknCategoriesPosts'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentCategories'));

        return $rules;
    }

    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        $data['slug'] = mb_strtolower(Text::slug($data['name']));
    }
}
