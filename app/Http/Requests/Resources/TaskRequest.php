<?php

namespace App\Http\Requests\Resources;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    /**
     * Define validation rules to store method for resource creation
     *
     * @return array
     */
    public function createRules(): array
    {
        return [
            // 'type' => 'required|in:admin,user',
            // 'name' => 'required|string|max:191',
            'task' => 'required|string|max:191|unique:task',
            //'password' => 'required|string|min:6'
        ];
    }

    /**
     * Define validation rules to update method for resource update
     *
     * @return array
     */
    public function updateRules(): array
    {
        return [
            // 'type' => 'sometimes|in:admin,user',
            // 'name' => 'sometimes|string|max:191',
            //'bedrijfsnaam' => 'required|string|email|max:191|unique:loading_addresses',
        ];
    }
}
