<?php
namespace jc\test\unit\testcase\jc\aop;


/**
 * Test class for JointPoint.
 * Generated by PHPUnit on 2011-08-16 at 11:07:24.
 */
class JointPoint extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JointPoint
     */
    protected $aJointPoint ;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {}

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {}

    /**
     * @todo Implement testCreateCallFunction().
     */
    public function testCreateCallFunction()
    {
    	
    	// 指定类方法
    	$aJointPoint = \jc\aop\JointPoint::createCallFunction('MethodNameBBB','ClassNameAAA') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::MethodNameBBB()")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;

    	// 全局函数
    	$aJointPoint = \jc\aop\JointPoint::createCallFunction('FunctionNameAAA') ;
    	
    	$this->assertAttributeEquals(
	    		\jc\aop\JointPoint::transRegexp("::FunctionNameAAA()")
	    		, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 指定类的所有方法
    	$aJointPoint = \jc\aop\JointPoint::createCallFunction('*','ClassNameAAA') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::*()")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用通配符
    	$aJointPoint = \jc\aop\JointPoint::createCallFunction('FunctionName*','ClassName*') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassName*::FunctionName*()")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    }

    /**
     * @todo Implement testCreateAccessProperty().
     */
    public function testCreateAccessProperty()
    {
    	// 向一个属性赋值(set)
    	$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassNameAAA','PropertyNameBBB',\jc\aop\JointPoint::ACCESS_SET) ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$PropertyNameBBB set")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 访问一个属性(get)
    	$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassNameAAA','PropertyNameBBB',\jc\aop\JointPoint::ACCESS_GET) ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$PropertyNameBBB get")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 赋值或访问(set/get)
    	$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassNameAAA','PropertyNameBBB',\jc\aop\JointPoint::ACCESS_ANY) ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$PropertyNameBBB *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用通配符
    	$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassName*','PropertyName*') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassName*::\$PropertyName* *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 指定class的所有属性
    	$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassNameAAA') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$* *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 错误的 $sAccess
		$this->setExpectedException('jc\\lang\\Exception');
		$aJointPoint = \jc\aop\JointPoint::createAccessProperty('ClassNameAAA','PropertyNameBBB','setter') ;
    }

    /**
     * @todo Implement testCreateThrowException().
     */
    public function testCreateThrowException()
    {
    	// 指定异常类
    	$aJointPoint = \jc\aop\JointPoint::createThrowException('ExceptionClassNameAAA') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("throw ExceptionClassNameAAA")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 任意异常类
    	$aJointPoint = \jc\aop\JointPoint::createThrowException() ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("throw *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用通配符
    	$aJointPoint = \jc\aop\JointPoint::createThrowException('ExceptionClassName*') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("throw ExceptionClassName*")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    }

    /**
     * @todo Implement testCreateNewObject().
     */
    public function testCreateNewObject()
    {
    	// 指定类
    	$aJointPoint = \jc\aop\JointPoint::createNewObject('ClassNameAAA') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("new ClassNameAAA")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 任意类
    	$aJointPoint = \jc\aop\JointPoint::createNewObject() ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("new *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用通配符
    	$aJointPoint = \jc\aop\JointPoint::createNewObject('ClassName*') ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("new ClassName*")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    }

    /**
     * @todo Implement testSetExecutionPattern().
     */
    public function testSetExecutionPattern()
    {
    	$aJointPoint = new \jc\aop\JointPoint() ;
    	
    	// 完整类名
    	$aJointPoint->setExecutionPattern("new ClassName") ;
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("new ClassName")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用通配符
    	$aJointPoint->setExecutionPattern("throw jc\\lang\\Exception*") ;
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("throw jc\\lang\\Exception*")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    	
    	// 使用$
    	$aJointPoint->setExecutionPattern("some\\one\\package\\ClassAAA::\$PropertyAAA *") ;
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("some\\one\\package\\ClassAAA::\$PropertyAAA *")
    			, 'sExecutionRegexp',$aJointPoint
    	) ;
    }

    /**
     * @todo Implement testSetExecutionRegexp().
     */
    public function testSetExecutionRegexp()
    {
    	$aJointPoint = new \jc\aop\JointPoint() ;
    	
    	// 完整类名
    	$aJointPoint->setExecutionRegexp("`new ClassAAA`is") ;
    	$this->assertAttributeEquals("`new ClassAAA`is", 'sExecutionRegexp',$aJointPoint) ;
    }

    /**
     * @todo Implement testExecutionRegexp().
     */
    public function testExecutionRegexp()
    {
    	$aJointPoint = new \jc\aop\JointPoint() ;
    	
    	// 完整类名
    	$aJointPoint->setExecutionRegexp("`new ClassAAA`is") ;
    	$this->assertEquals("`new ClassAAA`is", $aJointPoint->executionRegexp()) ;
    }

    /**
     * @todo Implement testSetCallTrac().
     */
    public function testSetCallTrac()
    {
    	$aJointPoint = new \jc\aop\JointPoint() ;
    	
    	// 调用路径：
    	// 	some\one\package\ClassNameAAA::FuncNameAAA()
    	// 	...
    	// 	some\one\package\ClassNameBBB::FuncNameBBB()
    	$aJointPoint->setCallTrac("some\\one\\package\\ClassNameAAA::FuncNameAAA();*;some\\one\\package\\ClassNameBBB::FuncNameBBB()*") ;
    	
    	$this->assertAttributeEquals(
    			\jc\aop\JointPoint::transRegexp("some\\one\\package\\ClassNameAAA::FuncNameAAA();*;some\\one\\package\\ClassNameBBB::FuncNameBBB()*")
    			, 'sCallTracRegexp',$aJointPoint
    	) ;
    }

    /**
     * @todo Implement testCallTracRegexp().
     */
    public function testCallTracRegexp()
    {
    	$aJointPoint = new \jc\aop\JointPoint() ;
    	
    	// 调用路径：
    	// 	some\one\package\ClassNameAAA::FuncNameAAA()
    	// 	...
    	// 	some\one\package\ClassNameBBB::FuncNameBBB()
    	$aJointPoint->setCallTrac("some\\one\\package\\ClassNameAAA::FuncNameAAA();*;some\\one\\package\\ClassNameBBB::FuncNameBBB()*") ;
    	
    	$this->assertEquals(
    			\jc\aop\JointPoint::transRegexp("some\\one\\package\\ClassNameAAA::FuncNameAAA();*;some\\one\\package\\ClassNameBBB::FuncNameBBB()*")
    			, $aJointPoint->callTracRegexp()
    	) ;
    }

    /**
     * @todo Implement testTransRegexp().
     */
    public function testTransRegexp()
    {
        $this->assertEquals(
        	\jc\aop\JointPoint::transRegexp("ClassName*::FuncName*()")
        	, "`ClassName.*\:\:FuncName.*\(\)`is"
        ) ;
        
        $this->assertEquals(
        	\jc\aop\JointPoint::transRegexp("ClassNameAAA::FuncNameAAA()")
        	, "`ClassNameAAA\:\:FuncNameAAA\(\)`is"
        ) ;
        
        $this->assertEquals(
        	\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$PropertyNameAAA *")
        	, "`ClassNameAAA\:\:\\\$PropertyNameAAA .*`is"
        ) ;
        
        // 测试正则效果
        $this->assertRegExp(
        	\jc\aop\JointPoint::transRegexp("ClassNameAAA::\$PropertyNameAAA *")
        	, "ClassNameAAA::\$PropertyNameAAA set"
        ) ;
        $this->assertRegExp(
        	\jc\aop\JointPoint::transRegexp("ClassName*::FuncName*()")
        	, "ClassNameAAA::FuncNameAAA()"
        ) ;
    }
}

?>