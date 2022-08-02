<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RahulHaque\Filepond\Traits\HasFilepond;

class File extends Model
{
    use HasFactory;
    use HasFilepond;


    const Decrypted = 1;
    const Encrypted = 2;
}
