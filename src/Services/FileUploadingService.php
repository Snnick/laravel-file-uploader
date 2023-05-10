<?php

declare(strict_types=1);

namespace Snnick\LaravelFileUploader\Services;

use Illuminate\Http\UploadedFile;
use Str;

final class FileUploadingService
{
    public function upload(UploadedFile $uploadedFile): string
    {
        $filename = $this->getFileName($uploadedFile);

        return $uploadedFile->storeAs(
            config('file-uploader.file-upload-path'),
            $filename,
            config('filesystems.default')
        );
    }

    private function getFileName(UploadedFile $uploadedFile): string
    {
        $iteration = 0;
        $filepath = config('file-uploader.file-upload-path');
        $fileExtension = $uploadedFile->getClientOriginalExtension() ?: $uploadedFile->extension();

        while (true) {
            if ($iteration > 10) {
                throw new \LogicException('Too many attemps to generate unique filename.');
            }

            $filename = Str::random() . '.' . $fileExtension;

            if (!file_exists($filepath . $filename)) {
                break;
            }

            ++$iteration;
        }

        return $filename;
    }
}
