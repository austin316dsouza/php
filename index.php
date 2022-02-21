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
                /* border:5px solid red; */
                
            }
         #result{
             color:Yellow;
         }   


    </style>
</head>
<body>
    <div class="container">
    <form action="" method="post">
        <input type="text" name="email" id="email" placeholder="Email to add/search">
        <button type="submit" name="submit">Add</button>
        <button type="submit" name="search">Search</button>
        <input type="number" name="emailUpdateId" placeholder="ID to update">
        <input type="text" name="emailUpdate" placeholder="updated email">
        <button type="submit" name="update">update</button>
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
                
                ?> 
                <h1 id="result"><?php echo $_POST['email'] ."  ( Added recently)"; ?></h1>
                <br> <?php
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
                    
    
                    ?> 
                    <h1 id="result"><?php echo $row['email']." FOUND! ID = ".$row['id']; ?></h1>
                    <br> <?php
                }
            }
            else{
                echo "Not Found";
            }
        }

        // if(isset($_POST['search']))
        // {
        //     // echo $_POST['email'] ."  (Added recently)";
        //     $query_to_search = "select * from email where email like '". $_POST['email']."';";
        //     //$result=mysqli_query($conn,$query_to_search);
        //     if(mysqli_num_rows(mysqli_query($conn,$query_to_search))>0)
        //     {   
        //         while($row = mysqli_fetch_assoc(mysqli_query($conn,$query_to_search)))
        //         {   
        //             echo $row['email'];
    
        //             ?> <br> <?php
        //         }
        //     }
        //     else{
        //         echo "Not Found";
        //     }
        // }


        if(isset($_POST['update']))
        {   
            //echo $_POST['email-update'];
            $query_to_update = "update email set email='".$_POST['emailUpdate']."' where id='".$_POST['emailUpdateId']."'; ";
            if(mysqli_query($conn,$query_to_update))
            {
                ?> 
                    <h1 id="result"><?php echo "UPDATED ID ".$_POST['emailUpdateId']; ?></h1>
                    <br> <?php
            }
            else{
                echo $query_to_update." error: ".mysqli_error($conn);
            }
        }




        $query_to_fetch="select * from email;";
        $result=mysqli_query($conn,$query_to_fetch);
        if(mysqli_num_rows($result)>0)
        {   ?> <h3>ID : EMAIL</h3> <?php
            while($row = mysqli_fetch_assoc($result))
            {   
                echo $row['id']." : ".$row['email'];

                ?> <br> <?php
            }
        }
        ?> 
  
</body>
</html>
