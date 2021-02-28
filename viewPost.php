<?php include('./includes/Header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <!--Database-->
            <?php             
                  $id = mysqli_sqlstate($con,$GET_['id']);
                  $sql = "SELECT * FROM articles WHERE id = $id";
                  $result = mysqli_query($con,$sql);
                  $article = $result->fetch_assoc();
                  if ($article !== null):
              ?>


            <?php  $categorie = getCategories($con,$article['category_id']);  ?>
          <div class="card">
                <div class="card-body">
                  <div class="media">
                        <a class="d-flex align-self-center" href="#">
                          <img src="https://loremflickr.com/702/240/laptop" class="rounded float-left"  alt="">
                        </a>
                      <div class="media-body">
                      <h5 class="bg-light mt-1"><?php echo $article['title'];?></h5>
                      <p><?php echo $article['body'];?></p>
  
                      <a href="viewPost.php?=<?php echo $article['id'];?>" class="btn btn-outline-info float-start">Lire la suite</a>
                     
                    </div>

                    <div class="media-footer float-end">
                      <p>
                      <span class="badge bg-success"><?php echo $article['created'];?></span> 
                      <span class="badge bg-primary"><?php echo $categorie['name'];?> </span>
                      </p>
                    </div>

                  </div>

                </div>
              </div>

            <!--Database end whil-->
           <?php  endif;    ?>
        </div>

          <!-- navright -->
            <div class="col-md-4 mt-5">
              <ul class="list-group card mb-3">
                <li class="list-group-item list-group-item-info">Category</li>
                  <?php 
                    // SELECT Database from Table MySQL categories 
                      $sql = "SELECT * FROM categories";
                      //$result = $con->query($sql);
                      $result = mysqli_query($con,$sql);
                      // output data of each row
                      while($categorie = $result->fetch_assoc()):
                  ?>
                   <!-- SELECT Database from Table MySQL categories  -->
                      <li class="list-group-item">
                        <a href="categoryPost.php?id=<?php echo $categorie['id'];?>">
                        <?php echo $categorie['name'];?>
                        </a>
                      </li>
                      <!--Database end whil-->
                      <?php  endwhile;    ?>
              
              </ul>
                 
                 <!-- اخر المةاضيع مالضافة -->
                <ul class="list-group card">
                  <li class="list-group-item list-group-item-info">Last Article</li>
                  
                  <?php 
                // SELECT Database from Table MySQL 
                  $sql = "SELECT * FROM articles order by created DESC LIMIT 3";
                  //$result = $con->query($sql);
                  $result = mysqli_query($con,$sql);
                  // output data of each row
                   while($article = $result->fetch_assoc()):
              ?>
                  <li class="list-group-item">

                    <div class="auto" style="max-width: 540px;">
                      <div class="row">
                        <a class="col-sm-4">
                          <img src="http://via.placeholder.com/100x100" class="card-img" alt="">
                        </a>
                        <div class="col-sm-8">
                          <div class="card-body">
                            <h6 class="bg-light"><?php echo $article['title'];?></h6>
                          </div>
                        </div>
                      </div>
                    </div>

                  </li>
                    <?php  endwhile;    ?>
                </ul>

        </div>

    </div>
</div>

<?php
require('./includes/footer.php');
?>