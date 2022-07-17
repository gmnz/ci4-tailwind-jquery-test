<?= $this->extend('layouts/libs_imports') ?>

<?= $this->section('head') ?>
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
    <div class="m-7 flex justify-center">
        <?= $this->renderSection('body') ?>
    </div>
<?= $this->endSection() ?>



