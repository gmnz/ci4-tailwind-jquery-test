<?= $this->extend('layouts/center_center') ?>


<?= $this->section('body') ?>
    <div
        class="border-2 border-gray-200 p-7 rounded-lg"
    >
        <h1
            class="pb-1 mb-3 border-b-2 border-black"
        >
            Sign In
        </h1>

        <form 
            action="/login/check"
            method="POST"
        >
            <?= csrf_field(); ?>
            <label 
                for="email"
                class="block"
            >
                E-mail
            </label>
            <input 
                value="<?= set_value('email'); ?>"
                type="text"
                name="email"
                class="border-2 border-gray-100 rounded-lg block p-1 mb-2 mx-auto text-center"
                placeholder="your@email.here"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'email') : "" ?>
                <?= isset($unknownEmail) ? $unknownEmail : "" ?>
            </span>
            <label 
                for="password"
                class="block"
            >
                Password
            </label>
            <input 
                value="<?= set_value('password'); ?>"
                type="password"
                name="password"
                class="border-2 border-gray-100 rounded-lg block p-1 mb-2 mx-auto text-center"
                placeholder="yourVerySecretPassword"
            >
            <span
                class="text-red-500 block"
            >
                <?= isset($validation) ? display_form_errors($validation, 'password') : "" ?>
                <?= isset($wrongPassword) ? $wrongPassword : "" ?>
            </span>
            <input 
                type="submit"
                value="Sign In"
                class="font-bold rounded bg-blue-600 text-white p-2 mt-5 hover:bg-blue-500"
            >
        </form>
        <a 
            href="/register"
            class="mt-3 text-blue-400 block"
        >
            I don't have an account yet
        </a>
    </div>
<?= $this->endSection() ?>


