<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\Api\BaseRequest;
class ProductUpdateRequest extends FormRequest
{
     protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
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
        $category = $this->productRepository->findBySlugOrFail($this->category);

        return [
            'name' => 'required|max:191',
            'price' => 'required|max:191',
            'status' => 'required|max:191',
        ];
    }
}
