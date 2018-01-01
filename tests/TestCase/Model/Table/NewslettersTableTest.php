<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewslettersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewslettersTable Test Case
 */
class NewslettersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewslettersTable
     */
    public $Newsletters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.newsletters',
        'app.users',
        'app.roles',
        'app.archive_images',
        'app.attachments',
        'app.comments',
        'app.forums',
        'app.pages',
        'app.payments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Newsletters') ? [] : ['className' => NewslettersTable::class];
        $this->Newsletters = TableRegistry::get('Newsletters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Newsletters);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
