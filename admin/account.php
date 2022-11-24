<?php  include('sidebar.php') ?>


<?php   
   if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
   }

?>




        <!-- sidebar starts -->
        
        <!-- sidebar end -->

        <div id="page-content-wrapper">
           <!-- navbar header -->
              <?php include('header.php');  ?>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">720</h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">920</h3>
                                    <p class="fs-5">Sales</p>
                                </div>
                                <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">3893</h3>
                                    <p class="fs-5">Delivery</p>
                                </div>
                                <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">650</h3>
                                    <p class="fs-5">Increase</p>
                                </div>
                                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                </div>
                


                <!-- mmmmm -->
                <div class="container-fluid">
                    <div class="row" style="min-height:1000px">

                      <main class="col-md-9 ms-ms-auto col-lg-10 px-md-4">
                        <div class="flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                            <h1 class="h2">Admin Account</h1>
                            <div class="btw-toolbar mb-2 mb-md-0">
                                <div class="btw-group me-2">

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <p>Id: <?php echo $_SESSION['admin_id']  ?></p>
                            <p>Name: <?php echo $_SESSION['admin_name']  ?></p>
                            <p>Email: <?php echo $_SESSION['admin_email']  ?></p>
                        </div>
                      </main>
                    </div>
                </div>

                <!-- nnnnn -->

            
            </div>
    </div>
    <style>
        .bord{
            border: 1px solid darkgray;
            padding: 10px 20px;
        }
    </style>


    <style>
        @media screen and (max-width:450px) {
            #no-more-table tbody,
            #no-more-table tr,
            #no-more-table td{
                display: block;
            }
            #no-more-table thead tr{
                position: absolute;
                top:-9999px;
                left: -9999px;
            }
            #no-more-table td{
                position: relative;
                padding-left: 70%;
                border: none;
                border-bottom: 1px solid #eee;
            }
            #no-more-table td::before{
                content:attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }
            #no-more-table tr{
                border-bottom: 2px solid #ccc;
            }
            .filem{
                display: flex;
                background-color: red!important;
            }
            
            .table2 tr{
                margin-right: 160px;
                
                
            }
            .table2 td{
                /* display: flex !important;
                align-items: center;
                margin-left: 30px; */
            }
            .last{
                width: 95%;
                padding: 10px 20px;
                margin-right: 10px !important;
                margin-top: 20px;
                
            }
            .ty{
                height: 22px;
                width: 52px !important;
            }
            
            /* fhhghghghg */
        }
            @media screen and (max-width:450px) {
                .bbb{
                    flex-direction: column;
                    align-items: center;
                }
            }
    </style>




<script src="../js/bootstrap.bundle.min.js"></script>

<script>
    let el = document.getElementById('wrapper');
    let toggleButton = document.getElementById('menu-toggle');

    toggleButton.onclick = function(){
        el.classList.toggle('toggled')
    }
</script>
</body>
</html>