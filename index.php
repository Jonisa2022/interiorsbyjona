
<?php  include "includes/db.php";   ?>
<?php   include "includes/header.php";  ?>


    <!-- Navigation -->
    <?php

include "includes/navigation.php";

?>
<?php
 if(isset($_GET['category']))
{
$category_id = $_GET['category'];
$query = "SELECT * FROM posts WHERE  post_category_id ={$category_id}";
$select_all_posts_category_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc( $select_all_posts_category_query))
{
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'],0,50);
}  
if($select_all_posts_category_query->num_rows == 0)
{
 echo "<h1>No posts with this category </h1>";
}
else{
    echo "<div class='container'>
    <h2>'{$post_title}'</h2>
    <p class='lead'>
    by <a href='index.php'>'{$post_author}'</a>
    </p>
    <p><span class='glyphicon glyphicon-time'></span>'{$post_date}'</p>
    <a href='post.php?p_id={$post_id}'/>
    <img class='img-responsive' src='images/{$post_image}'>
    <p>'{$post_content}'</p>
    <a class='btn btn-primary' href='post.php?p_id={$post_id}'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
     </div>";
}   
}
else {
 ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
    <h1 class="page-header">
                    Interior Design 
                    <small>Creating an inviting atmosphere</small>
                </h1>
            <?php 
            $query = "SELECT * FROM posts";
            
            $select_all_posts_query = mysqli_query($connection,$query);
               
               while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,50);
       
                ?>
                
            

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>

                <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>

                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

              
            
             <?php }?>


          

                
            </div>
                <!-- Second Blog Post -->
               
            <!-- Blog Sidebar Widgets Column -->
             <!-- Blog Sidebar Widgets Column -->
             <!-- /.row -->
             <hr>
             <div class="col-md-4">
 
                 <!-- Blog Search Well -->
                 <!-- <div class="well">
                     <h4>Blog Search</h4>
                     <div class="input-group">
                         <input type="text" class="form-control">
                         <span class="input-group-btn">
                             <button class="btn btn-default" type="button">
                                 <span class="glyphicon glyphicon-search"></span>
                         </button>
                         </span>
                     </div>
                    /.input-group  
                 </div> -->
 
                 <!-- Blog Categories Well -->
                </div>
                <?php 
                    include "includes/sidebar.php";
            } ?>
            
             
             


        <?php

include "includes/footer.php";

?>
        