<?php
//在开发的时候可以将几个对象抽象出来，每个对象实现接口,以对象为单位进行各种操作
//创建雇员的抽象类
abstract class Employee{
	protected $name;
	function __construct($name){
		$this->name = $name;
	}
	abstract function fire();
}
//一个具体雇员的实现,还可以实现其他的雇员，其他的雇员实现其特定的方法
class Minion extends Employee{
	function fire(){
		print "{$this->name}:I'll clear my desk\n";
	}
}
//使用雇员的类，苛刻的boss
class NastyBoss{
	private $employees = array();
	function addEmployee($employeeName){
		$this->employees[] = new Minion($employeeName);//增加一个雇员对象，还可以将实例化类放在外面来实现，这里只传值$this->employees[] = $employee;$boss->addEmployee(new Minion("harry"));这样
	}
	function projectFails(){
		if(count($this->employees) > 0){
			$emp = array_pop($this->employees);//以雇员对象为单位进行操作
			$emp->fire();
		}
	}
}
$boss = new NastyBoss();
$boss->addEmployee("harry");
$boss->addEmployee("bob");
$boss->addEmployee("marry");
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
