<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST['name'],
        'email' => "ieniminie@sesamstraat.nl",
        'message' => $_POST['message'],
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>

    <style>
    .reaction{
        background-color: lightblue;
        border-radius: 10px;
        box-shadow: 5px 5px 5px black;
        margin: 10px;
        padding: 10px;
    }
    </style>
</head>
<body>

<iframe width="560" height="315" src="https://www.youtube.com/embed/16jA-6hiSUo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<form method="post">
    <br>
    <label for="name"> Name </label>
    <input required type="text" placeholder= "vul hier naam" name = "name">
    <br>
    <br>
    <label for="w3review"> message </label>
    <br>
    <textarea required id="w3review" name="message" rows="4" cols="50"> Type here...</textarea>
    <input required type="submit" value="versturen">


    <h2>Comments</h2>
    <!-- //*<p>Comments:</p>//* -->

    
</body>
</html>

<?php
$con->close();

//echo "<pre>".var_dump($getReactions)."</pre>";

echo ("<h2>Er zijn ".count($getReactions)." reactie</h2>");
for ($i=0; $i < count($getReactions); $i++) { 

    echo ("<div class='reaction'>");
    echo ($getReactions[$i]['name']."--");
    echo ($getReactions[$i]['id']."<br>");
    echo ("</div>");
}
    




?>