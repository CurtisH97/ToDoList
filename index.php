<?php 
require('database.php');
//post data
$newTitle = filter_input(INPUT_POST, 'newTitle', FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);

//Get Data

$title = filter_input(INPUT_GET, 'tile', FILTER_UNSAFE_RAW);

$query = 'SELECT * FROM todoitems';// PUT YOUR SQL QUERY HERE
// Example: $query = 'SELECT * FROM customers';

$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdith, inital-scale=1.0">
    <Title>ToDoList</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main>
        <header>
            <h1>ToDoList</h1>
        </header>

        

        <?php if(!empty($results)){ ?>

        <section>
            <?php foreach ($results as $result) : 
                
                $itemNum = $result["ItemNum"];
                $title = $result["Title"];
                $description = $result["Description"];
                
                ?>

                
                
                <table>
                    

                    <tbody>

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
            
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $description; ?></td>

                            <form action="delete.php" method="post">
                            <input type="hidden" name="itemNum" value="<?php echo $itemNum ?>">
                            <div>
                            <button type = "submit">Delete</button>
                            </div>
                    </form>
                        </tr>

                    </tbody>
                </table>
               


            <?php endforeach; ?>
        </section>
     <?php } else {?>

        <p>Sorry No Results!</p>
     <?php } ?>


    <h2>Add Item:</h2>
        <form action = "add_item.php" method ="post">
            <label for="title">Title:</label>
            <input type = "text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id ="description" name="description" required></textarea>

            <button type = "submit">Add Item</button>

        


    </main>
</body>
</html>

