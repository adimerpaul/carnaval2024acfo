import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', {
  state: () => ({
    counter: 0,
    swSocket: true,
    isLogin: !!localStorage.getItem('tokenCarnaval'),
    user: JSON.parse(localStorage.getItem('user') || '{}'),
    dancers: [],
    dancerAll: [],
    cog: 0,
    loading: false
  }),
  getters: {
    doubleCount: (state) => state.counter * 2
  },
  actions: {
    increment () {
      this.counter++
    }
  }
})
