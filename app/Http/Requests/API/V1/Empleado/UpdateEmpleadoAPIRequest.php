<?php

namespace App\Http\Requests\API\V1\Empleado;

use App\Models\V1\Empleado;
use InfyOm\Generator\Request\APIRequest;

class UpdateEmpleadoAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Empleado::$rules;
        
        return $rules;
    }
}
