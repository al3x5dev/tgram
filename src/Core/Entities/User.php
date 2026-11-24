<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * User Entity
 * @property int $id
 * @property bool $is_bot
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $language_code
 * @property bool $is_premium
 * @property bool $added_to_attachment_menu
 */
class User extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
