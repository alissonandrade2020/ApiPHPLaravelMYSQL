<?php

namespace App\Http\Requests;

class ClientRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->getRegisterId();

        return [
            'name' => 'required|max:45',
            'cpf' => 'required|digits:11|unique:clients,cpf,' . $id,
        ];
    }
}
