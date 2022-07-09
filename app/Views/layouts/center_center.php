<?= $this->extend('layouts/tailwind_jquery') ?>

<?= $this->section('head') ?>
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
    <div class="h-screen flex justify-center">
        <div class="grid grid-cols-1 gap-3 content-center text-center">
            <?= $this->renderSection('body') ?>
        </div>
    </div>
<?= $this->endSection() ?>



