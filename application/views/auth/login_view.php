<body class="login" background="https://i.ytimg.com/vi/CC1E8judHmY/maxresdefault.jpg">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form class="user" method="post" action="<?= base_url('auth') ?>">
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" autofocus>
              <?= form_error('username', '<small class="text-danger">', '</small>') ?>
            </div>
            <div>
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
              <?= form_error('password', '<small class="text-danger">', '</small>') ?>
            </div>
            <button type="submit" class="btn btn-default submit">
              Login
            </button>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>