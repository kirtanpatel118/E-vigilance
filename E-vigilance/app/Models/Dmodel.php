<?php

namespace App\Models;
use CodeIgniter\Model;

class Dmodel extends Model
{
    protected $table = 'user_master';
    protected $primaryKey = 'uid';
    protected $allowedFields = [    'fullname',
                                    'email',
                                    'pwd',
                                    'user_level',
                                    'branch',
                                    'position',
                                    'photo',
                                    'joining_date',
                                    'dt',
                                    'modt'

                                ];

    
}


?>