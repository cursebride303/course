<!-- Страница регистрации -->
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Регистрация</p>

                <form class="mx-1 mx-md-4" action="assets/php/reg.php" method="POST">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="fio" maxlength="300" required />
                      <label class="form-label" for="formLogin">Ваши ФИО</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="formLogin" class="form-control" name="login" maxlength="100" required />
                      <label class="form-label" for="formLogin">Ваш логин</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="formEmail" class="form-control" name="email" maxlength="100" required />
                      <label class="form-label" for="formEmail">Ваша электронная почта</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="phone1" class="form-control" name="number" maxlength="40" required />
                      <label class="form-label" for="formEmail">Ваш номер телефона</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="formPassword" class="form-control" name="password" minlength="6" maxlength="50" required />
                      <label class="form-label" for="formPassword">Ваш пароль</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="formRepeatPassword" class="form-control" name="password_repeat" minlength="6" maxlength="50" required />
                      <label class="form-label" for="formRepeatPassword">Повторите пароль</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="formCheckbox" required />
                    <label class="form-check-label" for="formCheckbox">
                      Я согласен(-на) на обработку <a href="privacy.php">персональных данных</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="register" class="btn btn-warning btn-lg">Зарегистрироваться</button>
                  </div>

                  <!-- Блок вывода ошибок при регистрации -->
                  <div class="error">
                       <?php
                       if(isset($_SESSION['reg-error'])){
                         echo $_SESSION['reg-error'];
                         unset($_SESSION['reg-error']);
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
<script src="assets/javascript/main.js"></script>
<script src="assets/javascript/jquery-3.6.3.js"></script>
<script src="assets/javascript/jquery.maskedinput.js"></script>