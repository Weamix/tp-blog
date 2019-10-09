<?php

function get_all_articles()
{
    global $db;
    $sth = $db->query("SELECT * FROM articles");
    return $sth->fetchAll();
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

function delete_article(){
    global $db;

    if (isset($_POST['to_delete'])) {
        $id = $_POST['id'];
        $req=$db->prepare('DELETE FROM articles WHERE id = ?');
        $req->execute(array($id));
    }
}

/*
function edit_article()
{
    global $db;
    $sth = $db->query("UPDATE articles SET");
    return $sth->fetchAll();
}
*/