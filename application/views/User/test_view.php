<fieldset>
    <legend>Personal Information</legend>
    <div class='row'>
        <div class='col-sm-4'>    
            <div class='form-group'>
                <label for="user_title">Title</label>
                <input class="form-control" id="user_title" name="user[title]" size="30" type="text" />
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="user_firstname">First name</label>
                <input class="form-control" id="user_firstname" name="user[firstname]" required="true" size="30" type="text" />
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='form-group'>
                <label for="user_lastname">Last name</label>
                <input class="form-control" id="user_lastname" name="user[lastname]" required="true" size="30" type="text" />
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='form-group'>

                <label for="user_email">Email</label>
                <input class="form-control required email" id="user_email" name="user[email]" required="true" size="30" type="text" />
            </div>
        </div>
    </div>
</fieldset>
