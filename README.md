# API ระบบ REG SUT

[![N|Solid](https://www.picz.in.th/images/2017/09/28/532742-128.png =200px)](dsd)

API นี้สร้างขึ้นเพื่อใช้ดึงข้อมูลตารางเรียน เพื่อใช้ในวิชา # 523495 COMPUTER ENGINEERING PROJECT I สำหรับใช้ในระบบจัดตารางเรียน.
***
##### - สิ่งที่ใช้ได้
  - ดึงข้อมูลโดยรหัสวิชา
        - ชื่อวิชา
        - หน่วยกิต
        - จำนวนกลุ่ม
        - เวลาเรียน
        - รายละเอียดต่างๆ เช่นวันที่สอบ อาจารย์ผู้สอน
___
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
---
 \\(^^_^^)/
ผู้พัฒนา นายสุรศักดิ์ สินเจริญ CPE#19