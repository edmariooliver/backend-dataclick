<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Signature\Dtos\SignatureDto;
use App\Validators\BaseValidator;
use Illuminate\Validation\Rule;

/**
 * To create a new validation method you must add its action in $actions 
 * after that you must name the method in the same pattern as those that 
 * already exist starting with validateData followed by the action validateDataAction()
 */
class SignatureValidator extends BaseValidator
{
    /**
     * @var Array $actions
     */
    protected static Array $actions = ["CREATE", "UPDATE"];
    
    /**
     * @return \Illuminate\Validation\Validator $validator
     */
    static function validateDataCreate(SignatureDto $signatureDto)
    {
        // dd($signatureDto);
        $signatureArray = [
            "id_user"         => $signatureDto->idUser,
            "id_club"         => $signatureDto->idClub,
        ];

        $validator = Validator::make($signatureArray, [
            'id_user'      => 'required|integer|exists:App\Models\User,id',
            'id_club'      => 'required|integer|exists:App\Models\Club,id',
        ]);

        return $validator;
    }

    /**
     * Validates the data for creating a new Signature
     * 
     * @return \Illuminate\Validation\Validator $validator
     */
    static function validateDataUpdate(SignatureDto $signatureDto)
    {
        $validators = [];
        $signatureArray  = [];

        if(!is_null($signatureDto->name)) {
            $validators["name"] = "max:255|min:2";
            $signatureArray["name"]  = $signatureDto->name;
        }
        $validator = Validator::make($signatureArray, $validators);

        return $validator;
    }
}