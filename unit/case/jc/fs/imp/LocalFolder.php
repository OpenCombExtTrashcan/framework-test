<?php
namespace jc\test\unit\testcase\jc\fs\imp;


/**
 * Test class for LocalFolder.
 * Generated by PHPUnit on 2011-08-13 at 09:31:17.
 */
class LocalFolder extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LocalFolder
     */
    protected $object;
    const strFolderName='/afolder';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    	$aFileSystem = new \jc\fs\imp\LocalFileSystem(\jc\test\unit\PATH_DATA_ROOT);
    	if(! $aFileSystem ->exists(self::strFolderName)){
    		$aFileSystem -> createFolder(self::strFolderName);
    	}
        $this->object = $aFileSystem->findFolder(self::strFolderName);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    	$str="rm -rf ".$this->object->localPath();
    	`$str`;
    }

    /**
     * @todo Implement testFindFile().
     */
    public function testFindFile()
    {
        $strFile='a.txt';
        $this->assertNull($this->object->findFile($strFile));
        $aFile = $this->object->createFile($strFile);
        $this->assertEquals($this->object->findFile($strFile),$aFile);
        $aFile -> delete();
    }

    /**
     * @todo Implement testFindFolder().
     */
    public function testFindFolder()
    {
        $strFolder='af';
        $this->assertNull($this->object->findFolder($strFolder));
        $aFolder = $this->object->createFolder($strFolder);
        $this->assertEquals($this->object->findFolder($strFolder),$aFolder);
        $aFolder -> delete();
    }

    /**
     * @todo Implement testCreate().
     */
    public function testCreate()
    {
        $strFolder='cf/de/gh/hi';
        $this->assertNull($this->object->findFolder($strFolder));
        $aFolder = $this->object->createFolder($strFolder);
        $this->assertEquals($this->object->findFolder($strFolder),$aFolder);
        $aFolder -> delete();
    }

    /**
     * @todo Implement testCreateFile().
     */
    public function testCreateFile()
    {
        $strFile='a.txt';
        $this->assertNull($this->object->findFile($strFile));
        $aFile = $this->object->createFile($strFile);
        $this->assertEquals($this->object->findFile($strFile),$aFile);
        $aFile -> delete();
    }

    /**
     * @todo Implement testCreateFolder().
     */
    public function testCreateFolder()
    {
        $strFolder='af';
        $this->assertNull($this->object->findFolder($strFolder));
        $aFolder = $this->object->createFolder($strFolder);
        $this->assertEquals($this->object->findFolder($strFolder),$aFolder);
        $aFolder -> delete();
    }

    /**
     * @todo Implement testIterator().
     */
    public function testIterator()
    {
        
    }

    /**
     * @todo Implement testExists().
     */
    public function testExists()
    {
        $this->assertTrue($this->object->exists());
    }
}
?>
