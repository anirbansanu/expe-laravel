<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

class SubCategoryRule implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer'
        ];

        $validator = Validator::make([$attribute => $value], $rules);

        if ($validator->fails()) {
            $fail($validator->errors()->first());
        }
    }
}
