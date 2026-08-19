<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaVenue Entity
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * @property string $title
 * @property string $address
 * @property string $foursquare_id
 * @property string $foursquare_type
 * @property string $google_place_id
 * @property string $google_place_type
 */
class InputMediaVenue extends InputPollOptionMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
