<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: blue;

        }
        .container{
                display:flex;
                justify-content:centre;
                text-align:centre;
                margin:auto 45%;
                padding:100px auto;
                /* background-color: red; */
                border:5px solid red;
                
            }


    </style>
</head>
<body>
    <div class="container">
    <form action="" method="post">
        <input type="text" name="email" id="email">
        <button type="submit" name="submit">Add</button>
        <button type="submit" name="search">Search</button>
    </form>
    </div>
   

    <?php  
        include('emaildb.php');  
        if(isset($_POST['submit']))
        {
            // echo $_POST['email'] ."  (Added recently)";
            $query_to_add = "insert into email (email) values ('". $_POST['email']."');";
            if(mysqli_query($conn,$query_to_add))
            {
                echo $_POST['email'] ."  ( Added recently)";
                ?> <br> <?php
            }
            else
            {
                echo "Oz Error :".$query_to_add ." ". mysqli_error($conn);
            }
        }





        if(isset($_POST['search']))
        {
            // echo $_POST['email'] ."  (Added recently)";
            $query_to_search = "select * from email where email like '". $_POST['email']."';";
            $result=mysqli_query($conn,$query_to_search);
            if(mysqli_num_rows($result)>0)
            {   
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo $row['email'];
    
                    ?> <br> <?php
                }
            }
            else{
                echo "Not Found";
            }
        }





        $query_to_fetch="select email from email;";
        $result=mysqli_query($conn,$query_to_fetch);
        if(mysqli_num_rows($result)>0)
        {   
            while($row = mysqli_fetch_assoc($result))
            {   
                echo $row['email'];

                ?> <br> <?php
            }
        }
        ?> 
  
</body>
</html>
