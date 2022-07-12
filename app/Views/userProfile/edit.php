<?= $this->extend('layouts/center_center') ?>


<?= $this->section('body') ?>
    <table>
        <tr>
            <td>
                <?= $userData['name']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $userData['email']; ?>
            </td>
        </tr>
    </table>
<?= $this->endSection() ?>



