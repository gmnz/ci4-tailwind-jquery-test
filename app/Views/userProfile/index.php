<?= $this->extend('layouts/big_table') ?>

<?= $this->section('body') ?>
        <div class="block">
            <div>
                <h1 class="text-lg text-bold">Filters</h1>
                <hr class="my-3">
                <form 
                    action="/userProfile"
                    method="GET"
                >
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-1">
                        <label for="user_id">ID:</label>
                        <div class="inline-block">
                            <select 
                                name="user_id_comp" 
                                id="user_id_comp"
                                class="p-1"
                                value="<?= isset($comp_sign) ? $comp_sign : "" ?>"
                            >
                            <?php
                                $options = [
                                    [">", "more than"],
                                    ["<", "less than"],
                                    ["=", "equal to"],
                                ];
                                foreach($options as $option) {
                                    echo "<option value='{$option[0]}'";
                                    if($comp_sign == $option[0]) {
                                        echo " selected";
                                    }
                                    echo ">{$option[1]}</option>\n";
                                }
                            ?>
                                <option value="null"></option>
                                <option value=">">greater than</>
                                <option value="<">less than</option>
                                <option value="=">equal to</option>
                            </select>
                            <input
                                type="number" 
                                name="user_id" 
                                id="user_id" 
                                size=6
                                class="border-2 border-gray-100 rounded-lg p-1"
                                value="<?= isset($id_filter) ? $id_filter : "" ?>"
                            >
                        </div>

                        <label for="username">Username:</label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            placeholder="filter"
                            class="border-2 border-gray-100 rounded-lg p-1"
                            value="<?= isset($filters['name']) ? $filters['name'] : "" ?>"
                        >

                        <label for="email">E-mail:</label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email"
                            placeholder="filter"
                            class="border-2 border-gray-100 rounded-lg p-1"
                            value="<?= isset($filters['email']) ? $filters['email'] : "" ?>"
                        >

                    </div>
                        <input 
                            type="submit" 
                            value="Filter"
                            class="font-bold rounded bg-blue-600 text-white p-2 hover:bg-blue-500 block mx-auto mt-8"
                        >
                        <a class="block underline text-center mt-3" href="/userProfile">Reset filter</a>
                </form>
            </div>
            <div class="flex justify-center mt-10">
                <table>
                    <tr>
                        <th class="border border-black-3 p-2">
                            ID
                        </th>
                        <th class="border border-black-3 p-2">
                            Username
                        </th>
                        <th class="border border-black-3 p-2">
                            E-mail
                        </th>
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
            </div>
        </div>
<?= $this->endSection() ?>