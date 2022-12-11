<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $password
 * @property string|null $role
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
{
    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'role' => true,
        'id' => false
    ];
    // ...
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
