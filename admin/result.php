<?php 

require '../functions.php';


$result = mysqli_query($conn,"SELECT * FROM result");

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
                  <h4 class="card-title ">Result</h4>
                  <p class="card-category"> View your result list Here</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                        ID Order
                        </th>
                        <th>
                          ID seller
                        </th>
                        
                        
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                    <?php $i = 1 ?>
                  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                          <td>
                            <?= $i;?>
                          </td>
                          <td>
                            <?= $row['id_order']; ?>
                          </td>
                          <td>
                            <?= $row['id_seller']; ?>
                          </td>
                         
                         
                          <td>
                            


                                             <a href="view-result.php?id_order=<?= $row['id_order'];?>">      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></a> &nbsp;

                                           <a href="delete-result.php?id=<?= $row['id_result']; ?>">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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