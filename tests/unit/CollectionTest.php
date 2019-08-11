<?php

use App\Support\Collection;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());

    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
        $this->assertEquals($collection->get()[2], 'three');
    }

    /** @test */
    public function is_collection_instance_of_iterator_aggregate()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_one()
    {
        $collection1 = new Collection(['one', 'two']);
        $collection2 = new Collection(['three', 'four']);

        $collection1->merge($collection2);

        $this->assertCount(4, $collection1->get());
        $this->assertEquals(4, $collection1->count());
    }

    /** @test */
    public function can_add_items_to_collection()
    {
        $collection = new Collection(['one', 'two']);

        $collection->add(['three']);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['user' => 'Alex'],
            ['user' => 'Billy']
        ]);

        $this->assertEquals('[{"user":"Alex"},{"user":"Billy"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_collection_returns_json()
    {
        $collection = new Collection([
            ['user' => 'Alex'],
            ['user' => 'Billy']
        ]);

        $encoded = json_encode($collection);

        $this->assertEquals('[{"user":"Alex"},{"user":"Billy"}]', $encoded);

    }
}