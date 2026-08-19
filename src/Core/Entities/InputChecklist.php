<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputChecklist Entity
 * @property string $title
 * @property string $parse_mode
 * @property MessageEntity[] $title_entities
 * @property InputChecklistTask[] $tasks
 * @property bool $others_can_add_tasks
 * @property bool $others_can_mark_tasks_as_done
 */
class InputChecklist extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'title_entities' => [MessageEntity::class],
            'tasks' => [InputChecklistTask::class],
        ];
    }
}
