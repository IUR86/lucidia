<?php

namespace App\Services;

final class MetaService
{
    /**
     * @var string
     */
    public readonly string $title;

    /**
     * @var string
     */
    public readonly string $description;

    /**
     * タイトルをセット
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $meta_base_title = config('app.name');
        $this->title = "{$title} | {$meta_base_title}";
    }

    /**
     * 説明文をセット
     *
     * @param string $title
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}
