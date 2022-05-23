<?php

abstract class Model
{
    public PdoWrapper $connection;
    public string $table= '';


    /**
     * @throws Exception
     */
    public function __construct()
    {
        $dsn = ['host'=>'localhost', 'dbname'=>'hyc', 'username'=>'root', 'password'=>''];

        $this->connection =new PdoWrapper($dsn);;
    }


    public function findById($id)
    {
        return $this->connection->select($this->table,[],['id' => $id])->result();
    }

    public function insert($data): int
    {
        return $this->connection->insert($this->table, $data)->iLastId;
    }

    public function update($data,$where, $other=''): PdoWrapper
    {
        return $this->connection->update($this->table, $data,$where, $other);
    }

}
