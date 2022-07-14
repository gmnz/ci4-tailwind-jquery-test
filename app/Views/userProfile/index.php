<?= $this->extend('layouts/big_table') ?>

<?= $this->section('body') ?>
        <table class="m-5">
            <?php
                foreach($userData as $user) {
            ?>
                    <tr>
                        <td>
                            <?= $user['name'] ?>
                        </td>
                        <td>
                            <?= $user['email'] ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
<?= $this->endSection() ?>