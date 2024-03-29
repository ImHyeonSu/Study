<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttachmentRequest;
use App\Models\Attachment;
use App\Models\Post;
use App\Services\AttachmentService;
use Illuminate\Http\RedirectResponse;

class AttachmentController extends Controller
{
    /**
     * AttachmentController
     */
    public function __construct(
        private readonly AttachmentService $attachmentService
    ) {
        $this->authorizeResource(Attachment::class, 'attachment', [
            'except' => ['store'],
        ]);

        $this->middleware('can:create,App\Models\Attachment,post')
            ->only('store');
    }

    /**
     * ファイル作り
     */
    public function store(StoreAttachmentRequest $request, Post $post): void
    {
        $this->attachmentService->store($request->validated(), $post);
    }

    /**
     * ファイル削除
     */
    public function destroy(Attachment $attachment): RedirectResponse
    {
        $this->attachmentService->destroy($attachment);

        return back();
    }
}
