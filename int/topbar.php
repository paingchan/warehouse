   <?php

require_once  './config/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}



?>

   <!--  BEGIN MAIN CONTAINER  -->
   <div class="main-container" id="container">
       <div class="overlay"></div>
       <div class="search-overlay"></div>

       <!--  BEGIN TOPBAR  -->
       <div class="topbar-nav header navbar" role="banner">
           <nav id="topbar">
               <ul class="navbar-nav theme-brand flex-row text-center">
                   <li class="nav-item theme-logo">
                       <a href="index.html">
                           <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo" />
                       </a>
                   </li>
                   <li class="nav-item theme-text">
                       <a href="index.html" class="nav-link"> Warehouse </a>
                   </li>
               </ul>

               <ul class="list-unstyled menu-categories" id="topAccordion">

                   <li class="menu single-menu active">
                       <a href="#dashboard" data-toggle="collapse" aria-expanded="true"
                           class="dropdown-toggle autodroprown">
                           <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round" class="feather feather-home">
                                   <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                   <polyline points="9 22 9 12 15 12 15 22"></polyline>
                               </svg>
                               <span>Dashboard</span>
                           </div>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                               stroke-linejoin="round" class="feather feather-chevron-down">
                               <polyline points="6 9 12 15 18 9"></polyline>
                           </svg>
                       </a>
                       <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                           <li class="active">
                               <a href="index.php"> Home </a>
                           </li>
                           <li class="active">
                               <a href="receive.php"> Receive </a>
                           </li>

                       </ul>
                   </li>




                   <li class="menu single-menu">
                       <a href="#app" data-toggle="collapse" aria-expanded="ture" class="dropdown-toggle">
                           <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round" class="feather feather-home">
                                   <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                   <rect x="9" y="9" width="6" height="6"></rect>
                                   <line x1="9" y1="1" x2="9" y2="4"></line>
                                   <line x1="15" y1="1" x2="15" y2="4"></line>
                                   <line x1="9" y1="20" x2="9" y2="23"></line>
                                   <line x1="15" y1="20" x2="15" y2="23"></line>
                                   <line x1="20" y1="9" x2="23" y2="9"></line>
                                   <line x1="20" y1="14" x2="23" y2="14"></line>
                                   <line x1="1" y1="9" x2="4" y2="9"></line>
                                   <line x1="1" y1="14" x2="4" y2="14"></line>
                               </svg>

                               <span>System</span>
                           </div>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                               stroke-linejoin="round" class="feather feather-chevron-down">
                               <polyline points="6 9 12 15 18 9"></polyline>
                           </svg>
                       </a>
                       <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">

                           <li>
                               <a href="invoice.php">Invoice</a>
                           </li>
                           <li>
                               <a href="products.php">Products</a>
                           </li>
                           <li>
                               <a href="cat.php">Category</a>
                           </li>
                           <li>
                               <a href="supplier.php">Supplier</a>
                           </li>
                       </ul>
                   </li>
               </ul>
           </nav>
       </div>


       <!--  END TOPBAR  -->