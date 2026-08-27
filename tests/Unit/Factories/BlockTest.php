<?php

namespace Tests\Unit\Factories;

use Mk4U\TGram\Core\Entities\InputRichBlock;
use Mk4U\TGram\Core\Entities\InputRichBlockAnchor;
use Mk4U\TGram\Core\Entities\InputRichBlockAnimation;
use Mk4U\TGram\Core\Entities\InputRichBlockAudio;
use Mk4U\TGram\Core\Entities\InputRichBlockBlockQuotation;
use Mk4U\TGram\Core\Entities\InputRichBlockButtons;
use Mk4U\TGram\Core\Entities\InputRichBlockCollage;
use Mk4U\TGram\Core\Entities\InputRichBlockDetails;
use Mk4U\TGram\Core\Entities\InputRichBlockDivider;
use Mk4U\TGram\Core\Entities\InputRichBlockDocument;
use Mk4U\TGram\Core\Entities\InputRichBlockExpandableBlockQuotation;
use Mk4U\TGram\Core\Entities\InputRichBlockFooter;
use Mk4U\TGram\Core\Entities\InputRichBlockList;
use Mk4U\TGram\Core\Entities\InputRichBlockMap;
use Mk4U\TGram\Core\Entities\InputRichBlockMathematicalExpression;
use Mk4U\TGram\Core\Entities\InputRichBlockParagraph;
use Mk4U\TGram\Core\Entities\InputRichBlockPhoto;
use Mk4U\TGram\Core\Entities\InputRichBlockPreformatted;
use Mk4U\TGram\Core\Entities\InputRichBlockPullQuotation;
use Mk4U\TGram\Core\Entities\InputRichBlockSectionHeading;
use Mk4U\TGram\Core\Entities\InputRichBlockSlideshow;
use Mk4U\TGram\Core\Entities\InputRichBlockThinking;
use Mk4U\TGram\Core\Entities\InputRichBlockVideo;
use Mk4U\TGram\Core\Entities\InputRichBlockVoiceNote;
use Mk4U\TGram\Core\Factories\Rich\Block;
use Mk4U\TGram\Core\Factories\Rich\Button;
use PHPUnit\Framework\TestCase;

class BlockTest extends TestCase
{
    public function testParagraph(): void
    {
        $block = Block::paragraph('Hello world');

        $this->assertInstanceOf(InputRichBlockParagraph::class, $block);
        $this->assertSame(InputRichBlock::TYPE_PARAGRAPH, $block->type);
        $this->assertSame('Hello world', $block->text);
    }

    public function testHeading(): void
    {
        $block = Block::heading('Title', 2);

        $this->assertInstanceOf(InputRichBlockSectionHeading::class, $block);
        $this->assertSame(InputRichBlock::TYPE_HEADING, $block->type);
        $this->assertSame('Title', $block->text);
        $this->assertSame(2, $block->size);
    }

    public function testHeadingDefaultSize(): void
    {
        $block = Block::heading('Title');

        $this->assertSame(1, $block->size);
    }

    public function testPreformatted(): void
    {
        $block = Block::preformatted('echo "hello"', 'php');

        $this->assertInstanceOf(InputRichBlockPreformatted::class, $block);
        $this->assertSame(InputRichBlock::TYPE_PREFORMATTED, $block->type);
        $this->assertSame('echo "hello"', $block->text);
        $this->assertSame('php', $block->language);
    }

    public function testPreformattedWithoutLanguage(): void
    {
        $block = Block::preformatted('code here');

        $this->assertSame('code here', $block->text);
        $this->assertNull($block->language);
    }

    public function testFooter(): void
    {
        $block = Block::footer('Footer text');

        $this->assertInstanceOf(InputRichBlockFooter::class, $block);
        $this->assertSame(InputRichBlock::TYPE_FOOTER, $block->type);
        $this->assertSame('Footer text', $block->text);
    }

    public function testDivider(): void
    {
        $block = Block::divider();

        $this->assertInstanceOf(InputRichBlockDivider::class, $block);
        $this->assertSame(InputRichBlock::TYPE_DIVIDER, $block->type);
    }

    public function testThinking(): void
    {
        $block = Block::thinking('Thinking...');

        $this->assertInstanceOf(InputRichBlockThinking::class, $block);
        $this->assertSame(InputRichBlock::TYPE_THINKING, $block->type);
        $this->assertSame('Thinking...', $block->text);
    }

