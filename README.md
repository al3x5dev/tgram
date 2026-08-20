# Tgram PHP

[![API Version](https://img.shields.io/badge/Bot%20API-10.2-32a2da?style=for-the-badge&logo=Telegram)](https://core.telegram.org/bots/api#july-14-2026)
[![Version](https://img.shields.io/github/v/release/al3x5dev/tgram?include_prereleases-blue&style=for-the-badge&color=blue)](https://packagist.org/packages/mk4u/tgram)
[![License](https://img.shields.io/github/license/al3x5dev/tgram?style=for-the-badge)](https://github.com/al3x5dev/tgram/blob/main/LICENSE)
[![PHP](https://img.shields.io/badge/php-8.5+-green?style=for-the-badge&logo=php&color=blue)](https://php.net/)


**Telegram Bot API SDK for PHP.**

A lightweight PHP SDK for building Telegram bots with a simple, expressive API
and minimal dependencies. Covers the Telegram Bot API (v10.2) with first-class
entities and developer-friendly tooling:

- **Entity system** — every API response is mapped to an object with dynamic properties: `$message->from->first_name`.
- **Attribute-driven commands & callbacks** — `#[Command('/start')]`,
  `#[Callback('action')]` with argument parsing.
- **All update types** — commands, callbacks, handlers, conversations and a
  middleware pipeline.
- **Rich messages** (Bot API 10.2 format) — `Text`, `RichMessage` and `Block`
  builders for beautiful messages.
- **Keyboard factory** — fluent inline & reply keyboards
  (`Keyboard::inline()`, `Keyboard::reply()`).
- **Webhook security** — `X-Telegram-Bot-Api-Secret-Token` validation.
- **Built-in CLI** — install, scaffold and manage your bot from the terminal.

> [!NOTE]
> Before you start creating code, you must have created your bot in Telegram.
> [Here's how to do it](https://core.telegram.org/bots/features#creating-a-new-bot).

## Requirements

- PHP >= 8.5

## Installation

```bash
composer require mk4u/tgram
```

## Quick start

1. Create `config.php` with your bot token:

```php
return [
    'token'      => '110201543:AAHdqTcvCH1vGWJxfSeofSAs0K5PALDsaw',
    'secret'     => 'your_secret_token_here',
    'admins'     => [123456789, 985632147],
    'parse_mode' => 'HTML',
    'abs_path'   => __DIR__,
];
```

2. Create your entry point (`index.php`):

```php
require_once 'vendor/autoload.php';

use Mk4U\TGram\Bot;

$bot = new Bot();
$bot->run();
```

3. Define a command in `bot/Commands/Start.php`:

```php
namespace Bot\Commands;

use Mk4U\TGram\Core\Actions\Commands;
use Mk4U\TGram\Attributes\Command;

#[Command('/start')]
class Start extends Commands
{
    public function execute(): void
    {
        $this->reply('Hey there! Welcome to our bot!');
    }

    public static function description(): string
    {
        return 'Start Command to get you started';
    }
}
```

4. Register your commands and set the webhook:

```bash
php vendor/bin/tgram register
php vendor/bin/tgram hook:set https://your-domain.com/index.php
```

## Documentation

- [Installation and configuration](docs/install.md)
- [Command line interface](docs/cli.md)
- [Available methods](docs/methods.md)
- [Command system](docs/commands.md)
- [Callbacks](docs/callbacks.md)
- [Handler system](docs/handler.md)
- [Conversation flow](docs/conversation.md)
- [Keyboards](docs/keyboards.md)
- [Message format](docs/format.md)
- [Events logger](docs/logger.md)
- [Middlewares](docs/middlewares.md)
- [Rich messages](docs/rich-message-examples.md)

## License

[MIT](LICENSE)