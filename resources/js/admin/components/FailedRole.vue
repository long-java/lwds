<template>
  <div>
      <body class="body-404">

        <div class="error-head"> </div>

        <div class="container ">

          <section class="error-wrapper text-center">
              <h1><img class="logo" src="/images/404.png" alt=""></h1>
              <div class="error-desk">
                  <h2>Quyền không hợp lệ..</h2>
                  <p class="nrml-txt">Hãy đăng nhập tài khoản ADMIN.</p>
              </div>

              <router-link class="back-btn"
                  :class="[{active: $route.name === 'login'}]" to="/login" > <i class="fa fa-sign-in"></i>  Go To Login
              </router-link>

              <router-link class="back-btn"
                  :class="[{active: $route.name === 'posts'}]" to="/" > <i class="fa fa-home"></i>  Back To Home
              </router-link>

          </section>

        </div>
      </body>


  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  .back-btn {
    background: rgb(116, 19, 19);
  }

  .logo{
    margin-top: -10px;
  }

  .container {
    border: none !important;
  }
  .error-desk{
    background: none !important;
  }

</style>


<style scoped src="../assets/bs3/css/bootstrap.min.css"></style>
<style scoped src="../assets/css/bootstrap-reset.css"></style>
<style scoped src="../assets/css/style.css"></style>
<style scoped src="../assets/css/style-responsive.css"></style>

<style scoped src="../assets/font-awesome/css/font-awesome.css"></style>