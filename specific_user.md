# Obtain specific user information

## Request

### endpoint

```
GET /api/students/{id}
```

### example use

```
GET https://students.shion0625.site/api/students/2
```

### response

```
{
    "success": true,
    "message": "get student successfully",
    "0": {
        "data": {
            "type": "student",
            "student_id": 2,
            "attributes": {
                "name": "tom",
                "age": 15,
                "sex": "女性",
                "email": "tom@gmail.com",
                "course": "c programming"
            }
        }
    }
}
```
