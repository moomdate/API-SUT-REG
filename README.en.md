# API REG SUT SYSTEM
![alt text](https://www.picz.in.th/images/2017/09/28/532742-128.png "Logo Title Text 1")

------
## Specification
[Thai](README.md)

------
##### Available Features
* Query data with course code
    * Course title
    * Credits
    * Number of groups
    * Study time
    * Details such as Exam date, Instructor

------
##### - About file
| File name                                      | Description                                           | Variable   | About Variable                        |
| ---------------------------------------------- | ----------------------------------------------------- | ---------- | ------------------------------------- |
| [courseid.json](Data/courseid.json)            | collect data to variable courseid and coursecode      | courseid   | Query course information with ID      |
|                                                |                                                       | coursecode | The search will refer to the courseid |
| [api.php](api.php)                             |                                                       |            |                                       |
| [simple_html_dom.php](Lib/simple_html_dom.php) | Used to retrieve the contents of the reg page as html |            |                                       |

------
## How to use

#### Query Data
* Full Query Data
    * Query course information: `?id=CourseCode&acadyear=AcademicYear&semester=Trimester`
    * Example: ` www.snailbot.xyz/api.php?id=523101&acadyear=2560&semester=3`

* Simplify Query Data
    * Query course information: `/get/#a/#b/#c`
        ```
        #a = Course Code
        #b = Academic Year
        #c = Trimester
        ```
    * Example: ` www.snailbot.xyz/get/532101/2560/3`
        # ![link test](https://www.img.live/images/2018/09/24/sada.png)  
------
## Case did not find the course
##### If no course is found, the json file containing the course code is not updated / No course code for insert data the course
* Insert: `/insert/CourseCode/AcademicYear`

    * Example: ` www.snailbot.xyz/insert/532101/2560`
    * Example: `https://snailbot.xyz/mn.php?id=523101&y=2560`
##### If the data is successfully insert
```json
{
"status":"success",
"code":1,
"coursecode":"1003564",
"courseid":"523101"
}
```
##### There is data in the json file
```json
{
"status":"has in table",
"code":2
}
```
##### There is not data in the json file
# ![](https://www.img.live/images/2018/09/24/d49cca06bc946712.png)  


### Facebook : [Surasak Sincharoen](https://fb.com/moomdate)