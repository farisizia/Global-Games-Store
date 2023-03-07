<?php 

require '../functions.php';


$result = mysqli_query($conn,"SELECT * FROM topups order by id desc");

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
                        <h4 class="card-title ">Topups</h4>
                        <p class="card-category"> View your topup list Here</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        METHOD
                                    </th>
                                    <th>
                                        ID User
                                    </th>
                                    <th>
                                        AMOUNT
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Link Pembayaran
                                    </th>
                                    <th>
                                        Date
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
                                            <?= $row['method']; ?>
                                        </td>
                                        <td>
                                            <?= $row['user_id']; ?>
                                        </td>

                                        <td>
                                            <?= $row['amount_send']; ?>
                                        </td>
                                        <td>
                                            <?= $row['status']; ?>
                                        </td>
                                        <td>
                                            <?= $row['checkout_url']; ?>
                                        </td>
                                        <td>
                                            <?= $row['created_at']; ?>
                                        </td>
                                        <td>
                                            <a href="edit-topup.php?id=<?= $row['id']; ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />

                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a> &nbsp;


                                            <a href="view-topup.php?id=<?= $row['id']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-eye-fill"
                                                    viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg></a> &nbsp;

                                           
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