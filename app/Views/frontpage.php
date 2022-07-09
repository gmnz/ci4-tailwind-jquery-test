<?= $this->extend('layouts/center_center') ?>


<?= $this->section('body') ?>
    <a class="block" href="/register">
        Register
    </a>
    <a class="block" href="<? site_url('login') ?>">
        Login
    </a>
<?= $this->endSection() ?>


