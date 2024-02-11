<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script>
$(document).ready( function () {
    $('#devices').DataTable();
} );
            </script>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Devices</h6>
                        <a href="">Show All</a>
                    </div>
                    <form class="form-horizontal" method="POST">
                    <div class="table-responsive pt-3">
                        <table  id="devices" class="display table text-start table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                   
                                    <th scope="col">ID</th>
                                    <th scope="col">UPS Name</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Token</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Remark</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">ID Employee</th>
                                    <th scope="col">...</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        include ("condb.php");
                        $sql1="SELECT * FROM `devices` ";
                        $rs = mysqli_query($conn,$sql1);
                        if ($rs->num_rows > 0) {

                          while($data = $rs->fetch_assoc()) {
                         ?>
                                <tr>
                                <td> <?php echo $data['d_id']; ?></td>
                                <td> <?php echo $data['d_upsname']; ?> </td>
                                <td><?php echo $data['d_model'];?> </td>
                                <td> <?php echo $data['d_company'];?></td>
                                <td> <?php 
                                $token_short = strlen($data['d_token']) > 15 ? substr($data['d_token'], 0, 15) . '...' : $data['d_token'];
                                echo $token_short;                                
                                ?></td>
                                <td> <?php echo $data['d_location'];?></td>
                                <td> <?php echo $data['d_remark'];?></td>
                                <td> <?php echo $data['d_record'];?></td>
                                <td> <?php echo $data['d_idemp'];?></td>
                                <td>
                                <input type="button" class="btn btn-warning rounded-pill m-2" value="Edit"  onclick="window.location='edit.php?did=<?=$data['d_id'];?>'" />
                                <input type="button" class="btn btn-danger rounded-pill m-2" value="Delete"  onclick="window.location='delete.php?did=<?=$data['d_id'];?>'" > </td>
                                </tr>
                                <?php }
                        @$conn->close(); ?>                 
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Recent Sales End -->


 