<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppAccRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'student_info_id' => 'required',
            'article_form_type' => 'required',
            'apprentice_exp' => 'required|bool',
            'apprentice_exp_file' => 'exclude_if:apprentice_exp,false|required',
            'gov_staff' => 'required|bool',
            'gov_position' => 'exclude_if:gov_staff,false|required',
            'gov_joining_date' => 'exclude_if:gov_staff,false|required',
            'request_papp' => 'required',
            'exam_pass_date' => 'nullable|date',
            'exam_pass_batch' => 'nullable',
            'ex_papp' => 'nullable',
            'exp_start_date' => 'nullable|date',
            'exp_end_date' => 'nullable|date',
            'accept_policy' => 'required|bool',
            'resign_date' => 'nullable|date',
            'resign_reason' => 'nullable',
            'recent_org' => 'nullable',
            'resign_approve_file' => 'nullable',
            'know_policy' => 'nullable',
        ];
    }
}
