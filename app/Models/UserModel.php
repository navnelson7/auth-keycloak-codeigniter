<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model{
        protected $table = 'user_entity';
        protected $allowedFields = [
            'id',
            'email',
            'email_constraint',
            'email_verified',
            'enabled',
            'first_name',
            'last_name',
            'realm_id',
            'username',
            'created_timestamp',
        ];
    }