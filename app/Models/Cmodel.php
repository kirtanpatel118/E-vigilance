<?php

namespace App\Models;
use CodeIgniter\Model;

class Cmodel extends Model
{
    protected $table = 'complaint_detail';
    protected $primaryKey = 'complaint_id';
    protected $allowedFields = [    'complaint',
                                    'username',
                                    'city',
                                    'photo'
                                    
];

    
}


?>