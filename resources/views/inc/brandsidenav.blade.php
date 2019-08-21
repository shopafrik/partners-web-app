<?php 
    $user = session()->get('loggeduser')[0];
    $userRole = $user->USER_role; ?>


<div class="sidebar-sticky">
    <ul class="nav flex-column sidebar-background">
        <li class="nav-item">
            <a class="nav-link active" href="/products">
                <h6><i class="fa fa-product-hunt"></i>&nbsp&nbspManage Products <span class="sr-only">(current)</span></h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-shopping-cart"></i>&nbsp&nbspManage Orders</h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-pie-chart"></i>&nbsp&nbspMy Reports</h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-truck"></i>&nbsp&nbspManage Deliveries</h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-credit-card"></i>&nbsp&nbspManage Payment</h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-facebook-official"></i>&nbsp&nbspManage Social</h6>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h6><i class="fa fa-volume-up"></i>&nbsp&nbspManage Adverts</h6>
            </a>
        </li>
        @if ($userRole === 'b')
            <li class="nav-item">
                <a class="nav-link" href="/userprofile">
                    <h6><i class="fa fa-user"></i>&nbsp&nbspMy Profile</h6>
                </a>
            </li>
        @endif
        @if ($userRole === 'a')
            &nbsp&nbsp&nbsp&nbsp-----------------------------
            <li class="nav-item">
                <a class="nav-link" href="/brands">
                    <h6><i class="fa fa-tags"></i>&nbsp&nbspManage Brands</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">
                    <h6><i class="fa fa-gear"></i>&nbsp&nbspManage Categories</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ranges">
                    <h6><i class="fa fa-gear"></i>&nbsp&nbspManage Ranges</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/styles">
                    <h6><i class="fa fa-gear"></i>&nbsp&nbspManage Styles</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/attributes">
                    <h6><i class="fa fa-gear"></i>&nbsp&nbspManage Attributes</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/occasions">
                    <h6><i class="fa fa-gear"></i>&nbsp&nbspManage Occasions</h6>
                </a>
            </li>
        @endif
    </ul>
</div>