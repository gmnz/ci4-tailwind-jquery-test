<?= $this->extend('layouts/center_center') ?>


<?= $this->section('body') ?>
    <div
        class="border-2 border-gray-200 p-7 rounded-lg"
    >
        <h1
            class="pb-1 mb-3 border-b-2 border-black"
        >
            Register
        </h1>
        <form 
            action="/register/store"
            method="POST"
        >
            <?= csrf_field(); ?>
            <label 
                for="name"
                class="block"
            >
                Name
            </label>
            <input 
                type="text"
                name="name"
                class="border-2 border-gray-100 rounded-lg block p-1 mb-2 mx-auto text-center"
                placeholder="yourname"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'name') : "" ?>
            </span>
            <label 
                for="email"
                class="block"
            >
                E-mail
            </label>
            <input 
                type="text"
                name="email"
                class="border-2 border-gray-100 rounded-lg block p-1 mb-2 mx-auto text-center"
                placeholder="your@email.here"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'email') : "" ?>
            </span>
            <label 
                for="password"
                class="block"
            >
                Password
            </label>
            <input 
                type="password"
                name="password"
                class="border-2 border-gray-100 rounded-lg block p-1 mx-auto text-center"
                placeholder="yourVerySecretPassword"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'password') : "" ?>
            </span>
            <label 
                for="cpassword"
                class="block"
            >
                Confirm Password
            </label>
            <input 
                type="password"
                name="cpassword"
                class="border-2 border-gray-100 rounded-lg block p-1 mx-auto text-center"
                placeholder="one more time"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'cpassword') : "" ?>
            </span>
            <input 
                type="submit"
                value="Register"
                class="font-bold rounded bg-blue-600 text-white p-2 mt-5 hover:bg-blue-500"
            >
        </form>
        <a 
            href="/login"
            class="mt-3 text-blue-400 block"
        >
            I already have an account
        </a>
        <p>ahoj</p>
    </div>
<?= $this->endSection() ?>





