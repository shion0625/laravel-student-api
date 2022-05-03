<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:100'],
            'age' => ['required','regex:/^[0-9][0-9]*/'],
            'sex' => ['required','string','max:20'],
            'email' => ['required','email:strict,dns,spoof','max:255'],
            'course' => ['required','string','max:100']
        ];
    }

        public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.string' => '名前を文字列で入力してください。',
            'name.max' => '名前の最大文字数は100文字です。',
            'age.required' => '年齢を入力してください。',
            'age.regex' => '0以上の値を入力してください。',
            'sex.required' => '性別を入力してください。',
            'sex.string' => '性別をを文字列で入力してください。',
            'sex.max' => '名前の最大文字数は20文字です。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しい形式で入力してください。',
            'email.max' => 'メールアドレスの最大文字数は255文字です。',
            'course.required' => 'コース名を入力してください。',
            'course.string' => 'コース名を文字列で入力してください。',
            'course.max' => 'コース名の最大文字数は100文字です。',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ],400);
        throw new HttpResponseException($response);
    }
}
