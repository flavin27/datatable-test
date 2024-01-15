<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="<?= route('create.user') ?>" method="post" id="create-user-form">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                        <span class="text-danger error-text country_name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your password">
                        <span class="text-danger error-text capital_city_error"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" id="closeModal"class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" for="create-user-form"id="createModal"class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>