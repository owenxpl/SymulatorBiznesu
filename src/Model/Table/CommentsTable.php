<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        // Just add the belongsTo relation with CategoriesTable
        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
        ]);
        // $this->belongsTo('Users', [
        //     'foreignKey' => 'user_id',
        // ]);
    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('comment')
            ->requirePresence('comment', 'create');
        return $validator;
    }
}
