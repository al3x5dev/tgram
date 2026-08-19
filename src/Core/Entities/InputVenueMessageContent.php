<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputVenueMessageContent Entity
 * @property float $latitude
 * @property float $longitude
 * @property string $title
 * @property string $address
 * @property string $foursquare_id
 * @property string $foursquare_type
 * @property string $google_place_id
 * @property string $google_place_type
 */
class InputVenueMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
