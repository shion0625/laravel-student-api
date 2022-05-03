<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'student',
                'student_id' => $this->id,
                'attributes' =>[
                    'name' => $this->name,
                    'age'=>$this->age,
                    'sex'=>$this->sex,
                    'email'=>$this->email,
                    'course'=>$this->course,
                ],
            ],
        ];
    }
}
