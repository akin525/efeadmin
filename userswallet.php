<?php include("include/session.php"); ?>
<?php include ("menubar.php"); ?>
<?php
$result = mysqli_query($con,"SELECT sum(balance) FROM  wallet where status=1");
$row = mysqli_fetch_row($result);
$total = $row[0];
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header flex-wrap border-0 pb-0 align-items-end">
                                <div class="mb-3 me-3">
                                    <h5 class="fs-20 text-black font-w500">Main Balance</h5>
                                    <span class="text-num text-black fs-36 font-w500">NGN.<?php echo number_format(intval($total *1),2);?></span>
                                </div>
                            </div>
<?php
if (isset($_GET["id"])) {

    $todelete= mysqli_real_escape_string($con,$_GET["id"]);

    $result=mysqli_query($con,"DELETE FROM users WHERE id='$todelete'");

}

?>
    <div class="row">
    <div class="col-xl-12">
    <div class="table-responsive fs-14">
    <table class="table card-table display mb-4 dataTablesCard " id="example5">
    <thead>
    <tr>
        <th>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                <label class="form-check-label" for="checkAll">
                </label>
            </div>
        </th>
        <th>ID </th>
        <th>Username</th>
        <th>Balance</th>
        <th>Bank Name</th>
        <th>Account Number</th>
        <th></th>
    </tr>
<?php
$query="SELECT * FROM wallet";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) { ?>
    <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                <label class="form-check-label" for="flexCheckDefault2">
                </label>
            </div>
        </td>
        <td><span class="text-black font-w500"><?php echo $row["ID"] ; ?></span></td>
        <td class="fs-16 text-black font-w600 mb-0 text-nowrap"><?php echo $row["username"] ; ?></td>
        <td><span class="text-black"><?php echo number_format(intval( $row["balance"] *1),2); ?></span></td>
        <td class="fs-16 text-black font-w600 mb-0 text-nowrap"><?php echo $row["account_name"] ; ?></td>
        <td class="fs-16 text-black font-w600 mb-0 text-nowrap"><?php echo $row["account_no"] ; ?></td>
        <td>
            <div>
                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <!--                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                        <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                    <!--                        <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                    <!--                        <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                    <!--                    </svg>-->
                </a>
                <div class="btn btn-success light">
                    <a href="credit.php">Credit User</a>
                </div>
        </td>
    </tr>
    <?php
}
?>