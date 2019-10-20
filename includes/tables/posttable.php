<?php
class PostTable
{
    protected $table = 'articles';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    // retrieve an article
    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);

        $result = $sth->execute();
        $data = $sth->fetch();
        $post = new Post();
        $post->setTitle($data['title']);
        $post->setCategory($data['category']);
        $post->setImage($data['image']);
        $post->setContent($data['content']);
        $post->setId($data['id']);
        return $post;
    }

    // retrieve all articles
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    // create an article
    public function create(Post $post): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content,created_at, category,image) VALUES (:title, :content, CURRENT_TIMESTAMP() , :category, :image)");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $sth->bindParam(':category', $post->getCategory());
        $sth->bindParam(':image', $post->getImage());
        $result = $sth->execute();

        echo "L'article est publié !";
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

    // update an article
    public function update(Post $post): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} SET title=:title, category=:category, content=:content, image=:image WHERE id=:id;");
        $sth->bindParam(':id', $post->getID());
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $sth->bindParam(':category', $post->getCategory());
        $sth->bindParam(':image', $post->getImage());

        $result = $sth->execute();
        echo "L'article est modifié !";
    }

    // delete an article
    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id =:id");
        $sth->bindParam(':id', $id);
        $result = $sth->execute();
    }

}

