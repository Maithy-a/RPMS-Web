<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-user-astronaut"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Elsie RPMS</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="admin_home.php" aria-label="Dashboard">
            <i class="bi bi-activity"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - House -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHouse" aria-expanded="true" aria-controls="collapseHouse">
            <i class="bi bi-buildings"></i>
            <span>House</span>
        </a>
        <div id="collapseHouse" class="collapse" aria-labelledby="headingHouse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Details:</h6>
                <a class="collapse-item" href="house_detail.php">House Information</a>
                <a class="collapse-item" href="add_house.php">Add a House</a>
                <a class="collapse-item" href="change_cost.php">Change House Cost</a>
                <a class="collapse-item" href="edit_house.php">Edit House Information</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Contract -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContract" aria-expanded="true" aria-controls="collapseContract">
            <i class="fa-solid fa-file-signature"></i>
            <span>Contract</span>
        </a>
        <div id="collapseContract" class="collapse" aria-labelledby="headingContract" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Details:</h6>
                <a class="collapse-item" href="contract_detail.php">Contract Information</a>
                <a class="collapse-item" href="edit_contract.php">Edit Full Contract</a>
                <a class="collapse-item" href="edit_contract_part.php">Edit Partial Contract</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Tenants -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTenants" aria-expanded="true" aria-controls="collapseTenants">
            <i class="fa-solid fa-users-viewfinder"></i>
            <span>Tenants</span>
        </a>
        <div id="collapseTenants" class="collapse" aria-labelledby="headingTenants" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-
            aria-expanded="true" aria-controls="collapseTenants">
            <i class="fa-solid fa-users-viewfinder"></i>
            <span>Tenants</span>
        </a>
        <div id="collapseTenants" class="collapse" aria-labelledby="headingTenants" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Details:</h6>
                <a class="collapse-item" href="tenant_detail.php">Tenant Information</a>
                <a class="collapse-item" href="tenant_contact.php">Tenant Contact</a>
                <a class="collapse-item" href="admin_tenantIn.php">Tenant-In Details</a>
                <a class="collapse-item" href="admin_tenantOut.php">Tenant-Out Details</a>
                <a class="collapse-item" href="edit_tenant.php">Edit Tenant Information</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Payment -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"
            aria-expanded="true" aria-controls="collapsePayment">
            <i class="bi bi-wallet2"></i>
            <span>Payment</span>
        </a>
        <div id="collapsePayment" class="collapse" aria-labelledby="headingPayment" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Details:</h6>
                <a class="collapse-item" href="payment_detail.php">Payment Information</a>
                <a class="collapse-item" href="edit_pay.php">Edit Payment</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tenant-Out Form -->
    <li class="nav-item">
        <a class="nav-link" href="form_out.php" aria-label="Tenant-Out Form">
            <i class="fa-solid fa-user-minus"></i>
            <span>Tenant-Out Form</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Messaging -->
    <li class="nav-item">
        <a class="nav-link" href="send-sms.php" aria-label="Messaging">
            <i class="bi bi-chat-left-text"></i>
            <span>Messaging</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Change Password -->
    <li class="nav-item">
        <a class="nav-link" href="a_change.php" aria-label="Change Password">
            <i class="fa-solid fa-unlock-keyhole"></i>
            <span>Change Password</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Register -->
    <li class="nav-item">
        <a class="nav-link" href="a_register.php" aria-label="Register">
            <i class="fa-solid fa-user-plus"></i>
            <span>Register</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" aria-label="Toggle Sidebar"></button>
    </div>
</ul>
<!-- End of Sidebar -->