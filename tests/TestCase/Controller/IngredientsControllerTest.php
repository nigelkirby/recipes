<?php
namespace App\Test\TestCase\Controller;

use App\Controller\IngredientsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\IngredientsController Test Case
 */
class IngredientsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingredients'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        //http request
        $this->get('/ingredients');
        $this->assertResponseOk();

        //ajax request
        $this->get('/ingredients.json');
        $this->assertResponseOk();
    }

    public function testIndexQueryData()
    {
        $this->get('/ingredients?page=1');
        $this->assertResponseOk();

        $this->get('/ingredients?page=1&sort=created');
        $this->assertResponseOk();

        $this->get('/ingredients?page=1&sort=created&direction=desc');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        //http request
        $this->get('/ingredients/view/1');
        $this->assertResponseOk();

        //ajax request
        $this->get('/ingredients/view/1.json');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'name' => 'spice',
            'unit' => 'T'
        ];

        $this->post('/ingredients/add',$data);
        $this->assertResponseSuccess();

        $articles = TableRegistry::get('Ingredients');
        $query = $articles->find()->where(['name' => $data['name']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $data = [
            'name' => 'spice',
            'unit' => 'T'
        ];

        $this->post('/ingredients/edit/1',$data);
        $this->assertResponseSuccess();

        $articles = TableRegistry::get('Ingredients');
        $query = $articles->find()->where(['name' => $data['name']]);
        $this->assertEquals($query->first()->unit,$data['unit']);
        $this->assertEquals(1, $query->count());

    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $data = [];

        $this->post('/ingredients/delete/1',$data);
        $this->assertResponseSuccess();

        $articles = TableRegistry::get('Ingredients');
        $query = $articles->find()->where(['id' => 1]);
        $this->assertEquals(0, $query->count());
    }
}
