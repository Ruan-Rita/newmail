<?php

namespace App\Library;

use App\Models\User;
use App\Models\Website;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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

    public static function validation(Request $request): bool
    {
        // Valida a imagem
        $maxMB = 1024 * 10;
        $request->validate([
            'logo' => "nullable|image|mimes:jpeg,png,jpg,gif|max:$maxMB",
            'title' => 'required|string',
            'name' => 'required|string',
            'subdomain' => 'required|string',
        ]);

        return true;
    }

    public function uploadFile(UploadedFile|null $file)
    {
        if ($file === null) return null;

        $user_id = $this->user->id;

        $path = $file->store("/media_world", 'public');

        return $path;
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

    public function updateWebsite($id_website, $data): Website
    {
        $website = Website::where('id', $id_website)
            ->where('user_id', $this->user->id)
            ->firstOrFail();

        $website->content = $data['content'];
        $website->save();
        return $website;
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