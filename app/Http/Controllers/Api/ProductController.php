<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
use App\Product;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{

    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return response()->json($this->product->paginate(10));
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        if (!$product) {
            return response()->json(ApiError::errorMessage('Produto não encontrado!', 4040), 404);
        }

        return response()->json($product);
    }

   

    public function store(Request $request): JsonResponse
    {
        try {
            $rules = [
                'titulo' => 'required|string',
                'autor' => 'required|string',
                'categoria' => 'required|string',
                'texto' => 'required|string'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(
                    [
                    'errors' => $validator->messages()
                    ], 400
                );
            }

            $productData = $request->all();
            $this->product->create($productData);

            return $this->returnData(['msg' => 'Produto criado com sucesso!'], 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar', 1010), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'titulo' => 'required|string',
                'autor' => 'required|string',
                'categoria' => 'required|string',
                'texto' => 'required|string'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(
                    [
                    'errors' => $validator->messages()
                    ], 400
                );
            }

            $productData = $request->all();
            $product     = $this->product->find($id);
            $product->update($productData);

            $return = ['data' => ['msg' => 'Produto atualizado com sucesso!']];
            return response()->json($return, 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011), 500);
        }
    }

    public function delete(Product $id)
    {
        try {
            $id->delete();

            return response()->json(['data' => ['msg' => 'Produto: ' . $id->titulo . ' removido com sucesso!']], 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012), 500);
        }
    }
}
