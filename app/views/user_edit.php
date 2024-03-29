<div class="container">
    <h2>Edit profile</h2>
    <div class="container edit_profile">
        <form action="http://localhost/Muratbayev/onlinestore_php/public_html/user/editDo" method="post">
            <input type="text" name="firstName_edit" placeholder="firstName" value="<?= $data["first_name"] ?>"
                required>
            <input type="text" name="lastName_edit" placeholder="lastName" value="<?= $data["last_name"] ?>" required>
            <input type="email" name="email_edit" placeholder="email" value="<?= $data["email"] ?>" required>
            <input type="number" name="number_edit" placeholder="number" value="<?= $data["phone_number"] ?>">
            <input type="date" name="birthday_edit" placeholder="birthday" value="<?= $data["birthday"] ?>">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>