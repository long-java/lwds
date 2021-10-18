<template>

    <!-- <div class="flex flex-wrap w-full justify-center items-center pt-56">
        <center>
            <form  @submit="loginUser" method="post">
                <div class="flex flex-wrap max-w-xl">
                    <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Login to your account</h1></div>
                    <span class="w-full text-red-500" v-if="errors[0]">{{errors}}</span>
                    <div class="p-2 w-full">
                        <label for="email">Your e-mail</label>
                        <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email" v-model="form.email">
                    </div>
                    <div class="p-2 w-full">
                        <label for="password">Password</label>
                        <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" v-model="form.password" name="password">
                    </div>
                    <div class="p-2 w-full mt-4">
                        <button @click.prevent="loginUser" type="submit" class="btn btn-danger flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
                    </div>
                </div>

                <router-link class="nav-link" 
                    :class="[{active: $route.name === 'register'}]" to="/register">Chưa có tài khoản ? Đăng ký?
                </router-link>
            </form>

        </center>
    </div> -->

    <div class="container" id="container">
		<div class="form-container sign-in-container">

			<form @submit="loginUser" method="post">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social social-text" @click="auth('google')"> <font-awesome-icon :icon="['fab', 'google']" size="2x" class="icon alt"/>  </a>
					<a href="#" class="social social-text" @click="auth('facebook')"> <font-awesome-icon :icon="['fab', 'facebook']" size="2x" class="icon alt"/>  </a>
					<a href="#" class="social social-text" @click="auth('github')"> <font-awesome-icon :icon="['fab', 'github']" size="2x" class="icon alt"/>  </a>

				</div>
				<span>or use your account</span>
				<span class="txt-error w-full text-red-500" v-if="errors[0]">{{errors}}</span>
				<input type="email" placeholder="Email" v-model="form.email" />
				<input type="password" placeholder="Password" v-model="form.password" name="password"/>
				<a href="#">Forgot your password?</a>
				
				<button @click.prevent="loginUser" type="submit">Sign In</button>
			</form>
	


		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>

					<router-link class="nav-link" 
						to="/register">
						<button class="ghost" id="signUp">Sign Up</button>
					</router-link>
				</div>
			</div>
		</div>


    </div>  

    
</template>
<script>
export default {
    name: 'login',
    data(){
        return{
            form:{
                email: '',
                password: '',
				profile: '',
				provider: '',
            },
            errors: []
        }
    },
    methods:{


		auth(provider) {
			var vm = this;

			const hello = this.hello;
			hello(provider).login({
					scope: 'email'
				})
				.then(() => {
					const authRes = hello(provider).getAuthResponse();

				hello(provider).api('me')
				.then(function (json) {
					const profile = json;

					console.log(profile)
					
					vm.provider = provider;
					vm.profile = profile;


					vm.loginSocialite();



				}, function (error) {
					console.log(error)
				});
			})
		},

		loginSocialite() {
			axios.post('/api/socialite/'+ this.provider,{
				profile: this.profile
			})
			.then(res => {
				console.log(res.data);
				if(res.data.status == true){
					localStorage.setItem('token', res.data.token);
                	this.$router.push({ name: "posts"}); 
				}

			})

		},




        loginUser(){
            axios.post('/api/login', this.form).then((res) =>{

				console.log(res.data);

                localStorage.setItem('token', res.data.token);
                this.$router.push({ name: "posts"}); 
                // next()
                
            }).catch((error) =>{
                this.errors = error.response.data.message;
				this.$alertify.error('<h3>'+ this.errors + '</h3>');
            })
        }
    }
}
</script>


<style scoped>
	.txt-error{
		font-size: 17px;
		font-style: italic;
		color: red;
	}

	.social-text:hover{
		background: rgb(200, 217, 228);
	}

	.social-text{
		font-weight: bold;
	}


	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

	* {
		box-sizing: border-box;
	}

    .container{
        margin-top: 5%;
    }

	body {
		background: #f6f5f7;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		font-family: 'Montserrat', sans-serif;
		height: 100vh;
		margin: -20px 0 50px;
	}

	h1 {
		font-weight: bold;
		margin: 0;
	}

	h2 {
		text-align: center;
	}

	p {
		font-size: 14px;
		font-weight: 100;
		line-height: 20px;
		letter-spacing: 0.5px;
		margin: 20px 0 30px;
	}

	span {
		font-size: 12px;
	}

	a {
		color: #333;
		font-size: 14px;
		text-decoration: none;
		margin: 15px 0;
	}

	button {
		border-radius: 20px;
		border: 1px solid #FF4B2B;
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 12px 45px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}

	button:active {
		transform: scale(0.95);
	}

	button:focus {
		outline: none;
	}

	button.ghost {
		background-color: transparent;
		border-color: #FFFFFF;
	}

	form {
		background-color: #FFFFFF;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 50px;
		height: 100%;
		text-align: center;
	}

	input {
		background-color: #eee;
		border: none;
		padding: 12px 15px;
		margin: 8px 0;
		width: 100%;
	}

	.container {
		background-color: #fff;
		border-radius: 10px;
		box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
				0 10px 10px rgba(0,0,0,0.22);
		position: relative;
		overflow: hidden;
		width: 768px;
		max-width: 100%;
		min-height: 480px;
	}

	.form-container {
		position: absolute;
		top: 0;
		height: 100%;
		transition: all 0.6s ease-in-out;
	}

	.sign-in-container {
		left: 0;
		width: 50%;
		z-index: 2;
	}

	.container.right-panel-active .sign-in-container {
		transform: translateX(100%);
	}

	.sign-up-container {
		left: 0;
		width: 50%;
		opacity: 0;
		z-index: 1;
	}

	.container.right-panel-active .sign-up-container {
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;
		animation: show 0.6s;
	}

	@keyframes show {
		0%, 49.99% {
			opacity: 0;
			z-index: 1;
		}
		
		50%, 100% {
			opacity: 1;
			z-index: 5;
		}
	}

	.overlay-container {
		position: absolute;
		top: 0;
		left: 50%;
		width: 50%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.6s ease-in-out;
		z-index: 100;
	}

	.container.right-panel-active .overlay-container{
		transform: translateX(-100%);
	}

	.overlay {
		background: #FF416C;
		background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
		background: linear-gradient(to right, #FF4B2B, #FF416C);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 0 0;
		color: #FFFFFF;
		position: relative;
		left: -100%;
		height: 100%;
		width: 200%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.container.right-panel-active .overlay {
		transform: translateX(50%);
	}

	.overlay-panel {
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 40px;
		text-align: center;
		top: 0;
		height: 100%;
		width: 50%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.overlay-left {
		transform: translateX(-20%);
	}

	.container.right-panel-active .overlay-left {
		transform: translateX(0);
	}

	.overlay-right {
		right: 0;
		transform: translateX(0);
	}

	.container.right-panel-active .overlay-right {
		transform: translateX(20%);
	}

	.social-container {
		margin: 20px 0;
	}

	.social-container a {
		border: 1px solid #DDDDDD;
		border-radius: 50%;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		margin: 0 5px;
		height: 40px;
		width: 40px;
	}

	footer {
		background-color: #222;
		color: #fff;
		font-size: 14px;
		bottom: 0;
		position: fixed;
		left: 0;
		right: 0;
		text-align: center;
		z-index: 999;
	}

	footer p {
		margin: 10px 0;
	}

	footer i {
		color: red;
	}

	footer a {
		color: #3c97bf;
		text-decoration: none;
	}

</style>