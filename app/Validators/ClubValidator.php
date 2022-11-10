<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Club\Dtos\ClubDto;
use App\Validators\BaseValidator;

/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class ClubValidator extends BaseValidator
{
    /**
     * @var Array $actions
     */
    protected static Array $actions = ["CREATE", "UPDATE"];
    
    /**
     * @return \Illuminate\Validation\Validator $validator
     */
    static function validateDataCreate(ClubDto $clubDto)
    {

        $clubArray = [
            "name"      => $clubDto->name,
        ];

        $validator = Validator::make($clubArray, [
            'name'      => 'required|max:255|min:2',
        ]);

        return $validator;
    }

    /**
     * Validates the data for creating a new Club
     * 
     * @return \Illuminate\Validation\Validator $validator
     */
    static function validateDataUpdate(ClubDto $clubDto)
    {
        $validators = [];
        $clubArray  = [];

        if(!is_null($clubDto->name)) {
            $validators["name"] = "max:255|min:2";
            $clubArray["name"]  = $clubDto->name;
        }
        $validator = Validator::make($clubArray, $validators);

        return $validator;
    }
}