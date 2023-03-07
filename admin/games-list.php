<?php 

require '../functions.php';


$result = mysqli_query($conn,"SELECT * FROM game");

  // $user = mysqli_fetch_array($result);


?>

<?php include "nav.php" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Game</h4>
                  <p class="card-category"> View your game list Here</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  </a><h4 align="center">Add Game<span class="material-icons"><a href="addgame.php">
add_circle_outline</a>
</span></h4>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                        Platforms
                        </th>
                        <th>
                          Name Game
                        </th>
                        <th>
                          Action
                        </th>
                        
                      </thead>
                      <tbody>
                    <?php $i = 1 ?>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                          <td>
                            <?= $i;?>
                          </td>
                        
                            <?php  if(($row['id_platforms']) == "1" ){ ?>

                              <td>Mobile Game</td>
                              <?php } ?>

                            <?php  if(($row['id_platforms']) == "2" ){ ?>

                              <td>PC Game</td>
                              <?php } ?>

                             
                         
                          <td>

                            <?= $row['name_game']; ?>
                          </td>
                          
                          <td>
                            <a href="edit-game.php?id=<?= $row['id_game']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                             <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>

                                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a> &nbsp;


                                             <a href="view-game.php?id=<?= $row['id_game']; ?>">      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></a> &nbsp;

                                           <a href="delete-game.php?id=<?= $row['id_game']; ?>">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg></a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
      <?php include "footer.php" ?>

</html>