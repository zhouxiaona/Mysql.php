<?php
	//连接数据库，并且判断数据库是否出错
	//mysql的链接错误处理
	$link=mysqli_connect("localhost","root","","mydb");
	if(mysqli_connect_errno($link)){
		echo "错误号：".mysqli_connect_errno($link);
		echo "</br>错误描述：网站错误，请联系管理员".mysqli_connect_errno($link);
		exit;
	}else{
		//保证页面是utf-8编码，需要进行编码转换
		//mysqli_query($link,"set names utf8");
		mysqli_set_charset($link,"utf8");
	}
	
	/*
	 封装的插入语句的函数
	 $fields　数组
	 比如插入一条订单数据:$fields=array(
	 	'name'=>'红烧肉',
	 	'price'=>10,
	 	'amount'=>5
	 );
	 * */
	function insert($link,$fields,$table){
		$sql=" insert into ";
		$sql.=$table." set ";
		$string="";
		foreach($fields as $key => $val){
			$string.=$key."='".$val."',";
		}
		$string=trim($string,",");
		$sql .=$string;
		echo $sql;
		mysqli_query($link,$sql);
	}
	
	/*
	 查询单条记录的方法
	 * */
	function getOne($link,$fields,$table,$where){
		$sql="select ";
		$sql.=$fields;
		$sql.=" from ".$table;
		$sql.=" where ".$where;
		//select * form table where...$fields
		//执行查询，如果有记录返回结果集
		$result=mysqli_query($link,$sql);
		//通过结果集方法返回一条数据
		if($result){
			return mysqli_fetch_assoc($result);
		}else{
			return false;
		}
		
	}
	
	/*
	 查询多条记录方法
	 * */
	function getAll($link,$fields,$table,$where){
		$sql="select ";
		$sql.=$fields;
		$sql.=" from ".$table;
		$sql.=" where ".$where;
		$result=mysqli_query($link,$sql);
		if($result){
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		}else{
			return false;
		}
		
	}
	//			mysqli_close($link);
?>