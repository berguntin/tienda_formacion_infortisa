<?php

class Order
{
    private $id, $userId, $totalPrice, $date;

    function __construct($id='', $userId='', $totalPrice='', $date='')
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->totalPrice = $totalPrice;
        $this->date = $date;
    }

    public function load($Id)
    {
        global $conn;
        try
        {
            $query = $conn->prepare("SELECT * FROM Orders WHERE Id = ?");
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
    public function load_all() : Array | bool
    {
        global $conn;
        try {
            $query = $conn->query('SELECT * FROM Orders');

            return $query->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception){
            return false;
        }
    }
    public function create(): int | bool
    {
        global $conn;
        try
        {
            $query = $conn->prepare("INSERT INTO Order
                                    (UserId, TotalPrice, Date)
                                     VALUES (?, ?, ?)");
            $query->bind_param('iis',
                $this->userId, $this->totalPrice, $this->date);
            $query->execute();
            return $query->affected_rows;
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
            $query = $conn->prepare("UPDATE Orders
                                SET UserId=?,TotalPrice=?, Date=?)
                                WHERE Id=?");
            $query->bind_param('iii',
                $this->userId, $this->totalPrice, $this->date);
            $query->execute();
            return $query->affected_rows();
        }
        catch (mysqli_sql_exception)
        {
            return false;
        }
    }
    private function assign_variables($data): void
    {
        $this->id = $data['Id'];
        $this->userId = $data['UserId'];
        $this->totalPrice = $data['TotalPrice'];
        $this->date = $data['Date'];
    }
    public function delete(): int | bool
    {
        global $conn;
        try
        {
            $query = $conn->prepare("DELETE FROM Orders WHERE Id=?");
            $query->bind_param('i', $this->id);
            $query->execute();
            return $query->affected_rows;
        }
        catch (mysqli_sql_exception)
        {
            return false;
        }
    }

    /**
     * @return mixed|string
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getUserId(): mixed
    {
        return $this->userId;
    }

    /**
     * @param mixed|string $userId
     */
    public function setUserId(mixed $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed|string
     */
    public function getTotalPrice(): mixed
    {
        return $this->totalPrice;
    }

    /**
     * @param mixed|string $totalPrice
     */
    public function setTotalPrice(mixed $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return mixed|string
     */
    public function getDate(): mixed
    {
        return $this->date;
    }

    /**
     * @param mixed|string $date
     */
    public function setDate(mixed $date): void
    {
        $this->date = $date;
    }

}