<?php

namespace App\Actions\User\Profile;

use App\Enum\ImageDir;
use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class UserProfileUpdateAction
{
    /**
     * プロフィールを更新
     *
     * @param UserProfileUpdateRequest $request
     * @return void
     */
    public function __invoke(UserProfileUpdateRequest $request): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        DB::transaction(function() use ($request) {
            /** @var User $user */
            $user = Auth::guard('user')->user();
            $user->fill($request->validated());

            if ($request->has('image')) {
                $image_service = new ImageService($request->image);
                $image_url = $image_service->upload(ImageDir::PROFILE);
                $user->back_image_url = $image_url;
            }

            $user->save();
        });
    }
}
