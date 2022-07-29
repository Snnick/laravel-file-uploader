<?php

declare(strict_types=1);

namespace Snnick\LaravelFileUploader\Contracts;

use Illuminate\Support\Collection;

interface FileContract
{
    public function upload(Collection $files): Collection;

    public function delete(string $filePath): bool;
}
