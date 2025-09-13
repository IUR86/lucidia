<?php

namespace App\Actions\Admin\Salon;

use App\Exports\SalonExport;
use App\Http\Requests\Admin\Salon\AdminSalonStoreRequest;
use App\Mail\Admin\SalonRegisteredMail;
use App\Models\Salon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

final class AdminSalonStoreAction
{
    /**
     * サロンを登録します
     *
     * @param AdminSalonStoreRequest $request
     * @return void
     */
    public function __invoke(AdminSalonStoreRequest $request): void
    {
        $validated_data = $request->validated();

        // DB登録
        $salon = new Salon();
        $salon->fill($validated_data);
        $salon->save();

        // 資料作成
        Excel::store(new SalonExport($salon), now()->format('YmdHi') . '_' . 'サロン.csv', 'local');

        // サロン先に登録メールを送信します
        Mail::to($salon->email)->send(new SalonRegisteredMail($salon));
    }
}
