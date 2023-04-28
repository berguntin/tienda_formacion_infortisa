<?php

    Class User
    {
        private $id, $name, $email, $password, $phone, $last_access, $disabled, $type;

        public function __construct($id='', $name='', $email='', $password='', $phone='', $last_access='', $disabled='', $type='')
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            $this->last_access = $last_access;
            $this->disabled = $disabled;
            $this->type = $type;
        }

        /**
         * Autentica usuarios contra BD. Devuelve la id del Usuario autenticado. 0 si la autenticacion es incorrecta
         * @param $email
         * @param $password
         * @return int
         */
        public function authenticate($email, $password): bool|User
        {
            global $conn;
            $query = $conn->prepare("SELECT * FROM Users WHERE Email=?");
            $query->bind_param('s', $email);

            if($query->execute())
            {
                $result =$query->get_result();
                $data = $result->fetch_array(MYSQLI_ASSOC);

                $dataBasePassword = $data['Password'];
                //Seteamos las propiedades con los datos recibidos por el array
                $this->assign_variables($data);

                if($dataBasePassword === $password)
                {
                    return $this;
                }
                else return false;
            }
            return false;
        }
        public function load($Id)
        {
            global $conn;
            try
            {
                $query = $conn->prepare("SELECT * FROM Users WHERE Id = ?");
                $query->bind_param('i', $Id);
                $query->execute();
                $result = $query->get_result();
                $data = $result->fetch_array(MYSQLI_ASSOC);
                $this->assign_variables($data);
                return $this;
            }
            catch (mysqli_sql_exception)
            {
                return false;
            }
        }
        public function save(): bool
        {
            global $conn;
            try
            {
                $query = $conn->prepare("UPDATE Users
                                    SET Name=?, Email=?, Password=?, Phone=?, LastAccess=?, Disabled=?, Type=?
                                    WHERE Id=?");
                $query->bind_param('sssssssi',
                    $this->name,  $this->email, $this->password,
                    $this->phone, $this->last_access,
                    $this->disabled, $this->type, $this->id);
                return $query->execute();
            }
            catch (mysqli_sql_exception)
            {
                return false;
            }
        }
        public function delete(): int | bool
        {
            global $conn;
            try
            {
                $query = $conn->prepare("DELETE FROM Users WHERE Id=?");
                $query->bind_param('i', $this->id);
                $query->execute();
                return $query->affected_rows;
            }
            catch (mysqli_sql_exception)
            {
                return false;
            }
        }

        /** Asigna los datos de un array a las propiedades del objeto
         * @param $data
         * @return void
         */
        private function assign_variables($data) : void
        {
            $this->id = $data['Id'];
            $this->name= $data['Name'];
            $this->email = $data['Email'];
            $this->phone = $data['Phone'];
            $this->password = $data['Password'];
            $this->last_access = $data['LastAccess'];
            $this->disabled = $data['Disabled'];
            $this->type = $data['Type'];
        }

        /**
         * @return mixed|string
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed|string $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed|string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed|string $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed|string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed|string $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed|string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed|string $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed|string
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * @param mixed|string $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * @return mixed|string
         */
        public function getLastAccess()
        {
            return $this->last_access;
        }

        /**
         * @param mixed|string $last_access
         */
        public function setLastAccess($last_access)
        {
            $this->last_access = $last_access;
        }

        /**
         * @return mixed|string
         */
        public function getDisabled()
        {
            return $this->disabled;
        }

        /**
         * @param mixed|string $disabled
         */
        public function setDisabled($disabled)
        {
            $this->disabled = $disabled;
        }

        /**
         * @return mixed|string
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param mixed|string $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

    }