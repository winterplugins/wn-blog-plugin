<?php

declare(strict_types=1);

namespace Dimsog\Blog\Models;

use System\Models\File;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Models\DeferredBinding as DeferredBindingModel;
use Winter\Storm\Database\SortableScope;
use Winter\Storm\Database\Traits\Sortable;
use Winter\Storm\Database\Traits\Validation;

/**
 * PostBlock Model
 */
class PostBlock extends Model
{
    use Validation;
    use Sortable;

    const SORT_ORDER = 'position';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dimsog_blog_post_blocks';

    public $timestamps = false;

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [
        'post' => [Post::class]
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => [File::class, 'delete' => true]
    ];
    public $attachMany = [];


    public static function bootSortable()
    {
        static::created(static function (PostBlock $model): void {
            if (!empty($model->position)) {
                return;
            }
            if (empty($model->post)) {
                $count = 0;
                $binding = new DeferredBindingModel;
                $binding->setConnection($model->getConnectionName());
                $blockIds = $binding
                        ->where('master_type', Post::class)
                        ->where('master_field', 'blocks')
                        ->where('session_key', post('_relation_session_key'))
                        ->pluck('slave_id');

                if (!$blockIds->isEmpty()) {
                    $count = PostBlock::whereIn('id', $blockIds)->max('position');
                }
                static::updatePosition($model->id, $count + 1);
            } else {
                static::updatePosition($model->id, $model->post->maxBlocksPosition() + 1);
            }
        });
        static::addGlobalScope(new SortableScope);
    }

    public static function updatePosition(int $id, int $newPosition): void
    {
        PostBlock::where('id', $id)->update(['position' => $newPosition]);
    }

    public function filterFields($fields)
    {
        $fields->text->hidden = true;
        $fields->code->hidden = true;
        $fields->image->hidden = true;

        switch ($fields->type->value) {
            case 'text':
                $fields->text->hidden = false;
                break;
            case 'code':
                $fields->code->hidden = false;
                break;
            case 'image':
                $fields->image->hidden = false;
                break;
        }
    }

    public function getTypeOptions(): array
    {
        return [
            'text' => 'Text',
            'image' => 'Image',
            'code' => 'Code'
        ];
    }
}
