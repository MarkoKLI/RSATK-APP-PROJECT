<div class="col-2 sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo ($adminId) ? "" : "disabled"; ?>" 
                href="<?php echo $location . "?action=show_users"; ?>">
                <i class="fas fa-users"></i>
                Корисници
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($adminId) ? "" : "disabled"; ?>" 
                href="<?php echo $location . "?action=show_diagnoses"; ?>">
                <i class="fas fa-notes-medical ml-1"></i>
                &nbspДијагнози
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($adminId) ? "" : "disabled"; ?>" 
            href="<?php echo $location . "?action=show_departments"; ?>">
            <i class="fas fa-building ml-1"></i>
                Оддели
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($adminId) ? "" : "disabled"; ?>"
                href="<?php echo $location . "?action=process_logout"; ?>">
                <i class="fas fa-sign-out-alt ml-1"></i>
                Log Out
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" 
                href="./../">
                <i class="fas fa-door-open"></i>
                Back to main site
            </a>
        </li>
    </ul>
</div>