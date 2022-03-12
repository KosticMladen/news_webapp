<?php
    namespace app\models;

    class User extends DbModel {
        public string $firstname = '';
        public string $lastname = '';
        public string $email = '';
        public string $password = '';
        public string $confirmPassword = '';

        public static function tableName(): string {
            return 'users';
        }

        public function primaryKey(): string {
            return 'id';
        }

        public function save() {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            return parent::save();
        }

        public function attributes(): array {
            return ['users_fname', 'users_lname', 'users_email', 'users_password'];
        }

        public function getDisplayName(): string {
            return $this->firstname . ' ' . $this->lastname;
        }
    }