<?= $this->extend('layouts/big_table') ?>

<?= $this->section('body') ?>
        <table class="m-5">
            <tr>
                <th class="border border-black-3 p-2">ID</th>
                <th class="border border-black-3 p-2">Username</th>
                <th class="border border-black-3 p-2">E-mail</th>
            </tr>
            <?php
                foreach($userData as $user) {
            ?>
                    <tr>
                        <td class="border border-black-3 p-2">
                            <?= $user['user_id'] ?>
                        </td>
                        <td class="border border-black-3 p-2">
                            <?= $user['name'] ?>
                        </td>
                        <td class="border border-black-3 p-2"> 
                            <?= $user['email'] ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
<?= $this->endSection() ?>