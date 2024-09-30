<?php

namespace App\Models;

use App\ElementObjects\Text;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'json',
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function getDeserialisedDataAttribute() {
        $elements = [];

        foreach ($this->data as $element) {
            $elements[] = new Text($element);
        }

        return $elements;
    }
}
