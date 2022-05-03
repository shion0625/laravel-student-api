<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    /**
     * getAllStudent method test
     *
     * @return void
     */
    public function test_successGetAllStudents()
    {
        $this->json('GET', 'api/students')
            ->assertStatus(200)
            ->assertJsonFragment([
                "success" => true,
                "message" => "list success",
                "0" => [
                    [
                    "data" =>[
                        'type' => "student",
                        'student_id' => 1,
                        'attributes' =>[
                            'name' => "kaito",
                            'age' => 22,
                            'sex' => "male",
                            'email' => "kaito@gmail.com",
                            'course' => "common programming"
                            ],
                    ],
                ],
                [
                    "data" =>[
                        'type' => "student",
                        'student_id' => 2,
                        'attributes' =>[
                            'name' => "yodogawa",
                            'age' => 30,
                            'sex' => "female",
                            'email' => "yodogawa@gmail.com",
                            'course' => "c programming"
                            ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * We are testing to see if createStudent is successful.
     * And response is checking for correctness.
     *
     * @return void
     */
    public function test_successCreateStudent(){
        $createData =[
            'name' => 'salt',
            'age' => 9,
            'sex' => '男性',
            'email' => 'solt@gmail.com',
            'course' => 'walk'
        ];
        $this->json('POST', 'api/students', $createData)
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                "message" => "student record created",
                [
                    'data' => [
                        'type' => 'student',
                        'student_id' => 3,
                        'attributes' =>[
                            'name' => 'salt',
                            'age' => 9,
                            'sex' => '男性',
                            'email' => 'solt@gmail.com',
                            'course' => 'walk',
                        ],
                    ],
                ]
            ]);
    }

    /**
      * I am testing if createStudent fails.
      * And response is checking for correctness.
     *
     * @return void
     */
    public function test_failCreateStudent(){
        $this->json('POST', 'api/students')
            ->assertStatus(400)
            ->assertJsonFragment([
                "success"=> false,
                "message"=> "records create failure",
            ]);
    }

        /**
         * I am testing if createStudent fails.
         * And response is checking for correctness.
         *
         * @return void
         */
    public function test_failEnterValueCreateStudent(){
        $createData =[
            'name' => '寿限無寿限無五劫のすりきれ海砂利水魚の水行末雲来末風来末食う寝るところに住むところやぶらこうじのぶらこうじパイポパイポパイポのシューリンガンシューリンガンのグーリンダイグーリンダイのポンポコピーのポンポコナの長久命の長助',
            'age' => "nine",
            'sex' => '寿限無寿限無五劫のすりきれ海砂利水魚の水行末雲来末風来末食う寝るところに住むところやぶらこうじのぶらこうじパイポパイポパイポのシューリンガンシューリンガンのグーリンダイグーリンダイのポンポコピーのポンポコナの長久命の長助',
            'email' => 'solt@kaito.sion.site',
            'course' => 'walk'
        ];
        $this->json('POST', 'api/students', $createData)
            ->assertStatus(400)
            ->assertJsonFragment([
                "success"=> false,
                "message"=> "records create failure",
            ]);
    }

    /**
     *  We test if getStudent succeeds.
     * It then checks if the response is correct.
     *
     * @return void
     */
    public function test_successGetStudent(){
        $this->json('GET', 'api/students/3')
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'get student successfully',
            [
                'data' => [
                    'type' => 'student',
                    'student_id' => 3,
                    'attributes' =>[
                        'name' => 'salt',
                        'age' => 9,
                        'sex' => '男性',
                        'email' => 'solt@gmail.com',
                        'course' => 'walk',
                    ],
                ],
            ]
        ]);
    }


    public function test_failMisnomerGetStudent(){
        $this->json('GET', 'api/students/100')
        ->assertStatus(404)
        ->assertJson([
            'success' => false,
            "message" => "Student not found"
        ]);
    }

    public function test_successUpdateStudent(){
        $createData =[
            'name' => 'tom',
            'age' => 15,
            'sex' => '女性',
            'email' => 'tom@gmail.com',
        ];
        $this->json('PUT', 'api/students/2', $createData)
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'records update successfully',
            [
                'data' => [
                    'type' => 'student',
                    'student_id' => 2,
                    'attributes' =>[
                        'name' => 'tom',
                        'age' => 15,
                        'sex' => '女性',
                        'email' => 'tom@gmail.com',
                        'course' => 'c programming',
                    ],
                ],
            ]
        ]);
    }

    public function test_failMisnomerUpdateStudent(){
        $createData =[
            'name' => 'tom',
            'age' => 15,
            'sex' => '男性',
            'email' => 'tom@gmail.com',
        ];
        $this->json('PUT', 'api/students/100', $createData)
        ->assertStatus(404)
        ->assertJson([
            'success' => false,
            "message" => "Student not found"
        ]);
    }

    public function test_failEnterValueUpdateStudent(){
        $createData =[
            'name' => '寿限無寿限無五劫のすりきれ海砂利水魚の水行末雲来末風来末食う寝るところに住むところやぶらこうじのぶらこうじパイポパイポパイポのシューリンガンシューリンガンのグーリンダイグーリンダイのポンポコピーのポンポコナの長久命の長助',
            'age' => "nine",
            'sex' => '寿限無寿限無五劫のすりきれ海砂利水魚の水行末雲来末風来末食う寝るところに住むところやぶらこうじのぶらこうじパイポパイポパイポのシューリンガンシューリンガンのグーリンダイグーリンダイのポンポコピーのポンポコナの長久命の長助',
            'email' => 'solt@kaito.sion.site',
            'course' => ''
        ];
        $this->json('PUT', 'api/students/1', $createData)
            ->assertStatus(400)
            ->assertJsonFragment([
                "success"=> false,
                "message"=> "records update failure",
            ]);
    }
    /**
     *   It tests if deleteStudent succeeds.
     * It then checks if the response is correct.
     *
     * @return void
     */
    public function test_successDeleteStudent(){
        $this->json('DELETE', 'api/students/3')
        ->assertStatus(202)
        ->assertJson([
            'success' => true,
            'message' => 'records delete successfully',
            [
                'data' => [
                    'type' => 'student',
                    'student_id' => 3,
                    'attributes' =>[
                        'name' => 'salt',
                        'age' => 9,
                        'sex' => '男性',
                        'email' => 'solt@gmail.com',
                        'course' => 'walk',
                    ],
                ],
            ]
        ]);
    }

    public function test_failDeleteStudent(){
        $this->json('DELETE', 'api/students/100')
        ->assertStatus(404)
        ->assertJson([
            'success' => false,
            "message" => "Student not found"
        ]);
    }
}
