<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChecklistTasksAdded Entity
 * @property Message $checklist_message
 * @property ChecklistTask[] $tasks
 */
class ChecklistTasksAdded extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'checklist_message' => Message::class,
            'tasks' => [ChecklistTask::class],
        ];
    }
}
