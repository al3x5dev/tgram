# Command System


## What are telegram commands?

Commands are instructions that users can send to the bot to perform specific actions. They start with a forward slash (/) and can be customized according to the bot's needs. 


### Basic Commands
- `/start`: Starts the interaction with the bot.
- `/help`: Provides information on how to use the bot.
- `/settings`: Allows the user to adjust settings.


### Custom Commands
In **TGram**, we also consider any pre-specified text or words as commands. For example:
- `📥 download`: Download file.
- `🎮 game`: Start a game.

This variant is most commonly used for custom keyboard actions, allowing a more fluid and dynamic interaction with the user.


## Create commands

TGram has an integrated [cli tool](cli.md) for managing your bots. Through it, we can create custom commands. Just run the following command in your console:

```bash
php vendor/bin/tgram command
```

This will generate a new command class inside the `bot/Commands` folder in the project root.


### Basic example

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

### Working with arguments

Commands in TGram now have built-in argument handling:

```php
$this->setArgs(['arg1', 'arg2']); // Set arguments

$first = $this->arg(0);            // Get first argument
$all   = $this->args();            // Get all arguments
$three = $this->args(3);           // Get first 3 arguments, filling missing with null
```

* `setArgs(array $args)` → Assigns arguments to the command.
* `arg(int $index, $default = null)` → Returns a single argument.
* `args(?int $count = null)` → Returns all arguments or a fixed number of arguments.


#### Required properties and method:

* All commands extend `Mk4U\TGram\Core\Actions\Commands`, inheriting `$message` and `$update`.
* Commands are marked with the `#[Command('name')]` attribute.
* `execute()` defines the action when the command is triggered.
* `description()`: string is now static and provides the command’s description.


### Register

[To register your commands](cli.md#2-register), just type in console:

```bash
php vendor/bin/tgram register
```
This will ensure that all custom commands are available for use in the bot.