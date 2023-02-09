<!-- Страница авторизации -->
<?php
include_once("header.php"); //Подключение шапки сайта
?>
<section style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Вход</p>

                <form class="mx-1 mx-md-4" action="assets/php/auth.php" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="formLogin" class="form-control" name="login_form" required />
                      <label class="form-label" for="formLogin">Ваша электронная почта (или логин)</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="formPassword" class="form-control" name="password_form" required />
                      <label class="form-label" for="formPassword">Ваш пароль</label>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center" style="margin-bottom:4%;">
                    <input class="form-check-input me-2" type="checkbox" value="" id="formCheckbox" name="remember"/>
                    <label class="form-check-label" for="formCheckbox">
                      Запомнить меня</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="login" class="btn btn-warning btn-lg">Войти</button>
                  </div>

                  <div class="forgot_password">
                       <a href="forgot_password.php" class="text-body">Забыли пароль?</a>
                       </div>

                  <!-- Блок вывода ошибок при авторизации -->
                  <div class="error">
                       <?php
                       if(isset($_SESSION['auth-error'])){
                         echo $_SESSION['auth-error'];
                         unset($_SESSION['auth-error']);
                       }
                       ?>
                   </div>

                </form>

              </div>
                 <!-- Блок с изображением -->
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="assets/images/draw1.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>