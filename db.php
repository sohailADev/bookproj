<?php
$action = (!empty($_POST['btn_submit']) &&
($_POST['btn_submit'] === 'Save')) ? 'save_article'
: 'show_form';
switch($action){
case 'save_article':
try {
$connection = new Mongo();
$database = $connection->selectDB('myblogsite');

$collection = $database->selectCollection('articles');
$article = array{
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'saved_at' => new MongoDate()
};
$collection->insert($article);
} catch(MongoConnectionException $e) {
die("Failed to connect to database ".
$e->getMessage());
}
catch(MongoException $e) {
die('Failed to insert data '.$e->getMessage());
}
break;
case 'show_form':
default:
}
?> 
