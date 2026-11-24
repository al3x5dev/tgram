<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMessageContent Entity
 */
class InputMessageContent extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        if ($this->hasProperty('message_text')) {
            return new InputTextMessageContent($this->properties);
        }
        if ($this->hasProperty('rich_message')) {
            return new InputRichMessageContent($this->properties);
        }
        if ($this->hasProperty('address')) {
            return new InputVenueMessageContent($this->properties);
        }
        if ($this->hasProperty('phone_number')) {
            return new InputContactMessageContent($this->properties);
        }
        if ($this->hasProperty('description')) {
            return new InputInvoiceMessageContent($this->properties);
        }
        if ($this->hasProperty('html')) {
            return new InputWidgetMessageContent($this->properties);
        }
        if ($this->hasProperty('widget_id')) {
            return new InputSharedWidgetMessageContent($this->properties);
        }
        if (
            $this->hasProperty('latitude') &&
            $this->hasProperty('longitude')
        ) {
            return new InputLocationMessageContent($this->properties);
        }
        throw new \InvalidArgumentException('Unknown InputMessageContent');
    }

    /**
     * Factory: creates the correct subclass based on the provided fields
     *
     * @param array $data
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match(true) {
            isset($data['message_text']) => new InputTextMessageContent($data),
            isset($data['rich_message']) => new InputRichMessageContent($data),
            isset($data['address']) => new InputVenueMessageContent($data),
            isset($data['phone_number']) => new InputContactMessageContent($data),
            isset($data['description']) => new InputInvoiceMessageContent($data),
            isset($data['html']) => new InputWidgetMessageContent($data),
            isset($data['widget_id']) => new InputSharedWidgetMessageContent($data),
            isset($data['latitude'], $data['longitude']) => new InputLocationMessageContent($data),
            default => throw new \InvalidArgumentException('Unknown InputMessageContent: no valid property found'),
        };
    }

}
