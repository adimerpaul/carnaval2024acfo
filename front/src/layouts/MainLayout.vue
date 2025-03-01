<template>
  <q-layout view="lhh Lpr lFf">
    <q-header>
      <q-toolbar class="bg-white text-black">
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />
        {{$version}}
        <q-space />
        <div class="text-subtitle2">
          {{ $store.isLogin ? $store.user.nickname : 'Morenada central 2025' }}
<!--          <pre>{{$store.user}}</pre>-->
        </div>
<!--        <q-toolbar-title class="">-->
<!--          Carnaval 2024-->
<!--        </q-toolbar-title>-->
        <q-space/>
        <q-btn
          flat
          dense
          round
          icon="person"
        />
        <q-btn
          @click="logout"
          v-if="$store.isLogin"
          :loading="loading"
          dense
          round
          color="red"
          class="text-bold"
          icon="logout"
        />
<!--        <pre>{{$store.isLogin}}</pre>-->
      </q-toolbar>
    </q-header>

<!--    <q-drawer-->
<!--      v-model="leftDrawerOpen"-->
<!--      show-if-above-->
<!--      bordered-->
<!--    >-->
<!--      <q-list>-->
<!--        <q-item-label-->
<!--          header-->
<!--        >-->
<!--          Essential Links-->
<!--        </q-item-label>-->

<!--        <EssentialLink-->
<!--          v-for="link in essentialLinks"-->
<!--          :key="link.title"-->
<!--          v-bind="link"-->
<!--        />-->
<!--      </q-list>-->
<!--    </q-drawer>-->

    <q-page-container>
      <router-view />
    </q-page-container>
    <q-footer bordered class="bg-grey-1 text-primary" style="z-index: 1000;">
      <q-tabs no-caps active-color="white" indicator-color="" active-bg-color="red" class="text-grey-8" v-model="tab" dense>
        <q-route-tab name="" label="Ruta" :icon="tab === '' ? 'map' : 'o_map'" to="/" />
        <q-route-tab name="videos" label="Videos" :icon="tab === 'videos' ? 'videocam' : 'o_videocam'" to="/videos" />
        <q-route-tab name="apoyos" label="Central" :icon="tab === 'apoyos' ? 'favorite' : 'favorite_border'" to="/acfo" />
        <q-route-tab name="roles" label="Rol" :icon="tab === 'roles' ? 'people' : 'o_people'" to="/rol" />
<!--        Desarrollado por-->
<!--        <q-route-tab name="about" label="Softwr" :icon="tab === 'about' ? 'code' : 'o_code'" to="/about" />-->
      </q-tabs>
    </q-footer>
  </q-layout>
</template>

<script>
import { api } from 'boot/axios'
export default {
  name: 'MainLayout',
  data () {
    return {
      leftDrawerOpen: false,
      tab: '',
      loading: false
    }
  },
  methods: {
    toggleLeftDrawer () {
      if (this.$store.isLogin) {
        this.$router.push('/usuarios')
      }
    },
    logout () {
      this.$q.dialog({
        title: 'Salir',
        message: '¿Está seguro que desea salir?',
        cancel: true,
        persistent: true
      }).onOk(() => {
        this.loading = true
        api.post('/logout').then(() => {
          localStorage.removeItem('tokenCarnaval')
          localStorage.removeItem('user')
          this.$store.isLogin = false
          this.$store.user = '{}'
          this.$router.push('/loginmain')
        }).catch(error => {
          console.log(error)
          localStorage.removeItem('tokenCarnaval')
          localStorage.removeItem('user')
          this.$store.isLogin = false
          this.$router.push('/loginmain')
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: 'Error al cerrar sesión',
            icon: 'report_problem'
          })
        }).finally(() => {
          this.loading = false
        })
      })
      // this.loading = true
      // localStorage.removeItem('tokenCarnaval')
      // localStorage.removeItem('user')
      // this.$store.isLogin = false
      // this.$router.push('/login')
    }
  }
}
</script>
