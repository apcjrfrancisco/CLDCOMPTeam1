 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('dashboard') }}" class="waves-effect">
                         <i class="ri-dashboard-line"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Supplier</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('supplier') }}">All Suppliers</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Customers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('customer') }}">All Customers</a></li>
                         <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>
                         <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Units</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('unit') }}">All Units</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Categories</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('category') }}">All Categories</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Products</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('product') }}">All Products</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Purchases</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('purchase') }}">All Purchases</a></li>
                         <li><a href="{{ route('purchase.pending') }}">Approval Purchases</a></li>
                         <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Invoices</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('invoice') }}">All Invoices</a></li>
                         <li><a href="{{ route('invoice.pending') }}">Approval Invoices</a></li>
                         <li><a href="{{ route('invoice.print.list') }}">Print Invoice List</a></li>
                         <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Stocks</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('stock') }}">Stock Report</a></li>
                     </ul>
                 </li>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
