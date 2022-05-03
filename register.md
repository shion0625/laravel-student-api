# Register a user

## Request

### Endpoint

```
POST /api/students
```

### Parameters

| place    | optionality | name | contents
|-------------------------------------------------------------------
|text | require | name | Name of the user you wish to register
|text | require | age | age of the user you wish to register
|text | require | sex | sex of the user you wish to register
|text | require | email | email of the user you wish to register
|text | require | course | course of the user you wish to register

### Example use

```
POST https://students.shion0625.site/api/students

```

### Response

```
{
    "success": true,
    "message": "student record created",
    "0": {
        "data": {
            "type": "student",
            "student_id": 4,
            "attributes": {
                "name": "kaito",
                "age": "20",
                "sex": "male",
                "email": "shion@gmail.com",
                "course": "C language"
            }
        }
    }
}
```
