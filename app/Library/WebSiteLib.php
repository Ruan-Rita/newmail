<?php

namespace App\Library;

use App\Models\User;
use App\Models\Website;
use File;
use Illuminate\Support\Arr;

class WebSiteLib implements LibraryInterface {

    /**
     * @var \App\Models\Website
     */
    private $model = Website::class;
    // private $reposity = WebsiteRespository::class;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function validation($data): bool
    {
        return true;
    }

    public function uploadFile(File $file)
    {
        return 'fake_path_url';
    }

    public function storeWebsite($data): Website
    {
        $imageUrl = $this->uploadFile(Arr::get($data, 'logo'));

        return (new $this->model())->create([
            'title' => Arr::get($data, 'title'),
            'name' => Arr::get($data, 'name'),
            'subdomain' => Arr::get($data, 'subdomain'),
            'publish' => Arr::get($data, 'publish'),
            'indexable' => Arr::get($data, 'indexable'),
            'logo_url' => $imageUrl,
            'user_id' => $this->user->id,
        ]);
    }

    public function errors(): array
    {
        return [];
    }

    public function message(): string
    {
        return '';
    }
}