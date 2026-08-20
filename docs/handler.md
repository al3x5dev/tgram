# Handler System

## What are Telegram handlers?

Handlers process specific types of Telegram updates beyond standard messages and commands. They are designed to manage specialized events that occur in Telegram interactions. While `message` and `callback_query` updates are handled automatically by TGram's command and callback systems, other update types require dedicated handlers.

## Creating handlers

Generate handler scaffolding with:
```bash
php vendor/bin/tgram handler
```

This creates a new handler in `bot/Handlers/`.

## Basic handler structure

```php
namespace Bot\Handlers;

use Mk4U\TGram\Core\Actions\Handlers;

class ChannelPost extends Handlers
{
    public function execute(): void
    {
        $post  = $this->update->channel_post;
        $chatId = $post->chat->id;

        $this->sendMessage($chatId, 'New channel post: ' . $post->text);
    }
}
```

## InlineQuery Handler Example

The InlineQuery handler allows your bot to respond to inline queries. Users can search for content directly in any chat by typing `@yourbot query`.

```php
namespace Bot\Handlers;

use Mk4U\TGram\Core\Actions\Handlers;
use Mk4U\TGram\Core\Entities\InlineQueryResultPhoto;
use Mk4U\TGram\Core\Entities\InlineQueryResultArticle;

class InlineQuery extends Handlers
{
    private const UNSPLASH_ACCESS_KEY = 'ACCESS_KEY';

    public function execute(): void
    {
        $query = $this->update->inline_query;
        $queryId = $query->id;
        $queryText = $query->query ?? '';
        $offset = (int) ($query->offset ?? 0);

        $results = $this->searchUnsplash($queryText, $offset);
        $nextOffset = count($results) >= 10 ? (string) ($offset + 10) : '';

        $this->answerInlineQuery($queryId, $results, 300, false, $nextOffset);
    }

    private function searchUnsplash(string $query, int $offset): array
    {
        // Your search logic here
        // Returns array of InlineQueryResultPhoto or InlineQueryResultArticle entities
    }
}
```

> [!IMPORTANT]
> InlineQuery results use **entities** (like `InlineQueryResultPhoto`, `InlineQueryResultArticle`) instead of raw arrays. This provides:
> - IDE autocomplete
> - Type safety
> - Integrated documentation

## Handler execution flow

TGram routes updates using this resolution logic:
```php
private function resolveHandler(string $type): void
{
    // Convert update type to PascalCase
    $handler = preg_replace_callback('/_([a-z])/', function ($match) {
        return strtoupper($match[1]);
    }, $type);

    // Build handler class

    $class = 'Bot\\Handlers\\' . ucfirst($handler);
    classValidator($class, Handlers::class, 'Handler');

    (new $class($this->update))->execute();
}
```

That is, the update type `channel_post` maps to the class `Bot\Handlers\ChannelPost`,
`my_chat_member` to `Bot\Handlers\MyChatMember`, and so on.

## Supported Handler Types

| Handler Class           | Telegram Update Type   | Description                       |
|-------------------------|------------------------|-----------------------------------|
| `ChannelPost.php`       | `channel_post`         | New messages in channels          |
| `EditedChannelPost.php` | `edited_channel_post`  | Edited messages in channels       |
| `MyChatMember.php`      | `my_chat_member`       | Bot's member status changes       |
| `ChatMember.php`        | `chat_member`          | Group member status changes       |
| `Poll.php`              | `poll`                 | Poll state changes                |
| `PollAnswer.php`        | `poll_answer`          | User responses to polls           |
| `ShippingQuery.php`     | `shipping_query`       | Shipping information requests     |
| `PreCheckoutQuery.php`  | `pre_checkout_query`   | Payment confirmation requests     |
| `ChatJoinRequest.php`   | `chat_join_request`    | Requests to join protected groups |
| `InlineQuery.php`       | `inline_query`         | Inline search requests            |
| `ChosenInlineResult.php`| `chosen_inline_result` | Selected inline result            |
| `EditedMessage.php`     | `edited_message`       | Edited messages in private chats  |

> [!NOTE]
> Regular `message` updates are handled by the Command system, and `callback_query` updates are handled by the Callback system.

> [!TIP]
> Any update type listed in the [Update](https://core.telegram.org/bots/api#update) object is supported.
> Add a class in `bot/Handlers/` whose name matches the PascalCase version of the update field
> (e.g. `business_message` → `BusinessMessage`) and access its data through `$this->update-><field>`.

## Key Features

1. **Automatic Registration**:
   - Handlers are auto-registered when placed in `bot/Handlers/`
   - No manual registration required

2. **Update Access**:
   ```php
   $this->update->channel_post;      // Channel posts
   $this->update->my_chat_member;    // Membership changes
   $this->update->poll;              // Active polls
   ```

3. **Response Methods**:
   ```php
   $this->reply("Basic response");

   $shippingQuery = $this->update->shipping_query;
   $this->answerShippingQuery($shippingQuery->id, true);

   $post = $this->update->channel_post;
   $this->sendDocument($post->chat->id, 'file.pdf');
   ```

## Best Practices

1. **Single Responsibility**: One handler per update type
2. **Error handling**: Wrap operations in try/catch blocks
3. **Logging**: Implement logging for important events
4. **Naming**: Use descriptive names matching Telegram's update types
5. **Efficiency**: Keep handlers lightweight and delegate complex operations to services

## When to Use Handlers
- Processing channel content
- Handling group membership changes
- Managing payments and shipping
- Tracking poll responses
- Managing group join requests
- Handling inline search results