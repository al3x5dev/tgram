# Command line interface

**TGram** provides a command line interface that makes it easy to create and manage Telegram bots. With this tool, you can generate configuration files, create custom commands, handle callbacks and much more, all from the comfort of your terminal.


## Prerequisites

Before using the command line, make sure you have installed **TGram**. For more details on installation and configuration, see the [Installation and Configuration](install.md) section.

The CLI is available as `php vendor/bin/tgram` after the package is installed.


## Available Commands

The following describes the commands available in the **TGram** command line:

| Command | Description |
|---------|-------------|
| [`install`](#1-install) | Generate `config.php` and the project structure |
| [`register`](#2-register) | Register commands and callbacks |
| [`hook:about`](#31-hookabout) | Get information about the bot |
| [`hook:info`](#32-hookinfo) | Get information about the bot webhook |
| [`hook:set`](#33-hookset) | Set the webhook for the bot |
| [`hook:delete`](#34-hookdelete) | Delete the webhook for the bot |
| [`command`](#4-command) | Create a new Telegram command |
| [`callback`](#5-callback) | Create a new Telegram callback |
| [`conversation`](#6-conversation) | Create a new conversational flow |
| [`handler`](#7-handler) | Create a new Telegram handler |
| [`middleware`](#8-middleware) | Create a new middleware |
| [`poll`](#9-poll) | Run the bot with long polling instead of a webhook |


### 1. `install`

**Description**: Automatically generates the configuration file `config.php` and all other necessary files and directories.

```bash
php vendor/bin/tgram install
```

Run this command to create the configuration file without having to do it manually. Follow the instructions in the console to complete the configuration.

The installation process will prompt you for:

1. **Bot Token** - Your Telegram bot token from @BotFather
2. **Secret Token** - Optional (recommended) - A secure token for webhook verification
   - This adds an extra layer of security to prevent unauthorized webhook calls
   - Telegram will send this token in the `X-Telegram-Bot-Api-Secret-Token` header
3. **Admin IDs** - Comma-separated list of Telegram user IDs with admin privileges
4. **Debug Mode** - Whether to enable development mode

> [!NOTE]
> If `config.php` does not exist, running any of the `hook:*` commands (`hook:set`, `hook:info`, `hook:about`, `hook:delete`) automatically triggers the `install` command first.


### 2. `register`

**Description**: Register all the commands and callbacks created to be available in your bot.

```bash
php vendor/bin/tgram register
```

> [!NOTE]
> This command must be run every time you create a new command or callback.
> Be sure to run it after you have created or modified your commands or callbacks.


### 3. `hook`

**Description**: Commands related to the configuration of your bot's webhook.


#### 3.1. `hook:about`

**Description**: Gets information about the Telegram bot.

```bash
php vendor/bin/tgram hook:about
```


#### 3.2. `hook:info`

**Description**: Gets information about the Telegram bot webhook.

```bash
php vendor/bin/tgram hook:info
```


#### 3.3. `hook:set`

**Description**: Sets the webhook for the Telegram bot.

```bash
php vendor/bin/tgram hook:set https://your-domain.com/webhook
```

Or without arguments to be prompted:

```bash
php vendor/bin/tgram hook:set
```

> [!NOTE]
> The URL of your webhook must be accessible from the Internet and use `HTTPS`.

> [!IMPORTANT]
> When setting the webhook, TGram automatically includes your `secret` token (if configured in `config.php`) in the `secret_token` parameter. Telegram will then send this token with every request in the `X-Telegram-Bot-Api-Secret-Token` header, and TGram will validate it automatically.


#### 3.4. `hook:delete`

**Description**: Deletes the webhook for the Telegram bot.

```bash
php vendor/bin/tgram hook:delete
```


### 4. `command`

**Description**: Creates a new custom command for your bot.

```bash
php vendor/bin/tgram command
```

> [!NOTE]
> Use this command to add a new command that users can invoke in Telegram.

> [!TIP]
> The **TGram CLI** has the flexibility to organize your commands in subfolders within the `bot/Commands` directory.
> Just specify in the command name when prompted the name of the directory or directories to create as follows `Users/Admin/Start`, this will create the following structure `bot/Commands/Users/Admin/Start.php`.


### 5. `callback`

**Description**: Creates a new callback to handle user interactions with buttons in messages.

```bash
php vendor/bin/tgram callback
```

> [!NOTE]
> Run this command when you need to handle user interactions via buttons in your messages.

> [!TIP]
> The **TGram CLI** has the flexibility to organize your callback in subfolders within the `bot/Callbacks` directory.
> Just specify in the callback name when prompted the name of the directory or directories to create as follows `Users/Admin`, this will create the following structure `bot/Callbacks/Users/Admin.php`.


### 6. `conversation`

**Description**: Create a new conversational stream for your bot.

```bash
php vendor/bin/tgram conversation
```

> [!NOTE]
> Use this command when you want to implement a more complex conversation flow in your bot, allowing users to interact more dynamically.

> [!TIP]
> The **TGram CLI** has the flexibility to organize your conversational flows in subfolders within the `bot/Conversations` directory.
> Just specify in the conversation name when prompted the name of the directory or directories to create as follows `Users/Admin/Create`, this will create the following structure `bot/Conversations/Users/Admin/Create.php`.


### 7. `handler`

**Description**: Create a new custom handler for your bot.

```bash
php vendor/bin/tgram handler
```

> [!NOTE]
> Use this command when you want to implement custom handlers for different types of Telegram bot updates.

> [!TIP]
> The **TGram CLI** allows you to organize handlers into subfolders within the `bot/Handlers` directory.
> Simply specify the name of the directory or directories to be created in the handler name when prompted, such as `Admin/ChannelPost`. This will create the following structure: `bot/Handlers/Admin/ChannelPost.php`.


### 8. `middleware`

**Description**: Create a new middleware for your bot.

```bash
php vendor/bin/tgram middleware
```

> [!NOTE]
> Use this command when you want to add middleware for processing updates before they reach handlers.

> [!TIP]
> The **TGram CLI** allows you to organize middleware into subfolders within the `bot/Middlewares` directory.
> Simply specify the name of the directory or directories to be created in the middleware name when prompted, such as `User/Auth/AccessMiddleware`. This will create: `bot/Middlewares/User/Auth/AccessMiddleware.php`.


### 9. `poll`

**Description**: Runs the bot by continuously polling instead of using a webhook. The process
remains active, fetching updates from Telegram and sending them through the same
channel of commands/callbacks/handlers/conversations/middleware used by the webhook mode.

```bash
php vendor/bin/tgram poll
```

Optionally, you can specify the polling interval in seconds:

```bash
php vendor/bin/tgram poll 5
```

| Argument | Required | Default | Description |

|-----------|----------|---------|-------------|

| `interval`| No | `3` | Seconds between polling requests. Must be a non-negative integer. Keep it at or below `30`. |

> [!IMPORTANT]
> Upon startup, `poll` automatically calls `hook:delete`, so there's no need to manually delete
> the webhook. This avoids the `409 Conflict` error you would get from
> Telegram when calling `getUpdates` while a webhook is still active.

**Behavior**

- **Long-running process.** Runs in an infinite loop fetching updates. Press `Ctrl+C` to stop it.

- **Rate limiting (429).** If Telegram responds with `429 Too Many Requests`,
the bot reads the `retry_after` value from the response and waits exactly that many seconds before trying again (instead of overloading the API). Any other API error logs a warning and retries the operation after the configured interval.

- **Update confirmation.** Each update is confirmed (its offset advances) only after it has been successfully processed. If a handler throws an exception, the error is logged, the update is not committed, and it will be retried in the next cycle.

- **Interval 0.** With an interval of 0, Telegram returns control almost immediately; to prevent an infinite loop, the bot waits 1 second when there are no pending updates.

> [!TIP]
> For production, run `poll` under a process supervisor (systemd, supervisord)
> so that it automatically restarts if it terminates.
