# API ระบบ REG SUT
![alt text](https://www.picz.in.th/images/2017/09/28/532742-128.png "Logo Title Text 1")

------
## Specification
[English](README.en.md)

------
##### - สิ่งที่ใช้ได้
  - ดึงข้อมูลโดยรหัสวิชา
    - ชื่อวิชา
    - หน่วยกิต
    - จำนวนกลุ่ม
    - เวลาเรียน
    - รายละเอียดต่างๆ เช่นวันที่สอบ อาจารย์ผู้สอน
------
##### - เกี่ยวกับไฟล์
- ###### File  ``Data/courseid.json``
    - สำหรับเก็บข้อมูล courseid และ coursecode
        - `courseid` หมายถึง ID ที่ใช้ในการ Query ข้อมูลรายวิชา
        - `coursecode` หมายถึง รหัสวิชา โดยการค้นหาจะอ้างอิงไปถึง `courseid`
- ###### File ``api.php``
    - เดะว่างๆมาเขียนนาคร้าบ ^^
- ###### File ``Lib/simple_html_dom.php``    
    - คือ php dom (Document Object Model) แต่เป็นไลบรารี่ที่มีคนพัฒนาไว้แย้ว
        - ใช้สำหรับดึง content หน้า reg เป็น html แล้ว.....
    - Github [![N|Solid](https://github.com/favicon.ico)](https://github.com/sunra/php-simple-html-dom-parser)
------
## How to use

#### การดึงข้อมูล
- แบบเต็ม
    - การดึงรายระเอียดวิชา `?id=รหัสวิชา&acadyear=ปีการศึกษา&semester=ภาคการศึกษา`
Example: ` https://sut-schedule.tech/api.php?id=523101&acadyear=2560&semester=3`

- แบบย่อ
```
 /get/#a/#b/#c
 #a = รหัสวิชา
 #b = ปีการศึกษา
 #c = เทอม
```
Example: ` https://sut-schedule.tech/get/523101/2560/3`
# ![link test](https://www.img.live/images/2018/09/24/sada.png)  
------
## กรณีไม่พบรายวิชา
กรณีที่ไม่พบรายวิชาอาจเกิดจากไฟล์ json ที่เก็บรหัสรายวิชาไม่ได้มีการอัปเดท หรือไม่มีรหัสวิชาให้ทำการ Insert รหัสวิชา ดังตัวอย่างต่อไปนี้
`/insert/รหัสวิชา/ปีที่รายวิชานั้นเปิดสอน`

#### Example: ` https://sut-schedule.tech/insert/523101/2560`
---
#### Example: `https://sut-schedule.tech/mn.php?id=523101&y=2560`
##### กรณีเพิ่มข้อมูลสำเร็จ 
```json
{
"status":"success",
"code":1,
"coursecode":"1003564",
"courseid":"523101"
}
```
##### กรณีที่มีรหัสในไฟล์ json แล้ว
```json
{
"status":"has in table",
"code":2
}
```
##### กรณีไม่พบไฟล์
# ![](https://www.img.live/images/2018/09/24/d49cca06bc946712.png)  


### [Facebook](https://fb.com/moomdate) --Moomdate--
