## 1. 数据库表之间关系

### 一对一
比如学生表：姓名，性别，年龄，身高，体重，籍贯，家庭地址，其中籍贯和家庭地址不常用，我们可以拆开成2个表：常用信息表，不常用信息表。这时候2个表就是由主键ID(P)关联起来的1对1关系

### 一对多
比如母亲与孩子的关系：母亲，孩子两个实体

母亲表：ID(P),名字，年龄，性别

孩子表：ID(P),名字，年龄，性别

以上关系：一个妈妈可以在孩子表中找到多条记录（也可能是一条），但是一个孩子只能找到一个妈妈
是一种典型的一对多的关系。

对于一对多关系的表设计，在孩子表中增加一个字段

### 多对多
比如：老师和学生

老师表 T_ID(P),姓名，性别

学生表 S_ID(P),姓名，性别

以上关系：一个老师教过多个学生，一个学生也被多个老师教过

解决方案：增加一张中间关系表

老师与学生的关系表：ID(P),T_ID,S_ID 

老师表与中间表形成一对多的关系，而中间表是多表；维护了能够唯一找到一表的关系；同样的学生表与中间表也是一个一对多的关系; 

学生找老师：找出学生ID--->中间表寻找匹配记录（多条）--->老师表匹配（一条）

老师找学生：找出老师ID--->中间表寻找匹配记录（多条）--->学生表匹配（一条）

## 2. 关系型数据库范式

| 范式名 | 描述 |
| :------ | :------ |
| 1NF | 字段是最小的的单元不可再分 |
| 2NF | 满足1NF,表中的字段必须完全依赖于全部主键而非部分主键 |
| 3NF | 满足2NF,非主键外的所有字段必须互不依赖 |
| BCNF | |
| 4NF | 满足3NF,消除表中的多值依赖 |


符合高一级范式的设计，必定符合低一级范式，例如符合2NF的关系模式，必定符合1NF。

若在一张表中，在属性（或属性组）X的值确定的情况下，必定能确定属性Y的值，那么就可以说Y函数依赖于X，写作 X → Y。类似于函数关系 y = f(x)，在x的值确定的情况下，y的值一定是确定的。

**例1：**

表1.1

| 学号 | 姓名 | 课程 | 老师 |
| :------ | ------: | :------: | :------: |
| 001 | 张三 | 语文 | 王刚 |
| 002 | 李四 | 语文 | 王刚 |
| 003 | 张三 | 数学 | 张倩 |

表1.1中，(学号，课程)是主属性

由于存在非主属性(姓名)对主属性部分依赖，所以它所以不符合2NF

**例2**

表2.1 学生表

| 学号 | 姓名 | 系名 | 系主任 |
| :------ | ------: | :------: | :------: |
| 001 | 张三 | 中文系 | 王刚 |
| 002 | 李四 | 外文系 | 王刚 |

表2.1中，学号是主属性

由于存在传递依赖，学号->系名->系主任，所以它不符合3NF

在数据库设计过程中，我们常说逆范式设计，往往指的是从3NF降级到2NF

数据库范式详细说明：[解释一下关系数据库的第一第二第三范式？](https://www.zhihu.com/question/24696366/answer/29189700)



