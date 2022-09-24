<?php 
require('top.php');
$order_id = get_safe_value($con,$_GET['id']);
?>

         <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
            <b><h2>MY ORDER DETAILS</h2></b><br>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product Name</th>
                                                <th class="product-name">Product Image</th> 
                                                <th class="product-name">Quantity</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $uid =$_SESSION['USER_ID'];
                                                $res= mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name,product.image FROM 
                                                order_detail,product,`order`
                                                WHERE order_detail.order_id ='$order_id' AND `order`.user_id='$uid' AND product.id=order_detail.product_id");
                                                $total_price = 0;
                                                while($row = mysqli_fetch_assoc($res)){
                                                $total_price = $total_price +($row['price']*$row['qty']);
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['name']?></td>
                                                <td class="product-name"><img width=100vw src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                                                <td class="product-name"><?php echo $row['qty']?></td>
                                                <td class="product-price"><?php echo $row['price']?></td>
                                                <td class="product-price"><?php echo $row['price']*$row['qty']?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td  colspan="3" ></td>
                                                <td class="product-price">TOTAL AMOUNT</td>
                                                <td class="product-name"><?php echo $total_price ?></td>
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
        						
<?php require('footer.php')?>        