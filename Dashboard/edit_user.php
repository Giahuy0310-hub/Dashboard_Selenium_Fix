<?php

    include 'inc/header.php'; 
    include 'classes/customer.php';
?>
<?php
    $customer = new Customer();
    if(!isset($_GET['customerid']) && $_GET['customerid'] == NULL){
        echo "<script>window.location='views_user.php'</script>";
    }else{
        $id = $_GET['customerid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $customername = $_POST['customername'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = hash('sha256',$_POST['password']);
        $type = $_POST['type'];

        $update = $customer->update_customer($customername, $email, $username, $password, $type,$id);
        
    }

?>

<?php  include('inc/deshboad.php'); ?>

                    <!END OF INCOME>
                </div>
                <div class="recent-order">
                    <h2>Cập nhật người dùng</h2>
                    <span style="font-size: 1.3em;"><?php
                        if(isset($update)){
                            echo $update;
                        }
                    ?></span>
                    <div class="recent-order-forms">
                    <style>
                        .recent-order-forms {
                            background-color: #fff;
                            font-size: 15px;
                            margin: 10px 0;
                            border-radius: 10px;
                        }

                        .recent-order-form {
                            margin-left: 10px;
                            font-family: poppins,sans-serif;
                        }

                        form {
                            margin: 5px 0;
                        }

                        main .recent-order .submit {
                            text-align: center;
                        }
                    

                        .recent-order-forms .submit {
                            font-size: 20px;
                            margin-left: 45%;
                            margin-top: 10px;
                            width: 150px;
                            height: 30px;
                            margin-bottom: 10px;
                            background-color: #6666FF;
                            font-family: poppins,sans-serif;
                            border-radius: 3px;
                            transition: 1s all ease;
                            cursor: pointer;
                        
                        }

                        .recent-order-forms .submit:hover {
                            background-color: #6600FF;
                        }

                       

                        .error {
                            color: #FF0000;
                        }

                        .success {
                            color: #0000FF;
                        }

                        .recent-order-form {
                            display: flex;
                            justify-content: space-between;
                          
                        }

                        .recent-order-form input {
                            border: 1px solid #333;
                            margin-right: 100px;
                            margin-top: 15px;
                            padding:5px 3px;
                            width: 400px;
                            font-size: 18px;
                        }

                        .recent-order-form label {
                            margin-top: 10px;
                            margin-left: 20px;
                        }
                        .recent-order-form select {
                            margin-right: 100px;
                            margin-top: 15px;
                            border: 1px solid #333;
                            width: 400px;
                            padding: 5px;
                            font-size: 18px;
                        }

                        .recent-order-form textarea {
                            margin-right: 200px;
                            margin-top: 10px;
                            border: 1px solid #333;
                            width: 400px;
                            padding: 4px;
                            font-size: 20px;
                        }

                        .recent-order-form .image {
                            border: none;
                        }
                        
                        .div {
                            display: flex;
                        }
                        
                        .div a{
                         
                            margin-bottom: .9em;
                            padding-bottom: .5em;
                            font-size: 1.3em;
                            text-align: left;
                            transition: .5s all ease;
                        }

                        .div a:hover {
                            color: #FF0000;
                        }
                      
                        main .recent-order a {
                            text-align: left;
                            margin-left: 1em;
                        }

                        main .recent-order i {
                            display: block;
                            margin-top: 1em;
                        }
                      
                    </style>
                     <?php
                    $show_customerbyid = $customer->getcustomerbyid($id);
                    if($show_customerbyid){
                        while($result = $show_customerbyid->fetch()){

                     ?>
                        <form action="" method="post" enctype="multipart/form-data">
                           
                            <div class="recent-order-form">
                                <label for="productid">Họ và tên:</label>
                                <input type="text" name="customername" id="productid" value="<?php echo $result['fullname'] ?>" placeholder="Họ và tên" class="productid">
                            </div>
                            <div class="recent-order-form">
                                <label for="productname">Email:</label>
                                <input type="text" name="email" id="productname" value="<?php echo $result['email'] ?>" placeholder="Email" class="productname">
                            </div>
                            <div class="recent-order-form">
                                <label for="productname">Tên đăng nhập:</label>
                                <input type="text" name="username" id="productname" value="<?php echo $result['username'] ?>" placeholder="Tên đăng nhập" class="productname">
                            </div>
                            <div class="recent-order-form">
                                <label for="productname">Mật khẩu:</label>
                                <input type="text" name="password" id="productname" value="<?php echo $result['password'] ?>" placeholder="Mật khẩu" class="productname">
                            </div>
             
                            <div class="recent-order-form">
                                <label>Chức vụ:</label>
                                <select id="select" name="type" class="selecttype">
                                   <?php 
                                    if($result['type'] == 1)
                                     {
                                        echo 'selected';
                                        ?>
                                    <option selected value="1">Nhân viên</option>
                                    <option value="0">Admin</option>
                                  
                                   
                                      
                                    <?php
                                     }elseif($result['type'] == 0){
                                        echo 'selected';
                                     ?>
                                     <option  value="1">Nhân viên</option>
                                    <option selected value="0">Admin</option>
                                    <?php
                                     }
                                     ?>
                                </select>
                            </div>
                          
                            <input type="submit" value="Cập nhật" name="submit" class="submit">
                            
                        </form>
                        <?php
                                }
                            }
                         ?>
                         <div class="div">
                               <a href="views_user.php">< Quay lại</a>
                        </div>
                       
                    </div>
                    <a href="#"></a>
                </div>
            </main>
            <! END OF MAIN>
         <?php include 'inc/footer.php'; ?>