<?php

namespace App\Models;

use CodeIgniter\Model;

class Careers extends Model
{
	protected $table = 'jobs';

	protected $primaryKey = 'id';

	protected $allowedFields = ['first_name', 'last_name', 'department','email','phone','resume'];

}

?>