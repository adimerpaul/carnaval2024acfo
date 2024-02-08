<template>
  <q-page>
    <div class="row">
      <div class="col-12 col-md-3"></div>
      <div class="col-12 col-md-6">
        <div class="q-pa-md">
          <q-card class="q-pa-md">
            <q-card-section class="q-pa-md">
              <div class="text-h6">Iniciar sesión</div>
              <q-input class="q-ma-xs" outlined v-model="nickname" label="Nickname" />
              <q-input class="q-ma-xs" outlined v-model="password" label="Contraseña" :type="visiblePassword ? 'text' : 'password'">
                <template v-slot:append>
                  <q-icon :name="visiblePassword ? 'visibility_off' : 'visibility'" @click="visiblePassword = !visiblePassword" />
                </template>
              </q-input>
              <q-btn color="primary" label="Ingresar" @click="login" class="full-width q-ma-xs" :loading="loading" />
              <q-btn color="primary" label="Principal" @click="$router.push('/')" class="full-width q-ma-xs" outline />
            </q-card-section>
          </q-card>
        </div>
      </div>
      <div class="col-12 col-md-3"></div>
    </div>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'
export default {
  name: 'LoginPage',
  data () {
    return {
      nickname: '',
      password: '',
      visiblePassword: false,
      loading: false
    }
  },
  mounted () {
    if (localStorage.getItem('tokenCarnaval')) {
      this.$router.push('/')
    }
  },
  methods: {
    login () {
      this.loading = true
      api.post('/login', {
        nickname: this.nickname,
        password: this.password
      }).then(response => {
        localStorage.setItem('tokenCarnaval', response.data.token)
        localStorage.setItem('user', JSON.stringify(response.data.user))
        this.$router.push('/')
        this.$store.isLogin = true
        this.$store.user = response.data.user
        api.defaults.headers.common.Authorization = `Bearer ${response.data.token}`
      }).catch(error => {
        console.log(error)
      }).finally(() => {
        this.loading = false
      })
    }
  }
}
</script>
