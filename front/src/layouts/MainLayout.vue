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
        <q-space />
        <div class="text-subtitle2">
          Carnaval Oruro 2024
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
<!--        <div>Quasar v{{ $q.version }}</div>-->
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
        <q-route-tab name="apoyos" label="Acfo" :icon="tab === 'apoyos' ? 'favorite' : 'favorite_border'" to="/acfo" />
        <q-route-tab name="roles" label="Rol" :icon="tab === 'roles' ? 'people' : 'o_people'" to="/rol" />
      </q-tabs>
    </q-footer>
  </q-layout>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [
  {
    title: 'Docs',
    caption: 'quasar.dev',
    icon: 'school',
    link: 'https://quasar.dev'
  },
  {
    title: 'Github',
    caption: 'github.com/quasarframework',
    icon: 'code',
    link: 'https://github.com/quasarframework'
  },
  {
    title: 'Discord Chat Channel',
    caption: 'chat.quasar.dev',
    icon: 'chat',
    link: 'https://chat.quasar.dev'
  },
  {
    title: 'Forum',
    caption: 'forum.quasar.dev',
    icon: 'record_voice_over',
    link: 'https://forum.quasar.dev'
  },
  {
    title: 'Twitter',
    caption: '@quasarframework',
    icon: 'rss_feed',
    link: 'https://twitter.quasar.dev'
  },
  {
    title: 'Facebook',
    caption: '@QuasarFramework',
    icon: 'public',
    link: 'https://facebook.quasar.dev'
  },
  {
    title: 'Quasar Awesome',
    caption: 'Community Quasar projects',
    icon: 'favorite',
    link: 'https://awesome.quasar.dev'
  }
]

export default defineComponent({
  name: 'MainLayout',

  components: {
    // EssentialLink
  },

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      // essentialLinks: linksList,
      leftDrawerOpen,
      tab: ref(''),
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
