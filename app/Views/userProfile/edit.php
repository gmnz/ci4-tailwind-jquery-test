<?= $this->extend('layouts/center_center') ?>


<?= $this->section('body') ?>
    <div>
        <div
            class="text-lg font-bold pb-1 border-b-2"
        >
            <?= $userData['email']; ?>
        </div>
        <div class="mt-3 pb-1 border-b-2">
            <button
                class="relative inline-block"
                onclick="
                    document.getElementById('file-input').click();
                    document.getElementById('avatar-img').classList.add('opacity-10');
                "
            >
                <img
                    src="/images/<?= $userData['avatar']; ?>"
                    alt="/images/<?= $userData['avatar']; ?>"
                    style="max-width:200px;max-height:200px"
                    class="mx-auto"
                    id="avatar-img"
                >
                <div
                    class="absolute text-white top-0 right-0 text-xl text-white bg-black px-1"
                >
                    <i class="fa fa-edit"></i>
                </div>
            </button>
        </div>
        <form 
            action="/userProfile/update" 
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="my-3">
                <label for="userName">Name:</label>
                <input
                    type="text"
                    name="userName"
                    value="<?= $userData['name']; ?>"
                    id="userName"
                    class="p-2"
                >
            </div>
            <input
                type="file"
                name="userImage"
                hidden
                id="file-input"
            >
            <input 
                type="submit" 
                value="Save changes"
                class="font-bold rounded bg-blue-600 text-white p-2 hover:bg-blue-500 block mx-auto"
            >
        </form>
        <?php
            if(!empty(session()->getFlashdata('successImage'))) {
                ?>
                    <div class="text-green-500">
                        <?=
                            session()->getFlashdata('successImage')
                        ?>
                    </div>
            
                <?php
            }
        ?>
    </div>
<?= $this->endSection() ?>


