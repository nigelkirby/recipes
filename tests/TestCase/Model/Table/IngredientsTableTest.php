<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientsTable;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientsTable Test Case
 */
class IngredientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngredientsTable
     */
    public $Ingredients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingredients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ingredients') ? [] : ['className' => 'App\Model\Table\IngredientsTable'];
        $this->Ingredients = TableRegistry::get('Ingredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ingredients);

        parent::tearDown();
    }

    /**
     * Test default find for table
     *
     * @return void
     */
    public function testFind()
    {
        $query = $this->Ingredients->find();
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'name' => 'Flour', 'unit' => 'cup', 'created' => new Time('2016-02-07 05:59:44'),
                'modified' => new Time('2016-02-07 05:59:44')]
        ];

        $this->assertEquals($expected, $result);
    }
}
