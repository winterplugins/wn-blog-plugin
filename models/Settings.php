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

    public function getBlogName(): ?string
    {
        return empty($this->name) ? 'Blog plugin' : $this->name;
    }

    public function getBlogDescription(): ?string
    {
        return empty($this->description) ? 'A simple blog plugin for WinterCMS' : $this->description;
    }

    public function getBlogPoster(): ?File
    {
        return $this->poster;
    }

    public function getMainPageMetaTitle(): string
    {
        return empty($this->main_page_meta_title) ? 'Blog plugin' : $this->main_page_meta_title;
    }

    public function getMainPageMetaDescription(): ?string
    {
        return $this->main_page_meta_description;
    }

    public function getBlogNameColor(): string
    {
        return empty($this->blog_name_color) ? '#fff' : $this->blog_name_color;
    }

    public function getDescriptionColor(): string
    {
        return empty($this->description_color) ? '#fff' : $this->description_color;
    }

    public function getMenuColor(): string
    {
        return empty($this->menu_color) ? '#fff' : $this->menu_color;
    }

    public function getMenuColorHover(): string
    {
        return empty($this->menu_color_hover) ? '#fff' : $this->menu_color_hover;
    }

    public function getMenuColorActive(): string
    {
        return empty($this->menu_color_active) ? '#fff' : $this->menu_color_active;
    }
}
