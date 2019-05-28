<template>
    <vue-scroll class="login-page align-vertical">
        <div class="form-wrapper align-vertical-middle">
            <div class="form-box card-base card-shadow--extraLarge">
                <img class="image-logo" src="/artygame.png" alt="logo"/>

                <el-form @submit.native.prevent>
                        <el-input placeholder="Kullanıcı Adınız" v-model="form.username"></el-input>


                        <el-input type="password" placeholder="Şifreniz" v-model="form.password"></el-input>

                    <div class="flex">
                        <div class="box grow"><el-checkbox v-model="form.remember" true-value="1" false-value="0">Remember Me </el-checkbox></div>
                    </div>

                    <div class="flex text-center center pt-30 pb-10">
                        <el-button native-type="submit"  plain size="small" class="login-btn tada animated">
                            Login
                        </el-button>
                    </div>
                </el-form>

            </div>
        </div>
    </vue-scroll>
</template>

<script>
	export default {
		name: 'Login',
		data() {
			return {
				form: {
					username: '',
					password: '',
					remember: true,
				}
			}
		},
		computed: {
        },
        created() {
        },
		methods: {

		}
	}
</script>

