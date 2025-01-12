import { boot } from 'quasar/wrappers'
import axios, { AxiosInstance } from 'axios'
import { useCounterStore } from 'stores/example-store'
import VueSocialSharing from 'vue-social-sharing'
declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $axios: AxiosInstance;
    $api: AxiosInstance;
  }
}

// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)
const api = axios.create({ baseURL: import.meta.env.VITE_API_BACK })
const url = import.meta.env.VITE_API_BACK
const urlSocket = import.meta.env.VITE_API_SOCKET

export default boot(({ app, router }) => {
  app.use(VueSocialSharing)
  // for use inside Vue files (Options API) through this.$axios and this.$api

  app.config.globalProperties.$axios = axios.create({ baseURL: import.meta.env.VITE_API_BACK })
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api
  app.config.globalProperties.$store = useCounterStore()

  const token = localStorage.getItem('tokenCarnaval')
  if (token) {
    api.defaults.headers.common.Authorization = `Bearer ${token}`
    // me
    api.get('/me').then((res) => {
      app.config.globalProperties.$store.user = res.data
    }).catch(() => {
      localStorage.removeItem('tokenCarnaval')
      localStorage.removeItem('user')
      app.config.globalProperties.$store.isLogin = false
      router.push('/loginacfo')
    })
  }
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api, url, urlSocket }
