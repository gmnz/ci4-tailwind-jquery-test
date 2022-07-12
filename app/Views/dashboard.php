<?= $this->extend('layouts/center_center') ?>

<?= $this->section('body') ?>

    <?php
        if(!empty(session()->getFlashdata('successMessage'))) {
            ?>
                <div class="text-green-500">
                    <?=
                        session()->getFlashdata('successMessage')
                    ?>
                </div>
        
            <?php
        }
    ?>

    <p>Welcome, <?= $userData['name']; ?>!</p>
    <a 
        href="/userProfile/edit/<?= $userData['user_id']; ?>"
        class="underline"
    >
        Edit your profile
    </a>
<?= $this->endSection() ?>




