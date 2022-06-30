<?php

namespace App\Domains\Merchant\Controllers;

use App\Domains\Merchant\Database\Repositories\MerchantRepository;
use App\Domains\Merchant\Mappers\MerchantMapper;
use App\Domains\Merchant\Services\Auth\AuthenticateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $authenticateService;
    private $repository;

    public function __construct(AuthenticateService $authenticateService, MerchantRepository $repository)
    {
        $this->authenticateService = $authenticateService;
        $this->repository = $repository;
    }

    /**
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->all()
            ], 400);
        }

        try {
            $dto = MerchantMapper::toDto($request);

            $token = $this->authenticateService->login($dto);

            return $this->respondWithToken($token);

        }catch (\Exception $exception){
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function logout(): JsonResponse
    {
        $this->authenticateService->logout();

        return response()->json([
        'message' => "Logged out successfully"
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('merchant')->factory()->getTTL() * 60
        ]);
    }

    /**
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:merchants',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->all()
            ], 401);
        }

        $dto = MerchantMapper::toDto($request);

        $this->repository->save($dto);

        return response()->json([
            'message' => 'User successfully registered',
        ], 201);
    }
    public function index(){
        dd("Mustafa");
    }
}
