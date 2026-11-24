<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TonWalletCardSticker Entity
 * @property AreaPosition $position
 * @property TonNft $nft
 */
class TonWalletCardSticker extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'position' => AreaPosition::class,
            'nft' => TonNft::class,
        ];
    }
}
