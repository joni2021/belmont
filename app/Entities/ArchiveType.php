<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use function str_replace;
use function ucwords;

class ArchiveType extends Model
{
    protected $fillable = [
        'name','slug'
    ];

    protected $table = 'archive_types';

}
