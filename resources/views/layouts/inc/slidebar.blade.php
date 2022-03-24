<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
           ITDragons
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('categories') ?'active': ''}}">
                <a class="nav-link" href="/categories">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-categories') ?'active': ''}}">
                <a class="nav-link" href="/add-categories">
                    <i class="material-icons">person</i>
                    <p>Add Categories</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ?'active': ''}}">
            <a class="nav-link" href="/products">
                <i class="material-icons">dashboard</i>
                <p>Product</p>
            </a>
            </li>
            <li class="nav-item {{ Request::is('add-products') ?'active': ''}}">
                <a class="nav-link" href="/add-products">
                    <i class="material-icons">person</i>
                    <p>Add Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ?'active': ''}}">
                <a class="nav-link" href="/orders">
                    <i class="material-icons">content_paste</i>
                    <p>New Order</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders-history') ?'active': ''}}">
                <a class="nav-link" href="/orders-history">
                    <i class="material-icons">content_paste</i>
                    <p>Order History</p>
                </a>
            </li>

        </ul>
    </div>
</div>
