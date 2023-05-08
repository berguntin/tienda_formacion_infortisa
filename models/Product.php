<?php

class Product
{
    private $id, $name, $stock, $price, $image;

    /**
     * @param $id
     * @param $name
     * @param $stock
     * @param $price
     */
    public function __construct($id='',$name='', $stock='', $price='', $image='')
    {
        $this->id =$id;
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
        $this->image = $image;
    }

    public function load($Id)
    {
        global $conn;
        try
        {
            $query = $conn->prepare("SELECT * FROM Products WHERE Id = ?");
            $query->bind_param('i', $Id);
            $query->execute();
            $result = $query->get_result();
            $data = $result->fetch_array(MYSQLI_ASSOC);

            $this->assign_variables($data);

            return $data;
        }
        catch (mysqli_sql_exception)
        {
            return false;
        }
    }

    /** Recupera todos los productos de BD, devuelve array asociativo
     * @return array|bool
     */
    public function load_all() : Array | bool
    {
        global $conn;
        try {
            $query = $conn->query('SELECT * FROM Products');

            return $query->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception){
            return false;
        }
    }

    /** Crea registro en BD.
     * @return int|bool Numero de filas insertadas
     */
    public function create(): int | bool
    {
        global $conn;
        try
        {
            $query = $conn->prepare("INSERT INTO Products
                                    (Name, Stock, Price, Image)
                                     VALUES (?, ?, ?, ?)");
            $query->bind_param('siis',
                $this->name, $this->stock, $this->price, $this->image);
            $query->execute();
            return $query->affected_rows;
        }
        catch (mysqli_sql_exception)
        {
            return false;
        }
    }

    public function save($id){
        {
            global $conn;
            try
            {
                $query = $conn->prepare("UPDATE Products
                                    SET Name=?, Price=?
                                    WHERE Id=?");
                $query->bind_param('sii',
                    $this->name, $this->price, $id);
                $query->execute();
                return $query->affected_rows;
            }
            catch (mysqli_sql_exception)
            {
                return false;
            }
        }
    }
    public function delete($id): int | bool
    {
        global $conn;
        try
        {
            $query = $conn->prepare("DELETE FROM Products WHERE Id=?");
            $query->bind_param('i', $id);
            $query->execute();
            return $query->affected_rows;
        }
        catch (mysqli_sql_exception)
        {
            return false;
        }
    }
    private function assign_variables($data): void
    {
        $this->id = $data['Id'];
        $this->name = $data['Name'];
        $this->stock = $data['Stock'];
        $this->price = $data['Price'];
        $this->image = $data['Image'];

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
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName(mixed $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed|string
     */
    public function getStock(): mixed
    {
        return $this->stock;
    }

    /**
     * @param mixed|string $stock
     */
    public function setStock(mixed $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed|string
     */
    public function getPrice(): mixed
    {
        return $this->price;
    }

    /**
     * @param mixed|string $price
     */
    public function setPrice(mixed $price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed|string
     */
    public function getImage(): mixed
    {
        return $this->image;
    }

    /**
     * @param mixed|string $image
     */
    public function setImage(mixed $image): void
    {
        $this->image = $image;
    }


}