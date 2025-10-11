<?php

namespace App\Http\Controllers;

use App\Services\MetaService;
use Illuminate\Http\JsonResponse;
use LogicException;

abstract class Controller
{
    protected const META_TITLE = '';
    protected const META_DESCRIPTION = '';

    /**
     * @var string|null
     */
    protected string|null $subdomain;

    /**
     * @var MetaService
     */
    protected MetaService $meta_service;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->subdomain = request()->route('subdomain');
        $this->meta_service = new MetaService();
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
