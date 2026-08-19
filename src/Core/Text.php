<?php

namespace Mk4U\TGram\Core;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\Entities\RichText;
use Mk4U\TGram\Core\Entities\RichTextAnchor;
use Mk4U\TGram\Core\Entities\RichTextAnchorLink;
use Mk4U\TGram\Core\Entities\RichTextBold;
use Mk4U\TGram\Core\Entities\RichTextCode;
use Mk4U\TGram\Core\Entities\RichTextCustomEmoji;
use Mk4U\TGram\Core\Entities\RichTextDateTime;
use Mk4U\TGram\Core\Entities\RichTextEmailAddress;
use Mk4U\TGram\Core\Entities\RichTextItalic;
use Mk4U\TGram\Core\Entities\RichTextMarked;
use Mk4U\TGram\Core\Entities\RichTextMathematicalExpression;
use Mk4U\TGram\Core\Entities\RichTextMention;
use Mk4U\TGram\Core\Entities\RichTextPhoneNumber;
use Mk4U\TGram\Core\Entities\RichTextReference;
use Mk4U\TGram\Core\Entities\RichTextReferenceLink;
use Mk4U\TGram\Core\Entities\RichTextSpoiler;
use Mk4U\TGram\Core\Entities\RichTextStrikethrough;
use Mk4U\TGram\Core\Entities\RichTextSubscript;
use Mk4U\TGram\Core\Entities\RichTextSuperscript;
use Mk4U\TGram\Core\Entities\RichTextTextMention;
use Mk4U\TGram\Core\Entities\RichTextUnderline;
use Mk4U\TGram\Core\Entities\RichTextUrl;
use Mk4U\TGram\Core\Entities\User;

class Text
{
    public static function bold(string $text): string
    {
        return self::isHtml() ? "<b>$text</b>" : "*$text*";
    }

    public static function italic(string $text): string
    {
        return self::isHtml() ? "<i>$text</i>" : '_' . $text . '_';
    }

    public static function underline(string $text): string
    {
        return self::isHtml() ? "<u>$text</u>" : '__' . $text . '__';
    }

    public static function strikethrough(string $text): string
    {
        return self::isHtml() ? "<s>$text</s>" : "~$text~";
    }

    public static function spoiler(string $text): string
    {
        return self::isHtml() ? "<tg-spoiler>$text</tg-spoiler>" : "||$text||";
    }

    public static function link(string $text, string $url): string
    {
        if (!self::isHtml()) {
            return "[$text]($url)";
        }
        $text = self::sanitize($text, 'link');
        return "<a href=\"$url\">$text</a>";
    }

    public static function mention(string $text, int $userId): string
    {
        return self::link($text, "tg://user?id=$userId");
    }

    public static function emoji(string $emoji, string $emojiId): string
    {
        if (!self::isHtml()) {
            return $emoji;
        }
        self::sanitize($emoji);
        return "<tg-emoji emoji-id=\"$emojiId\">$emoji</tg-emoji>";
    }

    public static function inlineCode(string $text): string
    {
        if (!self::isHtml()) {
            return "`$text`";
        }
        $text = self::sanitize($text);
        return "<code>$text</code>";
    }

    public static function codeBlock(string $text, string $language = ''): string
    {
        if (!self::isHtml()) {
            return "```$language\n$text\n```";
        }
        $text = self::sanitize($text);
        return $language
            ? "<pre><code class=\"language-$language\">$text</code></pre>"
            : "<pre>$text</pre>";
    }

    public static function blockQuote(string $text): string
    {
        return self::isHtml() ? "<blockquote>$text</blockquote>" : "> $text";
    }

    public static function expandableBlockQuote(string $text): string
    {
        return self::isHtml() ? "<blockquote expandable>$text</blockquote>" : ">$text";
    }

    public static function time(int $unix, string $format = ''): string
    {
        if (!self::isHtml()) {
            $url = "tg://time?unix=$unix" . ($format ? "&format=$format" : '');
            return "![fecha]($url)";
        }
        return $format
            ? "<tg-time unix=\"$unix\" format=\"$format\">fecha</tg-time>"
            : "<tg-time unix=\"$unix\">fecha</tg-time>";
    }

