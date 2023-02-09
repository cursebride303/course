<?php
include_once("assets/php/db.php");
if (isset($_REQUEST['hash']) && (!empty($_REQUEST['hash']))){
    $hash = $_REQUEST['hash'];
    $result = $pdo->prepare("SELECT * FROM users WHERE hash = '$hash'");
    $result->execute();
    $row = $result->fetch();
    if ($row > 0){
        ?>
<?php
include_once("header.php"); //Подключение шапки сайта
?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Смена пароля</p>

                <form class="mx-1 mx-md-4" action="assets/php/new_user_password.php?hash=<?php echo $hash ?>" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="formLogin" class="form-control" name="newPassword" minlength="6" maxlength="50" required />
                      <label class="form-label" for="formLogin">Ваш новый пароль</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="formPassword" class="form-control" name="newPassword_repeat" minlength="6" maxlength="50" required />
                      <label class="form-label" for="formPassword">Повторите ваш новый пароль</label>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="change_password" class="btn btn-warning btn-lg">Сменить пароль</button>
                  </div>

                  <div class="error">
                       <?php
                       if(isset($_SESSION['reset-error'])){
                         echo $_SESSION['reset-error'];
                         unset($_SESSION['reset-error']);
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
<?
    }else{
?>
<?php
include_once("header.php"); //Подключение шапки сайта
?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <div class="error" style="margin-top:15%;">
                       <?php
                         echo "Что-то пошло не так";
                       ?>
                   </div>
                   <div style="display: flex; justify-content:center; margin-top:25%;">
                   <a href="/" class="btn btn-warning">Вернуться на главную</a>
                   </div>
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
<?php
    }
}else{
?>
    <?php
include_once("header.php"); //Подключение шапки сайта
?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <div class="error" style="margin-top:15%;">
                       <?php
                         echo "Что-то пошло не так";
                       ?>
                   </div>
                   <div style="display: flex; justify-content:center; margin-top:25%;">
                   <a href="/" class="btn btn-warning">Вернуться на главную</a>
                   </div>
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
<?php
}