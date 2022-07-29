<?php

declare(strict_types=1);

namespace Snnick\LaravelFileUploader\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

final class FileService
{
    public function upload(Collection $files): Collection
    {
        $fileUploadingService = new FileUploadingService();

        return $files->map(fn (UploadedFile $file): string => $fileUploadingService->upload($file));
    }

    public function delete(string $filePath): bool
    {
        if (Storage::exists($filePath)) {
            return Storage::delete($filePath);
        }

        return false;
    }
}
