# Register a user

## Request

### Endpoint

```
DELETE /api/students/{id}
```

### Example use

```
DELETE https://students.shion0625.site/api/students/4
```

### Response

```
{
    "success": true,
    "message": "records delete successfully",
    "0": {
        "data": {
            "type": "student",
            "student_id": 4,
            "attributes": {
                "name": "kaito",
                "age": 20,
                "sex": "male",
                "email": "shion@gmail.com",
                "course": "C language"
            }
        }
    }
}
```
