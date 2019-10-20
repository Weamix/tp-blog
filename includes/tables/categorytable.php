<?php

class CategoryTable
{
    protected $table = 'categories';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    // retrieve all categories
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    // create an category
    public function create(Category $category): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title) VALUES (:title)");
        $sth->bindParam(':title', $category->getCat());
        $result = $sth->execute();

        echo "La catégorie est créée !";
        /*try{
            $result = $sth->execute();
        }
        catch (Exception $e){
            var_dump($e);
        }*/

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    // update an category
    public function update(Category $category): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} SET title=:title WHERE id=:id;");
        $sth->bindParam(':title', $category->getCat());
        $sth->bindParam(':id', $category->getID());
        $result = $sth->execute();
    }

    // delete an category
    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id =:id");
        $sth->bindParam(':id', $id);
        $result = $sth->execute();
    }

}

