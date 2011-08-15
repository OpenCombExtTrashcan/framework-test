<?php
require_once 'PHPUnit/Framework/TestSuite.php';
/**
 * Static test suite.
 */
class testSuite extends PHPUnit_Framework_TestSuite
{
    /**
     * Constructs the test suite handler.
     */
    public function __construct ()
    {
        $this->setName('testSuite');
    }
    /**
     * Creates the suite.
     */
    public static function suite ()
    {
        $aSuite = new self();
        $aSuite->addTestFile(__DIR__.'/pattern/composite/CompositeObjectTest.php') ;
        $aSuite->addTestFile(__DIR__.'/fs/FSOTest.php') ;
        $aSuite->addTestFile(__DIR__.'/locale/LocaleTest.php') ;
        $aSuite->addTestFile(__DIR__.'/locale/LocaleManagerTest.php') ;
        $aSuite->addTestFile(__DIR__.'/mvc/model/db/orm/SelecterTest.php') ;
        
        return $aSuite ;
    }
}
