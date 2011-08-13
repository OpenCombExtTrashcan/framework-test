<?php
namespace jc\test\unit\testcase\jc\fs;


/**
 * Test class for FileSystem.
 * Generated by PHPUnit on 2011-08-11 at 11:51:21.
 */
class FileSystem extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileSystem
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
         $this->object = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @todo Implement testFind().
     */
    public function testFind()
    {
    	$this->assertEquals($this->object ->find('/a.txt'),new \jc\fs\imp\MockFSO($this->object,'/a.txt'));
    }

    /**
     * @todo Implement testFindFile().
     */
    public function testFindFile()
    {
    	$this->assertEquals($this->object ->findFile('/a.txt'),new \jc\fs\imp\MockFSO($this->object,'/a.txt'));
    }

    /**
     * @todo Implement testFindFolder().
     */
    public function testFindFolder()
    {
    	$this->assertNull($this->object ->findFolder('/a.txt'));
    }

    /**
     * @todo Implement testSetFSOFlyweight().
     */
    public function testSetFSOFlyweight()
    {
        $aFSO = new \jc\fs\imp\MockFSO($this->object);
        $this -> object -> setFSOFlyweight("/a.txt",$aFSO);
        $this->assertTrue( $this->object->find("/a.txt") === $aFSO);
    }

    /**
     * @todo Implement testMount().
     */
    public function testMount()
    {
    	$anotherFileSystem = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT.'/xx');
    	$this->object->mount('/aaa',$anotherFileSystem);
    	$this->assertEquals($this->object->find('/aaa/bbb'),new \jc\fs\imp\MockFSO($anotherFileSystem,'/bbb'));
    }

    /**
     * @todo Implement testUmount().
     */
    public function testUmount()
    {
    	$anotherFileSystem = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT.'/xx');
    	$this->object->mount('/aaa',$anotherFileSystem);
    	$this->assertEquals($this->object->find('/aaa/bbb'),new \jc\fs\imp\MockFSO($anotherFileSystem,'/bbb'));
    	$this->object->umount('/aaa');
    	$this->assertEquals($this->object->find('/aaa/bbb'),new \jc\fs\imp\MockFSO($this->object,'/aaa/bbb'));
    }

    /**
     * @todo Implement testExists().
     */
    public function testExists()
    {
        $this->assertTrue($this->object->exists('/aaa'));
    }

    /**
     * @todo Implement testIsFile().
     */
    public function testIsFile()
    {
        $this->assertTrue($this->object->isFile('/aaa'));
    }

    /**
     * @todo Implement testIsFolder().
     */
    public function testIsFolder()
    {
        $this->assertFalse($this->object->isFolder('/aaa'));
    }

    /**
     * @todo Implement testCopy().
     */
    public function testCopy()
    {
    	$this->object->copy('/aaa','/bbb');
    	
    }

    /**
     * @todo Implement testMove().
     */
    public function testMove()
    {
    	$this->object->move('/aaa','/bbb');
    }

    /**
     * @todo Implement testCreateFile().
     */
    public function testCreateFile()
    {
    	$this->object->createFile('/aaa');
    }

    /**
     * @todo Implement testCreateFolder().
     */
    public function testCreateFolder()
    {
    	$this->setExpectedException(
    		'jc\lang\Exception','试图创建Folder，但由于存在同名File无法创建'
    	);
    	$this->object->createFolder('/aaa');
    }

    /**
     * @todo Implement testDelete().
     */
    public function testDelete()
    {
    	$this->object->delete('/aaa');
    }

    /**
     * @todo Implement testMountPath().
     */
    public function testMountPath()
    {
    	$anotherFileSystem = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT.'/xx');
    	$anotherFileSystem -> mount('/aaa',$this->object);
    	$this->assertEquals( $this->object->mountPath(),'/aaa');
    }

    /**
     * @todo Implement testParentFileSystem().
     */
    public function testParentFileSystem()
    {
    	$this->assertNull($this->object->parentFileSystem());
    	$anotherFileSystem = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT.'/xx');
    	$anotherFileSystem -> mount('/aaa',$this->object);
    	$this->assertEquals($this->object->parentFileSystem(),$anotherFileSystem);
    }

    /**
     * @todo Implement testRootFileSystem().
     */
    public function testRootFileSystem()
    {
        $this->assertEquals($this->object->rootFileSystem(),$this->object);
        $anotherFileSystem = new \jc\fs\imp\MockFileSystem(\jc\test\unit\PATH_DATA_ROOT.'/xx');
    	$anotherFileSystem -> mount('/aaa',$this->object);
    	$this->assertEquals($this->object->rootFileSystem(),$anotherFileSystem);
    }

    /**
     * @todo Implement testIsCaseSensitive().
     */
    public function testIsCaseSensitive()
    {
        $this->assertTrue( $this->object->isCaseSensitive() );
    }

    /**
     * @todo Implement testSetCaseSensitive().
     */
    public function testSetCaseSensitive()
    {
    	$this->assertTrue( $this->object->isCaseSensitive() );
    	$this->object->setCaseSensitive(false);
    	$this->assertFalse( $this->object->isCaseSensitive() );
    	$this->object->setCaseSensitive(true);
    	$this->assertTrue( $this->object->isCaseSensitive() );
    }

    /**
     * @todo Implement testFormatPath().
     */
    public function testFormatPath()
    {
        $arrTestPath=array(
        				'//home/elephant/./../gituser/elephant/' => '/home/gituser/elephant/' ,
        );
        foreach($arrTestPath as $strPath => $strAns)
        {
        	$this->assertEquals($this->object->formatPath($strPath) , $strAns );
        	$this->assertEquals(\jc\fs\FileSystem::formatPath($strPath) , $strAns );
        }
    }

    /**
     * @todo Implement testRelativePath().
     */
    public function testRelativePath()
    {
    	$this->assertNull("todo");
    }
}
?>
