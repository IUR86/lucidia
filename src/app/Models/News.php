<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title タイトル
 * @property string $body 本文
 * @property \Illuminate\Support\Carbon $publication_start_date 公開開始日
 * @property \Illuminate\Support\Carbon $publication_end_date 公開終了日
 * @property int $target 対象
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News wherePublicationEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News wherePublicationStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class News extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'publication_start_date',
        'publication_end_date',
        'target',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'publication_start_date' => 'datetime',
            'publication_end_date' => 'datetime',
        ];
    }

    /**
     * ステータスのHTMLを取得
     *
     * @return string
     */
    public function getStatusHtml(): string
    {
        if ($this->publication_start_date->isBefore(now())) {
            return '<span class="status status-published">公開中</span>';
        }

        return '<span class="status status-draft">未公開</span>';
    }
}
