<?php
namespace jackalope;

if (method_exists('PHPUnit_Util_Filter', 'addDirectoryToFilter')) {
    \PHPUnit_Util_Filter::addDirectoryToFilter(__DIR__ . '/..');
}

//require_once(dirname(__FILE__) . '/importexport.php');
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../src/jackalope/autoloader.php';

abstract class baseSuite extends \PHPUnit_Framework_TestSuite {
    protected $path = '';
    protected $configKeys = array('jcr.url', 'jcr.user', 'jcr.pass', 'jcr.workspace', 'jcr.transport');

    public function setUp() {
        parent::setUp();
        $this->sharedFixture = array();
        foreach ($this->configKeys as $cfgKey) {
            $this->sharedFixture['config'][substr($cfgKey, 4)] = $GLOBALS[$cfgKey];
        }
    }
}
