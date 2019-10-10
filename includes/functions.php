<?php

function get_all_articles()
{
    global $db;
    $sth = $db->query("SELECT * FROM articles");
    return $sth->fetchAll();
}

function get_description($description)
{
    $max_caracteres=700;
    if (strlen($description)>$max_caracteres)
    {   
        $description = substr($description, 0, $max_caracteres);
        $position_espace = strrpos($description, " ");   
        $description = substr($description, 0, $position_espace);   
        $description = $description."...";
    }
    return $description;
}

function add_article(){
    global $db;

    if (!empty($_POST['title']) AND !empty($_POST['content']) and !empty($_POST['category'])){

        $title = htmlspecialchars($_POST['title']);
        $content = nl2br($_POST['content']);
        $category = htmlspecialchars($_POST['category']);
        $image = htmlspecialchars($_POST['image']);

        $req = $db->prepare('INSERT INTO articles(title, content,created_at, category,image) VALUES(?,?,?,?,?)');
        $req->execute(array($title, $content, date('Y-m-d H:i:s'),$category,$image));

        echo "L'article est publié !";
    }
}

function get_article($getid){
    global $db;
    $req=$db->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($getid));
    $data = $req->fetch();
    return $data;
}



function delete_article(){
    global $db;
    if (isset($_POST['to_delete'])) {
        $id = $_POST['id'];
        $req=$db->prepare('DELETE FROM articles WHERE id = ?');
        $req->execute(array($id));
    }
}

function update_article($title, $category, $content, $image, $id)
{
    global $db;
    $req = $db->prepare('UPDATE articles SET title = ?, category = ?, content = ?, image =? WHERE id = ?');
    $req->execute(array($title, $category, $content, $image, $id));
}

