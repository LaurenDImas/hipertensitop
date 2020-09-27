<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScreeningsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScreeningsTable Test Case
 */
class ScreeningsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScreeningsTable
     */
    public $Screenings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Screenings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Screenings') ? [] : ['className' => ScreeningsTable::class];
        $this->Screenings = TableRegistry::getTableLocator()->get('Screenings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Screenings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
