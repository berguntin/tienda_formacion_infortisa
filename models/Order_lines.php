<?php

class Order_lines
{
    private $id, $orderId, $productId, $quantity;

    function __construct($id='', $orderId='', $productId='', $quantity='')
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }
    public function load($Id)
    {
        global $conn;
        try
        {
            $query = $conn->prepare("SELECT * FROM Order_Lines WHERE Id = ?");
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
            $query = $conn->query('SELECT * FROM Order_lines');

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
                                    (OrderId, ProductId, Quantity)
                                     VALUES (?, ?, ?)");
            $query->bind_param('iis',
                $this->orderId, $this->productId, $this->quantity);
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
                                SET OrderId=?,ProductId=?, Quantity=?)
                                WHERE Id=?");
            $query->bind_param('iii',
                $this->orderId, $this->productId, $this->quantity);
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
        $this->orderId = $data['OrderId'];
        $this->productId = $data['ProductId'];
        $this->quantity = $data['Quantity'];
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
    public function getOrderId(): mixed
    {
        return $this->orderId;
    }

    /**
     * @param mixed|string $orderId
     */
    public function setOrderId(mixed $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed|string
     */
    public function getProductId(): mixed
    {
        return $this->productId;
    }

    /**
     * @param mixed|string $productId
     */
    public function setProductId(mixed $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed|string
     */
    public function getQuantity(): mixed
    {
        return $this->quantity;
    }

    /**
     * @param mixed|string $quantity
     */
    public function setQuantity(mixed $quantity): void
    {
        $this->quantity = $quantity;
    }

}