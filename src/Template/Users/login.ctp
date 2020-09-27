
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <div class="form-group position-relative has-icon-left">
        <label for="username">Username</label>
        <div class="position-relative">
            <input type="text" class="form-control" name="username" required="" id="username">
            <div class="form-control-icon">
                <i data-feather="user"></i>
            </div>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left">
        <div class="clearfix">
            <label for="password">Password</label>
            <!-- <a href="auth-forgot-password.html" class='float-right'>
                <small>Forgot password?</small>
            </a> -->
        </div>
        <div class="position-relative">
            <input type="password" class="form-control" name="password" required="" id="password">
            <div class="form-control-icon">
                <i data-feather="lock"></i>
            </div>
        </div>
    </div>

    <!-- <div class='form-check clearfix my-4'>
        <div class="checkbox float-left">
            <input type="checkbox" id="checkbox1" class='form-check-input' >
            <label for="checkbox1">Remember me</label>
        </div>
        <div class="float-right">
            <a href="auth-register.html">Don't have an account?</a>
        </div>
    </div> -->
    <div class="clearfix">
        <button class="btn btn-primary float-right">Masuk</button>
    </div>
</form>
<?= $this->Form->end() ?>