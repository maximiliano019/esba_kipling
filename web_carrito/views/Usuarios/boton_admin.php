<?php
if (isset($usuario) && $_SESSION['auth']->admin_lvl !=null) {
?>
    <a href="<?php echo BASE_URL; ?>/admin" class="btn btn-dark position-relative float-end">
        << Go To ADMIN PANEL >>
    </a>

<?php
}
?>