<?php
namespace jc\test\unit\testcase\jc\fs\imp;


/**
 * Test class for MockLocalFileSystem.
 * Generated by PHPUnit on 2011-08-12 at 15:38:55.
 */
class MockLocalFileSystem extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockLocalFileSystem
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new \jc\fs\imp\MockLocalFileSystem('/home/elephant/文档/JeCat/elephant-repo-lxj/test/unit/data/locale');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @todo Implement testIterator().
     */
    public function testIterator()
    {
        $this->object->iterator('/data');
    }

    /**
     * @todo Implement testLocalPath().
     */
    public function testLocalPath()
    {
        $this->assertEquals(
        	$this->object->localPath(),
        	'/home/elephant/文档/JeCat/elephant-repo-lxj/test/unit/data/locale'
        );
    }

    /**
     * @todo Implement testExistsOperation().
     */
    public function testExistsOperation()
    {
    	$strPath='/folder1';
        $this->assertTrue( $this->object->existsOperation($strPath) );
    }

    /**
     * @todo Implement testIsFileOperation().
     */
    public function testIsFileOperation()
    {
        $arrTestIsFile=array(
        		'/folder1' => false,
        		'/folder1/packageA.en.spg' => true,
        		'/folder1/a' => false,
        );
        foreach($arrTestIsFile as $strPath => $bAns){
        	$this->assertEquals(
        			$this->object->isFileOperation($strPath),
        			$bAns
        		);
        }
    }

    /**
     * @todo Implement testIsFolderOperation().
     */
    public function testIsFolderOperation()
    {
        $arrTestIsFile=array(
        		'/folder1' => true,
        		'/folder1/packageA.en.spg' => false,
        		'/folder1/a' => false,
        );
        foreach($arrTestIsFile as $strPath => $bAns){
        	$this->assertEquals(
        			$this->object->isFolderOperation($strPath),
        			$bAns
        		);
        }
    }

    /**
     * @todo Implement testDeleteFileOperation().
     */
    public function testDeleteFileOperation()
    {
    	$strPath='/folder1/a.cpp';
        $this->object->createFileObject($strPath)->create();
        $this->assertTrue(
        		$this->object->isFileOperation($strPath)
        );
        $this->object->deleteFileOperation($strPath);
        $this->assertFalse(
        		$this->object->isFileOperation($strPath)
        );
    }

    /**
     * @todo Implement testDeleteDirOperation().
     */
    public function testDeleteDirOperation()
    {
        $strPath='/folder1/aa/bas/efg/ccg';
        $this->object->createFolderObject($strPath)->create();
        $this->assertTrue(
        		$this->object->isFolderOperation($strPath)
        );
        $this->object->deleteDirOperation($strPath);
        $this->assertFalse(
        		$this->object->isFolderOperation($strPath)
        );
    }

    /**
     * @todo Implement testCreateFileObject().
     */
    public function testCreateFileObject()
    {
        $strPath='/folder1/a.cpp';
        $this->object->createFileObject($strPath)->create();
        $this->assertTrue(
        		$this->object->isFileOperation($strPath)
        );
    }

    /**
     * @todo Implement testCreateFolderObject().
     */
    public function testCreateFolderObject()
    {
        $strPath='/folder1/aa/bas/efg/ccg';
        $this->object->createFolderObject($strPath)->create();
        $this->assertTrue(
        		$this->object->isFolderOperation($strPath)
        );
    }
}
?>
