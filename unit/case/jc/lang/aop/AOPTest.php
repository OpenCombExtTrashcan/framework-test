<?php
namespace jc\test\unit\testcase\jc\lang\aop;

use jc\lang\aop\Aspect;

use jc\lang\aop\Advice;

use jc\lang\aop\AOP ;
use jc\pattern\composite\IContainer;
use jc\lang\oop\ClassLoader;
use jc\lang\aop\Pointcut;
use jc\lang\aop\JointPoint;

/**
 * Test class for AOP.
 * Generated by PHPUnit on 2011-08-17 at 16:46:24.
 */
class AOPTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AOP
     */
    protected $aAOP;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
//        $this->aAOP = new AOP;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @todo Implement testAspects().
     */
    public function testAspects()
    {
    	$aAOP = new AOP();
		$this->assertTrue( $aAOP->aspects() instanceof IContainer ) ;
    }
    
    public function testJointPointIterator(){
    	//准备一些Advice
    	$sSource1 = "
    		function testFun1(){
    			echo 'testFun1';
    		}
    	";
    	$sSource2 = "
    		function testFun2(){
    			echo 'testFun2';
    		}
    	";
    	$a1 = new Advice('a1', $sSource1);
    	$a2 = new Advice('a2', $sSource2);
    	$a3 = new Advice('a3', $sSource2);
    	$a4 = new Advice('a4', $sSource1);
    	$a5 = new Advice('a5', $sSource2);
    	$a6 = new Advice('a5', $sSource2);
    	$a7 = new Advice('a5', $sSource1);
    	$a8 = new Advice('a5', $sSource2);
    	$a9 = new Advice('a5', $sSource1);
    	$a0 = new Advice('a5', $sSource2);
    	
    	//准备一些JointPoint
    	$j1 = new JointPoint();
    	$j2 = new JointPoint();
    	$j3 = new JointPoint();
    	$j4 = new JointPoint();
    	$j5 = new JointPoint();
    	$j6 = new JointPoint();
    	$j7 = new JointPoint();

    	//准备4个pointcut
    	
    	//有几个advice和jointpoint的Pointcut
    	$p1 = new Pointcut();
    	$p1->advices()->add($a1);
    	$p1->advices()->add($a2);
    	$p1->jointPoints()->add($j1);
    	$p1->jointPoints()->add($j2);
    	$p1->jointPoints()->add($j3);
    	
    	//只有一个jointpoint的Pointcut
    	$p2 = new Pointcut();
    	$p2->jointPoints()->add($j4);
    	$p2->jointPoints()->add($j5);
    	
    	//只有一个advice的Pointcut
    	$p3 = new Pointcut();
    	$p3->advices()->add($a3);
    	$p3->advices()->add($a4);
    	$p3->advices()->add($a5);
    	
    	//一个什么也没添加的Pointcut
    	$p4 = new Pointcut();
    	
    	
    	//准备几个Aspect
    	
    	//一个有很多内容的Aspect
    	$as1 = new Aspect();
    	$as1->pointcuts()->add($p1);
    	$as1->pointcuts()->add($p2);
    	$as1->pointcuts()->add($p3);
    	$as1->pointcuts()->add($p4);
    	
    	//一个什么也没有的Aspect
    	$as2 = new Aspect();
    	
    	//创建一个AOP,把上面的资源都放进去
    	$aAOP = new AOP();
    	$aAOP->aspects()->add($as1);
    	$aAOP->aspects()->add($as2);
    	
    	$aIterator = $aAOP->jointPointIterator();
    	$this->assertTrue($j1 === $aIterator->current());
    	$aIterator->next();
    	$this->assertTrue($j2 === $aIterator->current());
    	$aIterator->next();
    	$this->assertTrue($j3 === $aIterator->current());
    	$aIterator->next();
    	$this->assertTrue($j4 === $aIterator->current());
    	$aIterator->next();
    	$this->assertTrue($j5 === $aIterator->current());
    }
    
    public function testCreateClassCompiler(){
    	
    }
    
    public function testClassLoader(){
    	//使用自定义classLoader的情况
    	$aAOP = new AOP();
    	$aAOP->setClassLoader(new newClassLoader());
    	$aClassLoader = $aAOP->classLoader();
    	$this->assertType('jc\test\unit\testcase\jc\lang\aop\newClassLoader', $aClassLoader);
    	
    	//使用默认classLoader的情况
    	$aAOP = new AOP();
    	$aClassLoader = $aAOP->classLoader();
    	$this->assertType('jc\lang\oop\ClassLoader', $aClassLoader);
    }
}

class newClassLoader extends ClassLoader{}
?>
