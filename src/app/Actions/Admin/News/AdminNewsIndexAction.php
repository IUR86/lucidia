<?php

namespace App\Actions\Admin\News;

use App\Models\News;

final class AdminNewsIndexAction
{
    /**
     * お知らせ一覧を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $news = new News();
        $news_paginate = $news->query()->paginate();

        return [
            'news_paginate' => $news_paginate
        ];
    }
}
