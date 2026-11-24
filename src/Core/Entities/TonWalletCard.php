<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TonWalletCard Entity
 * @property string $address
 * @property string $amount
 * @property TonWalletCardSticker[] $stickers
 * @property string $background_nft_address
 */
class TonWalletCard extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'stickers' => [TonWalletCardSticker::class],
        ];
    }
}
