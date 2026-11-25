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

See `sendPhoto` [docs](https://core.telegram.org/bots/api#sendphoto) for a list of supported parameters and other info. Local files must be wrapped in `InputFile` — see [Sending Files](#sending-files).

```php
use Mk4U\TGram\Core\Entities\InputFile;

$response = $bot->sendPhoto(
    new InputFile(['file' => 'path/to/photo.jpg']),
    chat_id: $chatId,
    caption: 'Some caption'
);
```

### Send a Chat Action

See `sendChatAction` [docs](https://core.telegram.org/bots/api#sendchataction) for a list of supported actions and other info.

```php
$bot->sendChatAction($chatId, 'upload_photo');
```


## Sending Files

Telegram accepts three kinds of file parameters: an **InputFile** (uploaded from your server), a `file_id` of a file already stored by Telegram, and — in some methods — a public URL. TGram switches the request to `multipart/form-data` automatically when it finds an `InputFile`.

> [!IMPORTANT]
> A plain string is **not** a local path. Use `InputFile` for files on disk; a bare string is passed to Telegram as a `file_id` or URL.

### InputFile

`Mk4U\TGram\Core\Entities\InputFile` has a `file` property. It accepts:

- a path to an existing file (the HTTP client converts it into a `CURLFile`),
- a `\CURLFile` instance,
- a stream/resource backed by a real file.

```php
use Mk4U\TGram\Core\Entities\InputFile;

$photo = new InputFile(['file' => base('storage/images/cat.jpg')]);

// With an explicit MIME type and filename:
$photo = new InputFile([
    'file' => new \CURLFile(
        base('storage/images/cat.jpg'),
        'image/jpeg',
        'cat.jpg'
    ),
]);
```

`base()` resolves paths using `abs_path` from `config.php`.

> [!NOTE]
> In file methods the file is the **first argument** and `chat_id` is a named argument, e.g. `sendPhoto(InputFile|string $photo, ..., int|string|null $chat_id = null, ...)`. `sendMediaGroup`, `sendPaidMedia` and `setChatPhoto` are exceptions: they take `chat_id` first.

### Photos, documents, audio, video, voice and stickers

```php
use Mk4U\TGram\Core\Entities\InputFile;

// Photo
$bot->sendPhoto(
    new InputFile(['file' => base('storage/cat.jpg')]),
    chat_id: $chatId,
    caption: '<b>A cat</b>'
);

// Document (with a thumbnail)
$bot->sendDocument(
    new InputFile(['file' => base('storage/report.pdf')]),
    chat_id: $chatId,
    thumbnail: new InputFile(['file' => base('storage/thumb.png')]),
    caption: 'Monthly report'
);

// Audio
$bot->sendAudio(
    new InputFile(['file' => base('storage/song.mp3')]),
    chat_id: $chatId,
    performer: 'Artist',
    title: 'Song',
    duration: 210
);

// Video
$bot->sendVideo(
    new InputFile(['file' => base('storage/demo.mp4')]),
    chat_id: $chatId,
    caption: 'Demo',
    supports_streaming: true
);

// Voice note
$bot->sendVoice(
    new InputFile(['file' => base('storage/voice.ogg')]),
    chat_id: $chatId,
    duration: 12
);

// Sticker
$bot->sendSticker(
    new InputFile(['file' => base('storage/sticker.webp')]),
    chat_id: $chatId,
    emoji: '👍'
);
```

Inside an action class (command, callback, handler, conversation or middleware) the same methods are available through `$this`; get the chat id from the current update:

```php
$chatId = $this->getActiveEntity()->chat->id; // message updates

$this->sendDocument(
    new InputFile(['file' => base('storage/report.pdf')]),
    chat_id: $chatId,
    caption: 'Your report'
);
```

> [!TIP]
> Reuse a `file_id` instead of uploading the same file again: `$bot->sendPhoto($fileId, chat_id: $chatId);`. You can read it from any media message with `$message->photo[0]->file_id`.

### Media groups

Use `InputMedia*` entities with `file_id` or public URLs. Nested `InputFile` objects inside a `media` array are not converted to multipart automatically, so upload each file individually when needed.

```php
use Mk4U\TGram\Core\Entities\InputMediaPhoto;

$bot->sendMediaGroup($chatId, [
    new InputMediaPhoto(['type' => 'photo', 'media' => $fileId1, 'caption' => 'First']),
    new InputMediaPhoto(['type' => 'photo', 'media' => $fileId2]),
]);
```

### Downloading files received by the bot

`getFile` returns a `File` entity with `file_path`. Bots can download files of up to 20 MB and the link stays valid for at least 1 hour.

```php
use Mk4U\TGram\Config;

$file = $bot->getFile($message->document->file_id);
$url = 'https://api.telegram.org/file/bot' . Config::get('token') . '/' . $file->file_path;

file_put_contents(
    base('storage/downloads/' . basename($file->file_path)),
    file_get_contents($url)
);
```
