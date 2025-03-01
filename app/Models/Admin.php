<?php
    namespace App\Models;

    class Admin extends User
    {
        protected $table = 'users';

        protected $attributes = [
            'role' => 'admin',
            'groupe_id' => null
        ];
    }
