# laravel-student-api

use this [API](https://students.shion0625.site/)
## Introduction

RESTful API in Laravel PHP.
This API is the first API I created. Since we are using only one database, it will be shared with multiple people. I created it as a study of Restful API. I'm sure there are things I haven't done well, so if you have any advice, I'd appreciate it if you could send it to me via issue or something.

## Functions provided

- User Registration Function
- Retrieval of all users
- Retrieving specific users
- Update information of a specific user
- Delete a user

## Request

Each parameter of the request is a

- Path
- Query
- Header
- (in the POST method) body

The parameters of the request must be placed in the specified location in the body of the request. Body parameters are received in JSON format.

## Response

Returns `2xx` on success, or `4xx` or `5xx` (where `x` is a number) on error as a status code.


## What you can do with the API

### Retrieving user information

|                         | method     | URI
| ----------------------- | ---------- | -------------------------------------------
| [Get all user information](all_user.md) | GET | /api/students
| [Obtain specific user information](specific_user.md)| GET |/api/students/{id}

### User Registration/Change/Delete
|                         | method     | URI
| ----------------------- | ---------- | ------------------------------------------
| [Register a user](register.md) | POST | /api/students
| [Update specific user information](update.md) | PUT | /api/students/{id}
| [Delete a specific user](delete.md) | DELETE | /api/students/{id}

## Main Reference Site

- see this [main](https://www.twilio.com/blog/building-and-consuming-a-restful-api-in-laravel-php-jp).
- see this [validate](https://yama-weblog.com/create-validation-class-in-laravel-without-using-controller-class/).
