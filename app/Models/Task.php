<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Priority;
use App\Enums\Status;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'priority', 'due_date', 'status', 'category_id'];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'priority' => Priority::class,
            'status' => Status::class
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
