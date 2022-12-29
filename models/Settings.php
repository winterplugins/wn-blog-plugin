<?php

declare(strict_types=1);

namespace Dimsog\Blog\Models;

use System\Models\File;
use Winter\Storm\Database\Model;
use System\Behaviors\SettingsModel;

class Settings extends Model
{
    public $implement = [SettingsModel::class];

    public $settingsCode = 'dimsog_blog';

    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'poster' => [File::class, 'delete' => true]
    ];
}