    private static function sanitize(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    private static function isHtml(): bool
    {
        return Config::get('parse_mode') == 'HTML';
    }

    private static function richText(string|RichText $text): string|RichText
    {
        return $text instanceof RichText ? $text : $text;
    }

    public static function richBold(string|RichText $text): RichTextBold
    {
        return new RichTextBold(['type' => 'bold', 'text' => self::richText($text)]);
    }

    public static function richItalic(string|RichText $text): RichTextItalic
    {
        return new RichTextItalic(['type' => 'italic', 'text' => self::richText($text)]);
    }

    public static function richUnderline(string|RichText $text): RichTextUnderline
    {
        return new RichTextUnderline(['type' => 'underline', 'text' => self::richText($text)]);
    }

    public static function richStrikethrough(string|RichText $text): RichTextStrikethrough
    {
        return new RichTextStrikethrough(['type' => 'strikethrough', 'text' => self::richText($text)]);
    }

    public static function richSpoiler(string|RichText $text): RichTextSpoiler
    {
        return new RichTextSpoiler(['type' => 'spoiler', 'text' => self::richText($text)]);
    }

    public static function richCode(string|RichText $text): RichTextCode
    {
        return new RichTextCode(['type' => 'code', 'text' => self::richText($text)]);
    }

    public static function richUrl(string|RichText $text, string $url): RichTextUrl
    {
        return new RichTextUrl(['type' => 'url', 'text' => self::richText($text), 'url' => $url]);
    }

    public static function richEmail(string|RichText $text): RichTextEmailAddress
    {
        return new RichTextEmailAddress(['type' => 'email_address', 'text' => self::richText($text)]);
    }

    public static function richPhone(string|RichText $text): RichTextPhoneNumber
    {
        return new RichTextPhoneNumber(['type' => 'phone_number', 'text' => self::richText($text)]);
    }

    public static function richMention(string|RichText $text, string $username): RichTextMention
    {
        return new RichTextMention(['type' => 'mention', 'text' => self::richText($text), 'username' => $username]);
    }

    public static function richTextMention(string|RichText $text, User|int $user): RichTextTextMention
    {
        $userData = $user instanceof User ? $user : new User(['id' => $user, 'is_bot' => false, 'first_name' => '']);
        return new RichTextTextMention(['type' => 'text_mention', 'text' => self::richText($text), 'user' => $userData]);
    }

    public static function richCustomEmoji(string $emoji, string $id): RichTextCustomEmoji
    {
        return new RichTextCustomEmoji(['type' => 'custom_emoji', 'custom_emoji_id' => $id, 'alternative_text' => $emoji]);
    }

    public static function richSubscript(string|RichText $text): RichTextSubscript
    {
        return new RichTextSubscript(['type' => 'subscript', 'text' => self::richText($text)]);
    }

    public static function richSuperscript(string|RichText $text): RichTextSuperscript
    {
        return new RichTextSuperscript(['type' => 'superscript', 'text' => self::richText($text)]);
    }

    public static function richMarked(string|RichText $text): RichTextMarked
    {
        return new RichTextMarked(['type' => 'marked', 'text' => self::richText($text)]);
    }

    public static function richDatetime(int $unix): RichTextDateTime
    {
        return new RichTextDateTime([
            'type' => RichText::TYPE_DATETIME,
            'unix_time' => $unix
        ]);
    }

    public static function richMath(string $expression): RichTextMathematicalExpression
    {
        return new RichTextMathematicalExpression(['type' => 'mathematical_expression', 'expression' => $expression]);
    }

    public static function richAnchor(string $name): RichTextAnchor
    {
        return new RichTextAnchor(['type' => 'anchor', 'name' => $name]);
    }

    public static function richAnchorLink(string|RichText $text, string $anchor): RichTextAnchorLink
    {
        return new RichTextAnchorLink(['type' => 'anchor_link', 'text' => self::richText($text), 'anchor' => $anchor]);
    }

    public static function richReference(string|RichText $text, string $reference): RichTextReference
    {
        return new RichTextReference(['type' => 'reference', 'text' => self::richText($text), 'reference' => $reference]);
    }

    public static function richReferenceLink(string|RichText $text, string $reference): RichTextReferenceLink
    {
        return new RichTextReferenceLink(['type' => 'reference_link', 'text' => self::richText($text), 'reference' => $reference]);
    }
}
