# API ระบบ REG SUT

[![N|Solid](https://www.picz.in.th/images/2017/09/28/532742-128.png)](dsd)
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

## [ตัวอย่าง](https://still-mountain-63520.herokuapp.com/api.php?id=110206)
``` 
การดึงรายระเอียดวิชา /$A/api/$B
$A หมายถึง เซิฟเวอร์ระบบซึ่งมี 1-5
$B หมายถึงรหัสวิชา
```
# ![Demo](https://www.picz.in.th/images/2017/09/28/Capture16a1472e21233147.png)  https://still-mountain-63520.herokuapp.com/2/api/535203/
***
### [Facebook](https://fb.com/moomdate) --Moomdate--