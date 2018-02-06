<?php
require  'vendor/autoload.php';

    try {
        $client         = new MongoDB\Client();
        $database       = $client -> myblogsite;
        $collection     = $database ->articles;

            }
    catch(MongoConnectionException $e)
    {
        die("Failed to connect to database ".$e->getMessage());
    }

 $cursor = $collection->find();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="stylesheet.css"/>
    <title>My Blog Site</title>
</head>
<body>
<div id="contentarea">
    <div id="innercontentarea">
        <h1>My Blogs</h1>
        <?php  if(!empty($cursor)) {foreach ($cursor as $item){?>
        <h2><?php echo $item['title']; ?></h2>
        <p><?php echo substr($item['content'], 0,200).'...'; ?> </p><a href="blog.php?id=<?php echo $item['_id']; ?>">Read more</a>
          <?php }}
          else
        {
            echo  "there is no data to retrieve";}?>
    </div>
</div>
</body>
</html>