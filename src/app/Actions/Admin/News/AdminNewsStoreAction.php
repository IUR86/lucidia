<?php

namespace App\Actions\Admin\News;

use App\Http\Requests\Admin\NewsStoreRequest;
use App\Models\News;

final class AdminNewsStoreAction
{
    /**
     * お知らせ登録
     *
     * @param NewsStoreRequest $request
     * @return void
     */
    public function __invoke(NewsStoreRequest $request): void
    {
        $news = new News();
        $news->fill($request->validated());
        $news->save();
    }
}
