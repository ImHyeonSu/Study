<?php

namespace App\Observers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentObserver
{
    /**
     * Handle the Attachment "deleted" event.
     */
    public function deleted(Attachment $attachment): void
    {   #説明ー書きの修正でファイルを削除した場合以下を通じて削除される
        Storage::disk('public')->delete($attachment->name);
    }
}
