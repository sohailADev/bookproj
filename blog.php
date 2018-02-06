<?php
require  'vendor/autoload.php';
$id = $_GET['id'];

    try
        {
            $client         = new MongoDB\Client();
            $database       = $client -> myblogsite;
            $collection     = $database ->articles;


        }
        catch(MongoConnectionException $e)
        {
            die("Failed to connect to database ".$e->getMessage());
        }

        $article = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="stylesheet.css"/>
    <title>My Blog Site</title>
</head>
<body>
<div id="contentarea">
    <div id="innercontentarea">
        <h1>My Blogs</h1>
        <h2><?php echo $article['title']; ?></h2>
        <p><?php echo $article['content']; ?></p>
    </div>
</div>
</body>
</html>