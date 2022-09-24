<?php 
require('top.php');
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/order.png) no-repeat scroll center left / cover ;background-size :50%">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Order</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
    <!-- wishlist-area start -->
<div class="wishlist-area ptb--100 bg__white">
<div class="container">
<strong><h2>MY ORDER</h2></strong><br>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="wishlist-content">
            <form action="#">
                <div class="wishlist-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Order ID</th>
                                <th class="product-thumbnail">Name</th>
                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                <th class="product-price"><span class="nobr"> Address </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Order status </span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $uid =$_SESSION['USER_ID'];
                                $name =$_SESSION['USER_NAME'];
                                $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from
                                        `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status
                                        order by `order`.id desc");
                                while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td class="product-add-to-cart"><a href="myorderdetail.php?id=<?php echo $row['id']?>">
                                <?php echo $row['id']?></a></td>
                                <td><?php echo $name?></a></td>
                                
                                <td class="product-name"><?php echo $row['added_on']?></td>
                                <td class="product-name">
                                <?php echo $row['address']?><br/>
                                <?php echo $row['city']?><br/>
                                <?php echo $row['pincode']?>
                                </td>
                                <td class="product-name"><?php echo $row['payment_type']?></td>
                                <td class="product-name"><?php echo $row['payment_status']?></td>
                                <td class="product-name"><?php echo $row['order_status_str']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>  
            </form><br><br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="buttons-cart--inner">
                        <div class="buttons-cart">
                            <a href="ordertracking.php">Track My Order</a>
                        </div>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- wishlist-area end -->
                
<?php require('footer.php')?>        