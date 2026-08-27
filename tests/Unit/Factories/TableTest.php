<?php

namespace Tests\Unit\Factories;

use Mk4U\TGram\Core\Entities\InputRichBlock;
use Mk4U\TGram\Core\Entities\InputRichBlockTable;
use Mk4U\TGram\Core\Entities\RichBlockTableCell;
use Mk4U\TGram\Core\Factories\Rich\Block;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    public function testBuildReturnsTable(): void
    {
        $table = Block::table()->build();

        $this->assertInstanceOf(InputRichBlockTable::class, $table);
        $this->assertSame(InputRichBlock::TYPE_TABLE, $table->type);
    }

    public function testHeaderCells(): void
    {
        $table = Block::table()
            ->header(['Name', 'Age', 'City'])
            ->build();

        $this->assertIsArray($table->cells);
        $this->assertCount(1, $table->cells);
        $this->assertCount(3, $table->cells[0]);

        $this->assertInstanceOf(RichBlockTableCell::class, $table->cells[0][0]);
        $this->assertTrue($table->cells[0][0]->is_header);
    }

    public function testBodyRows(): void
    {
        $table = Block::table()
            ->header(['Name', 'Age'])
            ->body([
                ['Alice', '30'],
                ['Bob', '25'],
            ])
            ->build();

        $this->assertCount(3, $table->cells);
        $this->assertCount(2, $table->cells[1]);
        $this->assertSame('Alice', $table->cells[1][0]->text);
        $this->assertSame('30', $table->cells[1][1]->text);
        $this->assertSame('Bob', $table->cells[2][0]->text);
        $this->assertSame('25', $table->cells[2][1]->text);
    }

    public function testBodyCellsAreNotHeaders(): void
    {
        $table = Block::table()
            ->body([['Cell']])
            ->build();

        $this->assertFalse($table->cells[0][0]->is_header);
    }

    public function testFooterCells(): void
    {
        $table = Block::table()
            ->header(['A', 'B'])
            ->body([['1', '2']])
            ->footer(['Total', '3'])
            ->build();

        $this->assertCount(3, $table->cells);
        $this->assertSame('Total', $table->cells[2][0]->text);
        $this->assertSame('3', $table->cells[2][1]->text);
    }

    public function testBorderedOption(): void
    {
        $table = Block::table()->bordered()->build();
        $this->assertTrue($table->is_bordered);
    }

    public function testStripedOption(): void
    {
        $table = Block::table()->striped()->build();
        $this->assertTrue($table->is_striped);
    }

    public function testBorderedDisable(): void
    {
        $table = Block::table()->bordered(true)->bordered(false)->build();
        $this->assertFalse($table->is_bordered);
    }

    public function testCaption(): void
    {
        $table = Block::table()
            ->caption('Table caption')
            ->build();

        $this->assertSame('Table caption', $table->caption);
    }

    public function testFullTable(): void
    {
        $table = Block::table()
            ->header(['Product', 'Price', 'Stock'])
            ->body([
                ['Widget', '$10', '100'],
                ['Gadget', '$25', '50'],
            ])
            ->footer(['Total', '$35', '150'])
            ->bordered()
            ->striped()
            ->caption('Product inventory')
            ->build();

        $this->assertInstanceOf(InputRichBlockTable::class, $table);
        $this->assertCount(4, $table->cells);
        $this->assertTrue($table->is_bordered);
        $this->assertTrue($table->is_striped);
        $this->assertSame('Product inventory', $table->caption);
    }

    public function testFluentInterface(): void
    {
        $result = Block::table()
            ->header(['A'])
            ->body([['1']])
            ->footer(['F'])
            ->bordered()
            ->striped()
            ->caption('Caption');

        $this->assertInstanceOf(\Mk4U\TGram\Core\Factories\Rich\Table::class, $result);
    }

    public function testCellWithRichBlockTableCellPassThrough(): void
    {
        $cell = new RichBlockTableCell([
            'text' => 'Custom cell',
            'is_header' => false,
            'colspan' => 2,
        ]);

        $table = Block::table()
            ->body([[$cell]])
            ->build();

        $this->assertSame('Custom cell', $table->cells[0][0]->text);
        $this->assertSame(2, $table->cells[0][0]->colspan);
    }

    public function testCellWithArrayFormat(): void
    {
        $table = Block::table()
            ->body([[
                ['text' => 'Array cell', 'is_header' => false, 'align' => 'center'],
            ]])
            ->build();

        $this->assertSame('Array cell', $table->cells[0][0]->text);
    }

    public function testEmptyTable(): void
    {
        $table = Block::table()->build();

        $this->assertInstanceOf(InputRichBlockTable::class, $table);
        $this->assertEmpty($table->cells);
        $this->assertNull($table->is_bordered);
        $this->assertNull($table->is_striped);
    }
}
