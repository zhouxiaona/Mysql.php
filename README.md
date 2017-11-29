# 🎩 Mysql.php
## Usage
First:
`include ./path/Mysql.php;`

Second:
`For example:`
```bash
	//创建数据库实例
	$newdb=new Mysql("localhost","root","","mydb");
	//查询菜单menu表
	$data=$newdb->getAll("*","menu","1=1");
	print_r($data);
```
