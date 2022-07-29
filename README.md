## Installation

Run the following command to install the latest applicable version of the package:

```sh
composer require snnick/file-uploader
```

After installation, you can publish the package configuration using the `vendor:publish` command. This command will publish the `file-uploader.php` configuration file to your config directory:

```sh
php artisan vendor:publish --provider="Snnick\LaravelFileUploader\LaravelUploaderServiceProvider"
```

You may configure the file path in your `.env` file:

```sh
FILE_UPLOAD_PATH=app/public/files
```

### Upload

You can upload files:

```php
$service = new FileService();
$service->upload(collect(request()->file('files')));
```

### Delete

You can delete an uploaded file:

```php
$service = new FileService();
$service->delete('app/public/files/file.pdf');
```