<?php
// DPI Feedback: Form Validator / User Table
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('voornaam')
            ->maxLength('voornaam', 255)
            ->requirePresence('voornaam', 'create')
            ->notEmptyString('voornaam')

            // DPI Feedback: Voornaam validation (ASCII Alphabet only)
            ->regex('voornaam', '/^[A-Za-z]+$/', 'Error: Voornaam bevat ongeldige tekens');

        $validator
            ->scalar('achternaam')
            ->maxLength('achternaam', 255)
            ->requirePresence('achternaam', 'create')
            ->notEmptyString('achternaam')

            // DPI Feedback: Achternaam validation (ASCII Alphabet only)
            ->regex('achternaam', '/^[A-Za-z]+$/', 'Error: Achternaam bevat ongeldige tekens', 'update');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 6)
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode')
            
            // DPI Feedback: Alleen postcodes 1000-2000 geaccepteerd 
            ->regex('postcode', '/^(1\d{3}|2000)[A-Za-z]{2}$/', "Error: Alleen postcodes 1000-2000 worden geaccepteerd. (postcode moet 2 letters bevatten)");

        return $validator;
    }
}
