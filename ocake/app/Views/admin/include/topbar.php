<div class="header">
    <div class="header-left active">
        <a href="<?=site_url('admin/dashboard')?>" class="logo">
            <img src="<?=base_url()?>/tools/admin/assets/img/logo.jpg" alt="" />
        </a>
        <a href="index.html" class="logo-small">
            <img style="height:50px; width: 50px" src="<?=base_url()?>/tools/admin/assets/img/logo-small.jpg" alt="" />
        </a>
        <a id="toggle_btn" href="javascript:void(0);"> </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">
        <!-- <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ..." />
                        <div class="search-addon">
                            <span><img src="<?=base_url()?>/tools/admin/assets/img/icons/closes.svg" alt="img" /></span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv"><img src="<?=base_url()?>/tools/admin/assets/img/icons/search.svg"
                            alt="img" /></a>
                </form>
            </div>
        </li> -->

        <!-- <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <img src="<?=base_url()?>/tools/admin/assets/img/flags/us1.png" alt="" height="20" />
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="<?=base_url()?>/tools/admin/assets/img/flags/us.png" alt="" height="16" /> English
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="<?=base_url()?>/tools/admin/assets/img/flags/fr.png" alt="" height="16" /> French
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="<?=base_url()?>/tools/admin/assets/img/flags/es.png" alt="" height="16" /> Spanish
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="<?=base_url()?>/tools/admin/assets/img/flags/de.png" alt="" height="16" /> German
                </a>
            </div>
        </li> -->

        <li class="nav-item dropdown">
            <?php
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "ocake";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $currentDate = date("Y-m-d");
                $deliveryTomorrow = date("Y-m-d", strtotime("+1 day", strtotime($currentDate)));

                $sql = "SELECT * FROM checkout LEFT JOIN biller_details ON checkout.biller_id = biller_details.biller_id WHERE stat != 'Completed'";
                $result = $conn->query($sql);

                $count = 0;
                $notificationMessages = '';

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $datePickupOrDeliver = $row['date'];
                        $custName = $row['firstname'] . " " . $row['lastname'];
                        $ordercode = $row['order_code'];

                        if ($datePickupOrDeliver == $deliveryTomorrow) {
                            $notificationMessages .= '<li class="notification-message" style="background-color:#ffffb7; margin:10px; padding:10px 10px 0px 10px;"><b>' . $custName . '</b> order will be delivered tomorrow. Ordercode <b>' . $ordercode . ' <br> <i style="font-size: 11px; margin-left:80%"  > '.$currentDate.' </i></li>';
                            $count++;
                        }
                    }
                }
                $conn->close();

                

                
            ?>
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <img src="<?=base_url()?>/tools/admin/assets/img/icons/notification-bing.svg" alt="img" />

                <span class="badge rounded-pill"><?php echo $count ?></span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header" style="background-color:#cda808">
                    <span class="notification-title" style="color:#fff"><b>Notifications</b></span>
                    <!-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a> -->
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <?php echo $notificationMessages; ?>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer" style="background-color:#cda808;">
                    <a href="#" style="color:#fff;">View all Notifications</a>
                    <!-- <a href="activities.html">View all Notifications</a> -->
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img style="margin:5%" src="<?=base_url()?>/tools/admin/assets/img/profiles/avator1.jpg" alt="" />
                    <span style="bottom:10px" class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img style="margin:5%" src="<?=base_url()?>/tools/admin/assets/img/profiles/avator1.jpg" alt="" />
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            <h6>Kelly's Cake</h6>
                            <h5>Admin</h5>
                        </div>
                    </div>
                    <hr class="m-0" />
                    <a class="dropdown-item" href="#">
                    <!-- <a class="dropdown-item" href="profile.html"> -->
                        <i class="me-2" data-feather="user"></i> My Profile
                    </a>
                    <a class="dropdown-item" href="#">
                    <!-- <a class="dropdown-item" href="generalsettings.html"> -->
                        <i class="me-2" data-feather="settings"></i>Settings
                    </a>
                    <hr class="m-0" />
                    <a class="dropdown-item logout pb-0" href="<?=site_url('admin')?>">
                        <img src="<?=base_url()?>/tools/admin/assets/img/icons/log-out.svg" class="me-2"
                            alt="img" />Logout
                    </a>
                </div>
            </div>
        </li>
    </ul>

    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="generalsettings.html">Settings</a>
            <a class="dropdown-item" href="<?=site_url('admin')?>">Logout</a>
        </div>
    </div>
</div>