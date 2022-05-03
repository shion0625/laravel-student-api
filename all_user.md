# Get all user information

## Request

### endpoint

```
GET /api/students
```

### example use

```
GET https://students.shion0625.site/api/students/2
```

### response

```
{
    "success": true,
    "message": "list success",
    "0": [
        {
            "data": {
                "type": "student",
                "student_id": 1,
                "attributes": {
                    "name": "solt",
                    "age": 22,
                    "sex": "male",
                    "email": "kaito@gmail.com",
                    "course": "math"
                }
            }
        },
        {
            "data": {
                "type": "student",
                "student_id": 2,
                "attributes": {
                    "name": "yodogawa",
                    "age": 23,
                    "sex": "male",
                    "email": "shion@shion.site",
                    "course": "programing"
                }
            }
        }
    ]
}
```
