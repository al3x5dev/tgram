<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotFullInfo Entity
 * @property int $id
 * @property bool $is_bot
 * @property string $first_name
 * @property string $username
 * @property array $active_usernames
 * @property bool $can_join_groups
 * @property bool $can_read_all_group_messages
 * @property bool $supports_guest_queries
 * @property bool $supports_inline_queries
 * @property string $inline_query_placeholder
 * @property bool $needs_inline_query_location
 * @property bool $can_connect_to_business
 * @property bool $has_main_web_app
 * @property bool $has_topics_enabled
 * @property bool $allows_users_to_create_topics
 * @property bool $has_topic_sidebar
 * @property bool $can_manage_bots
 * @property bool $supports_join_request_queries
 */
class BotFullInfo extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
