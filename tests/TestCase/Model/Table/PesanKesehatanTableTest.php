<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PesanKesehatanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PesanKesehatanTable Test Case
 */
class PesanKesehatanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PesanKesehatanTable
     */
    public $PesanKesehatan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PesanKesehatan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PesanKesehatan') ? [] : ['className' => PesanKesehatanTable::class];
        $this->PesanKesehatan = TableRegistry::getTableLocator()->get('PesanKesehatan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PesanKesehatan);

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
