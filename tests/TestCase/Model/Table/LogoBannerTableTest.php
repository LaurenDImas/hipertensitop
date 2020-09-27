<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogoBannerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogoBannerTable Test Case
 */
class LogoBannerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogoBannerTable
     */
    public $LogoBanner;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LogoBanner',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LogoBanner') ? [] : ['className' => LogoBannerTable::class];
        $this->LogoBanner = TableRegistry::getTableLocator()->get('LogoBanner', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LogoBanner);

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
