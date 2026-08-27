# Available Methods


This library is compatible with telegram bot api [version 10.3](https://core.telegram.org/bots/api#august-24-2026).

> [!IMPORTANT]
> In this section, we'll only cover a few available methods; feel free to check out the [Telegram documentation](https://core.telegram.org/bots/api) for more information.



## Entity System

TGram uses an entity-based system for Telegram API responses. All API responses are automatically mapped to entity objects.

### Available Entities

The library includes entities for all Telegram Bot API objects:

| Category | Entities |
|----------|----------|
| Messages | `Message`, `MessageId` |
| Users | `User`, `UserProfilePhotos` |
| Chats | `Chat`, `ChatInviteLink`, `ChatMember`, `ChatFullInfo` |
| Inline Queries | `InlineQuery`, `InlineQueryResultArticle`, `InlineQueryResultPhoto`, etc. |
| Payments | `Invoice`, `PreCheckoutQuery`, `ShippingQuery` |
| Media | `PhotoSize`, `Video`, `Audio`, `Document`, `Sticker` |
| And many more... |

> [!NOTE]
> Every API response is resolved into an entity. For example, `edited_message`
> and `channel_post` updates are mapped to `Message` entities.

### Using Entities

```php
// Send a message and get the response as an entity
$message = $this->sendMessage($chatId, 'Hello!');

// Access entity properties directly
$messageId = $message->message_id;
$chat      = $message->chat;   // Chat entity
$date      = $message->date;
```

### Property Access

Entities expose their API fields as dynamic object properties, converting nested
objects into entities automatically:

```php
$message = $this->sendMessage($chatId, 'Hello');

// Access properties directly
$text   = $message->text;
$chatId = $message->chat->id;   // integer
$userId = $message->from->id;   // integer
```

> [!NOTE]
> The legacy magic getters (`$message->getMessageId()`, `$message->getChat()`,
> etc.) are **deprecated**. Always use direct property access as shown above.

## TGram Methods

> [!TIP]
> These helpers are available inside every action class (commands, callbacks,
> handlers, conversations and middlewares) through `$this`, or on a `Bot`
> instance (`$bot`) once it is processing an update.

### Reply a Message

`reply` is an abbreviation of `sendMessage` in which the message destination is
not specified; it sends the reply to the chat that triggered the update.

```php
$this->reply('Hello World');
```

### Is Admin

`isAdmin` checks if the user is in the list of bot administrators. This list is the one defined in the `admins` configuration parameter.

```php
if ($this->isAdmin()) {
    $this->reply('Hello admin');
}
```

### Get Commands list

`getCommandsList` returns a list of commands that the bot can execute.

```php
$message = '';
foreach ($this->getCommandsList() as $command => $description) {
    $message .= "$command: $description\n";
}
$this->reply($message);
```

### Execute Command

`executeCommand` executes a command passed as a parameter.

```php
$this->executeCommand('/help');
```


## Telegram Methods

> [!NOTE]
> All Telegram API methods accept **positional arguments** and return a mapped
> entity when the API returns an object. Check the
> [official documentation](https://core.telegram.org/bots/api) for the full
> list of supported parameters.

### Send a Message

See `sendMessage` [docs](https://core.telegram.org/bots/api#sendmessage) for a list of supported parameters and other info.

```php
$response = $bot->sendMessage($chatId, 'Hello World');
```

### Forward a Message

See `forwardMessage` [docs](https://core.telegram.org/bots/api#forwardmessage) for a list of supported parameters and other info.

```php
$response = $bot->forwardMessage($chatId, $fromChatId, $messageId);
```

### Send a Photo

See `sendPhoto` [docs](https://core.telegram.org/bots/api#sendphoto) for a list of supported parameters and other info.

```php
$response = $bot->sendPhoto(
    $chatId,
    'path/to/photo.jpg',
    caption: 'Some caption'
);
```

### Send a Chat Action

See `sendChatAction` [docs](https://core.telegram.org/bots/api#sendchataction) for a list of supported actions and other info.

```php
$bot->sendChatAction($chatId, 'upload_photo');
```