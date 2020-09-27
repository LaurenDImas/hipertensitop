<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MengenaiHipertensiTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MengenaiHipertensiTable Test Case
 */
class MengenaiHipertensiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MengenaiHipertensiTable
     */
    public $MengenaiHipertensi;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MengenaiHipertensi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MengenaiHipertensi') ? [] : ['className' => MengenaiHipertensiTable::class];
        $this->MengenaiHipertensi = TableRegistry::getTableLocator()->get('MengenaiHipertensi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MengenaiHipertensi);

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
