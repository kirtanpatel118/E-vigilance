<?php
namespace App\Models;
use CodeIgniter\Model;

class Omodel extends Model
{
    protected $table='officer_detail';
    protected $primaryKey='uid';
    protected $allowedFields=[  'fullname',
                                'email',
                                'branch',
                                'position',
                                'joining_date'
                             ];
}
?>