<?= $this->extend('layouts/libs_imports') ?>

<?= $this->section('head') ?>
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
    <div class="h-full">
        <div class="flex justify-center h-full">
            <div class="grid grid-cols-1 gap-3 content-center text-center h-full">
                <?= $this->renderSection('body') ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