    public function testBlockQuote(): void
    {
        $inner = [Block::paragraph('Quoted text')];
        $block = Block::blockQuote($inner, 'Author');

        $this->assertInstanceOf(InputRichBlockBlockQuotation::class, $block);
        $this->assertSame(InputRichBlock::TYPE_BLOCK_QUOTATION, $block->type);
        $this->assertSame('Author', $block->credit);
    }

    public function testBlockQuoteWithoutCredit(): void
    {
        $block = Block::blockQuote([Block::paragraph('text')]);

        $this->assertNull($block->credit);
    }

    public function testPullQuote(): void
    {
        $block = Block::pullQuote('Important quote', 'Source');

        $this->assertInstanceOf(InputRichBlockPullQuotation::class, $block);
        $this->assertSame(InputRichBlock::TYPE_PULL_QUOTATION, $block->type);
        $this->assertSame('Important quote', $block->text);
        $this->assertSame('Source', $block->credit);
    }

    public function testPhoto(): void
    {
        $block = Block::photo('file_id_123', 'Caption text', 'Photo credit');

        $this->assertInstanceOf(InputRichBlockPhoto::class, $block);
        $this->assertSame(InputRichBlock::TYPE_PHOTO, $block->type);
        $this->assertNotNull($block->photo);
        $this->assertSame('file_id_123', $block->photo->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('Caption text', $block->caption->text);
        $this->assertSame('Photo credit', $block->caption->credit);
    }

    public function testPhotoWithoutCaption(): void
    {
        $block = Block::photo('file_id_456');

        $this->assertSame(InputRichBlock::TYPE_PHOTO, $block->type);
        $this->assertNull($block->caption);
    }

    public function testVideo(): void
    {
        $block = Block::video('video_file_id', 'Video caption', 'Video credit');

        $this->assertInstanceOf(InputRichBlockVideo::class, $block);
        $this->assertSame(InputRichBlock::TYPE_VIDEO, $block->type);
        $this->assertNotNull($block->video);
        $this->assertSame('video_file_id', $block->video->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('Video caption', $block->caption->text);
    }

    public function testAudio(): void
    {
        $block = Block::audio('audio_file_id', 'Song title', 'Artist');

        $this->assertInstanceOf(InputRichBlockAudio::class, $block);
        $this->assertSame(InputRichBlock::TYPE_AUDIO, $block->type);
        $this->assertNotNull($block->audio);
        $this->assertSame('audio_file_id', $block->audio->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('Song title', $block->caption->text);
        $this->assertSame('Artist', $block->caption->credit);
    }

    public function testAnimation(): void
    {
        $block = Block::animation('gif_file_id', 'GIF caption');

        $this->assertInstanceOf(InputRichBlockAnimation::class, $block);
        $this->assertSame(InputRichBlock::TYPE_ANIMATION, $block->type);
        $this->assertNotNull($block->animation);
        $this->assertSame('gif_file_id', $block->animation->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('GIF caption', $block->caption->text);
    }

    public function testVoiceNote(): void
    {
        $block = Block::voiceNote('voice_file_id', 'Voice caption', 'Speaker');

        $this->assertInstanceOf(InputRichBlockVoiceNote::class, $block);
        $this->assertSame(InputRichBlock::TYPE_VOICE_NOTE, $block->type);
        $this->assertNotNull($block->voice_note);
        $this->assertSame('voice_file_id', $block->voice_note->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('Voice caption', $block->caption->text);
        $this->assertSame('Speaker', $block->caption->credit);
    }

    public function testList(): void
    {
        $block = Block::list([
            Block::paragraph('Item 1'),
            Block::paragraph('Item 2'),
        ]);

        $this->assertInstanceOf(InputRichBlockList::class, $block);
        $this->assertSame(InputRichBlock::TYPE_LIST, $block->type);
        $this->assertIsArray($block->items);
        $this->assertCount(2, $block->items);
    }

    public function testDetails(): void
    {
        $block = Block::details('Click to expand', [Block::paragraph('Hidden content')], true);

        $this->assertInstanceOf(InputRichBlockDetails::class, $block);
        $this->assertSame(InputRichBlock::TYPE_DETAILS, $block->type);
        $this->assertSame('Click to expand', $block->summary);
        $this->assertTrue($block->is_open);
    }

    public function testDetailsDefaultClosed(): void
    {
        $block = Block::details('Summary', []);

        $this->assertFalse($block->is_open);
    }

    public function testCollage(): void
    {
        $block = Block::collage(
            [Block::photo('img1'), Block::photo('img2')],
            'Collage caption',
            'Credit'
        );

        $this->assertInstanceOf(InputRichBlockCollage::class, $block);
        $this->assertSame(InputRichBlock::TYPE_COLLAGE, $block->type);
        $this->assertNotNull($block->caption);
        $this->assertSame('Collage caption', $block->caption->text);
    }

    public function testSlideshow(): void
    {
        $block = Block::slideshow(
            [Block::photo('slide1'), Block::photo('slide2')],
            'Slideshow caption'
        );

        $this->assertInstanceOf(InputRichBlockSlideshow::class, $block);
        $this->assertSame(InputRichBlock::TYPE_SLIDESHOW, $block->type);
        $this->assertNotNull($block->caption);
        $this->assertSame('Slideshow caption', $block->caption->text);
    }

    public function testMap(): void
    {
        $block = Block::map(
            ['latitude' => 40.71, 'longitude' => -74.00],
            15,
            400,
            300,
            'Map caption'
        );

        $this->assertInstanceOf(InputRichBlockMap::class, $block);
        $this->assertSame(InputRichBlock::TYPE_MAP, $block->type);
        $this->assertSame(400, $block->width);
        $this->assertSame(300, $block->height);
    }

    public function testMath(): void
    {
        $block = Block::math('E = mc^2');

        $this->assertInstanceOf(InputRichBlockMathematicalExpression::class, $block);
        $this->assertSame(InputRichBlock::TYPE_MATHEMATICAL_EXPRESSION, $block->type);
        $this->assertSame('E = mc^2', $block->expression);
    }

    public function testAnchor(): void
    {
        $block = Block::anchor('section1');

        $this->assertInstanceOf(InputRichBlockAnchor::class, $block);
        $this->assertSame(InputRichBlock::TYPE_ANCHOR, $block->type);
        $this->assertSame('section1', $block->name);
    }

    public function testTableReturnsTableBuilder(): void
    {
        $table = Block::table();
        $this->assertInstanceOf(\Mk4U\TGram\Core\Factories\Rich\Table::class, $table);
    }

    public function testMediaBlocksWithoutCaptionOrCredit(): void
    {
        $photo = Block::photo('id');
        $this->assertNull($photo->caption);

        $video = Block::video('id');
        $this->assertNull($video->caption);

        $audio = Block::audio('id');
        $this->assertNull($audio->caption);

        $animation = Block::animation('id');
        $this->assertNull($animation->caption);

        $voice = Block::voiceNote('id');
        $this->assertNull($voice->caption);
    }

    public function testMediaBlocksWithCaptionOnly(): void
    {
        $photo = Block::photo('id', 'Caption only');
        $this->assertSame('Caption only', $photo->caption->text);
        $this->assertNull($photo->caption->credit);
    }

    public function testButtons(): void
    {
        $buttons = [
            Button::make('Visit')->url('https://example.com')->build(),
            Button::make('Action')->callback('do_it')->build(),
        ];
        $block = Block::buttons($buttons, 'left');

        $this->assertInstanceOf(InputRichBlockButtons::class, $block);
        $this->assertSame(InputRichBlock::TYPE_BUTTONS, $block->type);
        $this->assertCount(2, $block->buttons);
        $this->assertSame('left', $block->align);
    }

    public function testButtonsDefaultAlign(): void
    {
        $block = Block::buttons([]);

        $this->assertSame('center', $block->align);
    }

    public function testDocument(): void
    {
        $block = Block::document('file_id_abc', 'Doc caption', 'Doc credit');

        $this->assertInstanceOf(InputRichBlockDocument::class, $block);
        $this->assertSame(InputRichBlock::TYPE_DOCUMENT, $block->type);
        $this->assertNotNull($block->document);
        $this->assertSame('file_id_abc', $block->document->media);
        $this->assertNotNull($block->caption);
        $this->assertSame('Doc caption', $block->caption->text);
        $this->assertSame('Doc credit', $block->caption->credit);
    }

    public function testDocumentWithoutCaption(): void
    {
        $block = Block::document('file_id_xyz');

        $this->assertNull($block->caption);
        $this->assertSame('file_id_xyz', $block->document->media);
    }

    public function testExpandableBlockQuotation(): void
    {
        $block = Block::expandableBlockQuotation('Expandable text', 'Author');

        $this->assertInstanceOf(InputRichBlockExpandableBlockQuotation::class, $block);
        $this->assertSame(InputRichBlock::TYPE_EXPANDABLE_BLOCK_QUOTATION, $block->type);
        $this->assertSame('Expandable text', $block->text);
        $this->assertSame('Author', $block->credit);
    }

    public function testExpandableBlockQuotationWithoutCredit(): void
    {
        $block = Block::expandableBlockQuotation('Hidden content');

        $this->assertSame('Hidden content', $block->text);
        $this->assertNull($block->credit);
    }
}
