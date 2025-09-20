<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected string|null $subdomain;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->subdomain = request()->route('subdomain');
    }

    /**
     * API レスポンスの共通フォーマット
     *
     * @param boolean $success
     * @param mixed $data
     * @param string $message
     * @param array $errors
     * @param integer $status
     * @return JsonResponse
     */
    protected function apiResponse(
        bool $success,
        mixed $data = null,
        string $message = '',
        array $errors = [],
        int $status = 200
    ): JsonResponse {
        return response()->json([
            'success'   => $success,
            'message'   => $message,
            'data'      => $data,
            'errors'    => $errors,
            'meta'      => [
                'timestamp' => now()->toIso8601String(),
                'subdomain' => $this->subdomain,
            ],
        ], $status);
    }
}
