<?php

namespace App\Services;

use App\Enum\ImageDir;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

final class ImageService
{
    /**
     * @var UploadedFile
     */
    private readonly UploadedFile $uploaded_image;

    /**
     * 初期化処理
     *
     * @param UploadedFile $uploaded_image
     */
    public function __construct(UploadedFile $uploaded_image)
    {
        $this->uploaded_image = $uploaded_image;
    }

    /**
     * 画像をアップロード
     *
     * @param ImageDir $image_dir
     * @return string|false
     */
    public function upload(ImageDir $image_dir): string|false
    {
        Log::info("画像のアップロードを開始します");

        $image = $this->uploaded_image;
        $image_path = $image->store($image_dir->value, 'public');
        $image_url = Storage::disk('public')->url($image_path);

        Log::info("URL : {$image_url}の画像をアップロードが完了");

        return $image_url;
    }
}
