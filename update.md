# Register a user

## Request

### Endpoint

```
PUT /api/students/{id}
```

### Parameters

| place    | optionality | name | contents
|-------------------------------------------------------------------
|text | not require | name | Name of the user you wish to register
|text | not require | age | age of the user you wish to register
|text | not require | sex | sex of the user you wish to register
|text | not require | email | email of the user you wish to register
|text | not require | course | course of the user you wish to register

### Example use

```
PUT https://students.shion0625.site/api/students/1

```

### Response

```
{
    "success": true,
    "message": "records update successfully",
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
